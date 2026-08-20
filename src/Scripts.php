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

use Kirki\Ecommerce\Theme\Starter\Core\Singletone;

/**
 * Class Scripts
 *
 * Enqueues scripts and stylesheets for the theme frontend.
 *
 * @since 1.0.0
 */
class Scripts extends Singletone
{
    /**
     * Constructor.
     */
    protected function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
    }

    /**
     * Enqueue scripts and styles.
     */
    public function enqueue_scripts()
    {
        // Main theme stylesheet from WP header.
        wp_enqueue_style('kirki-ecommerce-starter-style', get_stylesheet_uri(), array(), '1.0.0');

        // Compiled SCSS stylesheet.
        $css_file = get_template_directory() . '/assets/css/style.css';
        $css_version = file_exists($css_file) ? filemtime($css_file) : '1.0.0';
        wp_enqueue_style(
            'kirki-ecommerce-starter-main-style',
            get_template_directory_uri() . '/assets/css/style.css',
            array('kirki-ecommerce-starter-style'),
            $css_version
        );
    }
}
