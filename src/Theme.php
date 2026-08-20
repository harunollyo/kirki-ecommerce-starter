<?php
/**
 * Theme bootstrap file
 *
 * @package Kirki\Ecommerce\Theme\Starter
 * @author Themeum <support@themeum.com>
 * @link https://themeum.com
 * @since 1.0.0
 */

namespace Kirki\Ecommerce\Theme\Starter;

defined('ABSPATH') || exit;

/**
 * Class Theme
 *
 * Bootstraps the setup and script actions for the theme.
 *
 * @since 1.0.0
 */
class Theme
{
    /**
     * The single instance of the class.
     *
     * @var Theme|null
     */
    private static $instance = null;

    /**
     * Get class instance.
     *
     * @return Theme
     */
    public static function get_instance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Constructor.
     */
    private function __construct()
    {
        $this->init();
    }

    /**
     * Initialize theme modules.
     */
    private function init()
    {
        Setup::get_instance();
        Scripts::get_instance();
        Filters::get_instance();
    }
}
