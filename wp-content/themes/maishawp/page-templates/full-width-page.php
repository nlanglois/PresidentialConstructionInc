<?php
/**
 * Template Name: Full Width Page
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
	<?php $image_id = get_post_thumbnail_id(); ?>
	<?php $image_url = wp_get_attachment_image_src($image_id,'full');   ?>
	<div class="cd-fixed-bg cd-bg-1" style="background-image:url(<?php echo esc_url( $image_url[0] ); ?>);"></div>
	<div class="hfeed site default-page up">
		<div class="content site-content">
			<div class="content-area">
				<div class="main site-main" role="main">
					<div class="themes-intro">
						<article>
							<div class="entry-content">
								<h1><?php the_title(); ?></h1>
							</div>
							<hr class="short">
						</article>
					</div>
					<?php
						// Start the loop.
						while ( have_posts() ) : the_post();

							// Include the page content template.
							get_template_part( 'content', 'full-page' );

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
	<?php else: ?>
	<div class="hfeed site default-page">
		<div class="content site-content">
			<div class="content-area">
				<div class="main site-main" role="main">
					<div class="themes-intro">
						<article>
							<div class="entry-content">
								<h1><?php the_title(); ?></h1>
							</div>
							<hr class="short">
						</article>
					</div>
					<?php
						// Start the loop.
						while ( have_posts() ) : the_post();

							// Include the page content template.
							get_template_part( 'content', 'full-page' );

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
	<?php endif; ?>
<?php get_footer(); ?>