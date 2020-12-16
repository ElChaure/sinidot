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
class DeliveryManager extends SearchModel implements IDeliveryManager
{
    const CONFIG_DELIVERY_SEARCH = 'search';
    const CONFIG_DELIVERY_CHANNELS = 'channels';
    const CONFIG_NOTIFICATIONS_FETCH = 'fetch';
    const CONFIG_NOTIFICATIONS_DELIVER = 'deliver';
    const CONFIG_DELIVERY_QUEUE = 'queue';
    const CONFIG_DATABASE_CONNECTION = 'connection';

    /**
     * Delivery channels list
     * @var array
     */
    private $_deliveryChannels;
    
    /**
     * Delivery search model instance
     * @var ISearchModel
     */
    private $_deliverySearchModel;
    
    /**
     * Notification fetch models list
     * @var array
     */
    private $_notificationFetchModels = array();
    
    /**
     * Notification deliver models list
     * @var array
     */
    private $_notificationDeliverModels = array();
    
    /**
     * Delivering defaults
     * @var array
     */
    private $_defaults = array(
        self::CONFIG_DELIVERY_SEARCH => array(
            'class' => 'DeliverySearch',
        ),
        self::CONFIG_DELIVERY_CHANNELS => array(
            array(
                'class' => 'EmptyDeliveryChannel',
            ),
        ),
        self::CONFIG_NOTIFICATIONS_FETCH => array(
            NotificationType::TYPE_STATIC => array(
                'class' => 'NotificationStatic',
            ),
        ),
        self::CONFIG_NOTIFICATIONS_DELIVER => array(
        ),
        self::CONFIG_DELIVERY_QUEUE => array(
            'class' => 'DeliveryQueue',
        ),
        self::CONFIG_DATABASE_CONNECTION => 'db',
    );
    
    /**
     * Result configuration
     * @var array
     */
    private $_config;
    
    /**
     * Delivery queue
     * @var DeliveryQueue
     */
    private $_queue;
    
    /**
     * Custom options
     * @var array
     */
    public $config = array();

