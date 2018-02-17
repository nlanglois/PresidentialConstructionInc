<?php
/**
 * Available Maisha Custom Widgets
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package Maisha
 * @since Maisha 1.0
 */
/*-----------------------------------------------------------------------------------*/
/* Custom Maisha Widget: Front Page Three Columns Recent Posts
/*-----------------------------------------------------------------------------------*/
class maisha_threecolumn_recentposts extends WP_Widget {
	function __construct() {
		$widget_ops = array('description' => esc_html__( '3 Column Recents Posts Widget with Featured Images.', 'maisha') );
		parent::__construct(false, esc_html__('Maisha Front Page: 3 Column Recent Posts', 'maisha'),$widget_ops);
	}
	function widget($args, $instance) {
		$title = apply_filters('widget_title', $instance['title'] );
		$postnumber = $instance['postnumber'];
		$category = apply_filters('widget_title', $instance['category']);
		echo $args['before_widget']; ?>
		<?php if( ! empty( $title ) )
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html($title) .'</span></h3></div>'; ?>
<?php
// The Query
$recent_query = new WP_Query(array (
		'post_status'	=> 'publish',
		'posts_per_page' => $postnumber,
		'ignore_sticky_posts' => 1,
		'category_name' => $category,
	) );
?>
<?php
// The Loop
if($recent_query->have_posts()) : ?>
	<div class="clearfix">
	<?php while($recent_query->have_posts()) : $recent_query->the_post() ?>
	<div class="threecolumn clearfix">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-content">
				<figure>
				<a href="<?php the_permalink(); ?>">
				<?php
				// Post thumbnail.
				maisha_post_thumbnail();
				?>
				</a>
				<figcaption>
				<header class="entry-header">
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				</header><!-- .entry-header -->
				<?php edit_post_link( esc_html__( 'Edit', 'maisha' ), '<span class="edit-link">', '</span>' ); ?>
				</figcaption>
				</figure>
			</div>
		</article><!-- #post-## -->
	</div>
	<?php endwhile ?>
	</div>
<?php endif ?>
		<?php
		echo $args['after_widget'];
		// Reset the post globals as this query will have stomped on it
		wp_reset_postdata();
		}
	function update($new_instance, $old_instance) {
			$instance['title'] = $new_instance['title'];
			$instance['postnumber'] = $new_instance['postnumber'];
			$instance['category'] = $new_instance['category'];
		return $new_instance;
	}
	function form($instance) {
			$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
			$postnumber = isset( $instance['postnumber'] ) ? esc_attr( $instance['postnumber'] ) : '3';
			$category = isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
		?>
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:','maisha'); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id('postnumber'); ?>"><?php esc_html_e('Number of posts to show:','maisha'); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name('postnumber') ); ?>" value="<?php echo esc_attr($postnumber); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('postnumber') ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id('category'); ?>"><?php esc_html_e('Category slug (optional, separate multiple categories by comma):','maisha'); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name('category') ); ?>" value="<?php echo esc_attr($category); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('category') ); ?>" /></p>
	<?php
	}
}
register_widget('maisha_threecolumn_recentposts');

