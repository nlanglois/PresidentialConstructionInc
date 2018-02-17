<?php
/**
 * The template used for displaying front page content
 *
 * @package Maisha
 * @since Maisha 1.0
 */
?>
	<div class="homepage">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php $image_id = get_post_thumbnail_id(); ?>
			<?php $image_url = wp_get_attachment_image_src($image_id,'full');   ?>
			<div class="cd-fixed-bg cd-bg-1" style="background-image:url(<?php echo esc_url( $image_url[0] ); ?>);"></div>
			<?php if($post->post_content=="") : ?>
			<?php else : ?>
			<div class="content-caption">
				<div class="entry-content">
					<div class="cd-main-content">
					<?php the_content(); ?>
					<?php edit_post_link( esc_html__( 'Edit', 'maisha' ), '<span class="edit-link">', '</span>' ); ?>
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
					</div>
					<div class="cd-panel from-right">
					<header class="cd-panel-header">
						<a href="#0" class="cd-panel-close">Close</a>
					</header>

					<div class="cd-panel-container">
					<div class="cd-panel-content">
					<?php
							$child_pages = new WP_Query( array(
								'post_type'      => 'page',
								'orderby'        => 'menu_order',
								'order'          => 'ASC',
								'post_parent'    => $post->ID,
								'posts_per_page' => 1,
								'no_found_rows'  => true,
							) );
							while ( $child_pages->have_posts() ) : $child_pages->the_post();
								 get_template_part( 'content', 'page' );
							endwhile;
							wp_reset_postdata();
					?>
					</div> <!-- cd-panel-content -->
					</div> <!-- cd-panel-container -->
					</div> <!-- cd-panel -->
				</div><!-- .entry-content -->
			</div><!-- .content-caption -->
			<?php endif; ?>
		</article><!-- #post-## -->
	</div><!-- .homepage -->