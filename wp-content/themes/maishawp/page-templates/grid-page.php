<?php
/**
 * Template Name: Grid Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Maisha
 * @since Maisha 1.0
 */

get_header(); ?>

	<?php
	// Start the loop.
	while ( have_posts() ) : the_post();

		// Include the page content template.
		get_template_part( 'content', 'grid-page' );

	// End the loop.
	endwhile;
	?>
	<div class="hfeed site">
		<div class="content site-content">
			<div class="content-area">
				<div class="main site-main" role="main">
					<div class="child-pages columns clear">
						<?php
							$child_pages = new WP_Query( array(
								'post_type'      => 'page',
								'orderby'        => 'menu_order',
								'order'          => 'ASC',
								'post_parent'    => $post->ID,
								'posts_per_page' => 999,
								'no_found_rows'  => true,
							) );
							while ( $child_pages->have_posts() ) : $child_pages->the_post();
								 get_template_part( 'content', 'grid-about' );
							endwhile;
							wp_reset_postdata();
						?>
					</div>
					<!-- .child-pages -->

					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				</div><!-- .site-main -->
			</div><!-- .content-area -->
		</div><!-- .site-content -->
	</div><!-- .site -->

<?php get_footer(); ?>