/*-----------------------------------------------------------------------------------*/
/* Custom Maisha Widget: Front Page Four Columns Recent Posts
/*-----------------------------------------------------------------------------------*/
class maisha_column_recentposts extends WP_Widget {
	function __construct() {
		$widget_ops = array('description' => esc_html__( '4 Column Recents Posts Widget with Featured Images.', 'maisha') );
		parent::__construct(false, esc_html__('Maisha Front Page: 4 Column Recent Posts', 'maisha'),$widget_ops);
	}
	function widget($args, $instance) {
		$title = apply_filters('widget_title', $instance['title'] );
		$postnumber = $instance['postnumber'];
		$category = apply_filters('widget_title', $instance['category']);
		echo $args['before_widget']; ?>
		<?php if( ! empty( $title ) )
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html($title) .'</span></h3></div>'; ?>
<?php
// The Query
$recent_query = new WP_Query(array (
		'post_status'	=> 'publish',
		'posts_per_page' => $postnumber,
		'ignore_sticky_posts' => 1,
		'category_name' => $category,
	) );
?>
<?php
// The Loop
if($recent_query->have_posts()) : ?>
	<div class="clearfix">
	<?php while($recent_query->have_posts()) : $recent_query->the_post() ?>
	<div class="fourcolumn">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-content">
				<figure>
				<a href="<?php the_permalink(); ?>">
				<?php
				// Post thumbnail.
				maisha_post_thumbnail();
				?>
				</a>
				<figcaption>
				<header class="entry-header">
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				</header><!-- .entry-header -->
				<?php edit_post_link( esc_html__( 'Edit', 'maisha' ), '<span class="edit-link">', '</span>' ); ?>
				</figcaption>
				</figure>
			</div>
		</article><!-- #post-## -->
	</div>
	<?php endwhile ?>
	</div>
<?php endif ?>
		<?php
		echo $args['after_widget'];
		// Reset the post globals as this query will have stomped on it
		wp_reset_postdata();
		}
	function update($new_instance, $old_instance) {
			$instance['title'] = $new_instance['title'];
			$instance['postnumber'] = $new_instance['postnumber'];
			$instance['category'] = $new_instance['category'];
		return $new_instance;
	}
	function form($instance) {
			$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
			$postnumber = isset( $instance['postnumber'] ) ? esc_attr( $instance['postnumber'] ) : '4';
			$category = isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
		?>
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:','maisha'); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" /></p>
	<p><label for="<?php echo esc_attr( $this->get_field_id('postnumber') ); ?>"><?php esc_html_e('Number of posts to show:','maisha'); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name('postnumber') ); ?>" value="<?php echo esc_attr($postnumber); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('postnumber') ); ?>" /></p>
	<p><label for="<?php echo esc_attr( $this->get_field_id('category') ); ?>"><?php esc_html_e('Category slug (optional, separate multiple categories by comma):','maisha'); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name('category') ); ?>" value="<?php echo esc_attr($category); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('category') ); ?>" /></p>
	<?php
	}
}
register_widget('maisha_column_recentposts');

/*-----------------------------------------------------------------------------------*/
/* Custom Maisha Widget: Front Page Five Columns Recent Posts
/*-----------------------------------------------------------------------------------*/
class maisha_fivecolumn_recentposts extends WP_Widget {
	function __construct() {
		$widget_ops = array('description' => esc_html__( '5 Column Recents Posts Widget with Featured Images.', 'maisha') );
		parent::__construct(false, esc_html__('Maisha Front Page: 5 Column Recent Posts', 'maisha'),$widget_ops);
	}
	function widget($args, $instance) {
		$title = apply_filters('widget_title', $instance['title'] );
		$postnumber = $instance['postnumber'];
		$category = apply_filters('widget_title', $instance['category']);
		echo $args['before_widget']; ?>
		<?php if( ! empty( $title ) )
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html($title) .'</span></h3></div>'; ?>
<?php
// The Query
$recent_query = new WP_Query(array (
		'post_status'	=> 'publish',
		'posts_per_page' => $postnumber,
		'ignore_sticky_posts' => 1,
		'category_name' => $category,
	) );
?>
<?php
// The Loop
if($recent_query->have_posts()) : ?>
	<div class="clearfix">
	<?php while($recent_query->have_posts()) : $recent_query->the_post() ?>
	<div class="fivecolumn clearfix">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-content">
				<figure>
				<a href="<?php the_permalink(); ?>">
				<?php
				// Post thumbnail.
				maisha_post_thumbnail();
				?>
				</a>
				<figcaption>
				<header class="entry-header">
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				</header><!-- .entry-header -->
				<?php edit_post_link( esc_html__( 'Edit', 'maisha' ), '<span class="edit-link">', '</span>' ); ?>
				</figcaption>
				</figure>
			</div>
		</article><!-- #post-## -->
	</div>
	<?php endwhile ?>
	</div>
<?php endif ?>
		<?php
		echo $args['after_widget'];
		// Reset the post globals as this query will have stomped on it
		wp_reset_postdata();
		}
	function update($new_instance, $old_instance) {
			$instance['title'] = $new_instance['title'];
			$instance['postnumber'] = $new_instance['postnumber'];
			$instance['category'] = $new_instance['category'];
		return $new_instance;
	}
	function form($instance) {
			$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
			$postnumber = isset( $instance['postnumber'] ) ? esc_attr( $instance['postnumber'] ) : '5';
			$category = isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
		?>
	<p><label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title:','maisha'); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" /></p>
	<p><label for="<?php echo esc_attr( $this->get_field_id('postnumber') ); ?>"><?php esc_html_e('Number of posts to show:','maisha'); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name('postnumber') ); ?>" value="<?php echo esc_attr($postnumber); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('postnumber') ); ?>" /></p>
	<p><label for="<?php echo esc_attr( $this->get_field_id('category') ); ?>"><?php esc_html_e('Category slug (optional, separate multiple categories by comma):','maisha'); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name('category') ); ?>" value="<?php echo esc_attr($category); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('category') ); ?>" /></p>
	<?php
	}
}
register_widget('maisha_fivecolumn_recentposts');

