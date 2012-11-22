Cufon.replace('.cat-article h2, .news-wrap .items h4, .cufon', { fontFamily: 'Myriad Pro Bold', hover: true });

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


//bxSlider for Latest news updated
$(".news-wrap").bxSlider({
    displaySlideQty: 2,
    moveSlideQty: 1,
	auto: false
  });	
	
//Date picker
$( "#checkinDate, #checkoutDate" ).datepicker({
            numberOfMonths: 2,
			dateFormat: 'yy-mm-dd',
            showButtonPanel: true
        });	
	
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