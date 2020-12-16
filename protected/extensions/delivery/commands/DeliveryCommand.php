<?php
/**
 * DeliveryCommand class file
 *
 * PHP version 5
 *
 * @category   Packages
 * @package    Module.delivery
 * @subpackage Module.delivery.command
 * @author     Evgeniy Marilev <marilev@jviba.com>
 * @copyright  2012 5-SOFT
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL
 * @link       https://jviba.com/packages/php/docs
 */
Yii::import('packages.modules.delivery.interfaces.IDeliveryChannel');
/**
 * DeliveryCommand class is the console command
 * class which handles automatic assets minification
 *
 * @category   Packages
 * @package    Module.delivery
 * @subpackage Module.delivery.command
 * @author     Evgeniy Marilev <marilev@jviba.com>
 * @copyright  2012 5-SOFT
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL
 * @link       https://jviba.com/packages/php/docs
 */
class DeliveryCommand extends CConsoleCommand
{
    const PRIORITY_HIGH = 'high';
    const PRIORITY_MEDIUM = 'medium';
    const PRIORITY_LOW = 'low';
    
    const CHANNEL_ALL = 'all';
    const CHANNEL_EMAIL = 'email';
    const CHANNEL_SMS = 'sms';
    
    const CONFIG_MANAGER = 'manager';
    const CONFIG_CHANNELS = 'channels';
    
    /**
     * Default options
     * @var array
     */
    private $_default = array(
        self::CONFIG_MANAGER => array(
            'class' => 'EmailDeliveryManager',
        ),
        self::CONFIG_CHANNELS => array(
            self::CHANNEL_ALL => null,
            self::CHANNEL_EMAIL => IDeliveryChannel::TYPE_EMAIL,
            self::CHANNEL_SMS => IDeliveryChannel::TYPE_SMS,
        ),
        
    );
    
    /**
     * Result delivery configuration
     * @var array
     */
    private $_config;
    
    /**
     * Custom options
     * @var array
     */
    public $config = array();
    
    /**
     * Returns result delivery command configuration
     * 
     * @return array delivery command configuration
     */
    protected function getConfig()
    {
        if (!isset($this->_config)) {
            $this->_config = CMap::mergeArray($this->_default, $this->config);
        }
        return $this->_config;
    }
    
    /**
     * (non-PHPdoc)
     * 
     * @return string help string
     * @see CConsoleCommand::getHelp()
     */
    public function getHelp()
    {
        return <<<EOD
USAGE
  yiic delivery [action] [parameters]

DESCRIPTION
  Handles enqueue, dequeue notifications delivery
  Each action takes different parameters. Their usage can be found in
  the following examples.
  Common parameters description:
  * priority: optional, delivery priority filter (string). In range : 'high', 'medium', 'low'.
  * limit:    optional, delivery items fetch limit (integer).
  * channel:  optional, delivery channel filter (string). Such as 'email', 'sms', 'all', and etc.
  
EXAMPLES
    
  * yiic delivery dequeue [--priority=<priority>] [--limit=<limit>] [--channel=<channel>]
   Dequeues portion of notifications and delivers them into required channels
   
  * yiic delivery enqueue --notification=~/notification.json [--priority=<priority>] [--limit=<limit>] [--channel=<channel>]
   Enqueues notification into delivery queue with specified channel, priority and notification details.

EOD;
    }
    
    /**
     * Resolves real priority enumeration by given priority name
     * 
     * @param string $priority priority name
     * 
     * @return integer priority enumeration value
     */
    protected function resolvePriority($priority)
    {
        $priorities = self::getAvailablePriorities();
        if (in_array($priority, array_keys($priorities))) {
            return $priorities[$priority];
        } else {
            $params = array('{PRIORITY}' => $priority);
            $message = Yii::t('delivery', 'Undefined priority "{PRIORITY}"!', $params);
            $this->usageError($message);
        }
    }
    
    /**
     * Resolves real channel enumeration by given channel name
     *
     * @param string $channel channel name
     *
     * @return integer channel enumeration value
     */
    protected function resolveChannel($channel)
    {
        $channels = $this->getAvailableChannels();
        if (in_array($channel, array_keys($channels))) {
            return $channels[$channel];
        } else {
            $params = array('{CHANNEL}' => $channel);
            $message = Yii::t('delivery', 'Undefined channel "{CHANNEL}"!', $params);
            $this->usageError($message);
        }
    }

    /**
     * Executes delivery queue records processing
     * 
     * @param string  $priority [optional] priority used for srting delivery items
     * @param integer $limit    [optional] fetch delivery items limit per query.
     * @param string  $channel  [optional] delivery channel filter.
     * @param boolean $loop     [optional] whether required to unfinite loop delivery queue
     * 
     * @return void
     */
    public function actionDequeue($priority = 'high', $limit = 20, $channel = 'email', $loop = false)
    {
        $manager = Yii::app()->getModule('delivery')->manager;
        //init priority
        $priority = $this->resolvePriority($priority);
        if (isset($priority)) {
            $manager->setPriority($priority);
        }
        //init limit
        if (isset($limit)) {
            $manager->setLimit($limit);
        }
        //init channels
        $channel = $this->resolveChannel($channel);
        if (isset($channel)) {
            $manager->setActiveChannel($channel);
        }
        //delivering notifications
        $logThreshold = isset($limit) ? $limit : 50;
        do {
            $manager->release($logThreshold);
            sleep(1000);
        } while ($loop);
    }
    
