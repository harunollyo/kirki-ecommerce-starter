<?php
/**
 * The template for displaying the footer
 *
 * @package Kirki\Ecommerce\Theme\Starter
 * @author Themeum <support@themeum.com>
 * @link https://themeum.com
 * @since 1.0.0
 */

?>
</main><!-- .kecom-starter-site-main -->

<footer class="kecom-starter-site-footer">
    <div class="kecom-starter-container">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'kirki-ecommerce-starter'); ?></p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
