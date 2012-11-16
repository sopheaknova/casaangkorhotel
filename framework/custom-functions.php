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

/* ---------------------------------------------------------------------- */
/*	Share post/page with Tweeter, g plush and facebook
/* ---------------------------------------------------------------------- */
if ( !function_exists('sp_show_post_share') ) {
	
function sp_show_post_share() { ?>
    <?php if($data['disable_share'] !== 'yes') { ?>
	      <div class="cat-article-share">
		
            <div class="cat-sh-twitter">
                <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-count="vertical" data-lang="en">Tweet</a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
            </div> <!--Twitter Button-->
	    
            <div class="cat-sh-gplus">
<!-- Place this tag where you want the +1 button to render -->
<div class="g-plusone" data-size="tall" data-href="<?php the_permalink(); ?>"></div>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
           </div> <!--google plus Button-->
            <div class="cat-sh-facebook">
                <iframe src="//www.facebook.com/plugins/like.php?locale=en_US&href=<?php the_permalink(); ?>&amp;send=false&amp;layout=box_count&amp;width=44&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=62" scrolling="no" frameborder="0" style="border:none; overflow:hidden; margin: auto; width: 44px; height:62px;" allowTransparency="true"></iframe>
            </div> <!--facebook Button-->
	
        </div> <!--article Share-->
		<?php }		
	}

}

/* ---------------------------------------------------------------------- */
/*	Get image and place it in og: tag to be share
/* ---------------------------------------------------------------------- */
if ( !function_exists('sp_get_post_image') ) {
function sp_get_post_image($size = 'thumbnail'){
		global $post;
		$image = '';
		//get the post thumbnail
		$image_id = get_post_thumbnail_id($post->ID);
		$image = wp_get_attachment_image_src($image_id,  
		$size);
		$image = $image[0];
		if ($image) return $image;
		//if the post is video post and haven't a feutre image
		$type = get_post_format();
		$vtype = get_post_meta($post->ID, 'sp_video_type', true);
		$vId = get_post_meta($post->ID, 'sp_video_id', true);
		if($type == 'video') {
						if($vtype == 'youtube') {
						  $image = 'http://img.youtube.com/vi/'.$vId.'/0.jpg';
						} elseif ($vtype == 'vimeo') {
						$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$vId.php"));
						  $image = $hash[0]['thumbnail_large'];
						} elseif ($vtype == 'daily') {
						  $image = 'http://www.dailymotion.com/thumbnail/video/'.$vId;
						}
				}
		if ($image) return $image;
		//If there is still no image, get the first image from the post
		return sp_get_first_image();
		}
		function sp_get_first_image() {
		  global $post, $posts;
		  $first_img = '';
		  ob_start();
		  ob_end_clean();
		  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		  $first_img = $matches[1][0];
		
		  return $first_img;
		}
}