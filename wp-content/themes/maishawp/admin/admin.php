<?php

/***** Theme Info Page *****/

if (!function_exists('maisha_theme_info_page')) {
	function maisha_theme_info_page() {
		add_theme_page(esc_html__('Welcome to Maisha', 'maisha'), esc_html__('Theme Info', 'maisha'), 'edit_theme_options', 'blog', 'maisha_display_theme_page');
	}
}
add_action('admin_menu', 'maisha_theme_info_page');

if (!function_exists('maisha_display_theme_page')) {
	function maisha_display_theme_page() {
		$theme_data = wp_get_theme(); ?>
		<div class="theme-info-wrap">
			<h1>
				<?php printf(esc_html__('Welcome to %1s %2s', 'maisha'), $theme_data->Name, $theme_data->Version); ?>
			</h1>

			<p>
				<a href="<?php echo esc_url('http://www.anarieldesign.com/themes/non-profit-wordpress-theme/'); ?>" target="_blank" class="button button-primary">
					<?php esc_html_e('Find more about Maisha', 'maisha'); ?>
				</a>
			</p>
		<div class="ad-row clearfix">
			<div class="ad-col-1-2">
				<div class="section">
					<div class="theme-description">
						<?php echo esc_html($theme_data['Description']); ?>
					</div>
				</div>
			</div>
			<div class="ad-col-1-2">
				<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="<?php esc_html_e('Theme Screenshot', 'maisha'); ?>" />
			</div></div>
			<hr>
			<div id="getting-started" class="bg">
				<h3>
					<?php printf(esc_html__('Getting Started with %s', 'maisha'), $theme_data->Name); ?>
				</h3>
				<div class="ad-row clearfix">
						<div class="section documentation">
							<h4>
								<?php esc_html_e('Theme Documentation', 'maisha'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('Please check the documentation to get better overview of how the theme is structured.', 'maisha'), $theme_data->Name); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('http://www.anarieldesign.com/documentation/maisha/'); ?>" target="_blank" class="button button-primary">
									<?php esc_html_e('Visit Documentation', 'maisha'); ?>
								</a>
							</p>
						</div>
						<div class="section options">
							<h4>
								<?php esc_html_e('Theme Options', 'maisha'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('Click "Customize" to open the Customizer. Maisha has implemented Customizer and added some useful options to help you style theme background, color elements, upload image logo, to choose different blog layouts and a lot more.',  'maisha'), $theme_data->Name); ?>
							</p>
							<p>
								<a href="<?php echo admin_url('customize.php'); ?>" class="button button-secondary">
									<?php esc_html_e('Customize', 'maisha'); ?>
								</a>
							</p>
						</div>
						<div class="section video">
							<h4>
								<?php esc_html_e('Maisha Video Presentation', 'maisha'); ?>
							</h4>
							<p>
								<a href="<?php echo esc_url('https://www.youtube.com/watch?v=ghkO-luikII'); ?>" class="button button-primary" target="_blank">
									<?php esc_html_e('Video Presentation', 'maisha'); ?>
								</a>
							</p>
						</div>
						<div class="section recommend clear">
							<h4>
								<?php esc_html_e('Recommended Plugins', 'maisha'); ?>
							</h4>
							<p class="center"><?php esc_html_e('Plugins listed are not mandatory for theme to work! Install only the ones you need for your website!', 'maisha'); ?></p>
							<!-- Give -->
							<div class="maisha-tab-pane-half maisha-tab-pane-first-half">
							<p><strong><?php esc_html_e( 'Give', 'maisha' ); ?></strong></p>
							<p><?php esc_html_e( 'The most robust, flexible, and intuitive way to accept donations on WordPress.', 'maisha' ); ?></p>

							<?php if ( is_plugin_active( 'give/give.php' ) ) { ?>

							<p><span class="maisha-w-activated button"><?php esc_html_e( 'Already activated', 'maisha' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=give' ), 'install-plugin_give' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Give', 'maisha' ); ?></a></p>

							<?php
							}

							?>
							<!-- WooCommerce -->
							<p><strong><?php esc_html_e( 'WooCommerce', 'maisha' ); ?></strong></p>
							<p><?php esc_html_e( 'An e-commerce toolkit that helps you sell anything. Beautifully.', 'maisha' ); ?></p>

							<?php if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) { ?>

							<p><span class="maisha-w-activated button"><?php esc_html_e( 'Already activated', 'maisha' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=woocommerce' ), 'install-plugin_woocommerce' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install WooCommerce', 'maisha' ); ?></a></p>

							<?php
							}

							?>
							<!-- BuddyPress -->
							<p><strong><?php esc_html_e( 'BuddyPress', 'maisha' ); ?></strong></p>
							<p><?php esc_html_e( 'BuddyPress helps you build any type of community website using WordPress, with member profiles, activity streams, user groups, messaging, and more.', 'maisha' ); ?></p>

							<?php if ( is_plugin_active( 'buddypress/bp-loader.php' ) ) { ?>

							<p><span class="maisha-activated button"><?php esc_html_e( 'Already activated', 'maisha' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=buddypress' ), 'install-plugin_buddypress' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install BuddyPress', 'maisha' ); ?></a></p>

							<?php
							}

							?>
							<!-- bbPress -->
							<p><strong><?php esc_html_e( 'bbPress', 'maisha' ); ?></strong></p>
							<p><?php esc_html_e( 'bbPress is forum software with a twist from the creators of WordPress.', 'maisha' ); ?></p>

							<?php if ( is_plugin_active( 'bbpress/bbpress.php' ) ) { ?>

							<p><span class="maisha-activated button"><?php esc_html_e( 'Already activated', 'maisha' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=bbpress' ), 'install-plugin_bbpress' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install bbPress', 'maisha' ); ?></a></p>

							<?php
							}

							?>

							<!-- PeepSo -->
							<p><strong><?php esc_html_e( 'PeepSo', 'maisha' ); ?></strong></p>
							<p><?php esc_html_e( 'The Next Generation Social Networking', 'maisha' ); ?></p>

							<?php if ( is_plugin_active( 'peepso-core/peepso.php' ) ) { ?>

							<p><span class="maisha-activated button"><?php esc_html_e( 'Already activated', 'maisha' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=peepso-core' ), 'install-plugin_peepso-core' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install PeepSo', 'maisha' ); ?></a></p>

							<?php
							}

							?>

							<!-- Contact Form 7 -->
							<p><strong><?php esc_html_e( 'Contact Form 7', 'maisha' ); ?></strong></p>
							<p><?php esc_html_e( 'Just another contact form plugin. Simple but flexible.', 'maisha' ); ?></p>

							<?php if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) { ?>

							<p><span class="maisha-activated button"><?php esc_html_e( 'Already activated', 'maisha' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=contact-form-7' ), 'install-plugin_contact-form-7' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Contact Form 7', 'maisha' ); ?></a></p>

							<?php
							}

							?>
							</div>

							<div class="maisha-tab-pane-half">
							<!-- The Events Calendar -->
							<p><strong><?php esc_html_e( 'The Events Calendar', 'maisha' ); ?></strong></p>
							<p><?php esc_html_e( 'The Events Calendar is a carefully crafted, extensible plugin that lets you easily share your events. Beautiful. Solid. Awesome.', 'maisha' ); ?></p>

							<?php if ( is_plugin_active( 'the-events-calendar/the-events-calendar.php' ) ) { ?>

							<p><span class="maisha-activated button"><?php esc_html_e( 'Already activated', 'maisha' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=the-events-calendar' ), 'install-plugin_the-events-calendar' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install The Events Calendar', 'maisha' ); ?></a></p>

							<?php
							}

							?>
							<!-- Widget Visibility -->
							<p><strong><?php esc_html_e( 'Widget Visibility', 'maisha' ); ?></strong></p>
							<p><?php esc_html_e( 'Control which pages your widgets appear on WordPress', 'maisha' ); ?></p>

							<?php if ( is_plugin_active( 'widget-visibility/widget-visibility.php' ) ) { ?>

							<p><span class="maisha-activated button"><?php esc_html_e( 'Already activated', 'maisha' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=widget-visibility' ), 'install-plugin_widget-visibility' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Widget Visibility', 'maisha' ); ?></a></p>

							<?php
							}

							?>

							<!-- Page Builder by SiteOrigin -->
							<p><strong><?php esc_html_e( 'Page Builder by SiteOrigin', 'maisha' ); ?></strong></p>
							<p><?php esc_html_e( 'A drag and drop, responsive page builder that simplifies building your website.', 'maisha' ); ?></p>

							<?php if ( is_plugin_active( 'siteorigin-panels/siteorigin-panels.php' ) ) { ?>

							<p><span class="maisha-activated button"><?php esc_html_e( 'Already activated', 'maisha' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=siteorigin-panels' ), 'install-plugin_siteorigin-panels' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Page Builder by SiteOrigin', 'maisha' ); ?></a></p>

							<?php
							}

							?>

							<!-- SiteOrigin Widgets Bundle -->
							<p><strong><?php esc_html_e( 'SiteOrigin Widgets Bundle', 'maisha' ); ?></strong></p>
							<p><?php esc_html_e( 'A collection of all widgets, neatly bundled into a single plugin.', 'maisha' ); ?></p>

							<?php if ( is_plugin_active( 'so-widgets-bundle/so-widgets-bundle.php' ) ) { ?>

							<p><span class="maisha-activated button"><?php esc_html_e( 'Already activated', 'maisha' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=so-widgets-bundle' ), 'install-plugin_so-widgets-bundle' ) ); ?>" class="button button-primary"><?php esc_html_e( 'SiteOrigin Widgets Bundle', 'maisha' ); ?></a></p>

							<?php
							}

							?>
							<!-- Premium Soliloquy Slider -->
							<p><strong><?php esc_html_e( 'Premium Soliloquy Slider', 'maisha' ); ?></strong></p>

							<?php if ( is_plugin_active( 'soliloquy/soliloquy.php' ) ) { ?>

							<p><span class="maisha-activated button"><?php esc_html_e( 'Already activated', 'maisha' ); ?></span></p>

							<?php
							}
							else { ?>

							<p class="bg2"><?php esc_html_e( 'Plugin & license key can be found inside the plugins folder within the main folder you downloaded', 'maisha' ); ?></p>

							<?php
							}
							?>
							<!-- Custom Google Fonts Plugin -->
							<p><strong><?php esc_html_e( 'Custom Google Fonts Plugin', 'maisha' ); ?></strong></p>

							<?php if ( is_plugin_active( 'AnarielDesign-GoogleFonts/ad_gfp.php' ) ) { ?>

							<p><span class="maisha-activated button"><?php esc_html_e( 'Already activated', 'maisha' ); ?></span></p>

							<?php
							}
							else { ?>

							<p class="bg2"><?php esc_html_e( 'Plugin can be found inside the plugins folder within the main folder you downloaded', 'maisha' ); ?></p>

							<?php
							}
							?>
							</div>
						</div>
						<div class="clear"></div>
						<div class="section bg1">
							<h3>
								<?php esc_html_e('More Themes by Anariel Design', 'maisha'); ?>
							</h3>
							<p class="about">
								<?php printf(esc_html__('Build Your Dream WordPress Site with Premium Niche Themes for Bloggers & Charities',  'maisha'), $theme_data->Name); ?>
							</p>
							<a target="_blank" href="<?php echo esc_url('http://www.anarieldesign.com/themes/'); ?>"><img src="http://www.anarieldesign.com/themedemos/marketimages/anarieldesign-themes.jpg" alt="<?php esc_html_e('Theme Screenshot', 'maisha'); ?>" /></a>
							<p>
								<a target="_blank" href="<?php echo esc_url('http://www.anarieldesign.com/themes/'); ?>" class="button button-primary advertising">
									<?php esc_html_e('More Themes', 'maisha'); ?>
								</a>
							</p>
						</div>
					</div>
			</div>
			<hr>
			<div id="theme-author">
				<p>
					<?php printf(esc_html__('%1s is proudly brought to you by %2s. %3s: %4s.', 'maisha'), $theme_data->Name, '<a target="_blank" href="http://www.anarieldesign.com/" title="Anariel Design">Anariel Design</a>', $theme_data->Name, '<a target="_blank" href="http://www.anarieldesign.com/themes/non-profit-wordpress-theme/" title="Maisha Theme Demo">' . esc_html__('Theme Demo', 'maisha') . '</a>'); ?>
				</p>
			</div>
		</div><?php
	}
}

?>