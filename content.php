<?php if (has_post_thumbnail()) : ?>
<?php $news_img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'large'); ?>
<div class="two_third">
<img src="<?php echo $news_img_src[0]; ?>" alt="<?php the_title(); ?>" class="alignleft" /></div>
<div class="one_third last">
    <h4 class="date"><?php  echo get_the_date() ; ?></h4>
    <small>posted by: <?php echo get_the_author(); ?></small>
    <div class="shared-vert"><b>Love to share: </b>
    <?php sp_show_post_share();?>
    </div>
</div>
<div class="clear"></div>
<?php endif; ?>

<?php echo sp_framework_post_content(); ?>