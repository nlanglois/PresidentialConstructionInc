<?php
/**
 * Jetpack Compatibility File
 *
 * See: http://jetpack.me/
 *
 * @package Maisha
 * @since Maisha 1.0
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function maisha_jetpack_setup() {
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'maisha_jetpack_setup' );