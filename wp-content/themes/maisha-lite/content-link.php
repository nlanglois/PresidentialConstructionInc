<?php
/**
 * The template for displaying link post formats
 *
 * Used for both single and index/archive/search.
 *
 * @package Maisha
 * @since Maisha 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php maisha_post_thumbnail(); ?>

	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( sprintf( '<h1 class="entry-title"><a href="%s">', esc_url( maisha_get_link_url() ) ), '</a></h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s">', esc_url( maisha_get_link_url() ) ), '</a></h2>' );
			endif;
		?>
	</header>
	<!-- .entry-header -->

	<?php if(!get_theme_mod('maisha_post_footer')) : ?>
	<footer class="entry-footer">
		<?php maisha_entry_meta(); ?>
		<?php edit_post_link( esc_html__( 'Edit', 'maisha-lite' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
	<?php endif; ?>

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				wp_kses( __( 'Continue reading %s', 'maisha-lite' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before'	  => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'maisha-lite' ) . '</span>',
				'after'	   => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'	=> '<span class="screen-reader-text">' . esc_html__( 'Page', 'maisha-lite' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div>
	<!-- .entry-content -->

	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>

</article><!-- #post-## -->