<?php global $data; ?>
<?php
	    $type = get_post_meta($post->ID, 'sp_video_type', true);
	    $id = get_post_meta($post->ID, 'sp_video_id', true);
        ?>
	

	<div class="two_third">
	<?php if ( is_archive() || is_category() ) : ?>
	
	<?php if($type == 'youtube') { ?>
		<img src="http://img.youtube.com/vi/<?php echo $id; ?>/0.jpg" width="431" height="242" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
	<?php } elseif($type == 'vimeo') { ?>
    <?php $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$id.php")); ?>
	 <img src="<?php echo $hash[0]['thumbnail_large']; ?>" width="431" height="242" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /> 
	<?php } elseif($type == 'daily') { ?>
	<img src="http://www.dailymotion.com/thumbnail/video/<?php echo $id; ?>" width="431" height="242" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /> 
	<?php } ?>
    
    <?php else: ?>
    
    <?php if($type == 'youtube') { ?>
		<iframe width="431" height="242" src="http://www.youtube.com/embed/<?php echo $id; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
	<?php } elseif($type == 'vimeo') { ?>
	<iframe src="http://player.vimeo.com/video/<?php echo $id; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ba0d16" width="431" height="242" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
	<?php } elseif($type == 'daily') { ?>
	<iframe frameborder="0" width="431" height="242" src="http://www.dailymotion.com/embed/video/<?php echo $id ?>?logo=0"></iframe>
	<?php } ?>
    
    <?php endif; ?>
    </div>
    <!-- /.two_third -->
    
<div class="one_third last">
    <h4 class="date"><?php  echo get_the_date() ; ?></h4>
    <?php if ($data['disable_post_meta'] == "no") : ?>
    <small>posted by: <?php echo get_the_author(); ?></small>
    <?php endif; ?>
    <?php if ($data['disable_share_post'] == "no") : ?>
    <div class="shared-vert"><b><?php echo $data['share_txt']; ?> </b>
    <?php sp_show_post_share();?>
    </div>
    <?php endif; ?>
</div>
<div class="clear"></div>
<?php echo sp_framework_post_content(); ?>