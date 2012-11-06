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

/* ---------------------------------------------------------------------- */
/*	Show the post content
/* ---------------------------------------------------------------------- */

if( !function_exists('sp_framework_post_content')) {

	function sp_framework_post_content() {

		global $post;

		
		if ( is_singular() ) {

			$content = get_the_content();
			$content = apply_filters( 'the_content', $content );
			$content = str_replace( ']]>', ']]&gt;', $content );

			$output = $content;

			$output .= wp_link_pages( array( 'echo' => false ) );

		} else {
			$output = get_the_excerpt();
		}
		return $output;

	}

}

/* ---------------------------------------------------------------------- */
/*	Blog navigation
/* ---------------------------------------------------------------------- */

if ( !function_exists('sp_framework_pagination') ) {

	function sp_framework_pagination( $pages = '', $range = 2 ) {

		$showitems = ( $range * 2 ) + 1;

		global $paged, $wp_query;

		if( empty( $paged ) )
			$paged = 1;

		if( $pages == '' ) {

			$pages = $wp_query->max_num_pages;

			if( !$pages )
				$pages = 1;

		}

		if( 1 != $pages ) {

			$output = '<nav class="pagination">';

			// if( $paged > 2 && $paged >= $range + 1 /*&& $showitems < $pages*/ )
				// $output .= '<a href="' . get_pagenum_link( 1 ) . '" class="next">&laquo; ' . __('First', 'ss_framework') . '</a>';

			if( $paged > 1 /*&& $showitems < $pages*/ )
				$output .= '<a href="' . get_pagenum_link( $paged - 1 ) . '" class="next">&larr; ' . __('Next', 'ss_framework') . '</a>';

			for ( $i = 1; $i <= $pages; $i++ )  {

				if ( 1 != $pages && ( !( $i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems ) )
					$output .= ( $paged == $i ) ? '<span class="current">' . $i . '</span>' : '<a href="' . get_pagenum_link( $i ) . '">' . $i . '</a>';

			}

			if ( $paged < $pages /*&& $showitems < $pages*/ )
				$output .= '<a href="' . get_pagenum_link( $paged + 1 ) . '" class="prev">' . __('Previous', 'ss_framework') . ' &rarr;</a>';

			// if ( $paged < $pages - 1 && $paged + $range - 1 <= $pages /*&& $showitems < $pages*/ )
				// $output .= '<a href="' . get_pagenum_link( $pages ) . '" class="prev">' . __('Last', 'ss_framework') . ' &raquo;</a>';

			$output .= '</nav>';

			return $output;

		}

	}

}
