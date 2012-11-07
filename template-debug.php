<?php
/*
Template Name: Debug
*/
get_header();
?>
<?php include 'includes/heading-subpage.php'; ?>

  <div class="container">
  	<div class="inner">
    
    	<div class="cat-article">
        <h2 class="page-title"><?php the_title(); ?></h2>
		<pre>
		<?php 
		$data_r = print_r($data, true); 
		$data_r_sans = htmlspecialchars($data_r, ENT_QUOTES); 
		echo $data_r_sans; 
		
		//global $data; //fetch options stored in $data
		//echo $data['footer_text']; //get $data['id'] then echo the value
		?>
		</pre>
	
		</div>
        <!-- /.cat_article -->
        
        <?php include 'includes/latest-updated.php'; ?>
        
    </div>
    <!-- /.inner -->
  </div>
  <!-- /.container -->

<?php get_footer(); ?>