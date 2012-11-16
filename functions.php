<?php

/* ---------------------------------------------------------------------- */
/*	Basic Theme Settings
/* ---------------------------------------------------------------------- */

define( 'SP_BASE_DIR', TEMPLATEPATH . '/' );
define( 'SP_BASE_URL', get_template_directory_uri() . '/' );

if( !isset( $content_width ) )
	$content_width = 660;
	
if( !function_exists('sp_framework_setup') ) {

	function sp_framework_setup() {

		// Editor style
		add_editor_style('css/editor-style.css');

		// Post formats
		add_theme_support( 'post-formats', array( 'video' ) );

		// Post thumbnails
		add_theme_support('post-thumbnails');

		add_image_size( 'thumbnail', 139, 105, true );
		add_image_size( 'medium', 202, 135, true );
		add_image_size( 'large', 431, null, true );
		add_image_size( 'blog-post-room', 280, 160, true );
		add_image_size( 'slideshow-home', 960, 402, true );
		add_image_size( 'heading-img-page', 960, 156, true );
		add_image_size( 'fullwidth', 918, null, true );

		// Add default posts and comments RSS feed links to head
		add_theme_support('automatic-feed-links');

		// Make theme available for translation
		load_theme_textdomain( 'sp_framework', SP_BASE_DIR . 'languages' );

		$locale = get_locale();
		$locale_file = SP_BASE_DIR . "languages/$locale.php";

		if( is_readable( $locale_file ) )
			require_once( $locale_file );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary_nav' => __( 'Primary Navigation', 'sp_framework' ),
			'footer_nav'  => __( 'Footer Navigation', 'sp_framework' )
		) );

	}
}
add_action('after_setup_theme', 'sp_framework_setup');

/* ---------------------------------------------------------------------- */
/*	Load Parts
/* ---------------------------------------------------------------------- */

// Add SMOF admin options
require_once (SP_BASE_DIR . 'framework/admin/index.php');

// Add meta boxes
include( SP_BASE_DIR . 'framework/meta-box/class.php' );
include( SP_BASE_DIR . 'framework/meta-boxes.php' );

// Add widgets
include( SP_BASE_DIR . 'framework/widgets.php' );

// Add shortcodes function
include( SP_BASE_DIR . 'framework/shortcodes.php' );

// Add custom functions
include( SP_BASE_DIR . 'framework/custom-functions.php' );

// Add custom post types
include( SP_BASE_DIR . 'framework/custom-post-types.php' );

// Add custom functions
include( SP_BASE_DIR . 'framework/custom-functions.php' );

/* ---------------------------------------------------------------------- */
/*	Theme styles
/* ---------------------------------------------------------------------- */

function sp_framework_register_styles() {

	if( !is_admin() ) {
		wp_register_style( 'sp-theme-styles', SP_BASE_URL . 'style.css', null, false );
		wp_register_style( 'shortcode',         SP_BASE_URL . 'css/shortcodes.css', null, false );
		wp_register_style( 'fancybox',         SP_BASE_URL . 'css/jquery.fancybox.min.css', null, false );
		wp_register_style( 'datepicker-jqueryui',         SP_BASE_URL . 'css/jquery-ui-1.9.1.custom.css', null, false );
	}

}
add_action('init', 'sp_framework_register_styles');

function sp_framework_enqueue_styles() {

	if( !is_admin() ) {
		wp_enqueue_style('sp-theme-styles');
		wp_enqueue_style('shortcode');
		wp_enqueue_style('fancybox');
		wp_enqueue_style('datepicker-jqueryui');
	}

}
add_action('wp_print_styles', 'sp_framework_enqueue_styles');

/* ---------------------------------------------------------------------- */
/*	Theme scripts
/* ---------------------------------------------------------------------- */

function sp_framework_register_scripts() {

	if( !is_admin() ) {
		wp_deregister_script('jquery');
		wp_register_script( 'jquery',   'http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js', array(), '1.8.2', false ); //use for online
		//wp_register_script( 'jquery',   SP_BASE_URL . 'js/jquery.1.8.2.js', array(), '1.8.2', false ); //use for local development

		wp_register_script( 'cufoncore',            SP_BASE_URL . 'fonts/cufon-yui.js',               array('jquery'), false, true );
		wp_register_script( 'helveticafonts',            SP_BASE_URL . 'fonts/helvetica.cufonfonts.js',               array('jquery'), false, true );
		
		wp_register_script( 'easing',            SP_BASE_URL . 'js/jquery.easing-1.3.min.js',               array('jquery'), false, false );
		wp_register_script( 'fancybox',          SP_BASE_URL . 'js/jquery.fancybox.pack.js',                array('jquery'), false, true );
		wp_register_script( 'cycle',             SP_BASE_URL . 'js/jquery.cycle.all.min.js',                array('jquery'), false, false );
		wp_register_script( 'bxslider',             SP_BASE_URL . 'js/jquery.bxSlider.min.js',             	array('jquery'), false, true );
		//wp_register_script( 'fbparam',    SP_BASE_URL . 'js/fastbooking/fbparam.js',						array('jquery'), false, false );
		//wp_register_script( 'fblib',    SP_BASE_URL . 'js/fastbooking/fblib.js',                          array('jquery'), false, false );
		wp_register_script( 'jqueryuicustom',    SP_BASE_URL . 'js/jquery-ui-1.9.1.custom.min.js',			array('jquery'), false, true );
		wp_register_script( 'custom_scripts',    SP_BASE_URL . 'js/custom.js',                              array('jquery'), false, true );
	}

}
add_action('init', 'sp_framework_register_scripts');

