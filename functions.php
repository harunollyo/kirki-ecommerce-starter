<?php
/**
 * Kirki Ecommerce Starter functions and definitions
 *
 * @package Kirki\Ecommerce\Theme\Starter
 * @author Themeum <support@themeum.com>
 * @link https://themeum.com
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

// Load Composer Autoloader.
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

// Bootstrap the Theme.
if (class_exists('Kirki\Ecommerce\Theme\Starter\Theme')) {
    \Kirki\Ecommerce\Theme\Starter\Theme::get_instance();
}

