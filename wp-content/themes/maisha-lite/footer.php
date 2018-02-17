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
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer">
			<div class="site-info">
				<div class="hfeed site">
					<div class="content site-content">
						<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
							<?php get_sidebar( 'footer' ); ?>
						<?php endif; ?>
						<div class="copyright">
							<a href="https://www.anarieldesign.com/maisha-lite-free-wordpress-theme/"><?php printf( esc_html__( 'Theme: %1$s.', 'maisha-lite' ), 'Maisha Lite designed by Anariel Design' ); ?></a>
						</div>
					</div><!-- .footerwidgets -->
				</div><!-- .site-info -->
			</div><!-- .page -->
		</div><!-- .footer -->
	</footer><!-- .site-footer -->

<?php wp_footer(); ?>

</body>
</html>