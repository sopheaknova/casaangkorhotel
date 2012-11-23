<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories = array();  
		$of_categories_obj = get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp = array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages = array();
		$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp = array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select = array("one","two","three","four","five"); 
		$of_options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" => "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = STYLESHEETPATH. '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_bloginfo('template_url').'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr = wp_upload_dir();
		$all_uploads_path = $uploads_arr['path'];
		$all_uploads = get_option('of_uploads');
		$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 
		
		//cycle Slider
		$cycle_effects = array('blindX' => 'blindX', 'blindY' => 'blindY', 'blindZ' => 'blindZ', 'cover' => 'cover', 'curtainX' => 'curtainX','curtainY' => 'curtainY', 'fade' => 'fade', 'fadeZoom' => 'fadeZoom', 'growX' => 'growX', 'growY' => 'growY', 
	 'none' => 'none', 'scrollUp' => 'scrollUp', 'scrollDown' => 'scrollDown', 'scrollLeft' => 'scrollLeft', 
	 'scrollRight' => 'scrollRight', 'scrollHorz' => 'scrollHorz', 'scrollVert' => 'scrollVert',
	'shuffle' => 'shuffle', 'slideX' => 'slideX', 'slideY' => 'slideY', 'toss' => 'toss', 
	 'turnUp' => 'turnUp', 'turnDown' => 'turnDown', 'turnLeft' => 'turnLeft', 'turnRight' => 'turnRight', 'uncover' => 'uncover', 'wipe' => 'wipe', 'zoom' => 	'zoom');


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

// General
$of_options[] = array( "name" => "General Settings",
					"type" => "heading");
									
$of_options[] = array( "name" => "Custom logo upload",
					"desc" => "Upload your own logo (.jpg, .gif or .png)",
					"id" => "casa_logo",
					"std" => SP_BASE_URL . "images/logo.jpg",
					"mod" => "min",
					"type" => "media");

$of_options[] = array( "name" => "Custom favicon upload",
					"desc" => "Upload your own favicon that display on browser address bar. (.ico). Anyway you can convert png to ico by click on<a href='http://www.convertico.com'> Convert ico</a>",
					"id" => "casa_favico",
					"std" => SP_BASE_URL . "favicon.ico",
					"mod" => "min",
					"type" => "media");					
					
/*$of_options[] = array( "name" => "Booking button text",
					"desc" => "Enter the text for Booking Button. e.g: Reservation or Book Now",
					"id" => "booking_btn_txt",
					"std" => "Booking",
					"type" => "text"); 	

$of_options[] = array( "name" => "Disable Booking button",
					"desc" => "Show or hide Booking button",
					"id" => "disable_booking_btn",
					"std" => "no",
					"type" => "radio",
					"options" => array(
						'yes' => 'Yes',
						'no' => 'No')
					);*/

$of_options[] = array( "name" => "Disable Booking Form",
					"desc" => "Show or hide Booking Form",
					"id" => "disable_booking_form",
					"std" => "no",
					"type" => "radio",
					"options" => array(
						'yes' => 'Yes',
						'no' => 'No')
					);										
					
$of_options[] = array( "name" => "Select Category Latest Offer",
					"desc" => "A list of all the categories being used on the site.",
					"id" => "latest-offer_category",
					"std" => "Select a category:",
					"type" => "select",
					"options" => $of_categories);
					
$of_options[] = array( "name" => "Select Page Privacy Policy",
					"desc" => "Being Concellation Policy being used on the site.",
					"id" => "policy_page",
					"std" => "Select page:",
					"type" => "select",
					"options" => $of_pages);					
					
// Post Setting
$of_options[] = array( "name" => "Post Setting",
					"type" => "heading");
					
$of_options[] = array( "name" => "Excerpt",
					"desc" => "Lenght of words to be show in News/Event category",
					"id" => "post_excerpt",
					"std" => 40,
					"type" => "text"
					);		

$of_options[] = array( "name" => "Social Share text",
					"desc" => "Enter Share's text that present for each News/Event post",
					"id" => "share_txt",
					"std" => "Love to share:",
					"type" => "text"
					);	

$of_options[] = array( "name" => "Disable Share button",
					"desc" => "Show or hide Share button for each news/events and latest offer",
					"id" => "disable_share_post",
					"std" => "no",
					"type" => "radio",
					"options" => array(
						'yes' => 'Yes',
						'no' => 'No')
					);
					
$of_options[] = array( "name" => "Disable post meta",
					"desc" => "Show or hide Posted By",
					"id" => "disable_post_meta",
					"std" => "no",
					"type" => "radio",
					"options" => array(
						'yes' => 'Yes',
						'no' => 'No')
					);					
					
$of_options[] = array( "name" => "View room detail text",
					"desc" => "Enter the text to present room detail",
					"id" => "room_detail_txt",
					"std" => "Further Information on our",
					"type" => "text"
					);																						
					
// Featured Slider
$of_options[] = array( "name" => "Slider Setting",
					"type" => "heading");
					
$of_options[] = array( "name" => "Effect",
					"desc" => "select the name of transition effect",
					"id" => "cycle_effect",
					"std" => "fade",
					"type" => "select",
					"options" => $cycle_effects);

$of_options[] = array( "name" => "Easiang",
					"desc" => "easing method for transitions <a href='http://ralphwhitbeck.com/demos/jqueryui/effects/easing'>more info</a>",
					"id" => "cycle_ease",
					"std" => "easeInOutBack",
					"type" => "text"
					);	
					
$of_options[] = array( "name" => "Speed",
					"desc" => "speed of the transition",
					"id" => "cycle_speed",
					"std" => "3000",
					"type" => "text"
					);					

