<?php
/**
 * Maisha Customizer functionality
 *
 * @package Maisha
 * @since Maisha 1.0
 */

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Maisha 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function maisha_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->remove_section('colors');

	/**
	 * Add the Theme Options section
	 */
	$wp_customize->add_panel( 'maisha_options_panel', array(
		'title'          => esc_html__( 'Theme Options', 'maisha' ),
		'description'    => esc_html__( 'Configure your theme settings', 'maisha' ),
		'priority'   => 41,
	) );
/**
* Adds the individual sections for header
*/
	$wp_customize->add_section( 'maisha_theme_options_header', array(
		'title'    => esc_html__( 'Header Options', 'maisha' ),
		'panel'           => 'maisha_options_panel',
	) );

	/* Header Layout */
	$wp_customize->add_setting( 'maisha_header_layout', array(
		'default'           => 'fixed-header',
		'sanitize_callback' => 'maisha_sanitize_choices',
	) );
	$wp_customize->add_control( 'maisha_header_layout', array(
		'label'             => esc_html__( 'Header Options', 'maisha' ),
		'section'           => 'maisha_theme_options_header',
		'settings'          => 'maisha_header_layout',
		'priority'          => 1,
		'type'              => 'radio',
		'choices'           => array(
			'fixed-header'   => esc_html__( 'Fixed Header', 'maisha' ),
			'standard-header'  => esc_html__( 'Standard Header', 'maisha' ),
			'alternative-header'  => esc_html__( 'Alternative Header', 'maisha' ),
		)
	) );
	
/**
* Search Bar
*/
	$wp_customize->add_section( 'maisha_search_bar_section' , array(
		'title'    => esc_html__( 'Search Box', 'maisha' ),
		'panel'           => 'maisha_options_panel',
	) );

	$wp_customize->add_setting( 'maisha_search_top', array(
		'default'           => false,
		'sanitize_callback' => 'maisha_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'maisha_search_top', array(
		'label'             => esc_html__( 'Hide Search Box', 'maisha' ),
		'section'           => 'maisha_search_bar_section',
		'settings'          => 'maisha_search_top',
		'type'		        => 'checkbox',
		'priority'          => 1,
	) );

	/**
	* Search Position
	*/
	$wp_customize->add_setting( 'maisha_search_margin_top', array(
		'default'           => '90',
		'sanitize_callback' => 'maisha_sanitize_text',
	) );
	$wp_customize->add_control( 'maisha_search_margin_top', array(
		'label'             => esc_html__( 'Search Position on Desktop - Margin Top', 'maisha' ),
		'section'           => 'maisha_search_bar_section',
		'settings'          => 'maisha_search_margin_top',
		'type'		        => 'textarea',
		'priority'          => 2,
	) );

/**
* Logo Width on Mobile
*/
	$wp_customize->add_section( 'maisha_logo_width_section' , array(
		'title'    => esc_html__( 'Mobile Logo Size', 'maisha' ),
		'panel'           => 'maisha_options_panel',
	) );

	/* Custom CSS*/
	$wp_customize->add_setting( 'maisha_logo_width', array(
		'default'           => '169',
		'sanitize_callback' => 'maisha_sanitize_text',
	) );
	$wp_customize->add_control( 'maisha_logo_width', array(
		'label'             => esc_html__( 'Logo Width on Mobile', 'maisha' ),
		'description'       => esc_html__( 'Type in the logo width. Example: 169', 'maisha' ),
		'section'           => 'maisha_logo_width_section',
		'settings'          => 'maisha_logo_width',
		'type'		        => 'textarea',
		'priority'          => 1,
	) );
	
