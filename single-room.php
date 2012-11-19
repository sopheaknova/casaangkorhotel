<?php get_header(); ?>

<?php get_template_part( 'includes/heading-subpage'); ?>

  <div class="container">
  	<div class="inner">
    	<?php if ( $data['disable_booking_form'] !== 'yes') : ?>
    	<?php get_template_part( '/includes/fastbooking-search' ); ?>
        <?php endif; ?>
    	<div class="cat-article">
             
             <?php if (have_posts()): ?> 
             <?php while(have_posts()): the_post(); ?>
    		     <h2 class="page-title"><?php the_title();?></h2>

             <div id="room-photos" class="box-shadow-light">
          
                <div class="room-slide">
                     <?php
                            $args = array(
                                   'post_parent'    => $post->ID,          // For the current post
                                   'post_type'      => 'attachment',       // Get all post attachments
                                   'post_mime_type' => 'image',            // Only grab images
                                                 
                       );
                       $attachments = get_posts($args); // retrieve for attachment from recently post
                       if ($attachments) { 
                 
                          foreach ($attachments as $attachment) {             
                     ?>
                          <?php $srcs = wp_get_attachment_image_src( $attachment->ID,'slideshow-home', false, $thumb_attr ); ?>
                                <img src="<?php echo $srcs[0] ?>" />
						  <?php } ?>
                                                                     
                      <?php } ?>  
                </div><!-- /.room-slide -->
                <div class="stroke-room-detail"><img src="<?php bloginfo('template_url');?>/images/stroke-room-detail.png" align="" /></div>
          
             </div><!-- /#room-photos -->
             <div class="single-article-content">
                 
                  <?php the_content();?>
          
             </div> <!-- /.single-article-content -->
            <?php endwhile;?>
         
            <?php else: ?>
                  <h4>We cannot found this page.</h4> 
            <?php endif; ?>
             

      </div><!-- /.cat_article -->
        
      <?php get_template_part( 'includes/latest-updated' ); ?>
        
    </div><!-- /.inner -->
  </div><!-- /.container -->

<?php get_footer(); ?>