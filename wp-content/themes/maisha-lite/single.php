<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package Maisha
 * @since Maisha 1.0
 */

get_header(); ?>
	<div id="content" class="hfeed site">
		<div class="content site-content news">
			<main class="main site-main" role="main">
				<div class="single-themes-page clear">
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
								get_template_part( 'content', get_post_format() );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

								// Previous/next post navigation.
								the_post_navigation( array(
									'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'maisha-lite' ) . '</span> ' .
										'<span class="screen-reader-text">' . esc_html__( 'Next post:', 'maisha-lite' ) . '</span> ' .
										'<span class="post-title">%title</span>',
									'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous', 'maisha-lite' ) . '</span> ' .
										'<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'maisha-lite' ) . '</span> ' .
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
				</div>
			</main><!-- .site-main -->
		</div><!-- .content-area -->
	</div><!-- .site-content -->
<?php get_footer(); ?>