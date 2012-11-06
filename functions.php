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

// Add theme options
include( SP_BASE_DIR . 'functions/admin.php' );

// Add meta boxes
include( SP_BASE_DIR . 'framework/meta-box/class.php' );
include( SP_BASE_DIR . 'framework/meta-boxes.php' );

// Add shortcodes
//include( SP_BASE_DIR . 'framework/shortcodes.php' );

// Add custom functions
include( SP_BASE_DIR . 'framework/custom-functions.php' );

// Add custom post types
include( SP_BASE_DIR . 'framework/custom-post-types.php' );

/* ---------------------------------------------------------------------- */
/*	Theme styles
/* ---------------------------------------------------------------------- */

function sp_framework_register_styles() {

	if( !is_admin() ) {
		wp_register_style( 'ss-theme-styles', SS_BASE_URL . 'style.css', null, false );

		if( of_get_option('ss_main_heading_font') )
			wp_register_style( 'ss-main-heading-font',       'http://fonts.googleapis.com/css?family=' . of_get_option('ss_main_heading_font'), null, false );

		if( of_get_option('ss_blockquote_heading_font') )
			wp_register_style( 'ss-blockquote-heading-font', 'http://fonts.googleapis.com/css?family=' . of_get_option('ss_blockquote_heading_font'), null, false );

		wp_register_style( 'fancybox',         SS_BASE_URL . 'css/jquery.fancybox.min.css', null, false );
		wp_register_style( 'video-js',         SS_BASE_URL . 'css/video-js.min.css',        null, false );
		wp_register_style( 'audioplayerv1',    SS_BASE_URL . 'css/audioplayerv1.min.css',   null, false );
	}

}
//add_action('init', 'sp_framework_register_styles');

function sp_framework_enqueue_styles() {

	if( !is_admin() ) {
		wp_enqueue_style('ss-theme-styles');

		if( of_get_option('ss_main_heading_font') )
			wp_enqueue_style('ss-main-heading-font');

		if( of_get_option('ss_blockquote_heading_font') )
			wp_enqueue_style('ss-blockquote-heading-font');

		wp_enqueue_style('fancybox');
		wp_enqueue_style('video-js');
		wp_enqueue_style('audioplayerv1');

		// Remove contact form 7 default styles
		wp_deregister_style('contact-form-7');
	}

}
//add_action('wp_print_styles', 'sp_framework_enqueue_styles');

/* ---------------------------------------------------------------------- */
/*	Theme scripts
/* ---------------------------------------------------------------------- */

function sp_framework_register_scripts() {

	if( !is_admin() ) {
		wp_deregister_script('jquery');
		wp_register_script( 'jquery',   'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', array(), '1.7.2', false );

		wp_register_script( 'modernizr_custom',  SS_BASE_URL . 'js/modernizr.custom.js',                    array(), false, false );
		wp_register_script( 'video-js',          SS_BASE_URL . 'js/video-js.min.js',                        array(), false, false );
		wp_register_script( 'selectivizr',       SS_BASE_URL . 'js/selectivizr-and-extra-selectors.min.js', array('jquery'), false, true );
		wp_register_script( 'respond',           SS_BASE_URL . 'js/respond.min.js',                         array('jquery'), false, true );
		wp_register_script( 'easing',            SS_BASE_URL . 'js/jquery.easing-1.3.min.js',               array('jquery'), false, true );
		wp_register_script( 'fancybox',          SS_BASE_URL . 'js/jquery.fancybox.pack.js',                array('jquery'), false, true );
		wp_register_script( 'cycle',             SS_BASE_URL . 'js/jquery.cycle.all.min.js',                array('jquery'), false, true );
		wp_register_script( 'smartstart-slider', SS_BASE_URL . 'js/jquery.smartStartSlider.min.js',         array('jquery'), false, true );
		wp_register_script( 'isotope',           SS_BASE_URL . 'js/jquery.isotope.min.js',                  array('jquery'), false, true );
		wp_register_script( 'jcarousel',         SS_BASE_URL . 'js/jquery.jcarousel.min.js',                array('jquery'), false, true );
		wp_register_script( 'audioplayerv1',     SS_BASE_URL . 'js/audioplayerv1.min.js',                   array('jquery'), false, true );
		wp_register_script( 'touch_swipe',       SS_BASE_URL . 'js/jquery.touchSwipe-1.2.5.min.js',         array('jquery'), false, true );
		wp_register_script( 'custom_scripts',    SS_BASE_URL . 'js/custom.js',                              array('jquery'), false, true );
	}

}
//add_action('init', 'sp_framework_register_scripts');

function sp_framework_enqueue_scripts() {

	if( !is_admin() ) {

		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-widget');
		wp_enqueue_script('modernizr_custom');
		wp_enqueue_script('video-js');

		// For Internet Explorer
		global $is_IE;

		if( $is_IE )
			wp_enqueue_script('selectivizr');

		wp_enqueue_script('respond');
		wp_enqueue_script('easing');
		wp_enqueue_script('fancybox');
		wp_enqueue_script('cycle');
		wp_enqueue_script('smartstart-slider');
		wp_enqueue_script('isotope');
		wp_enqueue_script('jcarousel');
		wp_enqueue_script('audioplayerv1');
		wp_enqueue_script('touch_swipe');
		wp_enqueue_script('custom_scripts');

		if ( is_singular() && get_option('thread_comments') )
			wp_enqueue_script('comment-reply'); 
	}

}
//add_action('wp_print_scripts', 'sp_framework_enqueue_scripts');

// Change Contact Form 7 ajax loader
function sp_framework_contact_form_loader() {

	return SS_BASE_URL . 'images/loader.gif';

}
add_filter('wpcf7_ajax_loader', 'sp_framework_contact_form_loader');

// Backend Scripts
function sp_framework_admin_scripts( $hook ) {

	if( $hook == 'post.php' || $hook == 'post-new.php' ) {
		wp_register_script( 'tinymce_scripts', SS_BASE_URL . 'functions/tinymce/js/scripts.js', array('jquery'), false, true );
		wp_enqueue_script('tinymce_scripts');
	}

}
//add_action('admin_enqueue_scripts', 'sp_framework_admin_scripts');

/* ---------------------------------------------------------------------- */
/*	Filter Hooks
/* ---------------------------------------------------------------------- */

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
//add_filter('wp_title', 'sp_framework_filter_wp_title', 10, 2);