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
		'thumbnail'   => __( 'Thumbnail', 'sp_framework' )
	);

	return $columns;

}
add_action('manage_edit-slider_columns', 'sp_framework_edit_slider_columns');

// Custom colums content for 'Slider'
function sp_framework_manage_slider_columns( $column, $post_id ) {

	global $post;
	$slide_image = get_post_meta( $post_id, 'sp_slideshow_image', true );

	switch ( $column ) {

		case 'thumbnail':
			
			/* Frist line get image from Featured Image*/
			//echo '<a href="' . get_edit_post_link( $post_id ) . '">' . get_the_post_thumbnail( $post_id, array(200, 86), array( 'title' => get_the_title( $post_id ) ) ) . '</a>';
			echo '<a href="' . get_edit_post_link( $post_id ) . '">' . wp_get_attachment_image($slide_image, array(200, 86)) . '</a>';

			break;
		
		default:
			break;
	}

}
add_action('manage_slider_posts_custom_column', 'sp_framework_manage_slider_columns', 10, 2);

// Change default title for 'Slider'
function sp_framework_change_slider_title( $title ){

	$screen = get_current_screen();

	if ( $screen->post_type == 'slider' )
		$title = __('Enter slider name here', 'sp_framework');

	return $title;

}

add_filter('enter_title_here', 'sp_framework_change_slider_title');

