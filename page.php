<?php get_header(); ?>

<?php get_template_part( 'includes/heading-subpage'); ?>

  <div class="container">
  	<div class="inner">
    	
    	<div class="cat-article">
        
    		<h2 class="page-title"><?php the_title(); ?></h2>
            <?php while ( have_posts() ): the_post(); ?>
            <div class="single-article-content">
            	<?php the_content(); ?>
            </div>
            <!-- /.single-article-content -->
            <?php endwhile; ?>

        </div>
        <!-- /.cat_article -->
        
        <?php get_template_part( 'includes/latest-updated' ); ?>
        
    </div>
    <!-- /.inner -->
  </div>
  <!-- /.container -->

<?php get_footer(); ?>