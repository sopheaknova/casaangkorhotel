<?php
	/* get theme options for further processing */
	global $data; 
?>

<!DOCTYPE html>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">     

<title><?php wp_title('|', true, 'right'); ?></title>

<?php if ($data['disable_share'] == '') { ?>
<meta property="og:title" content="<?php wp_title('', true, 'right'); ?>"/>
<meta property="og:type" content="article"/>
<meta property="og:url" content="<?php the_permalink(); ?>"/>
<?php if( is_home() || is_front_page() ) { ?>
<meta property="og:image" content="<?php if($data['casa_logo'] != '') { echo $data['casa_logo']; } else { echo SP_BASE_URL .'images/logo.jpg';} ?>"/>
<meta property="og:description" content="<?php bloginfo('description'); ?>"/>
<?php } elseif (is_single() || is_page() ) { if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<meta property="og:image" content="<?php echo sp_get_post_image('large'); ?>"/>
<meta property="og:description" content="<?php the_excerpt_rss(); ?>"/>
<?php endwhile; endif; wp_reset_query(); } ?>
<meta property="og:site_name" content="<?php echo bloginfo('name'); ?>"/>
<?php } ?>

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
			<?php echo $data['province']; ?>, <?php echo $data['country']; ?> 
            <?php $page_contact_slug = get_page_by_path($data['contact_page']); ?>
            <a href="<?php echo get_page_link($page_contact_slug->ID); ?>" class="marker-icon">View Map</a>
        </span>
  	</div>
    </div>
  </header>
 
  <nav class="menu-bar">
  	<div class="inner">
  	<?php echo sp_framework_main_navigation(); ?>
    <?php if ($data['disable_booking_btn'] !== 'yes') { ?>
    <?php 
		$nxt_day = date('d')+1;
		$booking_link = 'http://66.70.56.40/00000001/032/023112/dispopricev2.phtml?showPromotions=1&langue=&locale=en_GB&Clusternames=ASIAKHHTLCasa&cluster=ASIAKHHTLCasa&Hotelnames=ASIAKHHTLCasa&hname=ASIAKHHTLCasa&arrivalDateValue=' . date('Y-m-d') . '&frommonth=' . date('m') . '&fromday=' . date('d') . '&fromyear=' . date('Y') . '&tomonth=' . date('m') .'&today=' . $nxt_day .'&toyear=' . date('Y') .'&adulteresa=1&nbAdultsValue=1&AccessCode=&accessCode=&redir=BIZ-so5523q0o4&rt=1353054355';
	?>
    <div class="booking-top">
    <a href="#" onClick="window.open('<?php echo $booking_link; ?>', '<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>', 960, 700);" class="button dark-purple"><?php echo $data['booking_btn_txt']; ?></a>
    </div>
    <?php } ?>     
    </div>
  </nav>