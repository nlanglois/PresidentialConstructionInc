<?php
/**
 * The template used for displaying child page content
 *
 * @package Maisha
 * @since Maisha 1.0
 */
?>

<div class="fourcolumn clearfix">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<hr class="short">
			<?php if ( has_post_thumbnail() ): ?>
				<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'maisha-stories-child-page-thumbnail' ); ?>
				</a>
			<?php endif; ?>
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