/**
* Social Menu Position
*/
	$wp_customize->add_section( 'maisha_social_menu_section' , array(
		'title'    => esc_html__( 'Social Menu Position on Desktop', 'maisha' ),
		'panel'           => 'maisha_options_panel',
	) );

	/* Custom CSS*/
	$wp_customize->add_setting( 'maisha_social_top', array(
		'default'           => '90',
		'sanitize_callback' => 'maisha_sanitize_text',
	) );
	$wp_customize->add_control( 'maisha_social_top', array(
		'label'             => esc_html__( 'Social Menu Position on Desktop - Margin Top', 'maisha' ),
		'section'           => 'maisha_social_menu_section',
		'settings'          => 'maisha_social_top',
		'type'		        => 'textarea',
		'priority'          => 1,
	) );
	$wp_customize->add_section( 'maisha_theme_options', array(
		'title'    => esc_html__( 'Front Page', 'maisha' ),
		'panel'           => 'maisha_options_panel',
	) );
	
	/**
	* Add Paralax effect to the images
	*/
	$wp_customize->add_setting( 'maisha_fixed_top', array(
		'default'           => false,
		'sanitize_callback' => 'maisha_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'maisha_fixed_top', array(
		'label'             => esc_html__( 'Add Parallax effect to the Front Page Background Images', 'maisha' ),
		'section'           => 'maisha_theme_options',
		'settings'          => 'maisha_fixed_top',
		'type'		        => 'checkbox',
		'priority'          => 1,
	) );

	/* Front Page: Featured Page One */
	$wp_customize->add_setting( 'maisha_featured_page_one', array(
		'default'           => '',
		'sanitize_callback' => 'maisha_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'maisha_featured_page_one', array(
		'label'             => esc_html__( 'First Content Block', 'maisha' ),
		'section'           => 'maisha_theme_options',
		'priority'          => 2,
		'type'              => 'dropdown-pages',
	) );

	/* Columns */
	$wp_customize->add_setting( 'maisha_front_first_layout', array(
		'default'           => 'three-columns',
		'sanitize_callback' => 'maisha_sanitize_choices',
	) );
	$wp_customize->add_control( 'maisha_front_first_layout', array(
		'description'       => esc_html__( 'Choose number of columns for the First Content Block', 'maisha' ),
		'section'           => 'maisha_theme_options',
		'priority'          => 3,
		'type'              => 'radio',
		'choices'           => array(
			'four-columns'   => esc_html__( 'Four Columns', 'maisha' ),
			'three-columns'  => esc_html__( 'Three Columns', 'maisha' ),
			'two-columns'  => esc_html__( 'Two Columns', 'maisha' ),
		)
	) );
	
	/* Child Pages Image Link */
	$wp_customize->add_setting( 'maisha_image_link', array(
		'default'           => false,
		'sanitize_callback' => 'maisha_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'maisha_image_link', array(
		'label'             => esc_html__( 'Enable Child Page Featured Image Link', 'maisha' ),
		'section'           => 'maisha_theme_options',
		'priority'          => 4,
		'type'              => 'checkbox',
	) );
		
	/* Child Pages Title Link */
	$wp_customize->add_setting( 'maisha_child_title_link', array(
		'default'           => false,
		'sanitize_callback' => 'maisha_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'maisha_child_title_link', array(
		'label'             => esc_html__( 'Enable Child Page Title Link', 'maisha' ),
		'section'           => 'maisha_theme_options',
		'priority'          => 5,
		'type'              => 'checkbox',
	) );

	/* Front Page: Featured Page Two */
	$wp_customize->add_setting( 'maisha_featured_page_two', array(
		'default'           => '',
		'sanitize_callback' => 'maisha_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'maisha_featured_page_two', array(
		'label'             => esc_html__( 'Second Content Block', 'maisha' ),
		'section'           => 'maisha_theme_options',
		'priority'          => 6,
		'type'              => 'dropdown-pages',
	) );
	
	$wp_customize->add_setting( 'maisha_top_image_overlay', array(
		'default'           => '0.6',
		'sanitize_callback' => 'maisha_sanitize_overlay',
	) );

	$wp_customize->add_control( 'maisha_top_image_overlay', array(
		'label'   => esc_html__( 'Image Opacity', 'maisha' ),
		'section'           => 'maisha_theme_options',
		'settings'          => 'maisha_top_image_overlay',
		'type'    => 'select',
		'priority'          => 7,
		'choices' => array(
						'0.0' => '0%',
						'0.1' => '10%',
						'0.2' => '20%',
						'0.3' => '30%',
						'0.4' => '40%',
						'0.5' => '50%',
						'0.6' => '60%',
						'0.7' => '70%',
						'0.8' => '80%',
						'0.9' => '90%',
						'1.0' => '100%',
					),
	) );

	/* Front Page: Featured Page Three */
	$wp_customize->add_setting( 'maisha_featured_page_three', array(
		'default'           => '',
		'sanitize_callback' => 'maisha_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'maisha_featured_page_three', array(
		'label'             => esc_html__( 'Third Content Block', 'maisha' ),
		'section'           => 'maisha_theme_options',
		'priority'          => 8,
		'type'              => 'dropdown-pages',
	) );

	$wp_customize->add_section( 'maisha_theme_options_about', array(
		'title'    => esc_html__( 'About Page', 'maisha' ),
		'active_callback' => 'is_certain_page_template_about_page',
		'panel'           => 'maisha_options_panel',
	) );

	/* Featured Page One */
	$wp_customize->add_setting( 'maisha_featured_aboutpage_one', array(
		'default'           => '',
		'sanitize_callback' => 'maisha_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'maisha_featured_aboutpage_one', array(
		'label'             => esc_html__( 'First Content Block', 'maisha' ),
		'section'           => 'maisha_theme_options_about',
		'priority'          => 1,
		'type'              => 'dropdown-pages',
	) );
	
	/* Columns */
	$wp_customize->add_setting( 'maisha_about_first_layout', array(
		'default'           => 'four-columns',
		'sanitize_callback' => 'maisha_sanitize_choices',
	) );
	$wp_customize->add_control( 'maisha_about_first_layout', array(
		'description'       => esc_html__( 'Choose number of columns for the First Content Block', 'maisha' ),
		'section'           => 'maisha_theme_options_about',
		'priority'          => 2,
		'type'              => 'radio',
		'choices'           => array(
			'four-columns'   => esc_html__( 'Four Columns', 'maisha' ),
			'three-columns'  => esc_html__( 'Three Columns', 'maisha' ),
			'two-columns'  => esc_html__( 'Two Columns', 'maisha' ),
		)
	) );

	/* Featured Page One */
	$wp_customize->add_setting( 'maisha_featured_aboutpage_two', array(
		'default'           => '',
		'sanitize_callback' => 'maisha_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'maisha_featured_aboutpage_two', array(
		'label'             => esc_html__( 'Second Content Block', 'maisha' ),
		'section'           => 'maisha_theme_options_about',
		'priority'          => 3,
		'type'              => 'dropdown-pages',
	) );

