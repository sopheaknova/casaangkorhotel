<?php

/* ---------------------------------------------------------------------- */
/*	Slider
/* ---------------------------------------------------------------------- */

// Register Custom Post Type: 'Slider'
function sp_framework_register_post_type_slider() {

	$labels = array(
		'name'               => __( 'Sliders', 'sp_framework' ),
		'singular_name'      => __( 'Slider', 'sp_framework' ),
		'add_new'            => __( 'Add New', 'sp_framework' ),
		'add_new_item'       => __( 'Add New Slider', 'sp_framework' ),
		'edit_item'          => __( 'Edit Slider', 'sp_framework' ),
		'new_item'           => __( 'New Slider', 'sp_framework' ),
		'view_item'          => __( 'View Slider', 'sp_framework' ),
		'search_items'       => __( 'Search Sliders', 'sp_framework' ),
		'not_found'          => __( 'No sliders found', 'sp_framework' ),
		'not_found_in_trash' => __( 'No sliders found in Trash', 'sp_framework' ),
		'parent_item_colon'  => __( 'Parent Slider:', 'sp_framework' ),
		'menu_name'          => __( 'Sliders', 'sp_framework' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'supports'            => array('title'),
		'taxonomies'          => array(''),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => true,
		'has_archive'         => false,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => array( 'slug' => 'slider' ),
		'capability_type'     => 'post',
		'menu_position'       => null,
		'menu_icon'           => SP_BASE_URL . 'framework/assets/img/icon-slider.png'
	);

	register_post_type( 'slider', $args );

} 
add_action('init', 'sp_framework_register_post_type_slider');

// Custom colums for 'Slider'
function sp_framework_edit_slider_columns() {

	$columns = array(
		'cb'          => '<input type="checkbox" />',
		'title'       => __( 'Name', 'sp_framework' ),
		'slide_count' => __( 'Slide Count', 'sp_framework' ),
		'shortcode'   => __( 'Shortcode', 'sp_framework' )
	);

	return $columns;

}
add_action('manage_edit-slider_columns', 'sp_framework_edit_slider_columns');

// Custom colums content for 'Slider'
function sp_framework_manage_slider_columns( $column, $post_id ) {

	global $post;

	switch ( $column ) {

		case 'slide_count':

			$slider_slides = get_post_meta( $post->ID, $id, true ) ? get_post_meta( $post->ID, $id, true ) : false;

			$slide_count = count( unserialize( $slider_slides['ss_slider_slides'][0] ) );
			
			echo $slide_count;

			break;

		case 'shortcode':
			
			echo '<span class="shortcode-field">[slider id="'. $post->post_name . '"]</span>';

			break;
		
		default:
			break;
	}

}
add_action('manage_slider_posts_custom_column', 'sp_framework_manage_slider_columns', 10, 2);

// Sortable custom columns for 'Slider'
function sp_framework_sortable_slider_columns( $columns ) {

	$columns['slide_count'] = 'slide_count';

	return $columns;

}
add_action('manage_edit-slider_sortable_columns', 'sp_framework_sortable_slider_columns');

// Change default title for 'Slider'
function sp_framework_change_slider_title( $title ){

	$screen = get_current_screen();

	if ( $screen->post_type == 'slider' )
		$title = __('Enter slider name here', 'sp_framework');

	return $title;

}

add_filter('enter_title_here', 'sp_framework_change_slider_title');