/*-----------------------------------------------------------------------------------*/
/* Custom Maisha Widget: Front Page Six Columns Recent Posts
/*-----------------------------------------------------------------------------------*/
class maisha_sixcolumn_recentposts extends WP_Widget {
	function __construct() {
		$widget_ops = array('description' => esc_html__( '6 Column Recents Posts Widget with Featured Images.', 'maisha') );
		parent::__construct(false, esc_html__('Maisha Front Page: 6 Column Recent Posts', 'maisha'),$widget_ops);
	}
	function widget($args, $instance) {
		$title = apply_filters('widget_title', $instance['title'] );
		$postnumber = $instance['postnumber'];
		$category = apply_filters('widget_title', $instance['category']);
		echo $args['before_widget']; ?>
		<?php if( ! empty( $title ) )
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html($title) .'</span></h3></div>'; ?>
<?php
// The Query
$recent_query = new WP_Query(array (
		'post_status'	=> 'publish',
		'posts_per_page' => $postnumber,
		'ignore_sticky_posts' => 1,
		'category_name' => $category,
	) );
?>
<?php
// The Loop
if($recent_query->have_posts()) : ?>
	<div class="clearfix">
	<?php while($recent_query->have_posts()) : $recent_query->the_post() ?>
	<div class="sixcolumn clearfix">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-content">
				<figure>
				<a href="<?php the_permalink(); ?>">
				<?php
				// Post thumbnail.
				maisha_post_thumbnail();
				?>
				</a>
				<figcaption>
				<header class="entry-header">
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				</header><!-- .entry-header -->
				<?php edit_post_link( esc_html__( 'Edit', 'maisha' ), '<span class="edit-link">', '</span>' ); ?>
				</figcaption>
				</figure>
			</div>
		</article><!-- #post-## -->
	</div>
	<?php endwhile ?>
	</div>
<?php endif ?>
		<?php
		echo $args['after_widget'];
		// Reset the post globals as this query will have stomped on it
		wp_reset_postdata();
		}
	function update($new_instance, $old_instance) {
			$instance['title'] = $new_instance['title'];
			$instance['postnumber'] = $new_instance['postnumber'];
			$instance['category'] = $new_instance['category'];
		return $new_instance;
	}
	function form($instance) {
			$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
			$postnumber = isset( $instance['postnumber'] ) ? esc_attr( $instance['postnumber'] ) : '6';
			$category = isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
		?>
	<p><label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title:','maisha'); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" /></p>
	<p><label for="<?php echo esc_attr( $this->get_field_id('postnumber') ); ?>"><?php esc_html_e('Number of posts to show:','maisha'); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name('postnumber') ); ?>" value="<?php echo esc_attr($postnumber); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('postnumber') ); ?>" /></p>
	<p><label for="<?php echo esc_attr( $this->get_field_id('category') ); ?>"><?php esc_html_e('Category slug (optional, separate multiple categories by comma):','maisha'); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name('category') ); ?>" value="<?php echo esc_attr($category); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('category') ); ?>" /></p>
	<?php
	}
}
register_widget('maisha_sixcolumn_recentposts');

