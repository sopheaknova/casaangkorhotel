<?php get_header(); ?>

<?php get_template_part( 'includes/featured-slide' ); ?>

  <div class="container">
  	<div class="inner">
    	<?php if ( $data['disable_booking_form'] !== 'yes') : ?>
    	<?php get_template_part( '/includes/fastbooking-search' ); ?>
        <?php endif; ?>
    	<?php get_sidebar('home'); ?>
        <?php get_template_part( 'includes/latest-updated' ); ?>
    </div>
    <!-- /.inner -->
  </div>
  <!-- /.container -->

<?php get_footer(); ?>