/**
* Adds the individual sections for projects page
*/
	$wp_customize->add_section( 'maisha_theme_options_projects', array(
		'title'    => esc_html__( 'Projects Page', 'maisha' ),
		'active_callback' => 'is_certain_page_template_projects_page',
		'panel'           => 'maisha_options_panel',
	) );

	/* Layout */
	$wp_customize->add_setting( 'maisha_projects_layout', array(
		'default'           => 'top-header',
		'sanitize_callback' => 'maisha_sanitize_choices',
	) );
	$wp_customize->add_control( 'maisha_projects_layout', array(
		'label'             => esc_html__( 'Projects Page Settings', 'maisha' ),
		'section'           => 'maisha_theme_options_projects',
		'settings'          => 'maisha_projects_layout',
		'priority'          => 1,
		'type'              => 'radio',
		'choices'           => array(
			'top-header'   => esc_html__( 'Top Content Block', 'maisha' ),
			'no-header'  => esc_html__( 'Without Top Content Block', 'maisha' ),
		)
	) );
	
	/* Columns */
	$wp_customize->add_setting( 'maisha_projects_first_layout', array(
		'default'           => 'four-columns',
		'sanitize_callback' => 'maisha_sanitize_choices',
	) );
	$wp_customize->add_control( 'maisha_projects_first_layout', array(
		'description'       => esc_html__( 'Choose number of columns for the child pages', 'maisha' ),
		'section'           => 'maisha_theme_options_projects',
		'priority'          => 2,
		'type'              => 'radio',
		'choices'           => array(
			'four-columns'   => esc_html__( 'Four Columns', 'maisha' ),
			'three-columns'  => esc_html__( 'Three Columns', 'maisha' ),
			'two-columns'  => esc_html__( 'Two Columns', 'maisha' ),
		)
	) );

/**
* Adds the individual sections for causes page
*/
	$wp_customize->add_section( 'maisha_theme_options_causes', array(
		'title'    => esc_html__( 'Causes Page', 'maisha' ),
		'active_callback' => 'is_certain_page_template_causes_page',
		'panel'           => 'maisha_options_panel',
	) );

	/* Layout */
	$wp_customize->add_setting( 'maisha_causes_layout', array(
		'default'           => 'top-header-one',
		'sanitize_callback' => 'maisha_sanitize_choices',
	) );
	$wp_customize->add_control( 'maisha_causes_layout', array(
		'label'             => esc_html__( 'Causes Page Settings', 'maisha' ),
		'section'           => 'maisha_theme_options_causes',
		'settings'          => 'maisha_causes_layout',
		'priority'          => 1,
		'type'              => 'radio',
		'choices'           => array(
			'top-header-one'   => esc_html__( 'Top Content Block', 'maisha' ),
			'no-header-one'  => esc_html__( 'Without Top Content Block', 'maisha' ),
		)
	) );
	
	/* Columns */
	$wp_customize->add_setting( 'maisha_causes_first_layout', array(
		'default'           => 'four-columns',
		'sanitize_callback' => 'maisha_sanitize_choices',
	) );
	$wp_customize->add_control( 'maisha_causes_first_layout', array(
		'description'       => esc_html__( 'Choose number of columns for the child pages', 'maisha' ),
		'section'           => 'maisha_theme_options_causes',
		'priority'          => 2,
		'type'              => 'radio',
		'choices'           => array(
			'four-columns'   => esc_html__( 'Four Columns', 'maisha' ),
			'three-columns'  => esc_html__( 'Three Columns', 'maisha' ),
			'two-columns'  => esc_html__( 'Two Columns', 'maisha' ),
		)
	) );

/**
* Adds the individual sections for stories page
*/
	$wp_customize->add_section( 'maisha_theme_options_stories', array(
		'title'    => esc_html__( 'Stories Page', 'maisha' ),
		'active_callback' => 'is_certain_page_template_stories_page',
		'panel'           => 'maisha_options_panel',
	) );

	/* Layout */
	$wp_customize->add_setting( 'maisha_stories_layout', array(
		'default'           => 'top-header-two',
		'sanitize_callback' => 'maisha_sanitize_choices',
	) );
	$wp_customize->add_control( 'maisha_stories_layout', array(
		'label'             => esc_html__( 'Stories Page Settings', 'maisha' ),
		'section'           => 'maisha_theme_options_stories',
		'settings'          => 'maisha_stories_layout',
		'priority'          => 1,
		'type'              => 'radio',
		'choices'           => array(
			'top-header-two'   => esc_html__( 'Top Content Block', 'maisha' ),
			'no-header-two'  => esc_html__( 'Without Top Content Block', 'maisha' ),
		)
	) );
	
	/* Columns */
	$wp_customize->add_setting( 'maisha_stories_first_layout', array(
		'default'           => 'four-columns',
		'sanitize_callback' => 'maisha_sanitize_choices',
	) );
	$wp_customize->add_control( 'maisha_stories_first_layout', array(
		'description'       => esc_html__( 'Choose number of columns for the child pages', 'maisha' ),
		'section'           => 'maisha_theme_options_stories',
		'priority'          => 2,
		'type'              => 'radio',
		'choices'           => array(
			'four-columns'   => esc_html__( 'Four Columns', 'maisha' ),
			'three-columns'  => esc_html__( 'Three Columns', 'maisha' ),
			'two-columns'  => esc_html__( 'Two Columns', 'maisha' ),
		)
	) );
	
