<?php
/**
 * Template Name: Forum
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Maisha
 * @since Maisha 1.0
 */

get_header(); ?>

	<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
		<div class="hfeed site bbpress-page">
			<div class="content site-content">
				<main class="main site-main" role="main">
					<div class="single-themes-page clear news">
						<div class="two_third">
							<div id="primary" class="content-area">
								<div class="themes-intro">
									<article>
										<div class="entry-content">
											<h2><?php the_title(); ?></h2>
										</div>
										<hr class="short">
									</article>
								</div>
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
								</div>
							</div>
							<div class="one_third lastcolumn">
							<div id="sidebar" class="sidebar">
							<?php get_sidebar( 'additional-one' ); ?>
							</div><!-- .sidebar -->
						</div>
					</div>
				</main><!-- .content-area -->
			</div><!-- .site-content -->
		</div><!-- .site -->
	<?php else: ?>
		<div class="hfeed site bbpress-page">
			<div class="content site-content">
				<main class="main site-main" role="main">
					<div class="single-themes-page clear news">
						<div id="primary" class="content-area">
							<div class="themes-intro">
								<article>
									<div class="entry-content">
										<h2><?php the_title(); ?></h2>
									</div>
									<hr class="short">
								</article>
							</div>
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
						</div>
					</div>
				</main><!-- .content-area -->
			</div><!-- .site-content -->
		</div><!-- .site -->
	<?php endif; ?>
<?php get_footer(); ?>