<?php
/**
 * DeliveryRecipient class
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
 * DeliveryRecipient is the model class for table "delivery_recipient".
 * The followings are the available columns in table 'delivery_recipient':
 *
 * @property integer $delivery_id
 * @property integer $user_id
 * @property integer $channel
 * @property string  $send_time
 * @property string  $credentials 
 * @property integer $credentials_hash
 * 
 * @category Packages
 * @package  Module.delivery.model
 * @author   Evgeniy Marilev <marilev@jviba.com>
 * @license  http://www.gnu.org/licenses/lgpl.html LGPL
 * @link     https://jviba.com/display/PhpDoc
 */
class DeliveryRecipient extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * 
     * @param string $className the name of the model class
     * 
     * @return DeliveryRecipient the static model class
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
        return 'delivery_recipient';
    }

    /**
     * Returns validation rules
     * 
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('delivery_id', 'required'),
            array('delivery_id, user_id, channel', 'numerical', 'integerOnly'=>true),
            array('send_time, credentials', 'safe'),
            array('delivery_id, user_id, send_time, channel', 'safe', 'on'=>'search'),
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
            'user' => array(self::BELONGS_TO, $userModelClass, 'user_id'),
            'delivery' => array(self::BELONGS_TO, 'Delivery', 'delivery_id'),
        );
    }
     /**
     * (non-PHPdoc)
     * 
     * @return void
     * @see CActiveRecord::beforeSave()
     */
    protected function beforeSave() 
    {
        if (!is_null($this->credentials)) {
            $credentials = serialize($this->credentials);
            $this->credentials = $credentials;
            $this->credentials_hash = crc32($credentials);
        }    
        return parent::beforeSave();
    }
    
    /**
     * Restore credentials after saving record
     * 
     * @return void
     * @see CActiveRecord::afterSave()
     */
    protected function afterSave()
    {
        parent::afterSave();
        if (is_string($this->credentials)) {
            $this->credentials = unserialize($this->credentials);
        }
    }
    
    /**
     * Restore credentials after finding record
     *
     * @return void
     * @see CActiveRecord::afterFind()
     */
    protected function afterFind()
    {
        parent::afterFind();
        if (is_string($this->credentials)) {
            $this->credentials = unserialize($this->credentials);
        }
    }
}