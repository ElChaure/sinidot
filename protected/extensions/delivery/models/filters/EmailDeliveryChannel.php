<?php
/**
 * EmailDeliveryChannel class
 *
 * PHP version 5
 *
 * @category   Packages
 * @package    Module.delivery
 * @subpackage Module.delivery.component
 * @author     Evgeniy Marilev <marilev@jviba.com>
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL
 * @link       https://jviba.com/display/PhpDoc
 * @abstract
 */
/**
 * EmailDeliveryChannel is the base delivery channel model
 * which handles sending email as notification
 * 
 * PHP version 5
 *
 * @category   Packages
 * @package    Module.delivery
 * @subpackage Module.delivery.component
 * @author     Evgeniy Marilev <marilev@jviba.com>
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL
 * @link       https://jviba.com/display/PhpDoc
 * @abstract
 */
abstract class EmailDeliveryChannel extends BaseDeliveryChannel
{
    /**
     * Email content type
     * @var string
     */
    public $contentType;
    
    /**
     * Returns delivery channel type
     * 
     * @return integer channel type
     */
    public function getType()
    {
        return IDeliveryChannel::TYPE_EMAIL;
    }
    
    /**
     * (non-PHPdoc)
     * @see IDeliveryChannel::getName()
     */
    public function getName()
    {
        return 'email';
    }
    
    /**
     * (non-PHPdoc)
     * @see IDeliveryChannel::getSender()
     */
    public function getSender(&$delivery)
    {
        if (($credentials = parent::getSender($delivery)) && !empty($credentials)) {
            if (is_null($credentials['email'])) {
                return Yii::app()->mailer->From;
            } else {
                return $credentials['email'];
            }
        }
        return null;
    }
    
    /**
     * (non-PHPdoc)
     *
     * @param mixed &$delivery delivery item
     *
     * @return array recipients email addresses
     * @see IDeliveryChannel::getRecipients($delivery)
     */
    public function getRecipients(&$delivery)
    {
        $ret = array();
        if ($recipients = parent::getRecipients($delivery)) {
            foreach ($recipients as $recipient) {
                if (!empty($recipient['email'])) {
                    $ret[] = $recipient['email'];
                }
            }
        }
        return $ret;
    }
    
    /**
     * Handles sending email notification to end recipient
     * 
     * @param string $sender      sender email
     * @param string $recipient   recipient email
     * @param string $subject     email subject
     * @param string $content     email content
     * @param array  $attachments email's attachments
     * 
     * @return boolean whether email has been sent successfully
     * @throws Exception
     * @see IDeliveryChannel::send()
     */
    public function processSend($sender, $recipient, $subject, $content, $attachments = null)
    {
        $mailer = Yii::app()->mailer;
        $mailer->ClearAddresses();
        $mailer->From = $sender;
        //$mailer->FromName = $sender;
        $mailer->AddAddress($recipient);
        if (isset($this->contentType)) {
            $mailer->ContentType = $this->contentType;
        }
        $mailer->Subject = $subject;
        $mailer->setBody($content);
        if ($mailer->Send()) {
            return true;
        } else {
            $params = array('{ERROR}' => $mailer->ErrorInfo);
            $message = Yii::t('delivery', 'Can\'t send email because: "{ERROR}"', $params);
            throw new Exception($message);
        }
        return false;
    }
    
     /**
     * (non-PHPdoc)
     *
     * @see IDeliveryChannel::createRecipient($user)
     */
    public function createRecipient($user)
    {
        $deliveryRecipient = new DeliveryRecipient();
        $deliveryRecipient->channel = $this->getType();
        if ($user instanceof CActiveRecord) {
            $deliveryRecipient->user_id = $user->getPrimaryKey();
            $deliveryRecipient->credentials = $this->getUserCredentials($user);
            return $deliveryRecipient;
        } elseif (is_array($user)) {
            $deliveryRecipient->credentials = $user;
            return $deliveryRecipient;
        } else if (is_string($user)) {
            $deliveryRecipient->credentials = array('email' => $user);
            return $deliveryRecipient;
        } else {
            $message = 'User must be instance of CActiveRecord or array';
            throw new Exception($message);
        }
    }
}