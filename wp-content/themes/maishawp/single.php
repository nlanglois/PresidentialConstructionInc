<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package Maisha
 * @since Maisha 1.0
 */

get_header(); ?>
	<div class="hfeed site">
		<div class="content site-content news">
			<main class="main site-main" role="main">
				<div class="single-themes-page clear">
					<?php if(get_theme_mod('maisha_single_post_layout') == 'single-sidebar-left') : ?>
						<div class="one_third">
							<div id="sidebar" class="sidebar">
							<?php get_sidebar(); ?>
							</div><!-- .sidebar -->
						</div>
						<div class="two_third lastcolumn">
							<div id="primary" class="content-area">
								<?php
								// Start the loop.
								while ( have_posts() ) : the_post();

									/*
									 * Include the post format-specific template for the content. If you want to
									 * use this in a child theme, then include a file called called content-___.php
									 * (where ___ is the post format) and that will be used instead.
									 */
									get_template_part( 'content-single', get_post_format() );

									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;

									// Previous/next post navigation.
									the_post_navigation( array(
										'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'maisha' ) . '</span> ' .
											'<span class="screen-reader-text">' . esc_html__( 'Next post:', 'maisha' ) . '</span> ' .
											'<span class="post-title">%title</span>',
										'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous', 'maisha' ) . '</span> ' .
											'<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'maisha' ) . '</span> ' .
											'<span class="post-title">%title</span>',
									) );

								// End the loop.
								endwhile;
								?>
							</div>
						</div>
					<?php elseif(get_theme_mod('maisha_single_post_layout') == 'single-full') : ?>
						<div id="primary" class="content-area">
							<?php
							// Start the loop.
							while ( have_posts() ) : the_post();
								/*
								 * Include the post format-specific template for the content. If you want to
								 * use this in a child theme, then include a file called called content-___.php
								 * (where ___ is the post format) and that will be used instead.
								 */
								get_template_part( 'content-single', get_post_format() );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

								// Previous/next post navigation.
								the_post_navigation( array(
									'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'maisha' ) . '</span> ' .
										'<span class="screen-reader-text">' . esc_html__( 'Next post:', 'maisha' ) . '</span> ' .
										'<span class="post-title">%title</span>',
									'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous', 'maisha' ) . '</span> ' .
										'<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'maisha' ) . '</span> ' .
										'<span class="post-title">%title</span>',
								) );

							// End the loop.
							endwhile;
							?>
						</div>
					<?php else: ?>
						<div class="two_third">
							<div id="primary" class="content-area">
								<?php
								// Start the loop.
								while ( have_posts() ) : the_post();

									/*
									 * Include the post format-specific template for the content. If you want to
									 * use this in a child theme, then include a file called called content-___.php
									 * (where ___ is the post format) and that will be used instead.
									 */
									get_template_part( 'content-single', get_post_format() );

									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;

									// Previous/next post navigation.
									the_post_navigation( array(
										'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'maisha' ) . '</span> ' .
											'<span class="screen-reader-text">' . esc_html__( 'Next post:', 'maisha' ) . '</span> ' .
											'<span class="post-title">%title</span>',
										'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous', 'maisha' ) . '</span> ' .
											'<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'maisha' ) . '</span> ' .
											'<span class="post-title">%title</span>',
									) );

								// End the loop.
								endwhile;
								?>
							</div>
						</div>
						<div class="one_third lastcolumn">
							<div id="sidebar" class="sidebar">
							<?php get_sidebar(); ?>
							</div><!-- .sidebar -->
						</div>
					<?php endif; ?>
				</div>
				</main><!-- .site-main -->
			</div><!-- .content-area -->
		  </div><!-- .site-content -->
	</div><!-- .site -->
<?php get_footer(); ?>