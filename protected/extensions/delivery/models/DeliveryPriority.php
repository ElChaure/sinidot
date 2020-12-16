<?php
/**
 * DeliveryPriority class
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
 * DeliveryPriority is the model class for delivering priority
 * 
 * @category Packages
 * @package  Module.delivery.model
 * @author   Evgeniy Marilev <marilev@jviba.com>
 * @license  http://www.gnu.org/licenses/lgpl.html LGPL
 * @link     https://jviba.com/display/PhpDoc
 */
class DeliveryPriority
{
    const JUST_NOW = 0;
    const HIGH = 1;
    const MEDIUM = 2;
    const LOW = 3;
    const ZERO = 4;
    
    /**
     * Returns available priorities identifiers list
     * 
     * @return array available priorities
     */
    public static function getList()
    {
        return array(
            self::HIGH,
            self::MEDIUM,
            self::LOW,
            self::ZERO,
        );
    }
}