<?php
/**
 * The template used for displaying child page content
 *
 * @package Maisha
 * @since Maisha 1.0
 */
?>

<div class="staff-column clearfix">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( has_post_thumbnail() ): ?>
			<a href="<?php the_permalink(); ?>">
			<?php
				// Post thumbnail.
				maisha_post_thumbnail( 'maisha-staff-child-page-thumbnail' );
			?>
			</a>
		<?php endif; ?>
		<div class="entry-content">
			<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				endif;
			?>
			<hr class="short">
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
				wp_kses( __( 'Continue reading %s', 'maisha' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>
			<?php
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'maisha' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'maisha' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			?>
			<?php edit_post_link( esc_html__( 'Edit', 'maisha' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-content -->
	</article><!-- #post-## -->
</div>