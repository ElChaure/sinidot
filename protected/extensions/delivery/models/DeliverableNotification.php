<?php
/**
 * DeliverableNotification class
 *
 * PHP version 5
 *
 * @category Packages
 * @package  Module.delivery.model
 * @author   Evgeniy Marilev <marilev@jviba.com>
 * @license  http://www.gnu.org/licenses/lgpl.html LGPL
 * @link     https://jviba.com/display/PhpDoc
 * @abstract
 */
/**
 * DeliverableNotification is the base model class for all
 * notification models
 *
 * @property integer $id
 * @property integer $notification_id
 * @property string  $subject
 * @property string  $text
 * 
 * @category Packages
 * @package  Module.delivery.model
 * @author   Evgeniy Marilev <marilev@jviba.com>
 * @license  http://www.gnu.org/licenses/lgpl.html LGPL
 * @link     https://jviba.com/display/PhpDoc
 * @abstract
 */
abstract class DeliverableNotification extends ActiveNotification implements IDeliverable
{
    /**
     * Renders delivery content
     * 
     * @param string $view alias path to template view file
     * @param array  $data template view data
     * 
     * @return string result content
     */
    public static function renderContent($view, array $data = array())
    {
        $renderer = Yii::app()->getComponent('viewRenderer');
        $viewFile = Yii::getPathOfAlias($view) . $renderer->fileExtension;
        return $renderer->renderFile($renderer, $viewFile, $data, true);
    }
    
    /**
     * Quick delivery method. It isn't process delivery optimally or robust!
     * It helps only deliver notification in one line of code.
     *
     * @param array|ActiveNotification $notification notification to be delivered
     * @param array|CActiveRecord      $from         sender credentials or user record
     * @param array                    $to           recipients list
     * @param array|integer            $channels     delivery channel(s)
     * @param integer                  $priority     delivery priority
     * @param boolean                  $needTrack    whether need to track delivery history
     *
     * @return boolean whether delivery process completed successfully
     */
    public static function quickDeliver(
            $notification, $from, $to,
            $channels = IDeliveryChannel::TYPE_EMAIL,
            $priority = DeliveryPriority::JUST_NOW,
            $needTrack = false
    )
    {
        $deliveryManager = Yii::app()->getModule('delivery')->getComponent('manager');
        $to = is_object($to) ? array($to) : $to;
        $channels = is_array($channels) ? $channels : array($channels);
        if ($from === null) {
            $from = array('email' => Yii::app()->getComponent('mailer')->From);
        }
    
        $delivery = Delivery::create($notification, $from, $channels);
        $recipients = array();
        foreach ($channels as $channel) {
            $channel = $channel instanceOf IDeliveryChannel
            ? $channel
            : $deliveryManager->getChannel($channel);
            foreach ($to as $recipientItem) {
                $recipients[] = $channel->createRecipient($recipientItem);
            }
        }
        $delivery->setRecipients($recipients);
    
        return $deliveryManager->getQueue()
            ->enqueue($delivery, $priority, $needTrack);
    }
}