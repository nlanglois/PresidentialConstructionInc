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
			<div class="cd-fixed-bg cd-bg-1" style="background-image:url(<?php echo esc_url( $image_url[0] ); ?>);">
			<?php if($post->post_content=="") : ?>
			<?php else : ?>
			<div class="content-caption">
				<div class="entry-content">
					<div class="cd-main-content">
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
					</div>
				</div><!-- .entry-content -->
			</div><!-- .content-caption -->
			<?php endif; ?>
			</div>
		</article><!-- #post-## -->
	</div><!-- .homepage -->   