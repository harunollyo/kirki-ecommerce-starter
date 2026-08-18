<?php
/**
 * Theme setup configuration file
 *
 * @package Kirki\Ecommerce\Theme\Starter
 * @author Themeum <support@themeum.com>
 * @link https://themeum.com
 * @since 1.0.0
 */

namespace Kirki\Ecommerce\Theme\Starter;

defined('ABSPATH') || exit;

/**
 * Class Setup
 *
 * Handles standard WordPress theme setup tasks.
 *
 * @since 1.0.0
 */
class Setup
{
    /**
     * The single instance of the class.
     *
     * @var Setup|null
     */
    private static $instance = null;

    /**
     * Get class instance.
     *
     * @return Setup
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
        add_action('after_setup_theme', array($this, 'setup'));
    }

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    public function setup()
    {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         */
        add_theme_support('post-thumbnails');

        // Register primary navigation menu.
        register_nav_menus(
            array(
                'primary' => __('Primary Menu', 'kirki-ecommerce-starter'),
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );
    }
}