/**
* Adds the individual sections for staff page
*/
	$wp_customize->add_section( 'maisha_theme_options_staff', array(
		'title'    => esc_html__( 'Staff Page', 'maisha' ),
		'active_callback' => 'is_certain_page_template_staff_page',
		'panel'           => 'maisha_options_panel',
	) );

	/* Layout */
	$wp_customize->add_setting( 'maisha_staff_layout', array(
		'default'           => 'top-header-three',
		'sanitize_callback' => 'maisha_sanitize_choices',
	) );
	$wp_customize->add_control( 'maisha_staff_layout', array(
		'label'             => esc_html__( 'Staff Page Settings', 'maisha' ),
		'section'           => 'maisha_theme_options_staff',
		'settings'          => 'maisha_staff_layout',
		'priority'          => 1,
		'type'              => 'radio',
		'choices'           => array(
			'top-header-three'   => esc_html__( 'Top Content Block', 'maisha' ),
			'no-header-three'  => esc_html__( 'Without Top Content Block', 'maisha' ),
		)
	) );
	
	/* Columns */
	$wp_customize->add_setting( 'maisha_staff_first_layout', array(
		'default'           => 'three-columns',
		'sanitize_callback' => 'maisha_sanitize_choices',
	) );
	$wp_customize->add_control( 'maisha_staff_first_layout', array(
		'description'       => esc_html__( 'Choose number of columns for the child pages', 'maisha' ),
		'section'           => 'maisha_theme_options_staff',
		'priority'          => 2,
		'type'              => 'radio',
		'choices'           => array(
			'four-columns'   => esc_html__( 'Four Columns', 'maisha' ),
			'three-columns'  => esc_html__( 'Three Columns', 'maisha' ),
			'two-columns'  => esc_html__( 'Two Columns', 'maisha' ),
		)
	) );
	
/**
* Adds the individual sections for the inner page
*/
	$wp_customize->add_section( 'maisha_theme_options_title', array(
		'title'    => esc_html__( 'Inner Pages Options', 'maisha' ),
		'panel'           => 'maisha_options_panel',
	) );

	/* Padding */
	$wp_customize->add_setting( 'maisha_title_padding', array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'maisha_title_padding', array(
		'label'             => esc_html__( 'Pages with Title and Tagline', 'maisha' ),
		'description'       => esc_html__( 'Here you can change the height of the page title block. This gives you the option to show more or less of the background image. You simply need to add a number (eg. 50).', 'maisha' ),
		'section'           => 'maisha_theme_options_title',
		'settings'          => 'maisha_title_padding',
		'priority'          => 1,
		'type'              => 'text',
	) );
	
	$wp_customize->add_setting( 'maisha_title_main_padding', array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'maisha_title_main_padding', array(
		'label'             => esc_html__( 'Pages with Title only', 'maisha' ),
		'description'       => esc_html__( 'Here you can change the height of the page title block. This gives you the option to show more or less of the background image. You simply need to add a number (eg. 50).', 'maisha' ),
		'section'           => 'maisha_theme_options_title',
		'settings'          => 'maisha_title_main_padding',
		'priority'          => 2,
		'type'              => 'text',
	) );
	
	$wp_customize->add_setting( 'maisha_inner_top_image_overlay', array(
		'default'           => '0.6',
		'sanitize_callback' => 'maisha_sanitize_overlay',
	) );

	$wp_customize->add_control( 'maisha_inner_top_image_overlay', array(
		'label'   => esc_html__( 'Image Opacity', 'maisha' ),
		'section'           => 'maisha_theme_options_title',
		'settings'          => 'maisha_inner_top_image_overlay',
		'type'    => 'select',
		'priority'          => 3,
		'choices' => array(
						'0.0' => '0.0',
						'0.1' => '0.1',
						'0.2' => '0.2',
						'0.3' => '0.3',
						'0.4' => '0.4',
						'0.5' => '0.5',
						'0.6' => '0.6',
						'0.7' => '0.7',
						'0.8' => '0.8',
						'0.9' => '0.9',
						'1.0' => '1.0',
					),
	) );
	
	/**
	* Add Paralax effect to the top image
	*/
	$wp_customize->add_setting( 'maisha_inner_fixed_top', array(
		'default'           => false,
		'sanitize_callback' => 'maisha_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'maisha_inner_fixed_top', array(
		'label'             => esc_html__( 'Add Parallax effect to the Top Image', 'maisha' ),
		'section'           => 'maisha_theme_options_title',
		'settings'          => 'maisha_inner_fixed_top',
		'type'		        => 'checkbox',
		'priority'          => 4,
	) );