function sp_framework_enqueue_scripts() {

	if( !is_admin() ) {

		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-widget');

		// For Internet Explorer
		/*global $is_IE;

		if( $is_IE )
			wp_enqueue_script('selectivizr');*/
		
		//enqueue font
		wp_enqueue_script('cufoncore');
		wp_enqueue_script('helveticafonts');
		
		wp_enqueue_script('easing');
		wp_enqueue_script('fancybox');
		wp_enqueue_script('cycle');
		wp_enqueue_script('bxslider');
		//wp_enqueue_script('fbparam');
		//wp_enqueue_script('fblib');
		wp_enqueue_script('jqueryuicustom');
		wp_enqueue_script('custom_scripts');

	}

}
add_action('wp_print_scripts', 'sp_framework_enqueue_scripts');

// This function is used in processing images (cutting, cropping, zoom)
if ( !function_exists('sp_process_image') ) {
    function sp_process_image( $img_source, $img_width, $img_height, $zc = 1, $q = 100 ) {
		
		$img_source = SP_BASE_URL .'framework/scripts/timthumb.php?src='.$img_source.'&amp;w='.$img_width.'&amp;h='.$img_height.'&amp;zc='.$zc.'&amp;q='.$q;
        return $img_source;
    }
}

// Makes some changes to the <title> tag, by filtering the output of wp_title()
function sp_framework_filter_wp_title( $title, $separator ) {

	if ( is_feed() ) return $title;

	global $paged, $page;

	if ( is_search() ) {
		$title = sprintf(__('Search results for %s', 'sp_framework'), '"' . get_search_query() . '"');

		if ( $paged >= 2 )
			$title .= " $separator " . sprintf(__('Page %s', 'sp_framework'), $paged);

		$title .= " $separator " . get_bloginfo('name', 'display');

		return $title;
	}

	$title .= get_bloginfo('name', 'display');
	$site_description = get_bloginfo('description', 'display');

	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;

	if ( $paged >= 2 || $page >= 2)
		$title .= " $separator " . sprintf(__('Page %s', 'sp_framework'), max($paged, $page) );

	return $title;

}
add_filter('wp_title', 'sp_framework_filter_wp_title', 10, 2);

// Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
function sp_framework_page_menu_args( $args ) {

	$args['show_home'] = true;

	return $args;

}
add_filter('wp_page_menu_args', 'sp_framework_page_menu_args');

// Sets the post excerpt length to 40 words (or 20 words if post carousel)
function sp_framework_excerpt_length( $length ) {

	return 40;

}
add_filter('excerpt_length', 'sp_framework_excerpt_length');

// Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis
function sp_framework_auto_excerpt_more( $more ) {

	return '&hellip;';

}
add_filter('excerpt_more', 'sp_framework_auto_excerpt_more');

// Empty Pragraph Fix
add_filter('the_content', 'sp_shortcode_empty_paragraph_fix');
function sp_shortcode_empty_paragraph_fix($content)
{   
	$array = array (
		'<p>[' => '[', 
		']</p>' => ']', 
		']<br />' => ']'
	);

	$content = strtr($content, $array);

	return $content;
}

add_filter( 'widget_text', 'shortcode_unautop');

// Enable shortcodes in text widgets
add_filter('widget_text', 'do_shortcode');

// Custom logo login
function my_custom_login_logo() {
    echo '<style type="text/css">
        .login h1 a { background-image:url('.SP_BASE_URL.'images/custom-login-logo.gif) !important; height:107px !important; background-size: 310px 107px !important;}
    </style>';
}

add_action('login_head', 'my_custom_login_logo');

//  Remove error message login
add_filter('login_errors', create_function('$a', "return null;"));


//  Remove wordpress link on admin login logo
function remove_link_on_admin_login_info() {
     return  get_bloginfo('url');
}
  
add_filter('login_headerurl', 'remove_link_on_admin_login_info');

//	Remove logo and other items in Admin menu bar
function remove_admin_bar_links() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('wp-logo');
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

//  Remove wordpress version generation
function remove_version_info() {
     return '';
}
add_filter('the_generator', 'remove_version_info');


//  Set favicons for backend code
function adminfavicon() {
echo '<link rel="icon" type="image/x-icon" href="'.SP_BASE_URL.'favicon.ico" />';
}
add_action( 'admin_head', 'adminfavicon' );

// unregister all default WP Widgets
function unregister_default_wp_widgets() {
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    //unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Search');
    //unregister_widget('WP_Widget_Text');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
	unregister_widget('WP_Nav_Menu_Widget');
}
add_action('widgets_init', 'unregister_default_wp_widgets', 1);