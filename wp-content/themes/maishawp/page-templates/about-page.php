<?php
/**
 * Template Name: About Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Maisha
 * @since Maisha 1.0
 */

get_header(); ?>
	<div class="intro">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'content', 'about-page' );

		// End the loop.
		endwhile;
		?>
	</div><!-- .intro -->
	<?php maisha_featured_aboutpage_one(); ?>
	<?php maisha_featured_aboutpage_two(); ?>
<?php get_footer(); ?>