/**
* Adds the individual sections for blog
*/
	$wp_customize->add_section( 'maisha_theme_options_blog', array(
		'title'    => esc_html__( 'Blog Page Options', 'maisha' ),
		'panel'           => 'maisha_options_panel',
	) );

	/* Blog Layout */
	$wp_customize->add_setting( 'maisha_blog_layout', array(
		'default'           => 'sidebar-right',
		'sanitize_callback' => 'maisha_sanitize_choices',
	) );
	$wp_customize->add_control( 'maisha_blog_layout', array(
		'label'             => esc_html__( 'Blog Layout', 'maisha' ),
		'section'           => 'maisha_theme_options_blog',
		'settings'          => 'maisha_blog_layout',
		'priority'          => 1,
		'type'              => 'radio',
		'choices'           => array(
			'full'   => esc_html__( 'Full Post Layout', 'maisha' ),
			'sidebar-right'  => esc_html__( 'Right Sidebar Layout', 'maisha' ),
			'sidebar-left'  => esc_html__( 'Left Sidebar Layout', 'maisha' ),
			'grid-right'  => esc_html__( 'Grid Layout + Right Sidebar', 'maisha' ),
			'grid-left'  => esc_html__( 'Grid Layout + Left Sidebar', 'maisha' ),
			'grid-full'  => esc_html__( 'Full Grid Layout', 'maisha' ),
			'list'  => esc_html__( 'List Layout', 'maisha' ),
		)
	) );

	/* Post Display */
	$wp_customize->add_setting( 'maisha_post_type', array(
		'default'           => 'full-lenght',
		'sanitize_callback' => 'maisha_sanitize_choices',
	) );
	$wp_customize->add_control( 'maisha_post_type', array(
		'label'             => esc_html__( 'Post Display', 'maisha' ),
		'section'           => 'maisha_theme_options_blog',
		'settings'          => 'maisha_post_type',
		'priority'          => 2,
		'type'              => 'radio',
		'choices'           => array(
			'full-lenght'   => esc_html__( 'Full Lenght', 'maisha' ),
			'excerpt-lenght'  => esc_html__( 'Excerpt', 'maisha' ),
		)
	) );


	/* Post Settings */
	$wp_customize->add_setting( 'maisha_post_footer', array(
		'default'           => false,
		'sanitize_callback' => 'maisha_sanitize_checkbox',
	) );
	$wp_customize->add_control('maisha_post_footer', array(
				'label'      => esc_html__( 'Hide Post Meta', 'maisha' ),
				'section'    => 'maisha_theme_options_blog',
				'settings'   => 'maisha_post_footer',
				'type'		 => 'checkbox',
				'priority'	 => 3
		) );

	/* Single Post Layout */
	$wp_customize->add_setting( 'maisha_single_post_layout', array(
		'default'           => 'single-sidebar-right',
		'sanitize_callback' => 'maisha_sanitize_choices',
	) );
	$wp_customize->add_control( 'maisha_single_post_layout', array(
		'label'             => esc_html__( 'Single Post Layout', 'maisha' ),
		'section'           => 'maisha_theme_options_blog',
		'settings'          => 'maisha_single_post_layout',
		'priority'          => 4,
		'type'              => 'radio',
		'choices'           => array(
			'single-full'   => esc_html__( 'Full Post Layout', 'maisha' ),
			'single-sidebar-right'  => esc_html__( 'Right Sidebar Layout', 'maisha' ),
			'single-sidebar-left'  => esc_html__( 'Left Sidebar Layout', 'maisha' ),
		)
	) );

	/* Related Post Settings */
	$wp_customize->add_setting( 'maisha_related_post', array(
		'default'           => false,
		'sanitize_callback' => 'maisha_sanitize_checkbox',
	) );
	$wp_customize->add_control('maisha_related_post', array(
				'label'      => esc_html__( 'Hide Related Post on Single Post', 'maisha' ),
				'section'    => 'maisha_theme_options_blog',
				'settings'   => 'maisha_related_post',
				'type'		 => 'checkbox',
				'priority'	 => 5
		) );

	/* Archive Layout */
	$wp_customize->add_setting( 'maisha_archive_layout', array(
		'default'           => 'single-sidebar-right',
		'sanitize_callback' => 'maisha_sanitize_choices',
	) );
	$wp_customize->add_control( 'maisha_archive_layout', array(
		'label'             => esc_html__( 'Archive Layout', 'maisha' ),
		'section'           => 'maisha_theme_options_blog',
		'settings'          => 'maisha_archive_layout',
		'priority'          => 6,
		'type'              => 'radio',
		'choices'           => array(
			'archive-full'   => esc_html__( 'Full Post Layout', 'maisha' ),
			'archive-sidebar-right'  => esc_html__( 'Right Sidebar Layout', 'maisha' ),
			'archive-sidebar-left'  => esc_html__( 'Left Sidebar Layout', 'maisha' ),
			'archive-grid-right'  => esc_html__( 'Grid Layout + Right Sidebar', 'maisha' ),
			'archive-grid-left'  => esc_html__( 'Grid Layout + Left Sidebar', 'maisha' ),
			'archive-grid-full'  => esc_html__( 'Full Grid Layout', 'maisha' ),
			'archive-list'  => esc_html__( 'List Layout', 'maisha' ),
		)
	) );
	
	/* Featured Image Display */
	$wp_customize->add_setting( 'maisha_main_featured_image', array(
		'default'           => false,
		'sanitize_callback' => 'maisha_sanitize_checkbox',
	) );
	$wp_customize->add_control('maisha_main_featured_image', array(
				'label'      => esc_html__( 'Hide Featured Image on Blog/Archive Page', 'maisha' ),
				'section'    => 'maisha_theme_options_blog',
				'settings'   => 'maisha_main_featured_image',
				'type'		 => 'checkbox',
				'priority'	 => 7
	) );
	
	$wp_customize->add_setting( 'maisha_single_featured_image', array(
		'default'           => false,
		'sanitize_callback' => 'maisha_sanitize_checkbox',
	) );
	$wp_customize->add_control('maisha_single_featured_image', array(
				'label'      => esc_html__( 'Hide Featured Image on Single Post Page', 'maisha' ),
				'section'    => 'maisha_theme_options_blog',
				'settings'   => 'maisha_single_featured_image',
				'type'		 => 'checkbox',
				'priority'	 => 8
	) );


