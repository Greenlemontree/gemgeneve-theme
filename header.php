<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gemgeneve
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'gemgeneve' ); ?></a>

	<header id="masthead" class="site-header">

		

		<div class="nav-container">

			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$gemgeneve_description = get_bloginfo( 'description', 'display' );
				if ( $gemgeneve_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $gemgeneve_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'gemgeneve' ); ?></button>

				<div class="nav-group">
					<div class="header-widget-area">
				
						<!-- header widget area -->
						<?php if ( is_active_sidebar( 'header-sidebar' ) ) : ?>
							<div id="header-widget-area" class="header-widget widget-area" role="complementary">
								<?php dynamic_sidebar( 'header-sidebar' ); ?>
							</div>
						<?php endif; ?>
						<!-- end header widget area -->

					</div>	

					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'primary-menu menu',
						)
					);
					?>
				</div><!-- .nav-group -->
			</nav><!-- #site-navigation -->

		</div><!-- .nav-container -->

	</header><!-- #masthead -->
