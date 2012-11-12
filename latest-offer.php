<?php
/*
Template Name: Latest Offer
*/?>
<?php get_header();?>
<?php include('includes/heading-subpage.php');?>
 <div class="container">
  	<div class="inner">
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
					   
					   <p><a href="#" class="arrow-link">Terms and Conditions</a><br />
					  <a href="#" class="arrow-link">Cancellation Policy</a></p>
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
		  <h4>We cannot found this page.</h4> 
	      <?php endif; ?>
          
          </div><!-- /.single-article-content -->

        </div><!-- /.cat_article -->
       
             
    </div><!-- /.inner -->
 </div><!-- /.container -->

  
			                
			            
			                
			                

<?php get_footer();?>
 