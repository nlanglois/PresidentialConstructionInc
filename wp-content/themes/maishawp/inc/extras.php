<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Maisha
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function maisha_body_classes( $classes ) {

	// Add class for the header layouts.
	if ( 'standard-header' === get_theme_mod( 'maisha_header_layout' ) ) {
		$classes[] = 'standard-header';
	}
	if ( 'alternative-header' === get_theme_mod( 'maisha_header_layout' ) ) {
		$classes[] = 'alternative-header';
	}
	
	if ( 'four-columns' === get_theme_mod( 'maisha_front_first_layout' ) ) {
		$classes[] = 'four-columns-layout';
	}
	if ( 'two-columns' === get_theme_mod( 'maisha_front_first_layout' ) ) {
		$classes[] = 'two-columns-layout';
	}
	
	if ( 'four-columns' === get_theme_mod( 'maisha_about_first_layout' ) ) {
		$classes[] = 'about-four-columns-layout';
	}
	if ( 'three-columns' === get_theme_mod( 'maisha_about_first_layout' ) ) {
		$classes[] = 'about-three-columns-layout';
	}
	if ( 'two-columns' === get_theme_mod( 'maisha_about_first_layout' ) ) {
		$classes[] = 'about-two-columns-layout';
	}
	
	if ( 'four-columns' === get_theme_mod( 'maisha_projects_first_layout' ) ) {
		$classes[] = 'projects-four-columns-layout';
	}
	if ( 'three-columns' === get_theme_mod( 'maisha_projects_first_layout' ) ) {
		$classes[] = 'projects-three-columns-layout';
	}
	if ( 'two-columns' === get_theme_mod( 'maisha_projects_first_layout' ) ) {
		$classes[] = 'projects-two-columns-layout';
	}
	
	if ( 'four-columns' === get_theme_mod( 'maisha_causes_first_layout' ) ) {
		$classes[] = 'causes-four-columns-layout';
	}
	if ( 'three-columns' === get_theme_mod( 'maisha_causes_first_layout' ) ) {
		$classes[] = 'causes-three-columns-layout';
	}
	if ( 'two-columns' === get_theme_mod( 'maisha_causes_first_layout' ) ) {
		$classes[] = 'causes-two-columns-layout';
	}
	
	if ( 'four-columns' === get_theme_mod( 'maisha_stories_first_layout' ) ) {
		$classes[] = 'stories-four-columns-layout';
	}
	if ( 'three-columns' === get_theme_mod( 'maisha_stories_first_layout' ) ) {
		$classes[] = 'stories-three-columns-layout';
	}
	if ( 'two-columns' === get_theme_mod( 'maisha_stories_first_layout' ) ) {
		$classes[] = 'stories-two-columns-layout';
	}
	
	if ( 'four-columns' === get_theme_mod( 'maisha_staff_first_layout' ) ) {
		$classes[] = 'staff-four-columns-layout';
	}
	if ( 'three-columns' === get_theme_mod( 'maisha_staff_first_layout' ) ) {
		$classes[] = 'staff-three-columns-layout';
	}
	if ( 'two-columns' === get_theme_mod( 'maisha_staff_first_layout' ) ) {
		$classes[] = 'staff-two-columns-layout';
	}
	
	// Adds a class of paralax image.
	if ( get_theme_mod( 'maisha_fixed_top' ) ) {
		$classes[] = 'fixed-image';
	}
	
	if ( get_theme_mod( 'maisha_inner_fixed_top' ) ) {
		$classes[] = 'inner-fixed-image';
	}

	return $classes;
}
add_filter( 'body_class', 'maisha_body_classes' );