$of_options[] = array( "name" => "Timeout",
					"desc" => "milliseconds between slide transitions",
					"id" => "cycle_timeout",
					"std" => "3000",
					"type" => "text"
					);

// Contact
$of_options[] = array( "name" => "Contact",
					"type" => "heading");
					
$of_options[] = array( "name" => "Select a Contact page",
					"desc" => "Select Contact page",
					"id" => "contact_page",
					"std" => "",
					"type" => "select",
					"options" => $of_pages);
					
$of_options[] = array( "name" => "Latitude",
					"desc" => "Latitude of google map see <a href='http://itouchmap.com'>itouchmap.com</a>",
					"id" => "map_lat",
					"std" => "13.36074",
					"type" => "text"
					);

$of_options[] = array( "name" => "Longitude",
					"desc" => "Longitude of google map see <a href='http://itouchmap.com'>itouchmap.com</a>",
					"id" => "map_long",
					"std" => "103.85662",
					"type" => "text"
					);										
					
$of_options[] = array( "name" => "Address",
					"desc" => "Enter your company or organization address",
					"id" => "address",
					"std" => "Oum Khun(St.) Mondul I village, Svay Dangkum",
					"type" => "text"
					);
					
$of_options[] = array( "name" => "Provice",
					"desc" => "Enter the state, city or province's names",
					"id" => "province",
					"std" => "Siem Reap",
					"type" => "text"
					);	
					
$of_options[] = array( "name" => "Country",
					"desc" => "Enter the country name",
					"id" => "country",
					"std" => "Cambodia",
					"type" => "text"
					);	
					
$of_options[] = array( "name" => "Telephone line 1",
					"desc" => "",
					"id" => "tel_1",
					"std" => "+855 63 963 658-9",
					"type" => "text"
					);	
					
$of_options[] = array( "name" => "Telephone line 2",
					"desc" => "",
					"id" => "tel_2",
					"std" => "+855 63 966 234",
					"type" => "text"
					);																								
					
$of_options[] = array( "name" => "Fax",
					"desc" => "",
					"id" => "fax",
					"std" => "+855 63 963 657",
					"type" => "text"
					);
					
$of_options[] = array( "name" => "Email",
					"desc" => "",
					"id" => "email",
					"std" => "reservation@casaangkorhotel.com",
					"type" => "text"
					);					
										
// Footer
$of_options[] = array( "name" => "Footer",
					"type" => "heading");	
					
$of_options[] = array( "name" => "Copyright",
					"desc" => "footer copyrights text",
					"id" => "copyrights",
					"std" => "© Casa Angkor Hotel, All right Reserved ",
					"type" => "text"
					);
					
$of_options[] = array( "name" => "Custom facbook logo upload",
					"desc" => "Upload facebook logo (.jpg, .gif or .png)",
					"id" => "facebook_logo",
					"std" => SP_BASE_URL . "images/social/facebook.jpg",
					"mod" => "min",
					"type" => "media");

$of_options[] = array( "name" => "Link to facbook",
					"desc" => "Enter the link or URL for facebook",
					"id" => "facebook_link",
					"std" => "http://www.facebook.com/casaangkorhotel",
					"type" => "text"
					);							
					
$of_options[] = array( "name" => "Custom Tripadvisor logo upload",
					"desc" => "Upload Tripadvisor logo (.jpg, .gif or .png)",
					"id" => "tripadvisor_logo",
					"std" => SP_BASE_URL . "images/social/trip.jpg",
					"mod" => "min",
					"type" => "media");	
					
$of_options[] = array( "name" => "Link to Tripadvisor",
					"desc" => "Enter the link or URL for Tripadvisor",
					"id" => "tripadvisor_link",
					"std" => "http://www.tripadvisor.com/Hotel_Review-g297390-d547764-Reviews-Casa_Angkor_Hotel-Siem_Reap_Siem_Reap_Province.html",
					"type" => "text"
					);
					
$of_options[] = array( "name" => "Custom Agoda logo upload",
					"desc" => "Upload Agoda logo (.jpg, .gif or .png)",
					"id" => "agoda_logo",
					"std" => SP_BASE_URL . "images/social/agoda.jpg",
					"mod" => "min",
					"type" => "media");

$of_options[] = array( "name" => "Link to Agoda",
					"desc" => "Enter the link or URL for Agoda",
					"id" => "agoda_link",
					"std" => "http://www.agoda.com/asia/cambodia/siem_reap/casa_angkor_hotel.html",
					"type" => "text"
					);							
					
$of_options[] = array( "name" => "Custom Expedia logo upload",
					"desc" => "Upload Expedia logo (.jpg, .gif or .png)",
					"id" => "expedia_logo",
					"std" => SP_BASE_URL . "images/social/exp.jpg",
					"mod" => "min",
					"type" => "media");	
					
$of_options[] = array( "name" => "Link to Expedia",
					"desc" => "Enter the link or URL for Tripadvisor",
					"id" => "expedia_link",
					"std" => "http://www.expedia.com/Siem-Reap-Hotels-Casa-Angkor-Hotel.h2435217.Hotel-Information",
					"type" => "text"
					);																										
					
// Backup Options
$of_options[] = array( "name" => "Backup Options",
					"type" => "heading");
					
$of_options[] = array( "name" => "Backup and Restore Options",
                    "id" => "of_backup",
                    "std" => "",
                    "type" => "backup",
					"desc" => 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
					);
					
$of_options[] = array( "name" => "Transfer Theme Options Data",
                    "id" => "of_transfer",
                    "std" => "",
                    "type" => "transfer",
					"desc" => 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".
						',
					);
					
	}
}
?>
