<?php
/**
 * Template Name: Front Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Maisha
 * @since Maisha 1.0
 */

get_header(); ?>
	<?php if ( has_post_thumbnail() ): ?>
	<div id="content" class="intro">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'content', 'front-page' );

		// End the loop.
		endwhile;
		?>
	</div><!-- .intro -->
	<?php endif; ?>
	<?php maisha_featured_page_one(); ?>
<?php get_footer(); ?>