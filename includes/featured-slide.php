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
		  
		  while ( $slide_query->have_posts() ) : $slide_query->the_post();		  
		  
		  $slide_image = get_post_meta( $post->ID, 'sp_slideshow_image', true );
		  $slide_src = wp_get_attachment_image_src($slide_image, 'slideshow-home');
		  ?>
		  <img src="<?php echo $slide_src[0];?>" alt="<?php the_title(); ?>" />
          <?
		  endwhile;
		  ?>  
          </div><!--/.slideshow-->
          
          <?php sp_framework_stroke_overlap('slidehome') ?>
          
          <a href="#" class="next">Next</a>
                
          <div id="caption"><h3></h3></div>
      </div><!--/.wrapper slide-->
      
      <div id="nav"></div>
    </div>
</div><!--/#End of Feature-->
<!-- /#featured -->