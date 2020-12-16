<?php
/**
 * DeliverySearch class
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
 * DeliverySearch is the search model class
 * for searching some data in application...
 * 
 * @category   Packages
 * @package    Module.delivery.model
 * @subpackage Module.delivery.model.search
 * @author     Evgeniy Marilev <marilev@jviba.com>
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL
 * @link       https://jviba.com/display/PhpDoc
 */
class DeliverySearch extends SearchModel
{
    const SORT_MODE_PRIORITY_WITH_DATE = 'priority_with_date';
    
    const DEFAULT_PAGE_SIZE = 100;
    
    /**
     * Delivery priority
     * @see DeliveryPriority::getList()
     * @var integer
     */
    public $priority;
    
    /**
     * Active delivery channel
     * @var integer
     */
    public $channel;
    
    /**
     * Delivery data filters configuration
     * @var array
     */
    public $filters = array();
    
    /**
     * Returns validation rules
     * 
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
             array('priority', 'in', 'range' => DeliveryPriority::getList()),
             array('channel', 'numerical', 'integerOnly' => true, 'min' => 0),
        );
    }
    
    /**
     * Returns results item model class name
     * 
     * @return string model class name
     * @see SearchModel::getModelClass()
     */
    public function getItemClass()
    {
        return 'DeliverySearchItem';
    }
    
    /**
     * (non-PHPdoc)
     * 
     * @return CDataProvider configured data provider
     * @see SearchModel::build()
     */
    protected function build()
    {
        $criteria = new CDbCriteria;
        $criteria->with = array(
            'skeleton' => array(
                'select' => array('skeleton.id'),
            ),
            'recipients' => array(
                'select' => array('recipients.delivery_id', 'recipients.user_id', 'recipients.channel'),
            ),
        );
        $criteria->select = array(
            't.id',
            't.notification_id',
            'skeleton.type as type',
        );
        $criteria->together = true;
        if (isset($this->priority)) {
            $criteria->compare('t.priority', $this->priority);
        }
        if (isset($this->channel)) {
            $criteria->compare('recipients.channel', $this->channel);
        }
        $this->applyFilters($criteria);
        
        $config = array(
            'criteria' => $criteria,
        );
        return new CActiveDataProvider($this->getItemClass(), $config);
    }
    
    /**
     * Applies deivery data filters
     * 
     * @param CDbCriteria $criteria deliveries search criteria
     * 
     * @return void
     */
    protected function applyFilters($criteria)
    {
        foreach ($this->filters as $filter) {
            $filter->apply($criteria);
        }
    }
    
    /**
     * Applies sorting conditions for criteria
     * 
     * @param CDbCriteria $criteria search criteria
     * 
     * @return void
     */
    protected function applySort($criteria)
    {
        switch ($this->sort) {
        case self::SORT_MODE_PRIORITY_WITH_DATE:
            $criteria->order .= 't.priority_id ASC, notification.create_time ASC';
            break;
        default:
            parent::applySort($criteria);
            break;
        }
    }
    
    /**
     * Returns default page size
     * 
     * @return integer default page size
     */
    public function getDefaultPageSize()
    {
        return self::DEFAULT_PAGE_SIZE;
    }
    
    /**
     * Returns available sort modes
     * 
     * @return array sort modes
     */
    public function getSortModes()
    {
        $base = parent::getSortModes();
        $additional = array(
            self::SORT_MODE_PRIORITY_WITH_DATE,
        );
        return CMap::mergeArray($base, $additional);
    }
    
    /**
     * (non-PHPdoc)
     * @see SearchModel::getDefaultSortOrder()
     */
    public function getDefaultSortOrder()
    {
        return self::SORT_MODE_PRIORITY_WITH_DATE;
    }
}
