<?php

/* ---------------------------------------------------------------------- */
/*	Show main navigation
/* ---------------------------------------------------------------------- */

if( !function_exists('sp_framework_main_navigation')) {

	function sp_framework_main_navigation() {

		global $post, $wp_query;

		$defaults = array(
			'container'      => false,
			'menu_class'	 => 'menu-nav',
			'theme_location' => 'primary_nav'
		);
			wp_nav_menu( $defaults );
	}

}


