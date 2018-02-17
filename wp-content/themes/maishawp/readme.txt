= Maisha =

* by Anariel Design, http://www.anarieldesign.com

- this theme is based on Twenty Fifteen: https://wordpress.org/themes/twentyfifteen
License: Distributed under the terms of the GNU GPL
Copyright: Automattic, automattic.com

Maisha is distributed under the terms of the GNU GPL


1.6.0 - November 17, 2017

- small fix for the one-click demo import

1.5.9 - November 3, 2017

- added one click demo install
- improved Customizer options and functions
- added few more useful options to style front page and inner pages inside the Customizer like "Image Opacity", parallax effect to the top image on inner pages etc.

1.5.8 - October 4, 2017

- added new options inside the Customizer for the Staff Page - columns and top header image
- added new options inside the Customizer for the Front Page - child page title link and featured image link

1.5.7 - August 1, 2017

- added new template Page with Left Sidebar
- added class color to create a menu item with the orange background - perfect for the donation button

1.5.6 - July 28, 2017

- added support for the PeepSo plugin - social networking plugin for WordPress
- fix for the Google fonts plugin inside the plugins folder

1.5.5 - July 24, 2017

- Front Page - new options like add parallax effect to the background images, choose number of columns for child pages
- About, Projects, Causes, Stories Page - added option to choose number of column
- Inner Pages Title Block Height - change the height of the Pages with Title and Tagline and Pages with Title only
- Copyright Settings - added Scroll To Top button per default - you can disable it inside the Customizer - Copyright Settings
- added Extra Page template with the page title and tagline as a main page and child pages in one column
- fix for the link color inside the posts 
- added new option for the blog and single blog page inside the Customizer - disable featured image 
- added post thumbnails image sizes for the recent post and child page featured images on the different pages - better website performance 


1.5.3 - 1.5.4 - June 02, 2017

- fix inside the widgets.php file for the “One Image Banner” & “Two Image Banner” widgets fix for the empty image link in case you don’t want to have a link
- fix for the search top margin when fixed header is in the use


1.5.2 - May 29, 2017

- custom Logo option deprecated and added to core Site Identity section inside the Customizer
- show WooCommerce options in the Customizer only if user activates the WooCommerce   plugin 
- all color options moved to Custom Colors section inside the Customizer 
- small fix for the google font plugin
- footer “sticks” to the bottom if the content on the page is short
- added “Search Position on Desktop - Margin Top” inside the Customizer - Search Box

1.5.1 - April 03, 2017
- small fixes for the Events Calendar inside the style.css file 

1.5 - March 29, 2017
- added new option inside the Customizer for the Inner Pages Title Block Height & for the content link color inside the Custom Colors
- added new blank-page.php template - support for the Beaver Builder and Elementor
- small fixes inside the style.css file 

1.4 - December 8, 2016
- from WordPress 4.7 Customizer “Custom CSS” section migrated to the core Customizer section called “Additional CSS” - changes inside the inc folder “customizer.php” file

1.3 - September 29, 2016
- small fix inside the style.css - fix for the mobile menu when menu item has children and footer spacing on the front page  

1.2.9 - September 1, 2016
- small fix inside the style.css for the button on the about page

1.2.8 - July 28, 2016
- small clearings inside the style.css
- custom Google Fonts plugin is added to the “plugins” folder inside the main download folder
1.2.7 - July 12, 2016
- fix for the menu on the @media screen and (max-width: 955px) inside the style.css
- better Give plugin support - theme is styled for the Give donation plugin, new Give causes page - changes inside the style.css, added “give” folder and archive-give_forms.php file 
1.2.6 - June 14,2016

- fixed tags inside the style.css - new tags added 
- clearing code inside the content.php, content-link.php and content-post-grid.php files -simplified code

1.2.5 - March 29,2016

- fix inside content-post-grid.php file for the full width and excerpt option for the grid blog layouts
- fix inside the style.css for the menu on mobiles when title and tagline are present

1.2.4 - March 5,2016

- fix for the footer on the shop page. Changes inside the “inc” folder - maisha_customizer_style.php file

1.2.3 - January 29,2016

- fix for the drop down menu - accessibility. Changes inside the style.css file

