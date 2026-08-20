<?php

namespace Kirki\Ecommerce\Theme\Starter\Core;

/**
 * Class Singletone
 *
 * @since 1.0.0
 */

abstract class Singletone
{
    /**
     * Array of subclass instances.
     *
     * @var array<string, static>
     */
    private static array $instances = [];

    /**
     * Get class instance.
     *
     * @return static
     */
    public static function get_instance()
    {
        $class = static::class;
        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new static();
        }
        return self::$instances[$class];
    }
}
