<?php
/**
 * Template part for displaying posts.
 *
 * @package Maisha
 */

?>
<div id="give-form-<?php the_ID(); ?>-content" <?php post_class(); ?>>

		<?php
		/**
		 * give_before_single_product_summary hook
		 *
		 * @hooked give_show_product_images - 10
		 */
		do_action( 'give_before_single_form_summary' );
		?>

		<div class="<?php echo apply_filters( 'give_forms_single_summary_classes', 'summary entry-summary' ); ?>">

			<?php
			/**
			 * give_single_form_summary hook
			 *
			 * @hooked give_template_single_title - 5
			 * @hooked give_get_donation_form - 10
			 */
			do_action( 'give_single_form_summary' );
			?>

		</div>
		<!-- .summary -->

		<?php
		/**
		 * give_after_single_form_summary hook
		 */
		do_action( 'give_after_single_form_summary' );
		?>


	</div><!-- #give-form-<?php the_ID(); ?> -->