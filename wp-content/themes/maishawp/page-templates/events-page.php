<?php
/**
 * Template Name: Events Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Maisha
 * @since Maisha 1.0
 */

get_header(); ?>
	<div class="hfeed site default-page">
		<div class="content site-content">
			<div class="content-area">
				<div class="main site-main" role="main">
					<?php
						// Start the loop.
						while ( have_posts() ) : the_post();

							// Include the page content template.
							get_template_part( 'content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						// End the loop.
						endwhile;
					?>
				</div><!-- .site-main -->
			</div><!-- .content-area -->
		</div><!-- .site-content -->
	</div><!-- .site -->
<?php get_footer(); ?>