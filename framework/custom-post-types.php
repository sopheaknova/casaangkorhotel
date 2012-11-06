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


/* ---------------------------------------------------------------------- */
/*	Room
/* ---------------------------------------------------------------------- */

// Register Custom Post Type: 'Room'
function sp_framework_register_post_type_room() {

	$labels = array(
		'name'               => __( 'Rooms', 'sp_framework' ),
		'singular_name'      => __( 'Room', 'sp_framework' ),
		'add_new'            => __( 'Add New', 'sp_framework' ),
		'add_new_item'       => __( 'Add New Room', 'sp_framework' ),
		'edit_item'          => __( 'Edit Room', 'sp_framework' ),
		'new_item'           => __( 'New Room', 'sp_framework' ),
		'view_item'          => __( 'View Room', 'sp_framework' ),
		'search_items'       => __( 'Search Rooms', 'sp_framework' ),
		'not_found'          => __( 'No Rooms found', 'sp_framework' ),
		'not_found_in_trash' => __( 'No Rooms found in Trash', 'sp_framework' ),
		'parent_item_colon'  => __( 'Parent Room:', 'sp_framework' ),
		'menu_name'          => __( 'Rooms', 'sp_framework' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'supports'            => array('title','editor', 'thumbnail'),
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
		'rewrite'             => array( 'slug' => 'room' ),
		'capability_type'     => 'post',
		'menu_position'       => null,
		'menu_icon'           => SP_BASE_URL . 'framework/assets/img/icon-room.png'
	);

	register_post_type( 'room', $args );

} 
add_action('init', 'sp_framework_register_post_type_room');

// Custom colums for 'room'
function sp_framework_edit_room_columns() {

	$columns = array(
		'cb'          => '<input type="checkbox" />',
		'title'       => __( 'Name', 'sp_framework' ),
		'thumbnail'   => __( 'Thumbnail', 'sp_framework' )
	);

	return $columns;

}
add_action('manage_edit-room_columns', 'sp_framework_edit_room_columns');

// Custom colums content for 'room'
function sp_framework_manage_room_columns( $column, $post_id ) {

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
add_action('manage_room_posts_custom_column', 'sp_framework_manage_room_columns', 10, 2);

// Change default title for 'room'
function sp_framework_change_room_title( $title ){

	$screen = get_current_screen();

	if ( $screen->post_type == 'room' )
		$title = __('Enter room name here', 'sp_framework');

	return $title;

}

add_filter('enter_title_here', 'sp_framework_change_room_title');


/* ---------------------------------------------------------------------- */
/*	Latest offer
/* ---------------------------------------------------------------------- */

// Register Custom Post Type: 'lastestoffer'
function sp_framework_register_post_type_lastestoffer() {

	$labels = array(
		'name'               => __( 'Offers', 'sp_framework' ),
		'singular_name'      => __( 'Offer', 'sp_framework' ),
		'add_new'            => __( 'Add New', 'sp_framework' ),
		'add_new_item'       => __( 'Add New Offer', 'sp_framework' ),
		'edit_item'          => __( 'Edit Offer', 'sp_framework' ),
		'new_item'           => __( 'New Offer', 'sp_framework' ),
		'view_item'          => __( 'View Offer', 'sp_framework' ),
		'search_items'       => __( 'Search Offers', 'sp_framework' ),
		'not_found'          => __( 'No Offers found', 'sp_framework' ),
		'not_found_in_trash' => __( 'No Offers found in Trash', 'sp_framework' ),
		'parent_item_colon'  => __( 'Parent Offer:', 'sp_framework' ),
		'menu_name'          => __( 'Offer', 'sp_framework' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'          => array( 'offer-categories' ),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => true,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => array( 'slug' => 'offer-item' ),
		'capability_type'     => 'post',
		'menu_position'       => null,
		'menu_icon'           => SP_BASE_URL . 'framework/assets/img/icon-offers.png'
	);

	register_post_type( 'lastestoffer', $args );

} 
//add_action('init', 'sp_framework_register_post_type_lastestoffer');

// Register Taxonomy: 'Categories'
function sp_framework_register_taxonomy_categories() {

	$labels = array(
		'name'                       => __( 'Categories', 'sp_framework' ),
		'singular_name'              => __( 'Category', 'sp_framework' ),
		'search_items'               => __( 'Search Categories', 'sp_framework' ),
		'popular_items'              => __( 'Popular Categories', 'sp_framework' ),
		'all_items'                  => __( 'All Categories', 'sp_framework' ),
		'parent_item'                => __( 'Parent Category', 'sp_framework' ),
		'parent_item_colon'          => __( 'Parent Category:', 'sp_framework' ),
		'edit_item'                  => __( 'Edit Category', 'sp_framework' ),
		'update_item'                => __( 'Update Category', 'sp_framework' ),
		'add_new_item'               => __( 'Add New Category', 'sp_framework' ),
		'new_item_name'              => __( 'New Category', 'sp_framework' ),
		'separate_items_with_commas' => __( 'Separate categories with commas', 'sp_framework' ),
		'add_or_remove_items'        => __( 'Add or remove Categories', 'sp_framework' ),
		'choose_from_most_used'      => __( 'Choose from most used Categories', 'sp_framework' ),
		'menu_name'                  => __( 'Categories', 'sp_framework' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_tagcloud'     => false,
		'hierarchical'      => true,
		'rewrite'           => array( 'slug' => 'offer-category' ),
		'query_var'         => true
	);

	register_taxonomy( 'offer-categories', array('lastestoffer'), $args );

} 
//add_action( 'init', 'sp_framework_register_taxonomy_categories' );

// Custom colums for 'Portfolio'
function sp_framework_edit_lastestoffer_columns() {

	$columns = array(
		'cb'                   => '<input type="checkbox" />',
		'thumbnail'            => __( 'Thumbnail', 'sp_framework' ),
		'title'                => __( 'Name', 'sp_framework' ),
		'offer-categories' => __( 'Categories', 'sp_framework' ),
		'date'                 => __( 'Date', 'sp_framework' )
	);

	return $columns;

}
//add_action('manage_edit-portfolio_columns', 'sp_framework_edit_lastestoffer_columns');

// Custom colums content for 'Latest Offer'
function sp_framework_manage_lastestoffer_columns( $column, $post_id ) {

	global $post;

	switch ( $column ) {

		case 'thumbnail':

			echo '<a href="' . get_edit_post_link( $post_id ) . '">' . get_the_post_thumbnail( $post_id, array(50, 50), array( 'title' => get_the_title( $post_id ) ) ) . '</a>';

			break;

		case 'offer-categories':

			$terms = get_the_terms( $post_id, 'offer-categories' );

			if ( empty( $terms ) )
				break;

				$out = array();

				foreach ( $terms as $term ) {
					
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'offer-categories' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'offer-categories', 'display' ) )
					);

				}

				echo join( ', ', $out );

			break;
		
		default:
			break;
	}

}
//add_action('manage_latestoffer_posts_custom_column', 'sp_framework_manage_lastestoffer_columns', 10, 2);
