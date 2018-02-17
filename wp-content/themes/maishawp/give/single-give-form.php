<?php
/**
 * The template for displaying all single posts.
 *
 * @package Maisha
 */

get_header(); ?>

<div class="hfeed site">
	<div class="content site-content news">
		<main class="main site-main" role="main">
			<div class="single-themes-page clear">

			<?php while ( have_posts() ) : the_post(); ?>

			<?php give_get_template_part( 'single-give-form/content', 'single-give-form' );?>


				<?php 
					// Previous/next post navigation.
					the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'maisha' ) . '</span> ' .
					'<span class="screen-reader-text">' . esc_html__( 'Next post:', 'maisha' ) . '</span> ' .
					'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous', 'maisha' ) . '</span> ' .
					'<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'maisha' ) . '</span> ' .
					'<span class="post-title">%title</span>',
					) );
				 ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

			</div><!-- #main -->
		</main><!-- #primary -->

	</div><!-- .site-content -->
</div><!-- .site -->

<?php get_footer(); ?>