<?php get_header(); ?>

  <div class="container">
  	<div class="inner">
    
    	<div class="cat-article">
       		<center>
			<h2 class="page-title"><?php _e( 'Well this is somewhat embarrassing, isn&rsquo;t it?', 'sp_framework' ); ?></h2>

            <article id="post-0" class="post no-results not-found">
                <h3><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for...', 'sp_framework' ); ?></h3>
            </article><!-- end .hentry -->
           </center>     
        </div>
        <!-- /.cat_article -->
        
        <?php include 'includes/latest-updated.php'; ?>
        
    </div>
    <!-- /.inner -->
  </div>
  <!-- /.container -->

<?php get_footer(); ?>