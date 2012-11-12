
    <?php 
	$args = array (
				'posts_per_page'	=> 8,
				'category__not_in'			=> 1,
				//'cat'	=>	7,
				'orderby'			=> 'rand'
			);
	$news_query = new WP_Query($args);
	if ($news_query->have_posts()) : ?>
    
<!-- Latest updated -->
<div id="latest-updated">
    <ul class="news-wrap">
    
    <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
        <li>
            <div class="items">
            <h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sp_framework'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
            <?php if (has_post_thumbnail()) : ?>
            <?php $news_img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'thumbnail'); ?>
            <img src="<?php echo $news_img_src[0]; ?>" alt="<?php the_title(); ?>" class="alignleft" />
            <?php endif; ?>
            <div class="desc">
            <p>
            <?php 
				$excerpt = $post->post_excerpt;
				if($excerpt==''){
				$excerpt = get_the_content('');
				}
				echo wp_html_excerpt($excerpt,200) . ' ...'; 
			?>
            </p>
            <a class="readmore" href="<?php the_permalink(); ?>"><?php _e( 'More information', 'sp_framework' ); ?></a>
            </div>
           </div>
        </li>
    <?php endwhile; ?>
    </ul>        	
</div>
<!-- /#latest-updated -->
    <?php endif; ?>    
    