/**
	* Shop Sidebar
	*/
	$wp_customize->add_section( 'maisha_shop_section' , array(
		'title'       => esc_html__( 'WooCommerce Options', 'maisha' ),
		'description' => esc_html__( 'Hide sidebar on main and single product page', 'maisha' ),
		'panel'           => 'maisha_options_panel',
		'active_callback' => 'is_meta_active',
	) );
	$wp_customize->add_setting( 'maisha_shop_sidebar', array(
		'default'           => false,
		'sanitize_callback' => 'maisha_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'maisha_shop_sidebar', array(
		'label'             => esc_html__( 'Check this box if you want to hide sidebar on main product page', 'maisha' ),
		'section'           => 'maisha_shop_section',
		'settings'          => 'maisha_shop_sidebar',
		'type'		        => 'checkbox',
		'priority'          => 1,
	) );
	$wp_customize->add_setting( 'maisha_shop_single_sidebar', array(
		'default'           => false,
		'sanitize_callback' => 'maisha_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'maisha_shop_single_sidebar', array(
		'label'             => esc_html__( 'Check this box if you want to hide sidebar on single product page', 'maisha' ),
		'section'           => 'maisha_shop_section',
		'settings'          => 'maisha_shop_single_sidebar',
		'type'		        => 'checkbox',
		'priority'          => 2,
	) );
	
	/**
* Adds the individual sections for footer
*/
	$wp_customize->add_section( 'maisha_copyright_section' , array(
		'title'    => esc_html__( 'Copyright Settings', 'maisha' ),
		'panel'           => 'maisha_options_panel',
	) );
	
	// Scroll to top icon
	$wp_customize->add_setting( 'maisha_scrolltotop', array(
		'default'	=> true,
		'sanitize_callback' => 'maisha_sanitize_checkbox'
	) );
	
	$wp_customize->add_control( 'maisha_scrolltotop', array(
		'label'			=> esc_html__('Disable "scroll to top" button ', 'maisha'),
		'section'		=> 'maisha_copyright_section',
		'type'			=> 'checkbox',
		'priority'          => 1,
	) );

	$wp_customize->add_setting( 'maisha_copyright', array(
		'default'           => esc_html__( 'Maisha Theme by Anariel Design. All rights reserved', 'maisha' ),
		'sanitize_callback' => 'maisha_sanitize_text',
	) );
	$wp_customize->add_control( 'maisha_copyright', array(
		'label'             => esc_html__( 'Copyright text', 'maisha' ),
		'section'           => 'maisha_copyright_section',
		'settings'          => 'maisha_copyright',
		'type'		        => 'text',
		'priority'          => 2,
	) );

	$wp_customize->add_setting( 'hide_copyright', array(
		'sanitize_callback' => 'maisha_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'hide_copyright', array(
		'label'             => esc_html__( 'Hide copyright text', 'maisha' ),
		'section'           => 'maisha_copyright_section',
		'settings'          => 'hide_copyright',
		'type'		        => 'checkbox',
		'priority'          => 3,
	) );

/**
* Custom CSS
*/
	$wp_customize->add_section( 'maisha_custom_css_section' , array(
		'title'    => esc_html__( 'Custom CSS', 'maisha' ),
		'description'=> esc_html__( 'Add your custom CSS which will overwrite the theme CSS', 'maisha' ),
		'panel'           => 'maisha_options_panel',
	) );

	/* Custom CSS*/
	$wp_customize->add_setting( 'maisha_custom_css', array(
		'default'           => '',
		'sanitize_callback' => 'maisha_sanitize_text',
	) );
	$wp_customize->add_control( 'maisha_custom_css', array(
		'label'             => esc_html__( 'Custom CSS', 'maisha' ),
		'section'           => 'maisha_custom_css_section',
		'settings'          => 'maisha_custom_css',
		'type'		        => 'textarea',
		'priority'          => 1,
	) );
	
/**
* Migrating Custom CSS to the core Additional CSS if user uses WordPress 4.7.
*
* @since Maisha 1.4
*/
	if ( function_exists( 'wp_update_custom_css_post' ) ) {
		$custom_css = get_theme_mod( 'maisha_custom_css' );
		if ( $custom_css ) {
			$core_css = wp_get_custom_css(); // Preserve any CSS already added to the core option.
			$return = wp_update_custom_css_post( $core_css . $custom_css );
			if ( ! is_wp_error( $return ) ) {
				// Remove the old theme_mod, so that the CSS is stored in only one place moving forward.
				remove_theme_mod( 'maisha_custom_css');
			}
		}
		$wp_customize->remove_control( 'maisha_custom_css' );
	}

