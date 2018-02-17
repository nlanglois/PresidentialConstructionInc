<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Maisha
 * @since Maisha 1.0
 */

get_header(); ?>
	<div id="content" class="hfeed site bbpress-page">
		<div class="content site-content">
			<main class="main site-main" role="main">
				<div class="single-themes-page clear news">
					<div id="primary" class="content-area">
						<main>
							<section class="error-404 not-found">
								<header class="page-header">
									<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'maisha-lite' ); ?></h1>
								</header><!-- .page-header -->

								<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'maisha-lite' ); ?></p>

								<?php get_search_form(); ?>

							</section><!-- .error-404 -->
						</main><!-- .site-main -->
					</div>
				</div>
			</main><!-- .content-area -->
		</div><!-- .site-content -->
	</div><!-- .site -->
<?php get_footer(); ?>  