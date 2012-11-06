<?php if (has_post_thumbnail()) : ?>
<?php $news_img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'blog-post'); ?>
<div class="two_third"><img src="<?php echo $news_img_src[0]; ?>" alt="<?php the_title(); ?>" class="alignleft" /></div>
<div class="one_third last">
    <h4 class="date"><?php  echo get_the_date() ; ?></h4>
    <small>posted by: <?php echo get_the_author(); ?></small>
    <div class="shared-vert"><b>Love to share: </b><br /><img src="<?php echo SP_BASE_URL; ?>images/room/shared-verticle.gif" alt="" /></div>
</div>
<div class="clear"></div>
<?php endif; ?>

<?php echo sp_framework_post_content(); ?>