/**
* Custom Colors
*/
	$wp_customize->add_panel( 'maisha_colors_panel', array(
		'title'          => esc_html__( 'Custom Colors', 'maisha' ),
		'priority'   => 42,
	) );
	$wp_customize->add_section( 'maisha_new_section_color_general' , array(
		'title'      => esc_html__( 'Header', 'maisha' ),
		'panel'           => 'maisha_colors_panel',
	) );
	
	$wp_customize->add_setting( 'maisha_header_colors', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_header_colors', array(
		'label'             => esc_html__( 'Header Background', 'maisha' ),
		'section'           => 'maisha_new_section_color_general',
		'settings'          => 'maisha_header_colors',
		'priority'          => 1,
	) ) );

	$wp_customize->add_setting( 'maisha_header_background_submenu_colors', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_header_background_submenu_colors', array(
		'label'             => esc_html__( 'Submenu Background Color', 'maisha' ),
		'section'           => 'maisha_new_section_color_general',
		'settings'          => 'maisha_header_background_submenu_colors',
		'priority'          => 2,
	) ) );

	$wp_customize->add_setting( 'maisha_header_font_colors', array(
		'default'           => '#333333',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_header_font_colors', array(
		'label'             => esc_html__( 'Menu Item Text Color', 'maisha' ),
		'section'           => 'maisha_new_section_color_general',
		'settings'          => 'maisha_header_font_colors',
		'priority'          => 3,
	) ) );
	
	$wp_customize->add_setting( 'maisha_menu_item_hover', array(
		'default'           => '#f7931d',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_menu_item_hover', array(
		'label'             => esc_html__( 'Menu Item Hover Color', 'maisha' ),
		'section'           => 'maisha_new_section_color_general',
		'settings'          => 'maisha_menu_item_hover',
		'priority'          => 4,
	) ) );

	$wp_customize->add_setting( 'maisha_header_font_submenu_colors', array(
		'default'           => '#333333',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_header_font_submenu_colors', array(
		'label'             => esc_html__( 'Submenu Item Text Color', 'maisha' ),
		'section'           => 'maisha_new_section_color_general',
		'settings'          => 'maisha_header_font_submenu_colors',
		'priority'          => 5,
	) ) );

	$wp_customize->add_setting( 'maisha_header_font_current_colors', array(
		'default'           => '#000000',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_header_font_current_colors', array(
		'label'             => esc_html__( 'Current Menu Item Color', 'maisha' ),
		'section'           => 'maisha_new_section_color_general',
		'settings'          => 'maisha_header_font_current_colors',
		'priority'          => 6,
	) ) );
	
	$wp_customize->add_section( 'maisha_new_section_color_general_one' , array(
		'title'      => esc_html__( 'General', 'maisha' ),
		'panel'           => 'maisha_colors_panel',
	) );
	/* Colors General */
	$wp_customize->add_setting( 'maisha_background_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_background_color', array(
		'label'             => esc_html__( 'Background Color', 'maisha' ),
		'section'           => 'maisha_new_section_color_general_one',
		'settings'          => 'maisha_background_color',
		'priority'          => 1,
	) ) );

	$wp_customize->add_setting( 'maisha_button_colors', array(
		'default'           => '#f7931d',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_button_colors', array(
		'label'             => esc_html__( 'All Elements with Accent Color', 'maisha' ),
		'section'           => 'maisha_new_section_color_general_one',
		'settings'          => 'maisha_button_colors',
		'priority'          => 2,
	) ) );

	$wp_customize->add_setting( 'maisha_button_hover_colors', array(
		'default'           => '#f89e35',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_button_hover_colors', array(
		'label'             => esc_html__( 'Button Hover Color', 'maisha' ),
		'section'           => 'maisha_new_section_color_general_one',
		'settings'          => 'maisha_button_hover_colors',
		'priority'          => 3,
	) ) );
	
	$wp_customize->add_setting( 'maisha_button_font_colors', array(
		'default'           => '#333333',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_button_font_colors', array(
		'label'             => esc_html__( 'Button Text Color', 'maisha' ),
		'section'           => 'maisha_new_section_color_general_one',
		'settings'          => 'maisha_button_font_colors',
		'priority'          => 4,
	) ) );

	$wp_customize->add_setting( 'maisha_dark_button_colors', array(
		'default'           => '#333333',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_dark_button_colors', array(
		'label'             => esc_html__( 'Dark Background Elements', 'maisha' ),
		'section'           => 'maisha_new_section_color_general_one',
		'settings'          => 'maisha_dark_button_colors',
		'priority'          => 5,
	) ) );
	
	$wp_customize->add_setting( 'maisha_dark_button_colors_text', array(
		'default'           => '#fffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_dark_button_colors_text', array(
		'label'             => esc_html__( 'Dark Background Button Text Color', 'maisha' ),
		'section'           => 'maisha_new_section_color_general_one',
		'settings'          => 'maisha_dark_button_colors_text',
		'priority'          => 5,
	) ) );

	$wp_customize->add_setting( 'maisha_light_gray_colors', array(
		'default'           => '#f5f4f4',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_light_gray_colors', array(
		'label'             => esc_html__( 'Light Background Elements', 'maisha' ),
		'section'           => 'maisha_new_section_color_general_one',
		'settings'          => 'maisha_light_gray_colors',
		'priority'          => 6,
	) ) );
	
	$wp_customize->add_setting( 'maisha_link_color', array(
		'default'           => '#828282',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_link_color', array(
		'label'             => esc_html__( 'Content Link Color', 'maisha' ),
		'section'           => 'maisha_new_section_color_general_one',
		'settings'          => 'maisha_link_color',
		'priority'          => 7,
	) ) );

	$wp_customize->add_section( 'maisha_new_section_color_general_two' , array(
		'title'      => esc_html__( 'Footer', 'maisha' ),
		'panel'           => 'maisha_colors_panel',
	) );
	$wp_customize->add_setting( 'maisha_footer_font_colors', array(
		'default'           => '#b6b6b3',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_footer_font_colors', array(
		'label'             => esc_html__( 'Footer Text Color', 'maisha' ),
		'section'           => 'maisha_new_section_color_general_two',
		'settings'          => 'maisha_footer_font_colors',
		'priority'          => 1,
	) ) );
	
	$wp_customize->add_setting( 'maisha_footer_bg_color', array(
		'default'           => '#333333',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_footer_bg_color', array(
		'label'             => esc_html__( 'Footer Background Color', 'maisha' ),
		'section'           => 'maisha_new_section_color_general_two',
		'settings'          => 'maisha_footer_bg_color',
		'priority'          => 2,
	) ) );

	$wp_customize->add_setting( 'maisha_copyright_border_colors', array(
		'default'           => '#494949',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_copyright_border_colors', array(
		'label'             => esc_html__( 'Copyright Top Border Color', 'maisha' ),
		'section'           => 'maisha_new_section_color_general_two',
		'settings'          => 'maisha_copyright_border_colors',
		'priority'          => 3,
	) ) );


	
		/***** Register Custom Controls *****/

	class Maisha_Upgrade extends WP_Customize_Control {
		public function render_content() {  ?>
			<p class="maisha-upgrade-thumb">
				<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
			</p>
			<p class="textfield maisha-upgrade-text">
				<a href="<?php echo esc_url('http://www.anarieldesign.com/documentation/maisha/'); ?>" target="_blank" class="button button-secondary">
					<?php esc_html_e('Visit Documentation', 'maisha'); ?>
				</a>
			</p>
			<p class="customize-control-title maisha-upgrade-title">
				<a href="<?php echo esc_url('https://www.youtube.com/watch?v=ghkO-luikII'); ?>" class="button button-secondary" target="_blank">
					<?php esc_html_e('Video Presentation', 'maisha'); ?>
				</a>
			</p>
			<p class="maisha-upgrade-button">
				<a href="http://www.anarieldesign.com/themes/" target="_blank" class="button button-secondary">
					<?php esc_html_e('More Themes by Anariel Design', 'maisha'); ?>
				</a>
			</p><?php
		}
	}

	/***** Add Sections *****/

	$wp_customize->add_section('maisha_upgrade', array(
		'title' => esc_html__('Theme Info', 'maisha'),
		'priority' => 600
	) );

	/***** Add Settings *****/

	$wp_customize->add_setting('maisha_options[premium_version_upgrade]', array(
		'default' => '',
		'type' => 'option',
		'sanitize_callback' => 'esc_attr'
	) );

	/***** Add Controls *****/

	$wp_customize->add_control(new Maisha_Upgrade($wp_customize, 'premium_version_upgrade', array(
		'section' => 'maisha_upgrade',
		'settings' => 'maisha_options[premium_version_upgrade]',
		'priority' => 1
	) ) );
}
add_action( 'customize_register', 'maisha_customize_register', 11 );

