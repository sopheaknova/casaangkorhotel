<?php get_header(); ?>

  <div class="container">
  	<div class="inner">
    
    	<div class="cat-article">
        
        <div class="main">
    		<h2 class="page-title">
			<?php if ( have_posts() ): ?>
				<?php printf( __( '%s', 'sp_framework' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
            </h2>

            <?php rewind_posts(); ?>
            
            <?php else: ?>
					<h2 class="page-title"><?php _e( 'Nothing Found', 'sp_framework' ); ?></h2>
			<?php endif; ?>
            
            <div class="single-article-content">
            <?php if ( category_description() ): ?>
                <p class="page-subdescription"><?php echo category_description(); ?></p>
            <?php endif; ?>    
            
            <div class="news-list">
            <?php if ( have_posts() ) : ?>
				   
				<?php while ( have_posts() ) : the_post(); ?>
                <div class="article-item">
                <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sp_framework'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
                    <h3 class="cufon"><?php the_title(); ?></h3>
                </a>
				<?php get_template_part( 'content', get_post_format() ); ?>
                </div>
                <!-- /.article-item -->
                <?php endwhile; ?>
    
                <?php echo sp_framework_pagination(); ?>

			<?php else: ?>
		
                <article id="post-0" class="post no-results not-found">
            
                    <h3><?php _e( 'Sorry, currently there are no News or Events. We will update soon in each season', 'sp_framework' ); ?></h3>
    
                </article><!-- end .hentry -->

			<?php endif; ?>
            </div>
			<!-- /.news-list -->
            </div>
            <!-- /.single-article-content -->
        </div>
        <!-- /.main -->
        <?php get_sidebar(); ?>
        </div>
        <!-- /.cat_article -->
        
        <?php get_template_part( 'includes/latest-updated' ); ?>
        
    </div>
    <!-- /.inner -->
  </div>
  <!-- /.container -->

<?php get_footer(); ?>