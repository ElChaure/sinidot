<?php
/**
 * DeliveryModule class
 *
 * PHP version 5
 *
 * @category Packages
 * @package  Module.delivery
 * @author   Evgeniy Marilev <marilev@jviba.com>
 * @license  http://www.gnu.org/licenses/lgpl.html LGPL
 * @link     https://jviba.com/display/PhpDoc
 */
/**
 * DeliveryModule is the module class for
 * handling delivery
 * 
 * @category Packages
 * @package  Module.delivery
 * @author   Evgeniy Marilev <marilev@jviba.com>
 * @license  http://www.gnu.org/licenses/lgpl.html LGPL
 * @link     https://jviba.com/display/PhpDoc
 */
class DeliveryModule extends CWebModule
{
    /**
     * User model class
     * @var string
     */
    public $userModelClass = 'User';
    
    /**
     * Relative path to database migrations
     * @var string
     */
    public $migrationsPath = '/data';
    
    /**
     * Module initialization
     * 
     * @return void
     * @see CModule::init()
     */
    public function init()
    {
        parent::init();
        if (!$notifications = Yii::app()->getModule('notifications')) {
            $message = 'Please add module "{DEPENDENT}" into application configuration! It is required for using "{THIS}" module.';
            $params = array(
                '{DEPENDENT}' => 'notifications',
                '{THIS}' => 'delivery',
            );
            throw new Exception(Yii::t('assert', $message, $params));
        }
        Yii::import('packages.extensions.model.*');
        Yii::import('packages.extensions.model.interfaces.*');
        Yii::import('packages.extensions.model.behaviors.*');
        Yii::import('delivery.components.*');
        Yii::import('delivery.models.*');
        Yii::import('delivery.models.search.*');
        Yii::import('delivery.models.filters.*');
        Yii::import('delivery.interfaces.*');
    }
    
    /**
     * Returns all user ids
     *
     * @return array all users ID list
     */
    public function findAllUserIds()
    {   
        $model = CActiveRecord::model($this->userModelClass);
        $count = $model->count();
        $criteria = new CDbCriteria();
        $criteria->select = 't.id';
        $criteria->limit = $limit = 1000;
        $criteria->offset = 0;
        $builder = Yii::app()->getDb()->getCommandBuilder();
        $tableName = $model->tableName();
        $ids = array();
        $i = 0;
        while ($i < $count) {
            $ids = array_merge(
                $ids,
                $builder->createFindCommand($tableName, $criteria)->queryColumn()
            );
            $criteria->offset += $limit;
            $i += $limit;
        }
        return $ids;
    }
}