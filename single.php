<?php get_header(); ?>

<?php include 'includes/heading-subpage.php'; ?>

  <div class="container">
  	<div class="inner">
    
    	<div class="cat-article">
        
        <div class="main">
    		<h2 class="page-title"><?php the_title(); ?></h2>
            <?php while ( have_posts() ): the_post(); ?>
            <div class="single-article-content">
            	<?php the_content(); ?>
            </div>
            <!-- /.single-article-content -->
            <?php endwhile; ?>
		
        </div>
        <!-- /.main -->
        <?php get_sidebar(); ?>
        </div>
        <!-- /.cat_article -->
        
        <?php include 'includes/latest-updated.php'; ?>
        
    </div>
    <!-- /.inner -->
  </div>
  <!-- /.container -->

<?php get_footer(); ?>