
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
            <?php if (get_post_format() == 'video') :?>
			
            <?php 
			$type = get_post_meta($post->ID, 'sp_video_type', true);
			$id = get_post_meta($post->ID, 'sp_video_id', true);
			?>
            
            <?php if($type == 'youtube') { ?>
             <img src="http://img.youtube.com/vi/<?php echo $id; ?>/0.jpg" width="139" height="105" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="alignleft" />
            <?php } elseif($type == 'vimeo') { ?>
            <?php $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$id.php")); ?>
             <img src="<?php echo $hash[0]['thumbnail_large']; ?>" width="139" height="105" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="alignleft" /> 
            <?php } elseif($type == 'daily') { ?>
             <img src="http://www.dailymotion.com/thumbnail/video/<?php echo $id; ?>" width="139" height="105" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="alignleft" /> 
            <?php } ?>
            
            <?php else: ?>
            
			<?php if (has_post_thumbnail()) : ?>
            <?php $news_img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'thumbnail'); ?>
            <img src="<?php echo $news_img_src[0]; ?>" alt="<?php the_title(); ?>" class="alignleft" />
            <?php endif; ?>
            
			<?php endif; ?>
            <div class="desc">
            <p>
            <?php 
				$excerpt = $post->post_excerpt;
				if($excerpt==''){
				$excerpt = get_the_content('');
				$excerpt = apply_filters( 'the_content', $excerpt );
				$excerpt = str_replace( ']]>', ']]&gt;', $excerpt );
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
    