/**
 * Sanitization
 */
//Checkboxes
function maisha_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}
//Integers
function maisha_sanitize_int( $input ) {
	if( is_numeric( $input ) ) {
		return intval( $input );
	}
}
//Text
function maisha_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}
//No sanitize - empty function for options that do not require sanitization -> to bypass the Theme Check plugin
function maisha_no_sanitize( $input ) {
}

//Radio Buttons and Select Lists
function maisha_sanitize_choices( $input, $setting ) {
	global $wp_customize;

	$control = $wp_customize->get_control( $setting->id );

	if ( array_key_exists( $input, $control->choices ) ) {
		return $input;
	} else {
		return $setting->default;
	}
}

//Sanitize the dropdown pages.
function maisha_sanitize_dropdown_pages( $input ) {
	if ( is_numeric( $input ) ) {
		return intval( $input );
	}
}

//Shop section
function is_meta_active(){
	if( !class_exists( 'WooCommerce' ) ){
		// If it doesn't exist it won't show the section/panel/control
	return false;
	} else {
		return true;
	}
}

/* Sanitize overlay setting */
function maisha_sanitize_overlay( $input ) {

	$choices = array(
					'0.0',
					'0.1',
					'0.2',
					'0.3',
					'0.4',
					'0.5',
					'0.6',
					'0.7',
					'0.8',
					'0.9',
					'1.0',
				);

	if ( ! in_array( $input, $choices ) ) {
		$input = '0.0';
	}

	return $input;
}


//About section
function is_certain_page_template_about_page(){
	// Get the page's template
	$template = get_post_meta( get_the_ID(), '_wp_page_template', true );
	$is_template = preg_match( '%about-page.php%', $template );
	if ( $is_template == 0 ){
		return false;
	} else {
		return true;
	}
}

//Projects section
function is_certain_page_template_projects_page(){
	// Get the page's template
	$template = get_post_meta( get_the_ID(), '_wp_page_template', true );
	$is_template = preg_match( '%projects-page.php%', $template );
	if ( $is_template == 0 ){
		return false;
	} else {
		return true;
	}
}

//Projects section
function is_certain_page_template_causes_page(){
	// Get the page's template
	$template = get_post_meta( get_the_ID(), '_wp_page_template', true );
	$is_template = preg_match( '%causes-page.php%', $template );
	if ( $is_template == 0 ){
		return false;
	} else {
		return true;
	}
}

//Stories section
function is_certain_page_template_stories_page(){
	// Get the page's template
	$template = get_post_meta( get_the_ID(), '_wp_page_template', true );
	$is_template = preg_match( '%stories-page.php%', $template );
	if ( $is_template == 0 ){
		return false;
	} else {
		return true;
	}
}

//Staff section
function is_certain_page_template_staff_page(){
	// Get the page's template
	$template = get_post_meta( get_the_ID(), '_wp_page_template', true );
	$is_template = preg_match( '%staff-page.php%', $template );
	if ( $is_template == 0 ){
		return false;
	} else {
		return true;
	}
}

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Maisha 1.0
 */
function maisha_customize_preview_js() {
	wp_enqueue_script( 'maisha-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'maisha_customize_preview_js' );

/***** Enqueue Customizer JS *****/

function maisha_customizer_js() {
	wp_enqueue_script('maisha-customizer', get_template_directory_uri() . '/js/maisha-customizer.js', array(), '1.0.0', true);
	wp_localize_script('maisha-customizer', 'maisha_links', array(
		'title'	=> esc_html__('Theme Related Links:', 'maisha'),
		'themeURL' => esc_url('http://www.anarieldesign.com/themes/non-profit-wordpress-theme/'),
		'themeLabel' => esc_html__('Theme Info Page', 'maisha'),
		'docsURL' => esc_url('http://www.anarieldesign.com/documentation/maisha/'),
		'docsLabel'	=> esc_html__('Theme Documentation', 'maisha'),
		'rateURL' => esc_url('https://www.youtube.com/watch?v=ghkO-luikII'),
		'rateLabel'	=> esc_html__('Video Presentation', 'maisha'),
	));
}
add_action('customize_controls_enqueue_scripts', 'maisha_customizer_js');