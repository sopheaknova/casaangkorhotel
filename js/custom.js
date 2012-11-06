Cufon.replace('.cat-article h2, .news-wrap .items h4, .cufon', { fontFamily: "Helvetica LT Std" });

jQuery(document).ready(function($) {

//dropdown menu navigation
	jQuery(".menu-bar ul.menu-nav a").removeAttr('title');
	jQuery(".menu-bar ul.menu-nav ul").css({display: "none"}); // Opera Fix
	jQuery(".menu-bar ul.menu-nav li").each(function()
		{	
	var jQuerysubmeun = jQuery(this).find('ul:first');
	jQuery(this).hover(function()
		{	
	jQuerysubmeun.stop().css({overflow:"hidden", height:"auto", display:"none", paddingTop:0}).slideDown(250, function()
		{
	jQuery(this).css({overflow:"visible", height:"auto"});
		});	
		},
	function()
		{	
	jQuerysubmeun.stop().slideUp(250, function()
		{	
	jQuery(this).css({overflow:"hidden", display:"none"});
			});
		});	
	});

//Featured Slideshow
$(".slideshow").cycle({
		fx: 	'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
		speed:    2500,
		delay: 4000,
		pause:	1,
		pager:	'#nav',
		prev:   '.prev', 
    	next:   '.next',
		before:     function() {
            $('#caption h3').html(this.alt);
        }
	});
	
//Room detail slideshow
$(".room-slide").cycle({
	fx: 	'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
	speed:    2500,
	delay: 3000,
	pause:	1,
	
	});

//bxSlider for Latest news updated
$(".news-wrap").bxSlider({
    displaySlideQty: 2,
    moveSlideQty: 1,
	auto: false
  });	
	
//UItoTop (Back to Top)
(function() {

		var settings = {
				button      : '#back-to-top',
				text        : 'Back to Top',
				min         : 200,
				fadeIn      : 400,
				fadeOut     : 400,
				scrollSpeed : 800,
				easingType  : 'easeInOutExpo'
			},
			oldiOS     = false,
			oldAndroid = false;

		// Detect if older iOS device, which doesn't support fixed position
		if( /(iPhone|iPod|iPad)\sOS\s[0-4][_\d]+/i.test(navigator.userAgent) )
			oldiOS = true;

		// Detect if older Android device, which doesn't support fixed position
		if( /Android\s+([0-2][\.\d]+)/i.test(navigator.userAgent) )
			oldAndroid = true;
	
		$('body').append('<a href="#" id="' + settings.button.substring(1) + '" title="' + settings.text + '">' + settings.text + '</a>');

		$( settings.button ).click(function( e ){
				$('html, body').animate({ scrollTop : 0 }, settings.scrollSpeed, settings.easingType );

				e.preventDefault();
			});

		$(window).scroll(function() {
			var position = $(window).scrollTop();

			if( oldiOS || oldAndroid ) {
				$( settings.button ).css({
					'position' : 'absolute',
					'top'      : position + $(window).height()
				});
			}

			if ( position > settings.min ) 
				$( settings.button ).fadeIn( settings.fadeIn );
			else 
				$( settings.button ).fadeOut( settings.fadeOut );
		});

	})();
	
/************************************
 * Shortcodes/framework
**************************************/

//toggle
jQuery("h4.toggle").click(function () {
	$(this).next(".toggle_content").slideToggle();
	$(this).toggleClass("active_toggle");
	$(this).parent().toggleClass("toggle_var");
});	

$("h4.toggle_min").click(function () {
	$(this).next(".toggle_content_min").slideToggle();
	$(this).toggleClass("active_toggle_min");
});
	
	
});