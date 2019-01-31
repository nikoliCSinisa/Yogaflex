<?php
/**
 * yogaflex functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package yogaflex
 */

if ( ! function_exists( 'yogaflex_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function yogaflex_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on yogaflex, use a find and replace
		 * to change 'yogaflex' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'yogaflex', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'yogaflex' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'yogaflex_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'yogaflex_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function yogaflex_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'yogaflex_content_width', 767 );
}
add_action( 'after_setup_theme', 'yogaflex_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function yogaflex_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'yogaflex' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'yogaflex' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'yogaflex_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function yogaflex_scripts() {

	// enqueue styles

	wp_enqueue_style( 'yogaflex-style', get_template_directory_uri(). '/style.css' );
	wp_enqueue_style( 'yogaflex-style-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,700' );
	wp_enqueue_style( 'yogaflex-style-linearicons', get_template_directory_uri(). '/style/linearicons.css' );
	wp_enqueue_style( 'yogaflex-style-font-awesome', get_template_directory_uri(). '/style/font-awesome.min.css' );
	wp_enqueue_style( 'yogaflex-style-bootstrap', get_template_directory_uri(). '/style/bootstrap.css' );
	wp_enqueue_style( 'yogaflex-style-magnific-popup', get_template_directory_uri(). '/style/magnific-popup.css' );
	wp_enqueue_style( 'yogaflex-style-nice-select', get_template_directory_uri(). '/style/nice-select.css' );
	wp_enqueue_style( 'yogaflex-style-animate', get_template_directory_uri(). '/style/animate.min.css' );
	wp_enqueue_style( 'yogaflex-style-carousel', get_template_directory_uri(). '/style/owl.carousel.css' );
	wp_enqueue_style( 'yogaflex-style-jquery', get_template_directory_uri(). '/style/jquery-ui.css' );
	wp_enqueue_style( 'yogaflex-style-main', get_template_directory_uri(). '/style/main.css' );

	// enqueue scripts

	wp_enqueue_script( 'yogaflex-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'yogaflex-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'yogaflex-jquery-224', get_template_directory_uri() . '/js/vendor/jquery-2.2.4.min.js', array(), '0.1', true );
	wp_enqueue_script( 'yogaflex-cloudflare', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array(), '0.1', false );
	wp_enqueue_script( 'yogaflex-bootstrap', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array(), '0.1', true );
	wp_enqueue_script( 'yogaflex-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA', array(), '0.1', false );
	wp_enqueue_script( 'yogaflex-easing', get_template_directory_uri() . '/js/easing.min.js', array(), '0.1', true );
	wp_enqueue_script( 'yogaflex-hoverintent', get_template_directory_uri() . '/js/hoverIntent.js', array(), '0.1', true );
	wp_enqueue_script( 'yogaflex-superfish', get_template_directory_uri() . '/js/superfish.min.js', array(), '0.1', true );
	wp_enqueue_script( 'yogaflex-ajaxchimp', get_template_directory_uri() . '/js/jquery.ajaxchimp.min.js', array(), '0.1', true );
	wp_enqueue_script( 'yogaflex-magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array(), '0.1', true );
	wp_enqueue_script( 'yogaflex-tabs', get_template_directory_uri() . '/js/jquery.tabs.min.js', array(), '0.1', true );
	wp_enqueue_script( 'yogaflex-nice-select', get_template_directory_uri() . '/js/jquery.nice-select.min.js', array(), '0.1', true );
	wp_enqueue_script( 'yogaflex-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '0.1', true );
	wp_enqueue_script( 'yogaflex-mail', get_template_directory_uri() . '/js/mail-script.js', array(), '0.1', true );
	wp_enqueue_script( 'yogaflex-main', get_template_directory_uri() . '/js/main.js', array(), '0.1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'yogaflex_scripts' );

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

// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

/* Register Sidebars
function custom_sidebars() {

	$args = array(
		'class'         => 'col-lg-4 sidebar-widgets',
		'name'          => __( 'sidebar-1', 'yogaflex' ),
		'description'   => __( 'fast links area', 'yogaflex' ),
		'before_widget' => '<div class="single-sidebar-widget search-widget">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'custom_sidebars' );
*/