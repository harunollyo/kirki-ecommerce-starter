<?php

/**
 * Theme scripts and styles enqueuing file
 *
 * @package Kirki\Ecommerce\Theme\Starter
 * @author Themeum <support@themeum.com>
 * @link https://themeum.com
 * @since 1.0.0
 */

namespace Kirki\Ecommerce\Theme\Starter;

defined('ABSPATH') || exit;

use Kirki\Ecommerce\App\Supports\Facades\Settings;
use Kirki\Ecommerce\App\Supports\Icon;
use Kirki\Ecommerce\App\Supports\Url;
use Kirki\Ecommerce\Theme\Starter\Core\Singletone;

/**
 * Class Filters
 *
 * @since 1.0.0
 */
class Filters extends Singletone
{
    /**
     * Constructor.
     */
    protected function __construct()
    {
        add_filter('kirki_ecommerce_starter_data', array($this, 'filter_starter_data'));
    }

    /**
     * Filter starter data.
     *
     * @param array $data Data to filter.
     *
     * @return array Filtered data.
     */
    public function filter_starter_data($data)
    {
        if (class_exists(Settings::class)) {
            $brand_logo = Settings::get('general.store_logo', null);
            if (is_numeric($brand_logo)) {
                $data['brand_logo'] = wp_get_attachment_image_url($brand_logo, 'full');
            }
            $data['brand_name'] = Settings::get('general.store_name', get_bloginfo('name'));
            $data['account_url'] = Url::get_account_url();
            $data['render_account_icon'] = fn() => Icon::render('user', ['size' => 20]);
        }

        return $data;
    }
}
