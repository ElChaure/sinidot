<?php
/**
 * DeliveryChannelFilter class
 *
 * PHP version 5
 *
 * @category   Packages
 * @package    Module.delivery.model
 * @subpackage Module.delivery.model.filter
 * @author     Evgeniy Marilev <marilev@jviba.com>
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL
 * @link       https://jviba.com/display/PhpDoc
 */
/**
 * DeliveryChannelFilter is the model class
 * for filtering main delivery data (sender, recipient)
 * 
 * @category   Packages
 * @package    Module.delivery.model
 * @subpackage Module.delivery.model.filter
 * @author     Evgeniy Marilev <marilev@jviba.com>
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL
 * @link       https://jviba.com/display/PhpDoc
 */
class EmptyDeliveryChannel extends BaseDeliveryChannel
{
     public $fakeMode = true;
    /**
     * Returns delivery channel type
     * 
     * @return integer channel type
     */
    public function getType()
    {
        return IDeliveryChannel::TYPE_DUMMY;
    }
    
    /**
     * (non-PHPdoc)
     * @see IDeliveryChannel::getName()
     */
    public function getName()
    {
        return 'dummy';
    }
    
    /**
     * Applies filtering to existing criteria
     * 
     * @param CDbCriteria $criteria database criteria
     * 
     * @return void
     */
    public function apply($criteria)
    {
        parent::apply($criteria);
//        $with = array(
//            'recipients.user' => array(
//                'alias' => 'recipient_user',
//                'select' => array('recipient_user.id'),
//            ),
//            'sender' => array(
//                'select' => array('sender.id'),
//            ),
//        );
//        $criteria->with = CMap::mergeArray($criteria->with, $with);
        $criteria->addCondition('recipients.send_time IS NULL');
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
    public function processSend($sender, $recipient, $subject, $content, $attachments = null)
    {
        return true;
    }
    
    /**
     * Returns empty sender
     * 
     * @param mixed &$delivery delivery item
     * 
     * @return string notification's sender or FALSE if no recipient specified
     */
    public function getSender(&$delivery)
    {
        return false;
    }
    
    /**
     * Returns notification's sender
     * 
     * @param mixed &$delivery delivery item
     * 
     * @return array notification's recipients
     */
    public function getRecipients(&$delivery)
    {
        return array();
    }
    
    /**
     * Returns whether enable channeling required notification
     * in the delivery channel
     * 
     * @param IDelivery $delivery  delivery item
     * @param mixed     $recipient delivery recipient user or user identifier
     * 
     * @return boolean whether notification will be delivered with the channel
     * @see IDeliveryChannel::getWhetherEnableChanneling()
     */
    public function getIsChannelingEnabledForRegisteredRecipient(IDelivery $delivery, $recipient)
    {
        return false;
    }
    
    /**
     * Non requred to mark as delivered for dummy channel
     * @see BaseDeliveryChannel::markAsDelivered()
     */
    public function markAsDelivered(IDeliverable $deliverable, IDelivery $delivery, $user)
    {
    }
    
     /**
     * (non-PHPdoc)
     *
     * @see IDeliveryChannel::getUserCredentials($user)
     */
    public function getUserCredentials($user)
    {
        return array(
        );
    }
    
    /**
     * (non-PHPdoc)
     *
     * @see IDeliveryChannel::createRecipient($user)
     */
    public function createRecipient($user)
    {
        throw new Exception('Not implemented yet.');
    }
}