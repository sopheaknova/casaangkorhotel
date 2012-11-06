<?php

/* ---------------------------------------------------------------------- */
/*	Widget Areas
/* ---------------------------------------------------------------------- */

function sp_framework_widgets_init() {

	// News Widget Area
	register_sidebar(array(
		'name'          => __('News and Event Widget Area', 'sp_framework'),
		'id'            => 'news-widget-area',
		'description'   => __('Only for News/Event posts.', 'sp_framework'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	// Home Widget Area
	register_sidebar(array(
		'name'          => __('Home Widget Area', 'sp_framework'),
		'id'            => 'home-widget-area',
		'description'   => __('For homepage under slideshow', 'sp_framework'),
		'before_widget' => '<div id="%1$s" class="img-box %2$s"><div class="img-wrap"><div class="img-border"></div>',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	));
	
}
add_action('widgets_init', 'sp_framework_widgets_init');

/* ---------------------------------------------------------------------- */
/*	Custom Widgets
/* ---------------------------------------------------------------------- */

include( SP_BASE_DIR . 'framework/widgets/text-image-widget.php' );
include( SP_BASE_DIR . 'framework/widgets/reservation-widget.php' );
include( SP_BASE_DIR . 'framework/widgets/video-widget.php' );