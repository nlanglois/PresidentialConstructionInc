<?php
/**
 * The template used for displaying child page content
 *
 * @package Maisha
 * @since Maisha 1.0
 */
?>
	<?php $image_id = get_post_thumbnail_id(); ?>
	<?php $image_url = wp_get_attachment_image_src($image_id,'full');   ?>
	<div class="info_pic" style="background-image:url(<?php echo $image_url[0]; ?>);"></div>
	<div class="hfeed site info_details">
		<div class="content site-content">
			<div class="content-area">
				<div class="main site-main" role="main">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
							<div class="entry-innen">
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
						</div><!-- .entry-content -->
					</article><!-- #post-## -->
				</div><!-- .site-main -->
			</div><!-- .content-area -->
		</div><!-- .site-content -->
	</div><!-- .site -->