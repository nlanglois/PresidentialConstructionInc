<?php
/**
 * Maisha functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package Maisha
 * @since Maisha 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Maisha 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1154;
}
if ( ! function_exists( 'maisha_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Maisha 1.0
 */
function maisha_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on maisha, use a find and replace
	 * to change 'maisha' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'maisha-lite', get_template_directory() . '/languages' );
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
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu',      'maisha-lite' ),
		'social'  => esc_html__( 'Social Links Menu', 'maisha-lite' ),
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );
	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'maisha_custom_background_args', array(
		'default-color'      => 'ffffff',
		'default-attachment' => 'fixed',
	) ) );
		/*
	 * Enable support for custom logo.
	 *
	 *  @since Maisha Lite 1.2.8
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 9999,
		'width'       => 9999,
		'flex-height' => true,
	) );
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', maisha_fonts_url() ) );
}
endif; // maisha_setup
add_action( 'after_setup_theme', 'maisha_setup' );
/**
 * Count the number of widgets and create a class name.
 */
function maisha_widget_counter( $sidebar_id ) {
	$the_sidebars = wp_get_sidebars_widgets();
	if ( ! isset( $the_sidebars[$sidebar_id] ) )
		$count = 0;
	else
		$count = count( $the_sidebars[$sidebar_id] );
	switch ( $count ) {
		case '1':
			$class = 'one-widget';
			break;
		case '2':
			$class = 'two-widgets';
			break;
		case '3':
			$class = 'three-widgets';
			break;
	    case '4':
			$class = 'four-widgets';
			break;
		default :
			$class = 'more-than-three-widgets';
	}
	echo $class;
}
/**
 * Register widget area.
 *
 * @since Maisha 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function maisha_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'maisha-lite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'This is widgetized sidebar area for your blog/post page', 'maisha-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clear">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'maisha-lite' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Use this widget area to display widgets in the footer', 'maisha-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'maisha-lite' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'This is widgetized sidebar area for pages that are using default template', 'maisha-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clear">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'maisha_widgets_init' );
if ( ! function_exists( 'maisha_fonts_url' ) ) :
/**
 * Register Google fonts for maisha.
 *
 * @since Maisha 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function maisha_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';
	/* translators: If there are characters in your language that are not supported by Raleway, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== esc_html_x( 'on', 'Raleway font: on or off', 'maisha-lite' ) ) {
		$fonts[] = 'Raleway:400italic,100italic,200italic,300italic,500italic,600italic,700italic,800italic,900italic,400,100,200,300,500,600,700,800,900';
	}
	/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
	$subset = esc_html_x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'maisha-lite' );
	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}
	return $fonts_url;
}
endif;
/**
 * Enqueue scripts and styles.
 *
 * @since Maisha 1.0
 */
function maisha_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'maisha-fonts', maisha_fonts_url(), array(), null );
	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );
	// Load our main stylesheet.
	wp_enqueue_style( 'maisha-style', get_stylesheet_uri() );
	wp_enqueue_script( 'maisha-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true );
	wp_enqueue_script( 'maisha-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'maisha-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
	}
}
add_action( 'wp_enqueue_scripts', 'maisha_scripts' );

if (!function_exists('maisha_lite_admin_scripts')) {
	function maisha_lite_admin_scripts($hook) {
		if ('appearance_page_blog' === $hook) {
			wp_enqueue_style('maisha-lite-admin', get_template_directory_uri() . '/admin/admin.css');
		}
	}
}
add_action('admin_enqueue_scripts', 'maisha_lite_admin_scripts');

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Maisha 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function maisha_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'maisha_search_form_modify' );

/***** Include Admin *****/

if (is_admin()) {
	require_once('admin/admin.php');
}
/**
 * Theme Update Script
 *
 * Runs if version number saved in theme_mod "version" doesn't match current theme version.
 */
function maisha_update_check() {
	
// Return if update has already been run
	if ( -1 == get_theme_mod( 'custom_logo', -1 ) ) {
		return;
	}
	
	// If we're not on 3.5 yet, exit now
	if ( ! function_exists( 'the_custom_logo' ) ) {
		return;
	}
	// If a logo has been set previously, update to use logo feature introduced in WordPress 4.5
	if ( function_exists( 'the_custom_logo' ) && get_theme_mod( 'maisha_logo', false ) ) {
		// Since previous logo was stored a URL, convert it to an attachment ID
		$logo = attachment_url_to_postid( get_theme_mod( 'maisha_logo' ) );
		if ( is_int( $logo ) ) {
			set_theme_mod( 'custom_logo', attachment_url_to_postid( get_theme_mod( 'maisha_logo' ) ) );
		}
		remove_theme_mod( 'maisha_logo' );
	}
}
add_action( 'after_setup_theme', 'maisha_update_check' );
/**
 * Implement the Custom Header feature.
 *
 * @since Maisha 1.0
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 *
 * @since Maisha 1.0
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Customizer additions.
 *
 * @since Maisha 1.0
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 *
 * @since Maisha 1.0
 */
require( get_template_directory() . '/inc/jetpack.php' );
/**
 * Remove More Jump Link.
 *
 * @since Maisha 1.0
 */
function maisha_remove_more_jump_link($link) {
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'maisha_remove_more_jump_link');