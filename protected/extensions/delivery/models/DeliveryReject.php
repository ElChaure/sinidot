<?php
/**
 * DeliveryReject class
 *
 * PHP version 5
 *
 * @category Packages
 * @package  Module.delivery.model
 * @author   Cherepovski Dmitri <cherep@jviba.com>
 * @license  https://jviba.com/display/license proprietary
 * @link     https://jviba.com/display/PhpDoc
 */

/**
 * DeliveryReject is the model class for table "delivery_reject".
 * The followings are the available columns in table 'delivery_reject':
 *
 * @property integer $id
 * @property string $recipient_address
 * @property integer $channel_type
 * @property integer $notification_type
 * 
 * @category Packages
 * @package  Module.delivery.model
 * @author   Cherepovski Dmitri <cherep@jviba.com>
 * @license  https://jviba.com/display/license proprietary
 * @link     https://jviba.com/display/PhpDoc
 */
class DeliveryReject extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * 
     * @param string $className the name of the model class
     * 
     * @return DeliveryReject the static model class
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
        return 'delivery_reject';
    }

    /**
     * Returns validation rules
     * 
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('notification_type, channel_type', 'numerical', 'integerOnly'=>true),
            array('recipient_address', 'length', 'max'=>255),
            array('id, recipient_address, channel_type', 'safe', 'on'=>'search'),
        );
    }

    /**
     * Returns model's relations
     * 
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
        );
    }

    /**
     * Returns attributes labels
     * 
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('app', 'Id'),
            'recipient_address' => Yii::t('app', 'Recipient Address'),
            'channel_type' => Yii::t('app', 'Channel Type'),
            'notification_type' => Yii::t('app', 'Notification Type'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * 
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);

        $criteria->compare('recipient_address', $this->recipient_address, true);

        $criteria->compare('channel_type', $this->channel_type);

        $criteria->compare('notification_type', $this->notification_type);

        $config = array(
            'criteria' => $criteria,
        );
        return new CActiveDataProvider('DeliveryReject', $config);
    }

    /**
     * Check the existance of rejection in DB
     *
     * @param integer $channelType      Type of the channel
     * @param string  $recipientAddress The recipient's address
     * @param integer $notificationType The type of notification
     *
     * @return boolean Check result
     */
    public static function checkRejectExistence($channelType, $recipientAddress, $notificationType)
    {
        return self::model()->exists(
            'channel_type = :channelType
                AND recipient_address = :recipientAddress
                AND (notification_type = :notificationType OR notification_type IS NULL)',
            array(
                ':channelType' => $channelType,
                ':recipientAddress' => $recipientAddress,
                ':notificationType' => $notificationType,
            )
        );
    }
}