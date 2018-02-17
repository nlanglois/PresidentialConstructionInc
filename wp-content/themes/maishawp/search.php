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

get_header(); ?>
	<div class="hfeed site">
		<div class="content site-content">
			<main class="main site-main" role="main">
				<div class="single-themes-page clear news">
					<div class="two_third">
						<div id="primary" class="content-area">
						<?php if ( have_posts() ) : ?>
						<header class="page-header">
						<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'maisha' ), get_search_query() ); ?></h1>
						</header><!-- .page-header -->
						<?php
						// Start the loop.
						while ( have_posts() ) : the_post(); ?>

							<?php
							/*
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'content', 'search' );

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
				</div>
			</main><!-- .main -->
		</div><!-- .site-content -->
	</div><!-- .site -->
<?php get_footer(); ?>