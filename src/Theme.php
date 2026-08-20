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

use Kirki\Ecommerce\Theme\Starter\Core\Singletone;

/**
 * Class Theme
 *
 * Bootstraps the setup and script actions for the theme.
 *
 * @since 1.0.0
 */
class Theme extends Singletone
{
    /**
     * Constructor.
     */
    protected function __construct()
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
