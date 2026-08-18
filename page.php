<?php
/**
 * Template for displaying all pages
 *
 * @package Kirki\Ecommerce\Theme\Starter
 * @author Themeum <support@themeum.com>
 * @link https://themeum.com
 * @since 1.0.0
 */

get_header();
?>

<div class="kecom-starter-container">
    <?php while (have_posts()) :
        the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('kecom-starter-entry-page'); ?>>
            <h1 class="kecom-starter-entry-title"><?php the_title(); ?></h1>
            <div class="kecom-starter-entry-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</div>

<?php
get_footer();
