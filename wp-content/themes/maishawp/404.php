<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Maisha
 * @since Maisha 1.0
 */

get_header(); ?>
	<div class="hfeed site bbpress-page">
		<div class="content site-content">
			<main class="main site-main" role="main">
				<div class="single-themes-page clear news">
					<div id="primary" class="content-area">
						<main>
							<section class="error-404 not-found">
								<header class="page-header">
									<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'maisha' ); ?></h1>
								</header><!-- .page-header -->

								<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'maisha' ); ?></p>

								<?php get_search_form(); ?>

							</section><!-- .error-404 -->
						</main><!-- .site-main -->
						<div class="clear">
						<div class="one_third">
							<div id="sidebar" class="sidebar">
								<?php get_sidebar(); ?>
							</div><!-- .sidebar -->
						</div>
						<div class="one_third">
							<div id="sidebar" class="sidebar">
								<?php get_sidebar( 'additional' ); ?>
							</div><!-- .sidebar -->
						</div>
						<div class="one_third lastcolumn">
							<div id="sidebar" class="sidebar">
								<?php get_sidebar( 'additional-one' ); ?>
							</div><!-- .sidebar -->
						</div>
						</div>
					</div>
				</div>
			</main><!-- .content-area -->
		</div><!-- .site-content -->
	</div><!-- .site -->
<?php get_footer(); ?>  