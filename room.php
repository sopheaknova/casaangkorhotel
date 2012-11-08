<?php
/*
Template Name: Rooms
*/
?>
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
           <!--end static page rooms-->
             
              <?php  query_posts(array('post_type'=>'room','posts_per_page' => 4)); //,'artist'=>'KEJAJ' ?>
              <?php if (have_posts()): ?> 
              <?php while(have_posts()): the_post(); ?>
	          <div class="article-item">
	              <!-- One Third -->
	              <div class="one_third">
	            	<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute();?>" >
	            		 <?php 
							    if ( has_post_thumbnail() ) {
							       the_post_thumbnail('blog-post-room');  
						  }  ?>
	            	</a>
	              </div><!-- /.one_third -->
	              <!-- Two Third -->
	              <div class="two_third last">
	                 <h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute();?>">
	                 	    <?php the_title();?>
	                 	 </a>
	                 </h3>
	                 <p><?php echo sp_framework_post_content(); ?></p>
	                 <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute();?>" class="arrow-link">
	                 	Further Information on our <?php the_title();?>
	                 </a>
	              </div><!-- /.two_third -->
	          </div>  <!-- /.article-item -->  
	          <?php endwhile;?>
         
              <?php else: ?>
		      <h4>We cannot found this page.</h4> 
	          <?php endif; ?>
                         
          </div><!-- /.single-article-content -->
        </div><!-- /.cat_article -->

        <?php include('includes/latest-updated.php');?> 
    </div><!-- /.inner -->
 </div><!-- /.container -->
<?php get_footer();?>