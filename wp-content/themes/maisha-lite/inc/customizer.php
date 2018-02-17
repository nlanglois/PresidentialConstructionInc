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

	$wp_customize->get_setting( 'blogname' )->transport		= 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	$wp_customize->add_section( 'maisha_theme_options', array(
		'title'	=> esc_html__( 'Front Page', 'maisha-lite' ),
		'priority' => 34,
	) );

	/* Front Page: Featured Page One */
	$wp_customize->add_setting( 'maisha_featured_page_one', array(
		'default'		   => '',
		'sanitize_callback' => 'maisha_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'maisha_featured_page_one', array(
		'label'			 => esc_html__( 'First Content Block', 'maisha-lite' ),
		'section'		   => 'maisha_theme_options',
		'priority'		  => 9,
		'type'			  => 'dropdown-pages',
	) );

/**
* Custom CSS
*/
	$wp_customize->add_section( 'maisha_custom_css_section' , array(
   		'title'	=> esc_html__( 'Custom CSS', 'maisha-lite' ),
   		'description'=> 'Add your custom CSS which will overwrite the theme CSS',
   		'priority'   => 32,
	) );

	/* Custom CSS*/
	$wp_customize->add_setting( 'maisha_custom_css', array(
		'default'		   => '',
		'sanitize_callback' => 'maisha_sanitize_text',
	) );
	$wp_customize->add_control( 'maisha_custom_css', array(
		'label'			 => esc_html__( 'Custom CSS', 'maisha-lite' ),
		'section'		   => 'maisha_custom_css_section',
		'settings'		  => 'maisha_custom_css',
		'type'				=> 'textarea',
		'priority'		  => 1,
	) );
/**
* Migrating Custom CSS to the core Additional CSS if user uses WordPress 4.7.
*
* @since Maisha 1.2.6
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

	/***** Register Custom Controls *****/

	class Maisha_Upgrade extends WP_Customize_Control {
		public function render_content() {  ?>
			<p class="maisha-upgrade-thumb">
				<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
			</p>
			<p class="customize-control-title maisha-upgrade-title">
				<?php esc_html_e('Maisha Pro', 'maisha-lite'); ?>
			</p>
			<p class="textfield maisha-upgrade-text">
				<?php esc_html_e('Full version of this theme includes additional features; additional page templates, custom widgets, additional front page widgetized areas, different blog options, different theme options, WooCommerce support, color options & premium theme support.', 'maisha-lite'); ?>
			</p>
			<p class="customize-control-title maisha-upgrade-title">
				<?php esc_html_e('Additional Features:', 'maisha-lite'); ?>
			</p>
			<ul class="maisha-upgrade-features">
				<li class="maisha-upgrade-feature-item">
					<?php esc_html_e('Additional Page Templates', 'maisha-lite'); ?>
				</li>
				<li class="maisha-upgrade-feature-item">
					<?php esc_html_e('Custom Widgets', 'maisha-lite'); ?>
				</li>
				<li class="maisha-upgrade-feature-item">
					<?php esc_html_e('Several additional widget areas', 'maisha-lite'); ?>
				</li>
				<li class="maisha-upgrade-feature-item">
					<?php esc_html_e('Different Blog Options & Layouts', 'maisha-lite'); ?>
				</li>
				<li class="maisha-upgrade-feature-item">
					<?php esc_html_e('Different Theme Options', 'maisha-lite'); ?>
				</li>
				<li class="maisha-upgrade-feature-item">
					<?php esc_html_e('WooCommerce Support', 'maisha-lite'); ?>
				</li>
				<li class="maisha-upgrade-feature-item">
					<?php esc_html_e('Color Options', 'maisha-lite'); ?>
				</li>
				<li class="maisha-upgrade-feature-item">
					<?php esc_html_e('Premium Theme Support', 'maisha-lite'); ?>
				</li>
			</ul>
			<p class="maisha-upgrade-button">
				<a href="http://www.anarieldesign.com/themes/non-profit-wordpress-theme/" target="_blank" class="button button-secondary">
					<?php esc_html_e('Read more about Maisha', 'maisha-lite'); ?>
				</a>
			</p><?php
		}
	}

	/***** Add Sections *****/

	$wp_customize->add_section('maisha_upgrade', array(
		'title' => esc_html__('Pro Features', 'maisha-lite'),
		'priority' => 300
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

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Maisha 1.0
 */
function maisha_customize_preview_js() {
	wp_enqueue_script( 'maisha-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'maisha_customize_preview_js' );
/***** Enqueue Customizer CSS *****/

function maisha_customizer_base_css() {
	wp_enqueue_style('maisha-customizer', get_template_directory_uri() . '/admin/customizer.css', array());
}
add_action('customize_controls_print_styles', 'maisha_customizer_base_css');