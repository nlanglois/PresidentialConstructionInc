<?php
/**
 * The template used for displaying page content
 *
 * @package Maisha
 * @since Maisha 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before'	  => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'maisha-lite' ) . '</span>',
				'after'	   => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'	=> '<span class="screen-reader-text">' . esc_html__( 'Page', 'maisha-lite' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->