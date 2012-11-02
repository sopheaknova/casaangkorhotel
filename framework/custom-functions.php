<?php

/* ---------------------------------------------------------------------- */
/*	Show main and footer navigation
/* ---------------------------------------------------------------------- */

if( !function_exists('sp_framework_main_navigation')) {

	function sp_framework_main_navigation() {

		$defaults = array(
			'container'      => false,
			'menu_class'	 => 'menu-nav',
			'theme_location' => 'primary_nav'
		);
			wp_nav_menu( $defaults );
	}

}

if (!function_exists('sp_framework_footer_navigation')){
	function sp_framework_footer_navigation() {
		$defaults = array(
			'container'      => false,
			'menu_class'	 => 'footer-nav',
			'theme_location' => 'footer_nav'
		);
			wp_nav_menu( $defaults );	
	}
}

/* ---------------------------------------------------------------------- */
/*	Show stroke overlap on Slide and heading image
/* ---------------------------------------------------------------------- */
if ( !function_exists('sp_framework_stroke_overlap')) {
	
	function sp_framework_stroke_overlap($pagename) {
		if ($pagename == 'slidehome') {
			$output = '<div class="stroke-slide">';
			$output .= '<img src="'. SP_BASE_URL .'images/strokeslide.png" alt="" />';	
			$output .= '</div>';
		} elseif ($pagename == 'masthead') {
			$output = '<div class="stroke-heading-img">';
			$output .= '<img src="'. SP_BASE_URL .'images/stroke-heading-page.png" alt="" />';	
			$output .= '</div>';	
		}	
		echo $output;
	}
}