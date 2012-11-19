<?php
/*
Template Name: Latest Offer
*/?>
<?php get_header();?>
<?php include('includes/heading-subpage.php');?>
 <div class="container">
  	<div class="inner">
    	<?php if ( $data['disable_booking_form'] !== 'yes') : ?>
    	<?php get_template_part( '/includes/fastbooking-search' ); ?>
        <?php endif; ?>
    	<div class="cat-article">
          <?php if(have_posts()) : ?>
                <?php while (have_posts()): the_post() ;?>

    	        <h2 class="page-title"><?php the_title();?></h2>
              
            
                <div class="single-article-content">
            	   <?php the_content();?>	
                <?php endwhile ;?>
          <?php endif ;?>

          <!--end of static page-->
          
          <?php global $wp_query; ?>

          <?php $paged = (empty($wp_query->query_vars['paged'])) ? 1 : $wp_query->query_vars['paged'];?>
          <?php  query_posts(array('post_type'=>'post','posts_per_page' => 4, 'category_name'=> $data['latest-offer_category'], 'paged' => $paged)); //,'artist'=>'KEJAJ' ?>
          <?php if (have_posts()): ?> 
          <?php while(have_posts()): the_post(); ?>
            <div class="article-item">
          	     <div class="one_fourth">
          	     	  
          	     	  	  <?php 
							    if ( has_post_thumbnail() ) {
							       the_post_thumbnail('medium');  
						  }  ?>
          	     	  
          	     </div><!--/end one_fourth-->  
                 <div class="one_half">
            	    <h4><?php echo the_title();?> </a></h4>
                    <?php echo the_content();?>
                 </div>
          	
	      <!--/end of loop post of category Latest Offer--> 

                 <div class="one_fourth last">
            	    <div class="offer-valid">
            	       <?php $date_start = get_post_meta( $post->ID, 'sp_date_start', true );  ?>
            	       <?php $date_end = get_post_meta( $post->ID, 'sp_date_end', true ); ?>
                       
                	   <p> Offer valid between:<br />
					   <?php echo $date_start.' and '.$date_end ;?></p>
					   <?php 
					   	$page_term_slug = get_page_by_path($data['terms_page']);
			 			$page_policy_slug = get_page_by_path($data['policy_page']);
						$title_term = get_the_title($page_term_slug->ID);
			 			$title_policy = get_the_title($page_policy_slug->ID);
			 		   ?>
					   <p><a href="<?php echo get_page_link($page_term_slug->ID); ?>" class="arrow-link"><?php echo $title_term; ?></a><br />
					  <a href="<?php echo get_page_link($page_policy_slug->ID); ?>" class="arrow-link"><?php echo $title_policy; ?></a></p>
                    </div>
                </div> 
                <div class="clear"></div>

            </div><!-- /.article-item -->
          <?php endwhile;?>
          <div class="navigation">
                <div class="nav-previous"><?php next_posts_link('← Older posts'); ?></div>
                <div class="nav-next"><?php previous_posts_link('Newer posts →'); ?></div>
          </div>  
          <?php else: ?>
		  <h4><?php _e( 'Sorry, currently there are no new promotions or offers. We will update soon in each season.', 'sp_framework' ); ?></h4>
	      <?php endif; ?>
          
          </div><!-- /.single-article-content -->

        </div><!-- /.cat_article -->
       
             
    </div><!-- /.inner -->
 </div><!-- /.container -->

  
			                
			            
			                
			                

<?php get_footer();?>
 