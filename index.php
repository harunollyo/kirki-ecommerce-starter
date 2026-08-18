<?php
/**
 * Main template file
 *
 * @package Kirki\Ecommerce\Theme\Starter
 * @author Themeum <support@themeum.com>
 * @link https://themeum.com
 * @since 1.0.0
 */

get_header();
?>

<div class="kecom-starter-container">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) :
            the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('kecom-starter-entry'); ?>>
                <h2 class="kecom-starter-entry-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <div class="kecom-starter-entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>

        <?php the_posts_navigation(); ?>
    <?php else : ?>
        <p><?php esc_html_e('No content found.', 'kirki-ecommerce-starter'); ?></p>
    <?php endif; ?>
</div>
<?php
get_footer();
