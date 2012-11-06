<?php get_header(); ?>
  <div class="container">
  	<div class="inner">
    
    	<div class="cat-article">
        
        <div class="main">
    		<h2 class="page-title"><?php the_title(); ?></h2>
            <div class="single-article-content">
            <div class="news-list">
			<?php while ( have_posts() ): the_post(); ?>
            <?php get_template_part( 'content', get_post_format() ); ?>
            <?php endwhile; ?>
			</div>
            <!-- /.news-list -->    
            </div>
            <!-- /.single-article-content -->
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