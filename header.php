<?php
	/* get theme options for further processing */
	global $data; 
?>

<!DOCTYPE html>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">     

<title><?php wp_title('|', true, 'right'); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if($data['casa_favico']) : ?>
<link rel="shortcut icon" href="<?php echo $data['casa_favico']; ?>" type="image/x-icon" /> 
<?php endif; ?>

<!--[if lt IE 9]>
<script src="<?php bloginfo('template_url'); ?>/js/IE9.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/html5.js"></script>
<![endif]-->

<?php wp_head(); ?>
<script type="text/javascript">
//Featured Slideshow
$(".slideshow").cycle({
    fx:   '<?php echo $data['cycle_effect'] ;?>', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
    speed:  <?php echo $data['cycle_speed'] ;?>,
    delay: <?php echo $data['cycle_timeout'] ;?>,
    easing: '<?php echo $data['cycle_ease'] ;?>',
    pause:  1,
    pager:  '#nav',
    prev:   '.prev', 
      next:   '.next',
    before:     function() {
            $('#caption h3').html(this.alt);
        }
  });

</script>
</head>
<body <?php body_class(); ?>>

<!-- wrapper -->
<div id="wrapper">
  <header id="header">
  	<div class="inner"> 
  	<div class="logo">
	  	<h2>
        <a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>">
            <img src="<?php echo $data['casa_logo']; ?>" alt="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>">
        </a>
        </h2>
  	</div>
  	<div class="info-top">
		<span class="tel"><?php echo $data['tel_1']; ?><br/>
							&nbsp;<?php echo $data['tel_2']; ?>
		</span>
		<span class="addr"><?php echo $data['address']; ?> <br>
			<?php echo $data['province']; ?>, <?php echo $data['country']; ?> <a href="<?php echo get_page_link( sp_get_page_by_slug($data['contact_page']) ); ?>" class="marker-icon">View Map</a>
        </span>
  	</div>
    </div>
  </header>

 
  <nav class="menu-bar">
  	<div class="inner">
  	<?php echo sp_framework_main_navigation(); ?>
    <div class="booking-top">
    	<a href="#" class="button dark-purple"><?php echo $data['booking_btn_txt']; ?></a>
    </div>
    </div>
  </nav>