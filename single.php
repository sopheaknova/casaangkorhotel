<?php get_header(); ?>

<?php include 'includes/heading-subpage.php'; ?>

  <div class="container">
  	<div class="inner">
    
    	<div class="cat-article">
        
        <div class="main">
    		<h2 class="page-title"><?php the_title(); ?></h2>
            <?php while ( have_posts() ): the_post(); ?>
            <div class="single-article-content">
            <div class="news-list">
            
			<?php if (has_post_thumbnail()) : ?>
            <?php $news_img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'blog-post'); ?>
            <div class="two_third"><img src="<?php echo $news_img_src[0]; ?>" alt="<?php the_title(); ?>" class="alignleft" /></div>
            <div class="one_third last">
                <h4 class="date">19 Dec, 2012</h4>
                <small>posted by: Casa</small>
                <div class="shared-vert"><b>Love to share: </b><br /><img src="<?php SP_BASE_URL; ?>images/room/shared-verticle.gif" alt="" /></div>
            </div>
            <div class="clear"></div>
            <?php endif; ?>
            
            	<?php the_content(); ?>
            </div>
            <!-- /.news-list -->    
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