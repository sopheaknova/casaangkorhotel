<!-- featured -->
<div id="feature">
    <div class="inner">
      
      <div class="wrap-slide box-shadow">
          <a href="#" class="prev">Prev</a>
          <div class="slideshow">
          <?php 
		  $args = array (
		  				'post_type'		=> 'slider',
						'posts_per_page'	=> 5
		  			);
		  $slide_query = new WP_Query($args);
		  if ($slide_query->have_posts()) :
		  while ( $slide_query->have_posts() ) : $slide_query->the_post();		  
		  
		  $slide_image = get_post_meta( $post->ID, 'sp_slideshow_image', true );
		  $slide_src = wp_get_attachment_image_src($slide_image, 'slideshow-home');
		  ?>
          <img src="<?php echo $slide_src[0];?>" alt="<?php the_title(); ?>" />
          
          <?php
		  endwhile;
		  else: ?>
          <img src="<?php echo SP_BASE_URL;?>images/slideshow-960x402.gif" alt="<?php the_title(); ?>" />
          <?php 
		  endif;
		  ?>  
          </div><!--/.slideshow-->
          
          <?php sp_framework_stroke_overlap('slidehome') ?>
          
          <a href="#" class="next">Next</a>
                
          <div id="caption"><h3 class="cufon"></h3></div>
      </div><!--/.wrapper slide-->
      
      <div id="nav"></div>
    </div>
</div><!--/#End of Feature-->
<!-- /#featured -->