<?php
/**
 * IDeliveryManager interface
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
 * IDeliveryManager is the interface which describe functionality
 * of all managers which has posibility to deliver notifications
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
interface IDeliveryManager
{
    /**
     * Handles delivering notification
     * 
     * @param mixed &$notification notification
     * 
     * @return integer count successfully delivered items
     */
    public function deliver(&$notification);
    
    /**
     * Pulls all notifications into delivery queue
     * 
     * @return void
     */
    public function pull();
    
    /**
     * Delivers all notifications and releases delivery queue
     * 
     * @return boolean whether delivery queue released successfully
     */
    public function release();
    
    /**
     * Adds the given address to the list of recipients, who had rejected the
     * deliveries
     *
     * @param string  $recipientAddress Address of the recipient
     * @param integer $channelType      Type of the rejected channel
     * @param integer $notificationType [optional] Type of the rejected notification. Default: null,
     * which means "any notification"
     *
     * @return boolean Whether the rejection is saved to DB
     */
    public function rejectDeliveriesByRecipientsAddress($recipientAddress, $channelType, $notificationType = null);

    /**
     * Sets delivering queue object
     * 
     * @param DeliveryQueue $queue delivery queue
     * 
     * @return void
     */
    public function setQueue($queue);
    
    /**
     * Returns delivering queue
     * 
     * @return DeliveryQueue delivery queue
     */
    public function getQueue();
    
    /**
     * Sets delivery channels list
     * 
     * @param array $channels delivery channels list
     * 
     * @return void
     */
    public function setChannels($channels);
    
    /**
     * Builds and returns delivery channels list
     * 
     * @return array delivery channels
     */
    public function getChannels();
    
    /**
     * Sets active delivery priority
     * 
     * @param integer $priority delivery priority
     * 
     * @return void
     */
    public function setPriority($priority);
    
    /**
     * Returns active priority priority
     * 
     * @return integer delivery priority
     */
    public function getPriority();
    
    /**
     * Sets active delivery limit
     * 
     * @param integer $limit delivery limit
     * 
     * @return void
     */
    public function setLimit($limit);
    
    /**
     * Returns active delivery limit
     * 
     * @return integer delivery limit
     */
    public function getLimit();
    
    /**
     * Changes active channel filter
     * 
     * @param integer $channel active channel type
     * 
     * @return void
     */
    public function setActiveChannel($channel);
    
    /**
     * Returns active channel filter
     * 
     * @return integer $channel active channel type or null if channel filtering disabled
     */
    public function getActiveChannel();
    
    /**
     * Returns channel instance by channel type of name
     * 
     * @param integer|string $key channel name or type
     * 
     * @return IDeliveryChannel channel instance
     */
    public function getChannel($key);
    
    /**
     * Returns actual database connection
     * 
     * @return CDbConnection opened database connection
     */
    public function getDbConnection();
}