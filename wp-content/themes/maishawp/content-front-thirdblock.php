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
		<?php if ( has_post_thumbnail() ): ?>
		<div class="one_third">
		<?php
		// Post thumbnail.
		maisha_post_thumbnail();
		?>
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
		</div>
		<div class="two_third lastcolumn">
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
					 get_template_part( 'content', 'icon-list' );
				endwhile;
				wp_reset_postdata();
			?>
		</div>
		<?php elseif($post->post_content != "") : ?>
		<div class="one_third">
		<?php
		// Post thumbnail.
		maisha_post_thumbnail();
		?>
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
		</div>
		<div class="two_third lastcolumn">
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
					 get_template_part( 'content', 'icon-list' );
				endwhile;
				wp_reset_postdata();
			?>
		</div>
		<?php else : ?>
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
				 get_template_part( 'content', 'icon-list' );
			endwhile;
			wp_reset_postdata();
		?>
		<?php endif; ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->