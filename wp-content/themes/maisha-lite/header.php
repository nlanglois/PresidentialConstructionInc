<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Maisha
 * @since Maisha 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="headerblock standard">
		<div class="content site-content">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'maisha-lite' ); ?></a>
			<header id="masthead" class="site-header" role="banner">
				<div class="header-inner">
					<?php maisha_the_custom_logo(); ?>
					<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; ?></p>
					<?php endif; ?>
				<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<div id="secondary">
					<nav id="site-navigation" class="navigation-main" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span><?php esc_html_e( 'Primary Menu', 'maisha-lite' ); ?></span></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'nav-menu' ) ); ?>
					</nav><!-- #site-navigation -->
					</div>
				<?php endif; ?>
				</div>
			</header><!-- .site-header -->
		</div><!-- .site-content -->
	</div><!-- .headerblock -->
<?php if ( is_home() ) : ?>
<div class="aboutpage">
	<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) { ?>
		<div class="cd-fixed-bg-one cd-bg-1" style="background-image:url(<?php echo esc_url(header_image()); ?>);">
		<span class="overlay"></span>
		</div>
	<?php } ?>
</div>
<?php endif; ?>
<?php if ( has_nav_menu( 'social' ) ) : ?>
	<nav id="social-navigation" class="social-navigation" role="navigation">
		<?php
			// Social links navigation menu.
			wp_nav_menu( array(
				'theme_location' => 'social',
				'depth'		  => 1,
				'link_before'	=> '<span class="screen-reader-text">',
				'link_after'	 => '</span>',
			) );
		?>
	</nav><!-- .social-navigation -->
<?php endif; ?>