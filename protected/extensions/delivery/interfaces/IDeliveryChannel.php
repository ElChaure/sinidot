<?php
/**
 * IActiveNotification interface
 *
 * PHP version 5
 *
 * @category   Packages
 * @package    Module.delivery
 * @subpackage Module.delivery.interface
 * @author     Evgeniy Marilev <marilev@jviba.com>
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL
 * @link       https://jviba.com/display/PhpDoc
 */
/**
 * IActiveNotification is the interface which describe functionality
 * of all activerecord-based notifications models
 * 
 * PHP version 5
 *
 * @category   Packages
 * @package    Module.delivery
 * @subpackage Module.delivery.interface
 * @author     Evgeniy Marilev <marilev@jviba.com>
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL
 * @link       https://jviba.com/display/PhpDoc
 */
interface IDeliveryChannel
{
    const TYPE_DUMMY = 0;
    const TYPE_EMAIL = 1;
    const TYPE_SMS = 2;
    
    /**
     * Returns delivery channel type
     * 
     * @return integer channel type
     */
    public function getType();
    
    /**
     * Returns delivery channel name
     *
     * @return string channel name
     */
    public function getName();
    
    /**
     * Changes active delivery manager
     * 
     * @param IDeliveryManager $manager delivery manager
     * 
     * @return void
     */
    public function setManager(IDeliveryManager $manager);
    
    /**
     * Returns associated delivery manager
     * 
     * @return IDeliveryManager delivery manager
     */
    public function getManager();
    
    /**
     * Returns notification's sender
     * 
     * @param mixed &$delivery delivery item
     * 
     * @return string notification's sender
     * @throws Exception
     */
    public function getSender(&$delivery);
    
    /**
     * Returns notification's sender
     * 
     * @param mixed &$delivery delivery item
     * 
     * @return array notification's recipients
     * @throws Exception
     */
    public function getRecipients(&$delivery);
    
    /**
     * Handles sending notification to end recipient
     * 
     * @param string $sender      sender contact
     * @param string $recipient   recipient contact
     * @param string $subject     notification subject
     * @param string $content     notification content
     * @param array  $attachments notification's attachments
     * 
     * @return boolean whether has been sent successfully
     * @throws Exception
     */
    public function send($sender, $recipient, $subject, $content, $attachments = null);
    
    /**
     * Returns whether required purge sending history
     * 
     * @param IDeliverable $deliverable deliverable notification object
     * 
     * @return boolean whether required to purge history
     */
    public function getWhetherPurgeHistory(IDeliverable $deliverable);
    
    /**
     * Returns whether enable channeling required notification
     * in the delivery channel
     * 
     * @param IDelivery $delivery  delivery object
     * @param mixed     $recipient delivery recipient user or user identifier
     * 
     * @return boolean whether notification will be delivered with the channel
     */
    public function getIsChannelingEnabledForRegisteredRecipient(IDelivery $delivery, $recipient);

    /**
     * Marks delivery item as delivered to required user
     * 
     * @param IDeliverable $deliverable deliverable notification
     * @param IDelivery    $delivery    delivery item
     * @param mixed        $user        recipient user
     * 
     * @return void
     * @throws Exception
     */
    public function markAsDelivered(IDeliverable $deliverable, IDelivery $delivery, $user);
    
    /**
     * Return array of user Credentials
     * 
     * @param YUser $user recipient user model
     * 
     * @return array of user credentials
     * @throws Exception
     */
    public function getUserCredentials($user);
    
    /**
     * Return DeliveryRecipient object
     * 
     * @param YUser|array $user recipient user model or array of user channel
     * 
     * @return DeliveryRecipient
     * @throws Exception
     */ 
    public function createRecipient($user);
}