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
	load_theme_textdomain( 'maisha', get_template_directory() . '/languages' );
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
	add_image_size( 'list-thumbnail', 200, 200 );
	add_image_size( 'projects-thumbnail', 150, 9999 );
	
	// Grid Template child page thumbnail
	add_image_size( 'maisha-front-child-page-thumbnail', 547, 9999 );
	
	// Grid Template child page thumbnail
	add_image_size( 'maisha-child-page-thumbnail', 322, 9999 );
	
	// Projects Template child page thumbnail
	add_image_size( 'maisha-projects-child-page-thumbnail', 524, 9999 );
	
	// Stories Template child page thumbnail
	add_image_size( 'maisha-stories-child-page-thumbnail', 420, 9999 );
	
	// Our Staff Template child page thumbnail
	add_image_size( 'maisha-staff-child-page-thumbnail', 444, 9999 );
	
	// Post Page thumbnail
	add_image_size( 'maisha-post-thumbnail', 916, 9999 );
	add_image_size( 'maisha-post-grid-full-thumbnail', 678, 9999 );
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu',      'maisha' ),
		'social'  => esc_html__( 'Social Links Menu', 'maisha' ),
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
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', maisha_fonts_url() ) );
	/*
	 * Enable support for custom logo.
	 *
	 *  @since Maisha 1.5.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 9999,
		'width'       => 9999,
		'flex-height' => true,
	) );
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
		'name'          => esc_html__( 'Blog Sidebar', 'maisha' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'maisha' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clear">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Recent Posts Block', 'maisha' ),
		'id'            => 'sidebar-7',
		'description'   => esc_html__( 'Use this widget area to display Maisha Front Page: 4 Column Recent Posts widget', 'maisha' ),
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'maisha' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Use this widget area to display widgets in the footer', 'maisha' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'BuddyPress Sidebar', 'maisha' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'maisha' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clear">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'bbPress Sidebar', 'maisha' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'maisha' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clear">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'maisha' ),
		'id'            => 'sidebar-5',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'maisha' ),
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

	/* Translators: If there are characters in your language that are not
	* supported by Raleway, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$raleway = esc_html_x( 'on', 'Raleway font: on or off', 'maisha' );

	/* Translators: If there are characters in your language that are not
	* supported by Playfair Display, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$playfair_display = esc_html_x( 'on', 'Playfair Display font: on or off', 'maisha' );

	if ( 'off' !== $raleway || 'off' !== $playfair_display ) {
		$font_families = array();

		if ( 'off' !== $raleway ) {
			$font_families[] = 'Raleway:400i,100i,200i,300i,500i,600i,700i,800i,900i,400,100,200,300,500,600,700,800,900';
		}

		if ( 'off' !== $playfair_display ) {
			$font_families[] = 'Playfair Display:400,700,900,400i,700i,900i';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
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
	wp_enqueue_script( 'maisha-search', get_template_directory_uri() . '/js/search.js', array( 'jquery' ), '1.0', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'maisha-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
	}
	if ( is_page_template( 'page-templates/front-page.php' )) {
	wp_enqueue_script( 'maisha-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '1.0', true );
	}
	wp_localize_script( 'maisha-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'maisha' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'maisha' ) . '</span>',
	) );
}
add_action( 'wp_enqueue_scripts', 'maisha_scripts' );
if (!function_exists('maisha_admin_scripts')) {
	function maisha_admin_scripts($hook) {
			wp_enqueue_style('maisha-admin', get_template_directory_uri() . '/admin/admin.css');
	}
}
add_action('admin_enqueue_scripts', 'maisha_admin_scripts');
/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Maisha 1.0
 *
 * @see wp_add_inline_style()
 */
function maisha_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';
	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}
	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-previous a:before { background-color: rgba(230, 234, 237, 0.4); }
		';
	}
	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-next a:before { background-color: rgba(230, 234, 237, 0.4); }
		';
	}
	wp_add_inline_style( 'maisha-style', $css );
}
add_action( 'wp_enqueue_scripts', 'maisha_post_nav_background' );
/**
 * Display descriptions in main navigation.
 *
 * @since Maisha 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function maisha_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}
	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'maisha_nav_description', 10, 4 );
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
add_filter('the_excerpt', 'do_shortcode');
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
/***** Include Admin *****/

if (is_admin()) {
	require_once('admin/admin.php');
}
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
 * Load Jetpack compatibility file.
 *
 * @since Maisha 1.5.2
 */
require( get_template_directory() . '/inc/extras.php' );
/**
 * Load Widgets file.
 *
 * @since Maisha 1.0
 */