    /**
     * This salt is used to create the delivery rejection hash
     * @var string
     */
    public $rejectionCodeSalt = '#deliveryRejectionSalt';

    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
    }
    
    /**
     * Manager initialization
     * 
     * @return void
     * @see SearchModel::init()
     */
    public function init()
    {
        $config = $this->getConfig();
        $queueConfig = $config[self::CONFIG_DELIVERY_QUEUE];
        $queueConfig['manager'] = $this;
        $queue = Yii::createComponent($queueConfig);
        $this->setQueue($queue);
    }
    
    /**
     * Sets delivering queue object
     * 
     * @param DeliveryQueue $queue delivery queue
     * 
     * @return void
     */
    public function setQueue($queue)
    {
        $this->_queue = $queue;
    }
    
    /**
     * Returns delivering queue
     * 
     * @return DeliveryQueue delivery queue
     */
    public function getQueue()
    {
        return $this->_queue;
    }
    
    /**
     * Sets active delivery priority
     * 
     * @param integer $priority delivery priority
     * 
     * @return void
     */
    public function setPriority($priority)
    {
        if ($priority) {
            $model = $this->getDeliverySearchModel();
            $model->priority = $priority;
        }
    }
    
    /**
     * Returns active priority priority
     * 
     * @return integer delivery priority
     */
    public function getPriority()
    {
        $model = $this->getDeliverySearchModel();
        return $model->priority;
    }
    
    /**
     * Sets active delivery limit
     * 
     * @param integer $limit delivery limit
     * 
     * @return void
     */
    public function setLimit($limit)
    {
        if ($limit) {
            $model = $this->getDeliverySearchModel();
            $model->setPageSize($limit);
        }
    }
    
    /**
     * Returns active delivery limit
     * 
     * @return integer delivery limit
     */
    public function getLimit()
    {
        $model = $this->getDeliverySearchModel();
        return $model->getPageSize();
    }
    
    /**
     * Changes active channel filter
     * 
     * @param integer $channel active channel type
     * 
     * @return void
     */
    public function setActiveChannel($channel)
    {
        if ($channel) {
            $model = $this->getDeliverySearchModel();
            $model->channel = $channel;
        }
    }
    
    /**
     * Returns active channel filter
     * 
     * @return integer $channel active channel type or null if channel filtering disabled
     */
    public function getActiveChannel()
    {
        $model = $this->getDeliverySearchModel();
        return $model->channel;
    }
    
    /**
     * Returns actual database connection
     * 
     * @return CDbConnection opened database connection
     */
    public function getDbConnection()
    {
        $config = $this->getConfig();
        return Yii::app()->getComponent($config[self::CONFIG_DATABASE_CONNECTION]);
    }
    
    /**
     * Returns result delivering configuration
     * 
     * @return array delivering configuration
     */
    protected function getConfig()
    {
        if (!isset($this->_config)) {
            $this->_config = CMap::mergeArray($this->_defaults, $this->config);
        }
        return $this->_config;
    }
    
    /**
     * Handels building search delivery provider
     * 
     * @return CDataProvider configured data provider for searching
     */
    protected function build()
    {
        $model = $this->getDeliverySearchModel();
        $model->setPageSize($this->limit);
        $model->priority = $this->priority;
        return $model->search();
    }
    
    /**
     * Fetchs notifications
     * 
     * @param string $type           notification type
     * @param array  &$notifications notification identifiers
     * 
     * @return array notifications list
     */
    public function fetchNotifications($type, &$notifications)
    {
        if (!$type) {
            $params = array('{TYPE}' => $type);
            $message = Yii::t('delivery', 'Invalid or empty notification type: "{TYPE}"!', $params);
            throw new Exception($message);
        }
        $model = $this->getNotificationFetchModel($type);
        $model->notification_id = array_keys($notifications);
        $limit = $this->getLimit();
        if ($model instanceof SearchModel) {
            $model->setPageSize($limit);
            return $model->search()->getData();
        } else {
            $dataProvider = $model->search();
            $dataProvider->setPagination(array(
                'pageSize' => $limit,
            ));
            return $dataProvider->getData();
        }
    }
    
    /**
     * Pulls all notifications into delivery queue
     * 
     * @return void
     */
    public function pull()
    {
        $records = $this->search()->getData();
        $groups = array();
        foreach ($records as $i => $record) {
            $type = $record['type'];
            $notificationId = $record['notification_id'];
            if (!isset($groups[$type])) {
                $groups[$type] = array();
            }
            $groups[$type][$notificationId] = $i;
        }
        $ret = array();
        foreach ($groups as $type => $data) {
            $notifications = $this->fetchNotifications($type, $data);
            foreach ($notifications as $item) {
                $isActiveNotification = $item instanceof IActiveNotification;
                $notificationId = $isActiveNotification 
                                ? $item->notification_id
                                : $item['notification_id'];
                $index = $data[$notificationId];
                if ($isActiveNotification) {
                    $delivery = $records[$index];
                    $skeleton = $delivery->getNotification();
                    $skeleton->delivery = $delivery;
                    $skeleton->setData($item);
                    $item->setSkeleton($skeleton);
                } else {
                    $item['delivery'] = $records[$index];
                }
                $ret[$index] = $item;
            }
        }
        unset($records);
        $queue = $this->getQueue();
        foreach ($ret as $i => $item) {
            if ($item instanceof IActiveNotification) {
                $delivery = $item->getSkeleton()->delivery;
            } else {
                $delivery = $item;
            }
            $queue->enqueue($delivery, DeliveryPriority::ZERO);
            unset($ret[$i]);
        }
    }
    
    /**
     * Delivers all notifications and releases (empty) delivery queue
     * 
     * @param integer $logThreshold threshold delivery items count when
     * item should be written into log
     * 
     * @return integer count successfully delivered notifications
     */
    public function release($logLimit = 50)
    {
        $queue = $this->getQueue();
        $this->pull();
        $count = 0;
        $start = microtime(true);
        while ($delivery = $queue->dequeue()) {
            $notification = $delivery->getNotification()->getData();
            $count += $this->deliver($notification);
            if ($count % $logLimit == 0) {
                $diff = microtime(true) - $start;
                $message = "Delivery completed. {$count} items has been successfully sent. In time: {$diff} seconds.";
                Yii::log($message, CLogger::LEVEL_INFO, 'delivery');
            }
        }
        foreach ($this->getChannels() as $channel) {
            $channel->flushHistory();
        }
        return $count;
    }

    /**
     * Returns the code which can be used to reject the deliveries
     *
     * @param string  $recipientAddress Address of the recipient
     * @param integer $channelType      Type of the rejected channel
     * @param integer $notificationType [optional] Type of the rejected notification. Default: null,
     * which means "any notification"
     *
     * @return string Code which can be used to reject the delivery
     */
    public function buildRejectionCode($recipientAdress, $channelType, $notificationType = null)
    {
        return sha1($this->rejectionCodeSalt . $recipientAdress . $channelType . $notificationType);
    }

    /**
     * Adds the given address to the list of recipients, who had rejected the
     * deliveries
     *
     * @param string  $recipientAddress Address of the recipient
     * @param integer $channelType      Type of the rejected channel
     * @param integer $notificationType [optional] Type of the rejected notification. Default: null,
     * which means "any notification"
     *
     * @return boolean Whether the rejection is successful
     */
    public function rejectDeliveriesByRecipientsAddress($recipientAddress, $channelType, $notificationType = null)
    {
        if (DeliveryReject::checkRejectExistence($channelType, $recipientAddress, $notificationType)) {
            return true;
        }
        $model = new DeliveryReject();
        $model->recipient_address = $recipientAddress;
        $model->channel_type = $channelType;
        $model->notification_type = $notificationType;
        return $model->save();
    }

    /**
     * Handles delivering fetched notifications
     * 
     * @param mixed &$notification notification item
     * 
     * @return integer count successfully delivered notifications
     */
    public function deliver(&$notification)
    {
        if ($notification instanceof IActiveNotification) {
            $notificationType = $notification->getType();
        } else {
            $notificationType = $notification['type'];
        }
        if ($deliverable = $this->getNotificationDeliverModel($notificationType)) {
            $deliverable->setNotificationData($notification);
        } else {
            Delivery::assertDeliverable($notification);
            $deliverable = $notification;
        }
        $count = 0;
        try {
            foreach ($this->getChannels() as $channel) {
                $delivery = $notification instanceof IActiveNotification
                              ? $notification->getSkeleton()->delivery
                              : $notification['delivery'];
                $users = $delivery instanceof IDelivery
                       ? $delivery->getRecipients()
                       : $delivery['recipient'];
                $sender = $channel->getSender($delivery);
                $recipients = $channel->getRecipients($delivery);
                foreach ($recipients as $i => $recipient) {
                    if (empty($recipient)) {
                        continue;
                    }
                    if (//! DeliveryReject::checkRejectExistence($channel->getType(), $recipientAddress, $notificationType)&& 
                            $channel->getIsChannelingEnabledForRegisteredRecipient($delivery, $users[$i])
                    ) {
                        if ($deliverable->deliver($channel, $sender, $recipient)) {
                            $channel->markAsDelivered($notification, $delivery, $users[$i]);
                            ++$count;
                        }
                    }
                }
            }
        } catch (Exception $e) {
            Yii::log($e->getMessage(), CLogger::LEVEL_ERROR);
        }
        return $count;
    }
    
    /**
     * Sets delivery channels list
     * 
     * @param array $channels delivery channels list
     * 
     * @return void
     */
    public function setChannels($channels)
    {
        $this->_deliveryChannels = $channels;
    }
    
    /**
     * Builds and returns delivery channels list
     * 
     * @return array delivery channels
     */
    public function getChannels()
    {
        $config = $this->getConfig();
        if (!isset($this->_deliveryChannels)) {
            $this->_deliveryChannels = array();
            foreach ($config[self::CONFIG_DELIVERY_CHANNELS] as $channelConfig) {
                $channelConfig['manager'] = $this;
                $channel = Yii::createComponent($channelConfig);
                $this->_deliveryChannels[] = $channel;
            }
        }
        return $this->_deliveryChannels;
    }
    
    /**
     * Returns channel instance by it's ID (type) or name
     * 
     * @param integer|string $key channel type or name
     * 
     * @return IDeliveryChannel channel instance or FALSE if not found
     */
    public function getChannel($key)
    {
        if (is_string($key)) {
            $key = $this->resolveChannelIdByName($key);
        }
        foreach ($this->getChannels() as $channel) {
            if ($channel->getType() == $key) {
                return $channel;
            }
        }
        return false;
    }
    
    /**
     * Returns channel ID (type) by given channel name
     * 
     * @param string $name channel name
     * 
     * @return integer channel ID (type). FALSE if not found.
     */
    public function resolveChannelIdByName($name)
    {
        foreach ($this->getChannels() as $channel) {
            if ($channel->getName() == $name) {
                return $channel->getType();
            }
        }
        return false;
    }
    
    /**
     * Builds and returns delivery search model
     * 
     * @return ISearchModel delivery search model
     */
    protected function getDeliverySearchModel()
    {
        if (!isset($this->_deliverySearchModel)) {
            $config = $this->getConfig();
            $model = Yii::createComponent($config[self::CONFIG_DELIVERY_SEARCH]);
            SearchModel::assertSearchModel($model);
            $model->filters = $this->getChannels();
            $this->_deliverySearchModel = $model;
        }
        return $this->_deliverySearchModel;
    }
    
    /**
     * Builds and returns notifications fetch model
     * 
     * @param integer $type notification type
     * 
     * @return ISearchModel notifications fetch model
     */
    protected function getNotificationFetchModel($type)
    {
        if (!isset($this->_notificationFetchModels[$type])) {
            $config = $this->getConfig();
            $fetchConfig = $config[self::CONFIG_NOTIFICATIONS_FETCH];
            if (isset($fetchConfig[$type])) {
                $model = Yii::createComponent($fetchConfig[$type]);
                SearchModel::assertSearchModel($model);
                $this->_notificationFetchModels[$type] = $model;
            }
        }
        return $this->_notificationFetchModels[$type];
    }
    
    /**
     * Builds and returns notifications deliver model
     * 
     * @param integer $type notification type
     * 
     * @return IDeliverable notifications deliver model
     */
    protected function getNotificationDeliverModel($type)
    {
        if (!isset($this->_notificationDeliverModels[$type])) {
            $config = $this->getConfig();
            $deliverConfig = $config[self::CONFIG_NOTIFICATIONS_DELIVER];
            if (isset($deliverConfig[$type])) {
                $model = Yii::createComponent($deliverConfig[$type]);
                $this->_notificationDeliverModels[$type] = $model;
            } else {
                $this->_notificationDeliverModels[$type] = null;
            }
        }
        return $this->_notificationDeliverModels[$type];
    }
}