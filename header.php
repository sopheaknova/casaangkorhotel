<!DOCTYPE html>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">     

<title><?php wp_title('|', true, 'right'); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" /> 

<!--[if lt IE 9]>
<script src="<?php bloginfo('template_url'); ?>/js/IE9.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/html5.js"></script>
<![endif]-->

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- wrapper -->
<div id="wrapper">
  <header id="header">
  	<div class="inner"> 
  	<div class="logo">
	  	<h2>
        <a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>">
            <img src="<?php bloginfo('template_url'); ?>/images/logo.jpg" alt="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>">
        </a>
        </h2>
  	</div>
  	<div class="info-top">
		<span class="tel">T: +855 63 963 658-9<br/>
							&nbsp;(855) 63 966 234
		</span>
		<span class="addr">Oum Khun(St.) Mondul I village, Svay Dangkum <br>
			Siem Reap, Cambodia <a href="#" class="marker-icon">View Map</a>
        </span>
  	</div>
    </div>
  </header>
 
  <nav class="menu-bar">
  	<div class="inner">
  	<?php echo sp_framework_main_navigation(); ?>
    <div class="booking-top">
    	<a href="#" class="button dark-purple">Book Now</a>
    </div>
    </div>
  </nav>