require( get_template_directory() . '/inc/widgets.php' );
/**
 * Load Styles.
 *
 * @since Maisha 1.0
 */
require( get_template_directory() . '/inc/maisha_customizer_style.php' );
/**
 * Remove More Jump Link.
 *
 * @since Maisha 1.0
 */
function remove_more_jump_link($link) {
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');
/**
 * WooCommerce
 *
 * Unhook sidebar
 */
add_theme_support( 'woocommerce' );
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 40;' ), 20 );

/**
 * TGM Plugin Activation
 */
require get_template_directory() . '/assets/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'maisha_require_plugins' );

function maisha_require_plugins() {

	$plugins = array(
		// One Click Demo Import
		array(
			'name'      => esc_html__( 'One Click Demo Import', 'maisha' ),
			'slug'      => 'one-click-demo-import',
			'required'  => false,
		),
		// Woocommerce
		array(
			'name'      => esc_html__( 'Woocommerce', 'maisha' ),
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		// Contact Form 7
		array(
			'name'      => esc_html__( 'Contact Form 7', 'maisha' ),
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		// Give
		array(
			'name'      => esc_html__( 'Give', 'maisha' ),
			'slug'      => 'give',
			'required'  => false,
		),
		// bbPress
		array(
			'name'      => esc_html__( 'bbPress', 'maisha' ),
			'slug'      => 'bbpress',
			'required'  => false,
		),
		// BuddyPress
		array(
			'name'      => esc_html__( 'BuddyPress', 'maisha' ),
			'slug'      => 'buddypress',
			'required'  => false,
		),
		// The Events Calendar
		array(
			'name'      => esc_html__( 'The Events Calendar', 'maisha' ),
			'slug'      => 'the-events-calendar',
			'required'  => false,
		),
		// Widget Visibility
		array(
			'name'      => esc_html__( 'Widget Visibility', 'maisha' ),
			'slug'      => 'widget-visibility',
			'required'  => false,
		),
		// Elementor
		array(
			'name'      => esc_html__( 'Elementor', 'maisha' ),
			'slug'      => 'elementor',
			'required'  => false,
		),
		// Google Fonts Plugin
		array(
			'name'         => esc_html__( 'Google Fonts Plugin', 'maisha' ), // The plugin name.
			'slug'         => 'anariel-design-google-fonts', // The plugin slug (typically the folder name).
			'source'       => esc_url('https://github.com/anarieldesign/anariel-design-google-fonts/archive/master.zip' ), // The plugin source.
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => esc_url( 'https://github.com/anarieldesign/anariel-design-google-fonts/' ), // If set, overrides default API URL and points to an external URL.
		),
		// Soliloquy Plugin
		array(
			'name'         => esc_html__( 'Soliloquy', 'maisha' ), // The plugin name.
			'slug'         => 'soliloquy', // The plugin slug (typically the folder name).
			'source'       => esc_url('http://www.anarieldesign.com/demo-content/maisha/soliloquy.zip' ), // The plugin source.
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
		),

);
		$config = array(
		'id'           => 'maisha',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
		);
	tgmpa( $plugins, $config );
}

/**
 * One Click Demo Import
 */
function maisha_ocdi_import_files() {
	return array(
		array(
			'import_file_name'           => esc_html__( 'Demo Import', 'maisha' ),
			'import_file_url'            => esc_url( 'http://www.anarieldesign.com/demo-content/maisha/maisha-demo-content.xml' ),
			'import_widget_file_url'     => esc_url( 'http://www.anarieldesign.com/demo-content/maisha/maisha-widgets.json' ),
			'import_customizer_file_url' => esc_url( 'http://www.anarieldesign.com/demo-content/maisha/maisha-customizer.dat' ),
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'maisha_ocdi_import_files' );
function maisha_ocdi_after_import_setup() {
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'mainnav', 'nav_menu' );
	$social_menu = get_term_by( 'name', 'Social Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
		'primary' => $main_menu->term_id,
		'social' => $social_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title (esc_html__( 'Front Page', 'maisha' ));
	$blog_page_id  = get_page_by_title (esc_html__( 'Blog', 'maisha' ));

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'maisha_ocdi_after_import_setup' );
function maisha_ocdi_plugin_intro_notice ( $default_text ) {
	return wp_kses_post( str_replace ( 'Before you begin, make sure all the required plugins are activated.', esc_html__( 'Before you begin, make sure all the recommended plugins are activated.', 'maisha'), $default_text ) );
}
add_filter( 'pt-ocdi/plugin_intro_text', 'maisha_ocdi_plugin_intro_notice' );