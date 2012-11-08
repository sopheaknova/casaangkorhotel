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
/*	General for Page and CPT room
/* ---------------------------------------------------------------------- */

$meta_boxes[] = array(
	'id'       => 'heading-image-setting',
	'title'    => __('Heading image option', 'sp_framework'),
	'pages'    => array('page', 'room'),
	'context'  => 'normal',
	'priority' => 'high',
	'fields'   => array(
		array(
			'name' => __('Upload image for heading page', 'sp_framework'),
			'id'   => $prefix . 'heading_image_page',
			'type' => 'thickbox_image'
		)
	)
);

/* ---------------------------------------------------------------------- */
/*	Post
/* ---------------------------------------------------------------------- */

$meta_boxes[] = array(
	'id'       => 'video-post-settings',
	'title'    => __('Video Setting', 'sp_framework'),
	'pages'    => array('post'),
	'context'  => 'normal',
	'priority' => 'high',
	'fields'   => array(
		array(
			'name' => __('Select video type', 'sp_framework'),
			'id'   => $prefix . 'video_type',
			'type'     => 'select',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'youtube' => 'You Tube',
				'vimeo' => 'Vimeo',
				'daily' => 'Daily',
			),
			// Select multiple values, optional. Default is false.
			'multiple' => false,
		),
		array(
			'name' => __('Video id', 'sp_framework'),
			'id'   => $prefix . 'video_id',
			'type' => 'text',
			'std'	=> '',
		)
	)
);

/*------------------------------------------------------------------------*/
/* post
/*------------------------------------------------------------------------*/

$meta_boxes[] = array(
	'id'      => 'date-post-settings',
	'title'   => __('Offer valide date', 'sp_framework'),
	'pages'   => array('post'),
	'context' => 'normal',
	'priority'=> 'high',
	'fields'  => array(
		// DATE
		array(
			'name' => 'Start Date :',
			'id'   => "{$prefix}date_start",
			'type' => 'date',
			'desc' => 'just select the start date',

			// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
			'js_options' => array(
				'appendText'      => '(dd-mm-yyyy)',
				'dateFormat'      => 'dd M, yy',
				'changeMonth'     => true,
				'changeYear'      => true,
				'showButtonPanel' => true,
			),
		),
		// DATETIME
		array(
			'name' => 'End Date :',
			'id'   => $prefix . 'date_end',
			'type' => 'date',
			'desc' => 'please select your end date',

			// jQuery datetime picker options. See here http://trentrichardson.com/examples/timepicker/
			'js_options' => array(
				'appendText'     => '(dd-mm-yyyy)',
				'dateFormat'     => 'dd M, yy',
				'changeMonth'    => true,
				'changeYear'     => true,
				'showButtonPanel'=> true,
 			),
		),
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