/*-----------------------------------------------------------------------------------*/
/* Custom Maisha Widget: Sidebar Banners Widget
/*-----------------------------------------------------------------------------------*/
class maisha_one_banner extends WP_Widget {
	function __construct() {
		$widget_ops = array('description' => esc_html__( 'One Image Banner', 'maisha') );
		parent::__construct(false, esc_html__('Maisha Sidebar: One Image Banner', 'maisha'),$widget_ops);
	}
	function widget($args, $instance) {
		$title = null; $imgurl = null; $imgalt = null; $imglink = null;
		if ( ! empty( $instance['title'] ) ) { $title = apply_filters( 'widget_title', $instance['title'] ); }
		if ( ! empty( $instance['imgurl'] ) ) { $imgurl = $instance['imgurl']; }
		if ( ! empty( $instance['imgalt'] ) ) { $imgalt = $instance['imgalt']; }
		if ( ! empty( $instance['imglink'] ) ) { $imglink = $instance['imglink']; }
		echo $args['before_widget']; ?>
		<?php if( ! empty( $title ) )
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html($title) .'</span></h3></div>'; ?>
		<?php if( empty( $imglink ) ) :?>
			<img class="headerimage" src="<?php echo $imgurl; ?>" alt="<?php echo $imgalt; ?>" />
		<?php else : ?> 
		<a href="<?php echo $imglink; ?>"><img class="headerimage" src="<?php echo $imgurl; ?>" alt="<?php echo $imgalt; ?>" /></a>
		<?php endif; ?>
		<?php
		echo $args['after_widget'];
		// Reset the post globals as this query will have stomped on it
		wp_reset_postdata();
		}
	function update($new_instance, $old_instance) {
			$instance['title'] = $new_instance['title'];
			$instance['imgurl'] = $new_instance['imgurl'];
			$instance['imgalt'] = $new_instance['imgalt'];
		$instance['imglink'] = $new_instance['imglink'];
		return $new_instance;
	}
	function form($instance) {
			$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
			$imgurl = isset( $instance['imgurl'] ) ? esc_attr( $instance['imgurl'] ) : '';
			$imgalt = isset( $instance['imgalt'] ) ? esc_attr( $instance['imgalt'] ) : '';
		$imglink = isset( $instance['imglink'] ) ? esc_attr( $instance['imglink'] ) : '';
		?>
	<p><label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title:','maisha'); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" /></p>
	<p><label for="<?php echo esc_attr( $this->get_field_id('imgurl') ); ?>"><?php esc_html_e('Image URL:','maisha'); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name('imgurl') ); ?>" value="<?php echo esc_attr($imgurl); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('imgurl') ); ?>" /></p>
	<p><label for="<?php echo esc_attr( $this->get_field_id('imgalt') ); ?>"><?php esc_html_e('Image ALT:','maisha'); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name('imgalt') ); ?>" value="<?php echo esc_attr($imgalt); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('imgalt') ); ?>" /></p>
	<p><label for="<?php echo esc_attr( $this->get_field_id('imglink') ); ?>"><?php esc_html_e('Image LINK:','maisha'); ?></label>
	<input type="text" name="<?php echo esc_attr($this->get_field_name('imglink') ); ?>" value="<?php echo esc_attr($imglink); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('imglink') ); ?>" /></p>
	<?php
	}
}
register_widget('maisha_one_banner');