1.2.2 - December 6,2015

-added WooCommerce Options inside the Customizer to be able to choose to have sidebar on WooCommerce shop and single product page. Changes inside the functions.php and style.css and “inc” folder customizer.php,veggie_customizer_style.css files. Removed woocommerce.php file.

Version 1.2.1 - October 30 2015.
1. new page template “Default Page without Featured Image” - inside the “page-templates” folder added default-one-page.php file
2. inside the style.css added:
.page-template-default-one-page .default-page .site-content {
	padding-top: 4%;
}

Version 1.2 - October 19 2015.
Removed the max,min width and height for the logo. If you are using fixed or standard header please upload logo 61px heigh. This way the header will look best. For the alternative header you can upload image in any size you want.
1. style.css - small change for the footer color text (accessibility-ready) and different changes for the header layouts
2. small changes inside the header.php and header-custom.php file

Version 1.1 - September 9 2015.
1. style.css - small fix for the search input text color.
Added: 
.search-box [type="search"]:focus {
	color: #fff;
}
2. fix for the Deprecating PHP4 style constructors in WordPress 4.3

Version 1.0.9 - August 13 2015.
1. small fix for the Post Display - Excerpt on the single post. Added content-single.php file and small fix inside the single.php file

Version 1.0.8 - August 10 2015.
1. small fix for the full grid archive layout inside the archive.php file
2. content-third-block.php changed - Front Page - Third Content Block - if you don’t upload featured image on the left the child pages will fill the full width content.

Version 1.0.7 - August 4 2015.
1. small fixes inside style.css and css/editor-style.css files for the fixed header on the smaller devices

Version 1.0.6 - August 2 2015.
1. small changes inside style.css, header.php, header-custom.php, footer.php and js/navigation.js files - accessibility fixes
2. small fix inside the functions.php file:
instead of:
wp_enqueue_script( 'maisha-search', get_template_directory_uri() . '/js/search.js', array(), '1.0', true );
added:
wp_enqueue_script( 'maisha-search', get_template_directory_uri() . '/js/search.js', array( 'jquery' ), '1.0', true );

Version 1.0.5 - July 19 2015.
1. inside page.php, content-quote.php, content-grid-page.php, content-front-secondblock.php, content-front-page.php, content-about-secondblock.php, content-about-page.php, full-width-page.php, basic-page.php : 
<?php $image_url = wp_get_attachment_image_src($image_id,’small);?> changed with <?php $image_url = wp_get_attachment_image_src($image_id,’full’);   ?>

2. small changes inside the header.php, header-custom.php and style.css files - better styled search block

3. small fix inside the inc/maisha_custmoizer_style.php for the social menu on small devices

Version 1.0.4 - July 10 2015.
1. fix for widget call (from WordPress 4.3) inside the inc folder widgets.php file - fix for Use parent::__construct() instead of $this->WP_Widget().

2. added new feature inside the Customizer - you can choose to display excerpt or full length for your post

3. added new page template - “Basic Page” - you can use this template if you want to create pages using page builder like free Page Builder by SiteOrigin

Version 1.0.3 - June 29, 2015
- small changes inside the inc/widgets.php, content-front-secondblock.php and style.css files: 1. fix for the Maisha custom recent post widgets if you add widget title
       2. if you add more content for the second block on the front page background will adapt with the height
       3. search box z-index fix if your fixed header is higher
Version 1.0.2 - June 19, 2015
- added search box option. Changes are done inside the header.php, header-custom.php, inl/customizer.php, inc/maisha_customizer_style.php, functions.php and js/search.js (new file)
- added styles inside the style.css file
Version 1.0.1 - June 08, 2015
- inside the “header-custom.php” file we changed this line:
  echo '<h1>'.get_page($blog_page_id)->post_title.'</h1>';
  with:
  echo '<h1>'.get_post(($blog_page_id))->post_title.'</h1>';
-inside the style.css we added this:
@media screen and (max-width: 59.6875em) {
.page-template-full-width-page .cd-fixed-bg {
min-height: 300px;
}
}
@media screen and (max-width: 48.75em) {
.page-template-full-width-page .cd-fixed-bg {
min-height: 200px;
}
}