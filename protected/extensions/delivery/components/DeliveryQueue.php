<?php
/**
 * BaseDeliveryManager class
 *
 * PHP version 5
 *
 * @category   Packages
 * @package    Module.delivery
 * @subpackage Module.delivery.component
 * @author     Evgeniy Marilev <marilev@jviba.com>
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL
 * @link       https://jviba.com/display/PhpDoc
 * @abstract
 */
/**
 * BaseDeliveryManager is the manager class which has basic
 * functionality of all delivery managers
 * 
 * PHP version 5
 *
 * @category   Packages
 * @package    Module.delivery
 * @subpackage Module.delivery.component
 * @author     Evgeniy Marilev <marilev@jviba.com>
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL
 * @link       https://jviba.com/display/PhpDoc
 * @abstract
 */
class DeliveryQueue extends CComponent implements Countable
{
    /**
     * Delivery queues sorted by priority
     * @var array
     */
    private $_queues;
    
    /**
     * Delivery manager
     * @var IDeliveryManager
     */
    private $_manager;
    
    /**
     * Delivery items count in the queue
     * @var integer
     */
    private $_count;
    
    /**
     * Constructor.
     * Initializes the queue with an array or an iterable object.
     * 
     * @param IDeliveryManager $manager delivery manager instance
     * 
     * @return void
     */
    public function __construct(IDeliveryManager $manager = null)
    {
        $this->setManager($manager);
        foreach (DeliveryPriority::getList() as $priority) {
            $this->_queues[$priority] = new CQueue();
        }
        $this->_count = 0;
    }
    
    /**
     * Returns delivery manager
     * 
     * @return IDeliveryManager manager
     */
    public function getManager()
    {
        return $this->_manager;
    }
    
    /**
     * Changes delivery manager
     * 
     * @param IDeliveryManager $manager delivery manager
     * 
     * @return void
     */
    public function setManager($manager)
    {
        $this->_manager = $manager;
    }
    
    /**
     * Converts delivery queue to simple array
     * 
     * @return array the list of items in queue
     */
    public function toArray()
    {
        $ret = array();
        foreach ($this->_queues as $queue) {
            $ret = CMap::mergeArray($ret, $queue->toArray());
        }
        return $ret;
    }
    
    /**
     * Adds an object to the end of the delivering queue.
     * 
     * @param Delivery $delivery delivery instance
     * @param integer  $priority delivery priority
     * @param boolean  $track    whether required to track delivery in database
     * 
     * @return boolean whether delivery added successfully into queue
     */
    public function enqueue(Delivery $delivery, $priority = DeliveryPriority::MEDIUM, $track = true)
    {
        $delivery->priority = $priority;
        switch ($priority) {
        case DeliveryPriority::JUST_NOW:
            if ($track) {
                $this->_trackDelivery($delivery);
            }
            $notification = $delivery->getNotification()->getData();
            return $this->getManager()->deliver($notification);
            break;
        case DeliveryPriority::HIGH:
        case DeliveryPriority::MEDIUM:
        case DeliveryPriority::LOW:
            $this->_trackDelivery($delivery);
        case DeliveryPriority::ZERO:
            $queue = $this->_queues[$priority];
            $queue->enqueue($delivery);
            ++$this->_count;
            return true;
        }
    }
    
    /**
     * Tracks delivery item
     * 
     * @param Delivery $delivery delivery item
     * 
     * @return void
     */
    private function _trackDelivery(Delivery $delivery)
    {
        if (!$delivery->save()) {
            $params = array('{ERRORS}' => StringUtils::stringFromModelErrors($delivery));
            $message = Yii::t('delivery', 'Can\'t enqueue delivery item, because: {ERRORS}', $params);
            throw new Exception($message);
        }
    }
    
    /**
     * Returns the item at the top of the queue.
     * 
     * @return mixed item at the top of the queue
     * @throws CException if the queue is empty
     */
    public function peek()
    {
        $item = null;
        foreach ($this->_queues as $queue) {
            try {
                $item = $queue->peek();
            } catch (Exception $e) {
                continue;
            }
        }
        if ($item === null) {
            throw new CException(Yii::t('delivery', 'The queue is empty.'));
        }
        return $item;
    }
    
    /**
     * Removes and returns the object at the beginning of the queue.
     * 
     * @return mixed the item at the beginning of the queue. Null if queue is empty
     */
    public function dequeue()
    {
        $manager = $this->getManager();
        if ($this->count() == 0 && $manager->getLimit() === false) {
            $manager->pull();
        }
        $item = null;
        foreach ($this->_queues as $queue) {
            try {
                $item = $queue->dequeue();
            } catch (Exception $e) {
                continue;
            }
        }
        if ($item !== null) {
            --$this->_count;
        }
        return $item;
    }
    
    /**
     * Returns whether the queue contains the item
     * 
     * @param mixed $item the item
     * 
     * @return boolean whether the queue contains the item
     */
    public function contains($item)
    {
        foreach ($this->_queues as $queue) {
            if ($queue->contains($item)) {
                return true;
            }
        }
        return false;
    }
    
    /**
     * Returns count of objects in queue
     * 
     * @return integer count of objects
     * @see Countable::count()
     */
    public function count()
    {
        if (!isset($this->_count)) {
            $this->_count = 0;
            foreach ($this->_queues as $queue) {
                $this->_count += $queue->count();
            }
        }
        return $this->_count;
    }
    
    /**
     * Removes all items in the queue.
     * 
     * @return void
     */
    public function clear()
    {
        foreach ($this->_queues as $queue) {
            $queue->clear();
        }
        $this->_count = 0;
    }
}