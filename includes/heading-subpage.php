<!-- Heading Page -->
<div id="heading-subpage">
    <div class="inner">
      
      <div class="head-img-wrap box-shadow">
          <div class="heading-img">
      <?php 
	  	$head_img_page = get_post_meta( $post->ID, 'sp_heading_image_page', true );
		$head_img_src = wp_get_attachment_image_src($head_img_page, 'heading-img-page');
		if ($head_img_src[0]) {
	  ?>
          <img src="<?php echo $head_img_src[0]; ?>" alt="" />
      <?php } else { ?>    	
          <img src="<?php bloginfo('template_url'); ?>/images/heading-img.jpg" alt="" />
      <?php } ?>    
          </div>
          <?php sp_framework_stroke_overlap('masthead'); ?>
      </div><!--/.heading image-->
      
    </div>
    <!-- /.inner -->
</div>
<!--/#End of Heading Page-->