<?php
/**
 * Template Name: Staff Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Maisha
 * @since Maisha 1.0
 */

get_header(); ?>
	<?php if(get_theme_mod('maisha_staff_layout') == 'top-header-three') : ?>
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
	<div class="hfeed site">
		<div class="content site-content">
			<div class="content-area">
				<div class="main site-main" role="main">
					<div class="child-pages columns clear">
						<?php
							$child_pages = new WP_Query( array(
								'post_type'     => 'page',
								'orderby'       => 'menu_order',
								'order'         => 'ASC',
								'post_parent'   => $post->ID,
								'posts_per_page' => 999,
								'no_found_rows'  => true,
							) );
							while ( $child_pages->have_posts() ) : $child_pages->the_post();
								 get_template_part( 'content', 'grid-staff' );
							endwhile;
							wp_reset_postdata();
						?>
					</div>
					<!-- .child-pages -->
				</div><!-- .site-main -->
			</div><!-- .content-area -->
		</div><!-- .site-content -->
	</div><!-- .site -->
	<?php elseif(get_theme_mod('maisha_staff_layout') == 'no-header-three') : ?>
	<div class="hfeed site">
		<div class="content site-content">
			<div class="content-area">
				<div class="main site-main" role="main">
					<div class="child-pages columns clear">
						<?php
							$child_pages = new WP_Query( array(
								'post_type'     => 'page',
								'orderby'       => 'menu_order',
								'order'         => 'ASC',
								'post_parent'   => $post->ID,
								'posts_per_page' => 999,
								'no_found_rows'  => true,
							) );
							while ( $child_pages->have_posts() ) : $child_pages->the_post();
								 get_template_part( 'content', 'grid-staff' );
							endwhile;
							wp_reset_postdata();
						?>
					</div>
					<!-- .child-pages -->
				</div><!-- .site-main -->
			</div><!-- .content-area -->
		</div><!-- .site-content -->
	</div><!-- .site -->
	<?php else: ?>
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
	<div class="hfeed site">
		<div class="content site-content">
			<div class="content-area">
				<div class="main site-main" role="main">
					<div class="child-pages columns clear">
						<?php
							$child_pages = new WP_Query( array(
								'post_type'     => 'page',
								'orderby'       => 'menu_order',
								'order'         => 'ASC',
								'post_parent'   => $post->ID,
								'posts_per_page' => 999,
								'no_found_rows'  => true,
							) );
							while ( $child_pages->have_posts() ) : $child_pages->the_post();
								 get_template_part( 'content', 'grid-staff' );
							endwhile;
							wp_reset_postdata();
						?>
					</div>
					<!-- .child-pages -->
				</div><!-- .site-main -->
			</div><!-- .content-area -->
		</div><!-- .site-content -->
	</div><!-- .site -->
	<?php endif; ?>
<?php get_footer(); ?>