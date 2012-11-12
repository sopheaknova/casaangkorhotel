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

		add_image_size( 'blog-post', 431, null, true );
		add_image_size( 'blog-post-thumb', 202, 135, true );
		add_image_size( 'blog-post-small', 139, 105, true );
		//add_image_size( 'thumbnail', 139, 105, true ); need to find and replace blog-post, blog-post-thumb, blog-post-small
		//add_image_size( 'medium', 202, 135, true );
		//add_image_size( 'large', 431, null, true );
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
	}

}
add_action('init', 'sp_framework_register_styles');

function sp_framework_enqueue_styles() {

	if( !is_admin() ) {
		wp_enqueue_style('sp-theme-styles');
		wp_enqueue_style('shortcode');
		wp_enqueue_style('fancybox');
	}

}
add_action('wp_print_styles', 'sp_framework_enqueue_styles');

/* ---------------------------------------------------------------------- */
/*	Theme scripts
/* ---------------------------------------------------------------------- */

function sp_framework_register_scripts() {

	if( !is_admin() ) {
		wp_deregister_script('jquery');
		wp_register_script( 'jquery',   'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', array(), '1.7.2', false );
		//wp_register_script( 'jquery',   SP_BASE_URL . 'js/jquery.js', array(), '1.7.2', false ); 

		wp_register_script( 'cufoncore',            SP_BASE_URL . 'fonts/cufon-yui.js',               array('jquery'), false, true );
		wp_register_script( 'helveticafonts',            SP_BASE_URL . 'fonts/helvetica.cufonfonts.js',               array('jquery'), false, true );
		
		wp_register_script( 'easing',            SP_BASE_URL . 'js/jquery.easing-1.3.min.js',               array('jquery'), false, false );
		wp_register_script( 'fancybox',          SP_BASE_URL . 'js/jquery.fancybox.pack.js',                array('jquery'), false, true );
		wp_register_script( 'cycle',             SP_BASE_URL . 'js/jquery.cycle.all.min.js',                array('jquery'), false, false );
		wp_register_script( 'bxslider',             SP_BASE_URL . 'js/jquery.bxSlider.min.js',                array('jquery'), false, true );
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