    /**
     * Enqueue a delivery item into delivery queue in runtime
     * 
     * @param string  $notification notification file path. File must contains json with notification attributes.
     * @param string  $priority     priority enumeration
     * @param string  $channel      delivery channel name
     * 
     * @return type explanation
     */
    public function actionEnqueue($notification, $priority = 'high', $channel = 'email')
    {
        $queue = Yii::app()->getModule('delivery')->manager->getQueue();
        $notificationManager = Yii::app()->getModule('notifications')->getComponent('manager');
        if (!$parameters = CJSON::decode(file_get_contents($notification))) {
            $this->usageError('Can\'t parse notification file path or file not found!');
            return;
        }
        if (!$notification = Yii::createComponent($parameters['notification'])) {
            $this->usageError('Can\'t create notification using given notification file path!');
            return;
        }
        if (!$notificationId = $notificationManager->add($notification)) {
            echo "Can't add the notification into the storage!\n";
            return;
        }
        
        $senderCredentials = isset($parameters['senderCredentials'])
            ? $parameters['senderCredentials']
            : NULL;
        $sender = isset($parameters['sender'])
            ? $parameters['sender']
            : NULL;
        if (!is_null($sender)) {
            $sender = is_array($sender)
               ? YUser::model()->findByAttributes($sender)
               : YUser::model()->findByPk($sender);
        } elseif (!is_null($senderCredentials)){
            $sender =  $senderCredentials;
        } else {
            $this->usageError('Can\'t find  sender in the file!');
            return;
        }
        $recipientsCredentials = isset($parameters['recipientsCredentials'])
            ? $parameters['recipientsCredentials']
            : NULL;
        $recipients = isset($parameters['recipients'])
            ? $parameters['recipients']
            : NULL;
        
        $priority = $this->resolvePriority($priority);
        $channelClass = $this->resolveChannelClass($channel);
        $channel = new $channelClass;
        $delivery = Delivery::create($notification, $sender, $channel);
        $recipientsUsers = array();
        if (!is_null($recipients)) {
            if (!is_array($recipients)) {
                if ($recipients == '*') {
                    $recipients = Yii::app()->getModule('delivery')->findAllUserIds();
                } else {
                    $recipients = array($recipients);
                    
                }
            }
            $recipientsUsersModels = array();
            foreach ($recipients as $recipient) {
                $recipientsUsersModels [] = YUser::model()->findByPk($recipient);
            }
            $recipientsUsers = array_merge($recipientsUsers,$recipientsUsersModels);
        }
        if (!is_null($recipientsCredentials)) {
            $recipientsUsers = array_merge($recipientsUsers,$recipientsCredentials);
        }
        $deliveryRecipients = array();
        foreach ($recipientsUsers as $recipient) {
            $deliveryRecipients[] = $channel->createRecipient($recipient); 
        }
        $delivery->setRecipients($deliveryRecipients);
        if (!$queue->enqueue($delivery, $priority, false)) {
            echo "Can't enqueue delivery item!\n";
            return false;
        } else {
            echo "Enqueue delivery item done.\n";
            return true;
        }
    }
    
    /**
     * Creates notification $count times and enqueue its into the delivery queue
     * 
     * @param string  $notification notification config file
     * @param integer $count        count of notifications to be created
     * 
     * @return void
     */
    public function actionCreate($notification, $count = 100)
    {
        for ($i = 1; $i <= $count; ++$i) {
            $this->actionEnqueue($notification);
            ProgressHelper::publish($i / $count, 'Enqueued items: {PERCENT}%');
        }
    }
    
    /**
     * Returns available delivering priorities
     * 
     * @return array available priorities
     */
    public static function getAvailablePriorities()
    {
        return array(
            self::PRIORITY_LOW => DeliveryPriority::LOW,
            self::PRIORITY_MEDIUM => DeliveryPriority::MEDIUM,
            self::PRIORITY_HIGH => DeliveryPriority::HIGH,
        );
    }
    
    /**
     * Returns available delivering channels
     * 
     * @return array available delivering channels
     */
    public function getAvailableChannels()
    {
        $config = $this->getConfig();
        return $config[self::CONFIG_CHANNELS];
    }
    
    /**
     * Resolves real channel class  name
     *
     * @param string $channel channel name
     *
     * @return string channel class name
     */
    protected function resolveChannelClass($channel)
    {
        $channels = Yii::app()->getModule('delivery')->manager->config['channels'];
        if (in_array($channel, array_keys($channels))) {
            return $channels[$channel]['class'];
        } else {
            $params = array('{CHANNEL}' => $channel);
            $message = Yii::t('delivery', 'Undefined channel "{CHANNEL}"!', $params);
            $this->usageError($message);
        }
    }
}
