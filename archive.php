<?php get_header(); ?>

<?php //include 'includes/heading-subpage.php'; ?>

  <div class="container">
  	<div class="inner">
    
    	<div class="cat-article">
        
        <div class="main">
    		<h2 class="page-title">
			<?php if ( have_posts() ): ?>
				<?php
                    if ( is_day() ) :
                        printf( __( 'Daily Archives: %s', 'casaangkor_hotel' ), '<span>' . get_the_date() . '</span>' );
                    elseif ( is_month() ) :
                        printf( __( 'Monthly Archives: %s', 'casaangkor_hotel' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
                    elseif ( is_year() ) :
                        printf( __( 'Yearly Archives: %s', 'casaangkor_hotel' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
                    else :
                        _e( 'Archives', 'casaangkor_hotel' );
                    endif;
                ?>
            </h2>

            <?php rewind_posts(); ?>
            
            <?php else: ?>
			
					<h2 class="page-title"><?php _e( 'Nothing Found', 'casaangkor_hotel' ); ?></h2>

			<?php endif; ?>
            
            <div class="news-list">
            <?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>
                <div class="article-item">
                <h3 class="cufon"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'casaangkor_hotel'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                <div class="two_third"><img src="<?php bloginfo('template_url'); ?>/images/event-01.jpg" alt="Our delicious restaurant" /></div>  
                <div class="one_third last">
                    <h4 class="date">19 Dec, 2012</h4>
                    <small>posted by: Casa</small>
                    <div class="shared-vert"><b>Love to share: </b><br /><img src="<?php bloginfo('template_url'); ?>/images/room/shared-verticle.gif" alt="" /></div>
                </div>
                <div class="clear"></div>
                    <p>Lorem ipsum dolor amet laboris consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</p>
              </div>
              <!-- /.article-item -->
                <?php endwhile; ?>
    
                <?php //echo ss_framework_pagination(); ?>

			<?php else: ?>
		
                <article id="post-0" class="post no-results not-found">
            
                    <h3><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for...', 'casaangkor_hotel' ); ?></h3>
    
                </article><!-- end .hentry -->

			<?php endif; ?>
            </div>
			<!-- /.news-list -->
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