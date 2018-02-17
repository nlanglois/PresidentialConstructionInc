<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package Maisha
 * @since Maisha 1.0
 */
?>
	</div><!-- #site -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer">
			<div class="site-info">
				<div class="hfeed site">
					<div class="content site-content">
						<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
							<?php get_sidebar( 'footer' ); ?>
						<?php endif; ?>
						<div class="copyright">
						<?php if( get_theme_mod( 'hide_copyright' ) == '') { ?>
						<?php
							/**
							 * Fires before the Maisha footer text for footer customization.
							 *
							 * @since Maisha 1.0
							 */
							do_action( 'maisha_credits' );
						?>
						<?php esc_attr_e('&copy;', 'maisha'); ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"> <?php echo esc_textarea ( get_theme_mod( 'maisha_copyright', 'Maisha Theme by Anariel Design.' ) ); ?> </a>
						<?php } // end if ?>

						<?php if ( get_theme_mod( 'maisha_scrolltotop', true ) ) { ?>
							<a class="scroll-to-top" href="#"></a>
						<?php } ?>
						</div>
					</div><!-- .footerwidgets -->
				</div><!-- .site-info -->
			</div><!-- .page -->
		</div><!-- .footer -->
		<?php if ( has_nav_menu( 'social' ) ) : ?>
			<nav id="social-navigation" class="social-navigation" role="navigation">
				<?php
					// Social links navigation menu.
					wp_nav_menu( array(
						'theme_location' => 'social',
						'depth'          => 1,
						'link_before'    => '<span class="screen-reader-text">',
						'link_after'     => '</span>',
					) );
				?>
			</nav><!-- .social-navigation -->
		<?php endif; ?>
	</footer><!-- .site-footer -->

<?php wp_footer(); ?>

</body>
</html>