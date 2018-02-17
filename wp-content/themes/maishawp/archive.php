<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package Maisha
 * @since Maisha 1.0
 */

get_header(); ?><
	<div class="hfeed site">
		<div class="content site-content">
			<main class="main site-main" role="main">
				<div class="single-themes-page clear news">
					<header class="page-header">
						<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->
					<?php if(get_theme_mod('maisha_archive_layout') == 'archive-sidebar-left') : ?>
					<div class="one_third">
						<div id="sidebar" class="sidebar">
						<?php get_sidebar(); ?>
						</div><!-- .sidebar -->
					</div>
					<div class="two_third lastcolumn">
						<div id="primary" class="content-area">
						<?php if ( have_posts() ) : ?>
						<?php
							// Start the Loop.
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'content', get_post_format() );

							// End the loop.
							endwhile;

							// Previous/next page navigation.
							the_posts_pagination( array(
								'prev_text'          => esc_html__( 'Previous page', 'maisha' ),
								'next_text'          => esc_html__( 'Next page', 'maisha' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'maisha' ) . ' </span>',
							) );

						// If no content, include the "No posts found" template.
						else :
							get_template_part( 'content', 'none' );

						endif;
						?>
						</div>
					</div>
					<?php elseif(get_theme_mod('maisha_archive_layout') == 'archive-full') : ?>
					<div id="primary" class="content-area">
						<?php if ( have_posts() ) : ?>
						<?php
							// Start the Loop.
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'content', get_post_format() );

							// End the loop.
							endwhile;

							// Previous/next page navigation.
							the_posts_pagination( array(
								'prev_text'          => esc_html__( 'Previous page', 'maisha' ),
								'next_text'          => esc_html__( 'Next page', 'maisha' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'maisha' ) . ' </span>',
							) );

						// If no content, include the "No posts found" template.
						else :
							get_template_part( 'content', 'none' );

						endif;
						?>
					</div>
					<?php elseif(get_theme_mod('maisha_archive_layout') == 'archive-grid-right') : ?>
					<div class="two_third">
						<div id="primary" class="content-area">
							<div class="columns clear grid-post">
							<?php if ( have_posts() ) : ?>
							<?php
								// Start the Loop.
								while ( have_posts() ) : the_post();

									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'content-post-grid', get_post_format() );

								// End the loop.
								endwhile;

							// If no content, include the "No posts found" template.
							else :
								get_template_part( 'content', 'none' );

							endif;
							?>
							</div>
						</div>
						<div class="gridpost">
							<?php
							// Previous/next page navigation.
									the_posts_pagination( array(
										'prev_text'          => esc_html__( 'Previous page', 'maisha' ),
										'next_text'          => esc_html__( 'Next page', 'maisha' ),
										'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'maisha' ) . ' </span>',
									) ); ?>
						</div>
					</div>
					<div class="one_third lastcolumn">
						<div id="sidebar" class="sidebar">
						<?php get_sidebar(); ?>
						</div><!-- .sidebar -->
					</div>
					<?php elseif(get_theme_mod('maisha_archive_layout') == 'archive-grid-left') : ?>
					<div class="one_third">
						<div id="sidebar" class="sidebar">
						<?php get_sidebar(); ?>
						</div><!-- .sidebar -->
					</div>
					<div class="two_third lastcolumn">
						<div id="primary" class="content-area">
							<div class="columns clear grid-post">
							<?php if ( have_posts() ) : ?>
							<?php
								// Start the Loop.
								while ( have_posts() ) : the_post();

									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'content-post-grid', get_post_format() );

								// End the loop.
								endwhile;

							// If no content, include the "No posts found" template.
							else :
								get_template_part( 'content', 'none' );

							endif;
							?>
							</div>
						</div>
						<div class="gridpost">
							<?php
							// Previous/next page navigation.
									the_posts_pagination( array(
										'prev_text'          => esc_html__( 'Previous page', 'maisha' ),
										'next_text'          => esc_html__( 'Next page', 'maisha' ),
										'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'maisha' ) . ' </span>',
									) ); ?>
						</div>
					</div>
					<?php elseif(get_theme_mod('maisha_archive_layout') == 'archive-grid-full') : ?>
						<div class="columns clear grid-post">
							<?php if ( have_posts() ) : ?>
							<?php
								// Start the Loop.
								while ( have_posts() ) : the_post();

									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'content-post-grid', get_post_format() );

								// End the loop.
								endwhile;

							// If no content, include the "No posts found" template.
							else :
								get_template_part( 'content', 'none' );

							endif;
							?>
						</div>
						<div class="gridpost">
							<?php
							// Previous/next page navigation.
									the_posts_pagination( array(
										'prev_text'          => esc_html__( 'Previous page', 'maisha' ),
										'next_text'          => esc_html__( 'Next page', 'maisha' ),
										'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'maisha' ) . ' </span>',
									) ); ?>
						</div>
					<?php elseif(get_theme_mod('maisha_archive_layout') == 'archive-list') : ?>
					<div class="two_third list">
						<div id="primary" class="content-area">
						<?php if ( have_posts() ) : ?>
						<?php
							// Start the Loop.
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'content-post-list', get_post_format() );

							// End the loop.
							endwhile;

							// Previous/next page navigation.
							the_posts_pagination( array(
								'prev_text'          => esc_html__( 'Previous page', 'maisha' ),
								'next_text'          => esc_html__( 'Next page', 'maisha' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'maisha' ) . ' </span>',
							) );

						// If no content, include the "No posts found" template.
						else :
							get_template_part( 'content', 'none' );

						endif;
						?>
						</div>
					</div>
					<div class="one_third lastcolumn">
						<div id="sidebar" class="sidebar">
						<?php get_sidebar(); ?>
						</div><!-- .sidebar -->
					</div>
					<?php else: ?>
					<div class="two_third">
						<div id="primary" class="content-area">
						<?php if ( have_posts() ) : ?>
						<?php
							// Start the Loop.
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'content', get_post_format() );

							// End the loop.
							endwhile;

							// Previous/next page navigation.
							the_posts_pagination( array(
								'prev_text'          => esc_html__( 'Previous page', 'maisha' ),
								'next_text'          => esc_html__( 'Next page', 'maisha' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'maisha' ) . ' </span>',
							) );

						// If no content, include the "No posts found" template.
						else :
							get_template_part( 'content', 'none' );

						endif;
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
			</main><!-- .content-area -->
		</div><!-- .site-content -->
	</div><!-- .site -->
<?php get_footer(); ?>