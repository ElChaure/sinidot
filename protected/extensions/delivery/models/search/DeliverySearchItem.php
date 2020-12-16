<?php
/**
 * DeliverySearchItem class
 *
 * PHP version 5
 *
 * @category   Packages
 * @package    Module.delivery.model
 * @subpackage Module.delivery.model.search
 * @author     Evgeniy Marilev <marilev@jviba.com>
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL
 * @link       https://jviba.com/display/PhpDoc
 */
/**
 * DeliverySearchItem is the DeliverySearch model's search result's item object
 *
 * @property integer $id
 * @property integer $notification_id
 * 
 * @category   Packages
 * @package    Module.delivery.model
 * @subpackage Module.delivery.model.search
 * @author     Evgeniy Marilev <marilev@jviba.com>
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL
 * @link       https://jviba.com/display/PhpDoc
 */
class DeliverySearchItem extends Delivery
{
    /**
     * Notification type identifier
     * @var integer
     */
    public $type;
    
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
     * Returns validation rules
     * 
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
        );
    }
}