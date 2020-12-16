<?php
/**
 * NotificationStatic class
 *
 * PHP version 5
 *
 * @category Packages
 * @package  Module.delivery.model
 * @author   Evgeniy Marilev <marilev@jviba.com>
 * @license  http://www.gnu.org/licenses/lgpl.html LGPL
 * @link     https://jviba.com/display/PhpDoc
 */
/**
 * NotificationStatic is the model class for table "notification_static".
 * The followings are the available columns in table 'notification_static':
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
 */
class NotificationStatic extends DeliverableNotification
{
    const SUBJECT_MAX_LENGTH = 256;
    
    /**
     * Returns the static model of the specified AR class.
     * 
     * @param string $className the name of the model class
     * 
     * @return NotificationStatic the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * Returns associated table name
     * 
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'notification_static';
    }

    /**
     * Returns validation rules
     * 
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        $base = parent::rules();
        $additional = array(
            array('subject, text', 'required'),
            array('subject', 'length', 'max' => self::SUBJECT_MAX_LENGTH),
        );
        return CMap::mergeArray($base, $additional);
    }

    
    /**
     * Returns notification type
     * 
     * @return integer notification type
     */
    public function getType()
    {
        return NotificationType::TYPE_STATIC;
    }
    
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
    public function deliver(IDeliveryChannel $channel, $sender, $recipient)
    {
        $subject = $this->subject;
        $content = $this->text;
        return $channel->send($sender, $recipient, $subject, $content);
    }
}