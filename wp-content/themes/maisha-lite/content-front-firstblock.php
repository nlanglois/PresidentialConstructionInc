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
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title">', esc_url( get_permalink() ) ), '</h2>' );
			endif;
		?>
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
		<div class="child-pages columns clear">
			<?php
				$child_pages = new WP_Query( array(
					'post_type'	  => 'page',
					'orderby'		=> 'menu_order',
					'order'		  => 'ASC',
					'post_parent'	=> $post->ID,
					'posts_per_page' => 999,
					'no_found_rows'  => true,
				) );
				while ( $child_pages->have_posts() ) : $child_pages->the_post();
					 get_template_part( 'content', 'grid' );
				endwhile;
				wp_reset_postdata();
			?>
		</div>
		<!-- .child-pages -->
	</div><!-- .entry-content -->
</article><!-- #post-## -->