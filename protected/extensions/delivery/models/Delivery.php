<?php
/**
 * Delivery class
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
 * Delivery is the model class for table "delivery".
 * The followings are the available columns in table 'delivery':
 *
 * @property integer $id
 * @property integer $from_id
 * @property integer $notification_id
 * @property integer $priority
 * @property string  $from_credentials
 * @property integer $from_credentials_hash
 * 
 * @category Packages
 * @package  Module.delivery.model
 * @author   Evgeniy Marilev <marilev@jviba.com>
 * @license  http://www.gnu.org/licenses/lgpl.html LGPL
 * @link     https://jviba.com/display/PhpDoc
 */
class Delivery extends CActiveRecord implements IDelivery
{
    /**
     * Recipients cache
     * @var array
     */
    private $_recipients;
    
    /**
     * Returns the static model of the specified AR class.
     * 
     * @param string $className the name of the model class
     * 
     * @return Delivery the static model class
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
        return 'delivery';
    }

    /**
     * Returns validation rules
     * 
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('notification_id, priority', 'required'),
            array('notification_id, from_id', 'numerical', 'integerOnly' => true, 'min' => 1),
            array('from_credentials', 'safe'),
            array('priority', 'numerical', 'integerOnly' => true,
                'min' => DeliveryPriority::JUST_NOW,
                'max' => DeliveryPriority::LOW,
            ),
        );
    }

    /**
     * Returns model's relations
     * 
     * @return array relational rules.
     */
    public function relations()
    {
        $userModelClass = Yii::app()->getModule('delivery')->userModelClass;
        return array(
            'skeleton' => array(self::BELONGS_TO, 'Notification', 'notification_id'),
            'recipients' => array(self::HAS_MANY, 'DeliveryRecipient', 'delivery_id'),
            'sender' => array(self::BELONGS_TO, $userModelClass, 'from_id'),
        );
    }
    
    /**
     * Returns associated notification skeleton
     * 
     * @return mixed notification object or skeleton identifier
     */
    public function getNotification()
    {
        return $this->getRelated('skeleton', false);
    }
    
    /**
     * Changes associated notification skeleton
     * 
     * @param mixed $notification notification object or notification-skeleton identifier
     * 
     * @return void
     */
    public function setNotification($notification)
    {
        if (!is_object($notification)) {
            $record = new Notification();
            $record->id = $skeleton;
            $skeleton = $record;
            $skeleton->setData($notification);
        } else {
            if ($notification instanceof ActiveNotification) {
                if (!$skeleton = $notification->getSkeleton()) {
                    $skeleton = new Notification();
                    $skeleton->type = $notification->getType();
                    $skeleton->delivery = $this;
                    $notification->setSkeleton($skeleton);
                }
                $skeleton->setData($notification);
            } else {
                $skeleton = $notification;
            }
            $skeleton->addRelatedRecord('delivery', $this, false);
        }
        $this->skeleton = $skeleton;
        if ($skeleton->id) {
            $this->notification_id = $skeleton->id;
        }
    }
    
    /**
     * Returns delivery sender
     * 
     * @return mixed delivery sender instance or identifier
     */
    public function getSender()
    {
        return $this->getRelated('sender');
    }
    
    /**
     * Sets delivery sender
     * 
     * @param mixed $sender delivery sender instance or identifier
     * 
     * @return void
     */
    public function setSender($sender)
    {
        if ($sender instanceof CActiveRecord) {
            $this->from_id = $sender->id;
            $this->addRelatedRecord('sender', $sender, false);
        } else {
            $this->from_id = $sender;
        }
    }
    
    /**
     * Returns delivery recipients
     * 
     * @param integer $channel only specific recipients by channel type
     * 
     * @return array $recipients delivery recipients list (records or identifiers)
     */
    public function getRecipients($channel = null)
    {
        $recipients = isset($this->_recipients) ? $this->_recipients : $this->getRelated('recipients');
        $ret = array();
        foreach ($recipients as $recipient) {
            if ($channel === null) {
                $ret[] = $recipient;
            } else if (is_object($recipient) && $recipient->channel == $channel) {
                $ret[] = $recipient;
            }
        }
        return $ret;
    }
    
