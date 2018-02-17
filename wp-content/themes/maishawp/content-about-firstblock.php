<?php
/**
 * The template used for displaying child page content
 *
 * @package Maisha
 * @since Maisha 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
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
		<div class="columns clear">
			<?php
				$child_pages = new WP_Query( array(
					'post_type'      => 'page',
					'orderby'        => 'menu_order',
					'order'          => 'ASC',
					'post_parent'    => $post->ID,
					'posts_per_page' => 999,
					'no_found_rows'  => true,
				) );
				while ( $child_pages->have_posts() ) : $child_pages->the_post();
					 get_template_part( 'content', 'grid-about' );
				endwhile;
				wp_reset_postdata();
			?>
		</div>
		<!-- .child-pages -->
	</div><!-- .entry-content -->
</article><!-- #post-## -->