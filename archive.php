<?php get_header(); ?>

  <div class="container">
  	<div class="inner">
    
    	<div class="cat-article">
        
        <div class="main">
    		<h2 class="page-title">
			<?php if ( have_posts() ): ?>
				<?php
                    if ( is_day() ) :
                        printf( __( 'Daily Archives: %s', 'sp_framework' ), '<span>' . get_the_date() . '</span>' );
                    elseif ( is_month() ) :
                        printf( __( 'Monthly Archives: %s', 'sp_framework' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
                    elseif ( is_year() ) :
                        printf( __( 'Yearly Archives: %s', 'sp_framework' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
                    else :
                        _e( 'Archives', 'sp_framework' );
                    endif;
                ?>
            </h2>

            <?php rewind_posts(); ?>
            
            <?php else: ?>
			
					<h2 class="page-title"><?php _e( 'Nothing Found', 'sp_framework' ); ?></h2>

			<?php endif; ?>
            <div class="single-article-content">
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
            
                    <h3><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for...', 'sp_framework' ); ?></h3>
    
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