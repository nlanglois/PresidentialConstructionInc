<?php
/**
 * Template Name: Page Builder
 *
 * @package Maisha
 * @since Maisha 1.5
 */

get_header(); ?>

	<div class="builder-content">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'page' ); ?>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->
<?php get_footer(); ?>