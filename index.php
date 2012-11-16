<?php get_header(); ?>

<?php get_template_part( 'includes/featured-slide' ); ?>

  <div class="container">
  	<div class="inner">
    	<?php get_sidebar('home'); ?>
        <?php get_template_part( 'includes/latest-updated' ); ?>
    </div>
    <!-- /.inner -->
  </div>
  <!-- /.container -->

<?php get_footer(); ?>