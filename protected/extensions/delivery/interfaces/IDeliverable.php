<?php
/**
 * IDeliverable interface
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
 * IDeliverable is the interface which describe functionality
 * of all models which has posibility to deliver notifications
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
interface IDeliverable
{
    /**
     * Handlers delivering notification
     * 
     * @param IDeliveryChannel $channel   channel instance which sends delivery data
     * @param string           $sender    notification sender
     * @param string           $recipient notification recipient
     * 
     * @return boolean whether notificaation delivered successfully
     * @see NotificationStatic::deliver()
     */
    public function deliver(IDeliveryChannel $channel, $sender, $recipient);

    /**
     * Sets notification data pointer
     * 
     * @param mixed &$data notification data pointer
     * 
     * @return void
     */
    public function setNotificationData(&$data);
}