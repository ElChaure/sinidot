<?php
/**
 * IDelivery interface
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
 * IDelivery is the interface which describe functionality
 * of all models which has posibility of delivering
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
interface IDelivery
{
    /**
     * Returns associated notification skeleton
     * 
     * @return mixed notification object or skeleton identifier
     */
    public function getNotification();
    
    /**
     * Changes associated notification skeleton
     * 
     * @param mixed $notification notification object or skeleton identifier
     * 
     * @return void
     */
    public function setNotification($notification);
    
    /**
     * Returns delivery sender
     * 
     * @return mixed delivery sender instance or identifier
     */
    public function getSender();
    
    /**
     * Sets delivery sender
     * 
     * @param mixed $sender delivery sender instance or identifier
     * 
     * @return void
     */
    public function setSender($sender);
    
    /**
     * Returns delivery recipients
     * 
     * @return array $recipients delivery recipients list (records or identifiers)
     */
    public function getRecipients();
    
    /**
     * Sets delivery recipients list
     * 
     * @param array $recipients delivery recipients list (records)
     * 
     * @return void
     */
    public function setRecipients($recipients);
}