/*-----------------------------------------------------------------------------------*/
/* Custom Maisha Widget: Sidebar Banners Widget
/*-----------------------------------------------------------------------------------*/
class maisha_two_banner extends WP_Widget {
	function __construct() {
		$widget_ops = array('description' => esc_html__( 'Two Image Banner', 'maisha') );
		parent::__construct(false, esc_html__('Maisha Sidebar: Two Image Banner', 'maisha'),$widget_ops);
	}
	function widget($args, $instance) {
		$title = null; $imgurl = null; $imgalt = null; $imglink = null; $imgurl_one = null; $imgalt_one = null; $imglink_one = null;
		if ( ! empty( $instance['title'] ) ) { $title = apply_filters( 'widget_title', $instance['title'] ); }
		if ( ! empty( $instance['imgurl'] ) ) { $imgurl = $instance['imgurl']; }
		if ( ! empty( $instance['imgalt'] ) ) { $imgalt = $instance['imgalt']; }
		if ( ! empty( $instance['imglink'] ) ) { $imglink = $instance['imglink']; }
		if ( ! empty( $instance['imgurl_one'] ) ) { $imgurl_one = $instance['imgurl_one']; }
		if ( ! empty( $instance['imgalt_one'] ) ) { $imgalt_one = $instance['imgalt_one']; }
		if ( ! empty( $instance['imglink_one'] ) ) { $imglink_one = $instance['imglink_one']; }
		echo $args['before_widget']; ?>
		<?php if( ! empty( $title ) )
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html($title) .'</span></h3></div>'; ?>
		<div class="clear">
		<div class="one_half">
		<?php if( empty( $imglink ) ) :?>
			<img class="headerimage" src="<?php echo $imgurl; ?>" alt="<?php echo $imgalt; ?>" />
		<?php else : ?> 
		<a href="<?php echo $imglink; ?>"><img class="headerimage" src="<?php echo $imgurl; ?>" alt="<?php echo $imgalt; ?>" /></a>
		<?php endif; ?>
		</div>
		<div class="one_half lastcolumn">
		<?php if( empty( $imglink_one ) ) :?>
			<img class="headerimage" src="<?php echo $imgurl_one; ?>" alt="<?php echo $imgalt_one; ?>" />
		<?php else : ?> 
		<a href="<?php echo $imglink_one; ?>"><img class="headerimage" src="<?php echo $imgurl_one; ?>" alt="<?php echo $imgalt_one; ?>" /></a>
		<?php endif; ?>
		</div>
		</div>
		<?php
		echo $args['after_widget'];
		// Reset the post globals as this query will have stomped on it
		wp_reset_postdata();
		}
	function update($new_instance, $old_instance) {
			$instance['title'] = $new_instance['title'];
			$instance['imgurl'] = $new_instance['imgurl'];
			$instance['imgalt'] = $new_instance['imgalt'];
		$instance['imglink'] = $new_instance['imglink'];
		$instance['imgurl_one'] = $new_instance['imgurl_one'];
			$instance['imgalt_one'] = $new_instance['imgalt_one'];
		$instance['imglink_one'] = $new_instance['imglink_one'];
		return $new_instance;
	}
	function form($instance) {
			$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
			$imgurl = isset( $instance['imgurl'] ) ? esc_attr( $instance['imgurl'] ) : '';
			$imgalt = isset( $instance['imgalt'] ) ? esc_attr( $instance['imgalt'] ) : '';
		$imglink = isset( $instance['imglink'] ) ? esc_attr( $instance['imglink'] ) : '';
		$imgurl_one = isset( $instance['imgurl_one'] ) ? esc_attr( $instance['imgurl_one'] ) : '';
			$imgalt_one = isset( $instance['imgalt_one'] ) ? esc_attr( $instance['imgalt_one'] ) : '';
		$imglink_one = isset( $instance['imglink_one'] ) ? esc_attr( $instance['imglink_one'] ) : '';
		?>
	<p><label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title:','maisha'); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" /></p>
	<p><label for="<?php echo esc_attr( $this->get_field_id('imgurl') ); ?>"><?php esc_html_e('Image One URL:','maisha'); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name('imgurl') ); ?>" value="<?php echo esc_attr($imgurl); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('imgurl') ); ?>" /></p>
	<p><label for="<?php echo esc_attr( $this->get_field_id('imgalt') ); ?>"><?php esc_html_e('Image One ALT:','maisha'); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name('imgalt') ); ?>" value="<?php echo esc_attr($imgalt); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('imgalt') ); ?>" /></p>
	<p><label for="<?php echo esc_attr( $this->get_field_id('imglink') ); ?>"><?php esc_html_e('Image One LINK:','maisha'); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name('imglink') ); ?>" value="<?php echo esc_attr($imglink); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('imglink') ); ?>" /></p>
	<p><label for="<?php echo esc_attr( $this->get_field_id('imgurl_one') ); ?>"><?php esc_html_e('Image Two URL:','maisha'); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name('imgurl_one') ); ?>" value="<?php echo esc_attr($imgurl_one); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('imgurl_one') ); ?>" /></p>
	<p><label for="<?php echo esc_attr( $this->get_field_id('imgalt_one') ); ?>"><?php esc_html_e('Image Two ALT:','maisha'); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name('imgalt_one') ); ?>" value="<?php echo esc_attr($imgalt_one); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('imgalt_one') ); ?>" /></p>
	<p><label for="<?php echo esc_attr( $this->get_field_id('imglink_one') ); ?>"><?php esc_html_e('Image Two LINK:','maisha'); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name('imglink_one') ); ?>" value="<?php echo esc_attr($imglink_one); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('imglink_one') ); ?>" /></p>
	<?php
	}
}
register_widget('maisha_two_banner');