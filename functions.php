<?php
/**
 * project functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package project
 */

if ( ! function_exists( 'project_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function project_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on project, use a find and replace
	 * to change 'project' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'project', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'project' ),
	) );
}
endif;
add_action( 'after_setup_theme', 'project_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function project_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'project_content_width', 640 );
}
add_action( 'after_setup_theme', 'project_content_width', 0 );



/**
 * Enqueue scripts and styles.
 */
function project_scripts() {
	wp_enqueue_style( 'project-style', get_stylesheet_uri() );
	wp_enqueue_script('jquery');

	wp_enqueue_script( 'project-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.min.js', array('jquery'), '1', true );

	wp_register_style( 'grid', trailingslashit( get_template_directory_uri() ) . 'assets/stylesheets/simplegrid.css' , array(), '', 'all' );
	wp_enqueue_style( 'grid' );

	wp_register_style( 'stylesheet', trailingslashit( get_template_directory_uri() ) . 'stylesheet.min.css' , array(), '', 'all' );
	wp_enqueue_style( 'stylesheet' );
}
add_action( 'wp_enqueue_scripts', 'project_scripts' );


 /**
  * Add custom image sizes
  */
// if ( function_exists( 'add_image_size' ) ) { 
// 	// add_image_size( 'project-thumbnail', 290, 216, true ); // (True = Cropped) This is 2X the dimensions the thumbnails will be displayed at for Retina purposes
// 	add_image_size( 'project-thumbnail', 400, 300, true ); // (True = Cropped) This is 2X the dimensions the thumbnails will be displayed at for Retina purposes
// }

/**
 * Disable Emoji Script From Being Loaded
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

remove_action('wp_head', 'rsd_link'); // remove really simple discovery
remove_action('wp_head', 'wp_generator'); // remove wordpress version
remove_action('wp_head', 'feed_links', 2); // remove rss feed links *** RSS ***
remove_action('wp_head', 'feed_links_extra', 3); // removes all rss feed links

remove_action('wp_head', 'index_rel_link'); // removes link to index (home) page
remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (windows live writer support)

remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );