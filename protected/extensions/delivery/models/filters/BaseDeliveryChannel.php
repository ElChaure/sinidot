<?php
/**
 * BaseDeliveryChannel class
 *
 * PHP version 5
 *
 * @category   Packages
 * @package    Module.delivery.model
 * @subpackage Module.delivery.model.filter
 * @author     Evgeniy Marilev <marilev@jviba.com>
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL
 * @link       http://jviba.com/display/PhpDoc
 * @abstract
 */
/**
 * BaseDeliveryChannel is the model class
 * for filtering main delivery data (sender, recipient)
 * 
 * @category   Packages
 * @package    Module.delivery.model
 * @subpackage Module.delivery.model.filter
 * @author     Evgeniy Marilev <marilev@jviba.com>
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL
 * @link       http://jviba.com/display/PhpDoc
 * @abstract
 */
abstract class BaseDeliveryChannel extends FilterModel implements IDeliveryChannel
{
    /**
     * Whether delivery history will be flushed after each deliverable
     * has been sent. If this option equals FALSE, then delivery process
     * has greatest perfomance, but marking notification as delivered
     * should be processed only after delivery of the notifications portion,
     * thats why not guaranteed what notification shouuld be marked correctly
     * depends on exceptions or php errors / fatal errors.
     * You can set this option to TRUE, and then each delivery will be
     * marked as delivered force after delivery, but with this value delivery
     * process should have slovest perfomance.
     * You can set option to an integer value, which specifies count of
     * successfully delivered notifications after which delivery history
     * should be flushed into database
     * @var boolean|integer
     */
    public $flushHistoryAfterDeliver = 50;
    
    /**
     * Whether needed to purge delivery history items from database
     * after successfull delivering. If you set this option to TRUE
     * then you have the greatest flush history perfomance.
     * @var boolean
     */
    public $purgeHistory = false;
    
    /**
     * Successfully delivered items history map
     * Format: array(delivery_id . '.' . user_id => timestamp|false)
     * @var array
     */
    protected $deliveryHistory = array();
    
    /**
     * Associated delivery manager
     * @var IDeliveryManager
     */
    private $_manager;
    
    /**
     * Set it TRUE if you do not want to send the data (for debugging)
     * @var boolean
     */
    public $fakeMode = false;

    /**
     * Changes active delivery manager
     * 
     * @param IDeliveryManager $manager delivery manager
     * 
     * @return void
     */
    public function setManager(IDeliveryManager $manager)
    {
        $this->_manager = $manager;
    }
    
    /**
     * Returns associated delivery manager
     * 
     * @return IDeliveryManager delivery manager
     */
    public function getManager()
    {
        return $this->_manager;
    }
    
    /**
     * (non-PHPdoc)
     *
     * @param mixed &$delivery delivery item
     *
     * @return string sender credentials
     * @see IDeliveryChannel::getSender($delivery)
     */
    public function getSender(&$delivery)
    {
        return $delivery->from_credentials;
    }
    
    /**
     * (non-PHPdoc)
     *
     * @param mixed &$delivery delivery item
     *
     * @return array recipietns email addresses
     * @see IDeliveryChannel::getRecipients($delivery)
     */
    public function getRecipients(&$delivery)
    {
        $recipients = $delivery->getRecipients($this->getType());
        $ret = array();
        foreach ($recipients as $recipient) {
            $ret[] = $recipient->credentials;
        }
        return $ret;
    }
    
    /**
     * Returns whether required purge sending history
     * 
     * @param IDeliverable $deliverable deliverable notification object
     * 
     * @return boolean whether required to purge history
     * @see IDeliveryChannel::getWhetherPurgeHistory()
     */
    public function getWhetherPurgeHistory(IDeliverable $deliverable)
    {
        return $this->purgeHistory;
    }
    
    /**
     * Returns whether enable channeling required notification
     * in the delivery channel
     * 
     * @param IDelivery $delivery  delivery object
     * @param mixed     $recipient delivery recipient user or user identifier
     * 
     * @return boolean whether notification will be delivered with the channel
     * @see IDeliveryChannel::getWhetherEnableChanneling()
     */
    public function getIsChannelingEnabledForRegisteredRecipient(IDelivery $delivery, $recipient)
    {
        return true;
    }

