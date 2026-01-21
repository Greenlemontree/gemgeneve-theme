<?php
/**
 * gemgeneve functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gemgeneve
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gemgeneve_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on gemgeneve, use a find and replace
		* to change 'gemgeneve' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'gemgeneve', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'gemgeneve' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'gemgeneve_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'gemgeneve_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gemgeneve_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gemgeneve_content_width', 640 );
}
add_action( 'after_setup_theme', 'gemgeneve_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gemgeneve_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Header Sidebar', 'gemgeneve' ),
			'id'            => 'header-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'gemgeneve' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'gemgeneve' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'gemgeneve' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar', 'gemgeneve' ),
			'id'            => 'footer-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'gemgeneve' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	
}
add_action( 'widgets_init', 'gemgeneve_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gemgeneve_scripts() {
	wp_enqueue_style( 'gemgeneve-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'gemgeneve-style', 'rtl', 'replace' );

	wp_enqueue_style( 'ma-custom-feuilledestyles', get_template_directory_uri() . '/style-custom.css' );

	wp_enqueue_script( 'gemgeneve-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	// GSAP library
	wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', array(), '3.12.5', true );
	wp_enqueue_script( 'gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', array('gsap'), '3.12.5', true );
	wp_enqueue_script( 'gemgeneve-animations', get_template_directory_uri() . '/js/animations.js', array('gsap', 'gsap-scrolltrigger'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gemgeneve_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



// Enable Gutenberg appearance tools (margin, padding, blockGap, etc.)
add_action( 'after_setup_theme', function () {
    add_theme_support( 'appearance-tools' );
	add_theme_support( 'custom-line-height' ); // specifically line-height
});


// CHANGE EXCERPT LENGTH
function new_excerpt_length($length) {
	return 20;	
	}	
add_filter('excerpt_length', 'new_excerpt_length');


/**
 * Remove taxonomy name prefixes from archive titles
 */
function gemgeneve_clean_archive_titles( $title ) {

    // Taxonomies (category, tag, custom tax)
    if ( is_category() || is_tag() || is_tax() ) {
        $title = single_term_title( '', false );
    }

    // Custom post type archives
    elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    }

    return $title;
}
add_filter( 'get_the_archive_title', 'gemgeneve_clean_archive_titles' );


/**
 * Add category and taxonomy term slugs to body_class()
 */
function gemgeneve_body_classes_terms( $classes ) {
    // For single posts: add all categories & tax terms
    if ( is_singular() ) {

        $post_id = get_the_ID();
        $taxonomies = get_object_taxonomies( get_post_type( $post_id ) );

        foreach ( $taxonomies as $tax ) {
            $terms = get_the_terms( $post_id, $tax );

            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                foreach ( $terms as $term ) {
                    $classes[] = $tax . '-' . $term->slug;
                }
            }
        }
    }

    // For taxonomy archive pages
    if ( is_tax() || is_category() || is_tag() ) {
        $term = get_queried_object();
        if ( $term && isset( $term->taxonomy, $term->slug ) ) {
            $classes[] = $term->taxonomy . '-' . $term->slug;
        }
    }

    return $classes;
}
add_filter( 'body_class', 'gemgeneve_body_classes_terms' );