<?php
/**
 * Template part for displaying posts.
 *
 * @package Maisha
 */

?>

<div class="twocolumn">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">

			<?php if ( has_post_thumbnail() ) { ?>
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
			</div>
			<?php } ?>

		</header><!-- .entry-header -->

			<div class="inside">

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<hr class="short">

		<div class="entry-content">
			<?php
				/* translators: %s: Name of current post */
				the_excerpt();
			?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'maisha' ),
					'after'  => '</div>',
				) );
			?>
			<?php edit_post_link( esc_html__( 'Edit', 'maisha' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-content -->
		</div>
	</article><!-- #post-## -->
</div>