    /**
     * Marks delivery item as delivered to required user
     * 
     * @param IDeliverable $deliverable deliverable notification
     * @param IDelivery    $delivery    delivery item
     * @param mixed        $user        recipient user
     * 
     * @return void
     * @throws Exception
     * @see IDeliveryChannel::markAsDelivered()
     */
    public function markAsDelivered(IDeliverable $deliverable, IDelivery $delivery, $user)
    {
        $userId = $user instanceof CActiveRecord ? $user->user_id : $user;
        $deliveryId = $delivery instanceof CActiveRecord ? $delivery->id : $delivery;
        $this->deliveryHistory[$deliveryId . '.' . $userId] = $this->getWhetherPurgeHistory($deliverable)
                                                            ? false
                                                            : time();
        if ($this->flushHistoryAfterDeliver === true
           || is_int($this->flushHistoryAfterDeliver) && $this->flushHistoryAfterDeliver <= count($this->deliveryHistory)) {
            $this->flushHistory();
        }
    }
    
    /**
     * Flushes into the database delivery history for all processed deliverables
     * through the channel
     * 
     * @return void
     * @throws Exception
     */
    public function flushHistory()
    {
        $channel = $this->getType();
        $toUpdate = array();
        $toDelete = array();
        foreach ($this->deliveryHistory as $key => $timestamp) {
            list($deliveryId, $userId) = explode('.', $key);
            if ($timestamp === false) {
                $toDelete[] = array($deliveryId, $userId, $channel);
            } else {
                $toUpdate[] = array($deliveryId, $userId, $channel, $timestamp);
            }
        }
        try {
            $builder = $this->getManager()->getDbConnection()->getCommandBuilder();
            $tableName = DeliveryRecipient::model()->tableName();
            if (!empty($toUpdate)) {
                $columns = array('delivery_id', 'user_id', 'channel', 'send_time');
                $trigger = 'ON DUPLICATE KEY UPDATE send_time = VALUES(send_time)';
                $builder->createMultipleInsertCommand($tableName, $columns, $toUpdate, $trigger)->execute();
            }
            if (!empty($toDelete)) {
                $criteria = new CDbCriteria();
                $criteria->compare('channel', $this->getType());
                $subcriteria = new CDbCriteria();
                foreach ($toDelete as $item) {
                    $subcriteria->addCondition('delivery_id = ' . $deliveryId . ' AND user_id = ' . $userId, 'OR');
                }
                $criteria->mergeWith($subcriteria);
                $builder->createDeleteCommand($tableName, $criteria)->execute();
            }
        } catch (CDbException $e) {
            Yii::log('Can\'t flush delivery history because: ' . $e->getMessage(), CLogger::LEVEL_ERROR);
            throw $e;
        }
        $this->deliveryHistory = array();
    }
    
    /**
     * Handles sending dummy notification 
     * 
     * @param string $sender      sender contact
     * @param string $recipient   recipient contact
     * @param string $subject     notification subject
     * @param string $content     notification content
     * @param array  $attachments notification's attachments
     * 
     * @return boolean whether has been sent successfully
     * @see IDeliveryChannel::send()
     */
    public function send($sender, $recipient, $subject, $content, $attachments = null)
    {
        if ($this->fakeMode) {
            return $this->fakeSend($sender, $recipient, $subject, $content, $attachments = null);
        } else {
            return $this->processSend($sender, $recipient, $subject, $content, $attachments = null);
        }
    }
    
    /**
     * Handles sending notification really
     * 
     * @param string $sender      sender contact
     * @param string $recipient   recipient contact
     * @param string $subject     notification subject
     * @param string $content     notification content
     * @param array  $attachments notification's attachments
     * 
     * @return boolean whether has been sent successfully
     * @see IDeliveryChannel::send()
     */
    protected abstract function processSend($sender, $recipient, $subject, $content, $attachments = null);

    
    /**
     * Handles sending dummy notification
     * 
     * @param string $sender      sender contact
     * @param string $recipient   recipient contact
     * @param string $subject     notification subject
     * @param string $content     notification content
     * @param array  $attachments notification's attachments
     * 
     * @return boolean whether has been sent successfully
     */
    protected function fakeSend($sender, $recipient, $subject, $content, $attachments = null)
    {
        $logMsg = 'Fake sending notification. Channel: ' . $this->getName()
                . ', Sender: ' . $sender
                . ', Recipient: ' . $recipient
                . ', Subject: ' . $subject;
        Yii::trace($logMsg, 'delivery');
        return true;
    }
    
}