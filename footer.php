<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gemgeneve
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-widget-area">
			
			<!-- footer widget area -->
			<?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
				<div id="footer-widget-area" class="footer-widget widget-area" role="complementary">
					<?php dynamic_sidebar( 'footer-sidebar' ); ?>
				</div>
			<?php endif; ?>
			<!-- end footer widget area -->

		</div>
		<div class="site-info">
			<p>©<?php echo date('Y'); ?> - <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a><p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
