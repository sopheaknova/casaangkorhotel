<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit: 
 * @link http://www.deluxeblogtips.com/2010/04/how-to-create-meta-box-wordpress-post.html
 */

/********************* META BOX DEFINITIONS ***********************/

$prefix = 'sp_';

global $meta_boxes, $pagenow;

$meta_boxes = array();

/* ---------------------------------------------------------------------- */
/*	General
/* ---------------------------------------------------------------------- */

$meta_boxes[] = array(
	'id'       => 'general-settings',
	'title'    => __('General Settings', 'sp_framework'),
	'pages'    => array('page', 'post'),
	'context'  => 'normal',
	'priority' => 'high',
	'fields'   => array(
		array(
			'name'     => __('Page Layout', 'sp_framework'),
			'id'       => $prefix . 'page_layout',
			'type'     => 'radio_image',
			'options'  => array(
				''     => '<img src="' . SP_BASE_URL . 'framework/assets/img/xcol.png" alt="' . __('Use theme default setting', 'sp_framework') . '" title="' . __('Use theme default setting', 'sp_framework') . '" />',
				'1col' => '<img src="' . SP_BASE_URL . 'framework/assets/img/1col.png" alt="' . __('Fullwidth - No sidebar', 'sp_framework') . '" title="' . __('Fullwidth - No sidebar"', 'sp_framework') . ' />',
				'2cl'  => '<img src="' . SP_BASE_URL . 'framework/assets/img/2cl.png" alt="' . __('Sidebar on the left', 'sp_framework') . '" title="' . __('Sidebar on the left', 'sp_framework') . '" />',
				'2cr'  => '<img src="' . SP_BASE_URL . 'framework/assets/img/2cr.png" alt="' . __('Sidebar on the right', 'sp_framework') . '" title="' . __('Sidebar on the right', 'sp_framework') . '" />'
			),
			'std'  => ( ( $pagenow == 'post.php' || $pagenow == 'post-new.php' ) && $_GET['post_type'] == 'page' ?  '1col' : '' ),
			'desc' => __('Here you can overwrite the Site Structure setting from the Theme Options, just for this page.', 'sp_framework')
		) 
	)
);

/* ---------------------------------------------------------------------- */
/*	Custom Post Type: Slider
/* ---------------------------------------------------------------------- */

$meta_boxes[] = array(
	'id'       => 'slider-slides-settings',
	'title'    => __('Slides', 'sp_framework'),
	'pages'    => array('slider'),
	'context'  => 'normal',
	'priority' => 'high',
	'fields'   => array(
		array(
			'name' => __('Upload slide image', 'sp_framework'),
			'id'   => $prefix . 'slideshow_image',
			'type' => 'thickbox_image'
		)
	)
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function sp_framework_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded
//  before (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'sp_framework_register_meta_boxes' );