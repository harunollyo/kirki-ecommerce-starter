<?php

/**
 * The header for our theme
 *
 * @package Kirki\Ecommerce\Theme\Starter
 * @author Themeum <support@themeum.com>
 * @link https://themeum.com
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

$theme_data = apply_filters('kirki_ecommerce_starter_data', []);
$brand_name = $theme_data['brand_name'] ?? get_bloginfo('name');
$brand_logo = $theme_data['brand_logo']  ?? null;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="kecom-starter-site-header">
    <div class="kecom-starter-container">
        <div class="kecom-starter-header-inner">
            <div class="kecom-starter-site-branding">
                <h1 class="kecom-starter-site-title">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <?php if (!empty($brand_logo)) : ?>
                        <img src="<?php echo esc_url($brand_logo); ?>" alt="<?php echo esc_attr($brand_name); ?>">
                        <?php endif; ?>
                        <span><?php echo esc_html($brand_name); ?></span>
                    </a>
                </h1>
            </div>

            <div class="kecom-starter-header-right">
                <nav class="kecom-starter-primary-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'kirki-ecommerce-starter'); ?>">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'kecom-starter-primary-menu',
                            'container'      => false,
                            'fallback_cb'    => false,
                        )
                    );
                    ?>
                </nav>

                <?php if (shortcode_exists('kecom_mini_cart')) : ?>
                    <span class="kecom-starter-nav-cart-divider">|</span>
                    <div class="kecom-starter-nav-extra">
                        <?php if (isset($theme_data['account_url'])) : ?>
                        <div>
                            <a href="<?php echo esc_url($theme_data['account_url']); ?>">
                                <?php isset($theme_data['render_account_icon']) && is_callable($theme_data['render_account_icon'])
                                        ? call_user_func($theme_data['render_account_icon'])
                                        : __('My Account', 'kirki-ecommerce-starter');
                                ?>
                            </a>
                        </div>
                        <?php endif; ?>
                        <div><?php echo do_shortcode('[kecom_mini_cart]'); ?></div>
                    </div>
                    
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</header>

<main class="kecom-starter-site-main">