    /**
     * Sets delivery recipients list
     * 
     * @param array $recipients delivery recipients list (records)
     * 
     * @return void
     */
    public function setRecipients($recipients)
    {
        $this->_recipients = $recipients;
    }
    
    /**
     * Asserts whether object is instance of deliverable
     * 
     * @param object $object any object
     * 
     * @return void
     * @throws Exception
     */
    public static function assertDeliverable($object)
    {
        if (!$object instanceof IDeliverable) {
            $params = array(
                '{CLASS}' => get_class($object),
                '{INTERFACE}' => 'IDeliverable',
            );
            $message = Yii::t('assert', 'The class "{CLASS}" must implements "{INTERFACE}"!', $params);
            throw new Exception($message);
        }
    }
    
    /**
     * Return Delivery object
     * 
     * @param IActiveNotification|array             $notification notification object
     * @param YUser|array                           $user         sender user model or array of sender
     * credentials
     * @param IDeliveryChannel|string|integer|array $channels     delivery channel (instance
     * |name|type) or array of channel (instances|names|types)
     * 
     * @return Delivery object
     */ 
    public static function create($notification, $user, $channels)
    {
        if (!is_array($channels)) {
            $channels = array($channels);
        }
        foreach ($channels as $i => $channel) {
            if (!$channel instanceOf IDeliveryChannel) {
                $channel = Yii::app()->getModule('delivery')
                    ->getComponent('manager')
                    ->getChannel($channel);
            }
            $channels[$i] = $channel;
        }
        $delivery = new Delivery();
        $delivery->setNotification($notification);
        if ($user instanceof CActiveRecord) {
            $delivery->from_id = $user->getPrimaryKey();
            $credentials = array();
            foreach ($channels as $channel) {
                $credentials = array_merge(
                    $credentials,
                    $channel->getUserCredentials($user)
                );
            }
            $delivery->from_credentials = $credentials;
            return $delivery;
        } elseif (is_array($user)) {
            $delivery->from_credentials = $user;
            return $delivery;
        } else {
            $message = 'User must be instance of CActiveRecord or array';
            throw new Exception($message);  
        }
    }
    
     /**
     * Serializes sender credentials before saving record
     * 
     * @return boolean whether delivery should be saved
     * @see CActiveRecord::beforeSave()
     */
    protected function beforeSave()
    {
        if (!is_null($this->from_credentials)) {
            $credentials = serialize($this->from_credentials);
            $this->from_credentials = $credentials;
            $this->from_credentials_hash = crc32($credentials);
        }    
        return parent::beforeSave();
    }
    
    /**
     * Restore sender credentials after saving record and saves
     * related delivery recipients
     *
     * @return void
     * @see CActiveRecord::afterSave()
     */
    protected function afterSave()
    {
        parent::afterSave();
        //      $data = array();
        //      foreach ($this->getRecipients() as $recipient) {
        //          $data[] = array($recipient->user_id, $recipient->channel, $this->id);
        //      }
        //      $builder = $this->getCommandBuilder();
        //      $tableName = DeliveryRecipient::model()->tableName();
        //      $columns = array('user_id', 'channel', 'delivery_id');
        //      $command = $builder->createMultipleInsertCommand($tableName, $columns, $data);
        //      $command->execute();
        if (is_string($this->from_credentials)) {
            $this->from_credentials = unserialize($this->from_credentials);
        }
        foreach ($this->getRecipients() as $recipient) {
            $recipient->delivery_id = $this->id;
            if (!$recipient->save()) {
                $params = array('{ERRORS}' => StringUtils::stringFromModelErrors($recipient));
                $message = Yii::t('delivery', 'Can\'t enqueue delivery item, because: {ERRORS}', $params);
                throw new Exception($message);
            }
        }
    }
    
    /**
     * Restore sender credentials after finding record
     *
     * @return void
     * @see CActiveRecord::afterFind()
     */
    protected function afterFind()
    {
        parent::afterFind();
        if (is_string($this->from_credentials)) {
            $this->from_credentials = unserialize($this->from_credentials);
        }
    }
}