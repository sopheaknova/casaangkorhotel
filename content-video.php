<?php
	    $type = get_post_meta($post->ID, 'sp_video_type', true);
	    $id = get_post_meta($post->ID, 'sp_video_id', true);
	    $vid_show = get_post_meta($post->ID, 'sp_video_show', true) ? get_post_meta($post->ID, 'sp_video_show', true) : true;
        ?>
	
<?php if($vid_show) : ?>
	<div class="two_third">
	<?php if($type == 'youtube') { ?>
		<iframe width="431" height="242" src="http://www.youtube.com/embed/<?php echo $id; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
	<?php } elseif($type == 'vimeo') { ?>
	<iframe src="http://player.vimeo.com/video/<?php echo $id; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ba0d16" width="431" height="242" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
	<?php } elseif($type == 'daily') { ?>
<iframe frameborder="0" width="431" height="242" src="http://www.dailymotion.com/embed/video/<?php echo $id ?>?logo=0"></iframe>
	<?php } ?>
    </div>
    <!-- /.two_third -->
    
    
<div class="one_third last">
    <h4 class="date"><?php  echo get_the_date() ; ?></h4>
    <small>posted by: <?php echo get_the_author(); ?></small>
    <div class="shared-vert"><b><?php echo $data['share_txt']; ?> </b><br /><?php sp_show_post_share();?></div>
</div>
<div class="clear"></div>
<?php endif;?>
<?php echo sp_framework_post_content(); ?>