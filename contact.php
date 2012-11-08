<?php
/*
Template Name: Contact
*/
?>
<?php  get_header();?>
<?php include 'includes/heading-subpage.php'; ?>

<!--Map of casaankorhotel-->
<div id="map-wide">
  	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript">					
	  jQuery(document).ready(function ($)
		{
			var myLatlng = new google.maps.LatLng(13.3671, 103.8528);
			var myOptions = {							  
			  zoom: 14,
			  center: myLatlng,
			  mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			var map = new google.maps.Map(document.getElementById("c-map"), myOptions);
			
			
			//Grey map style
		  var styleGrey = [
			{
			  stylers: [
				{ hue: "#e6e3ff" },
				{ saturation: -20 }
			  ]
			},{
			  featureType: "road",
			  elementType: "geometry",
			  stylers: [
			  	{ lightness: 50 },
				{ visibility: "simplified" }
			  ]
			},{
			  featureType: "road",
			  elementType: "labels",
			  stylers: [
				{ visibility: "on" }
			  ]
			},{
			  featureType: "road",
			  elementType: "labels.text.stroke",
			  stylers: [
				{ visibility: "off" }
			  ]
			}
		];
		var styledMapOptions = {name: "Phive"};
		var image = '<?php bloginfo("template_url");?>/images/casa-marker.png';
		var greyMapType = new google.maps.StyledMapType(styleGrey, styledMapOptions);
		map.mapTypes.set("blackMap", greyMapType);
		map.setMapTypeId("blackMap");
			
			var marker = new google.maps.Marker({
				position: myLatlng, 
				map: map,
				icon: image,
				animation: google.maps.Animation.DROP,
				title:"Casa Angkor Hotel"
			});
		});
	</script>
	<div id="c-map"></div>
  </div><!--/#map-wide-->
<div class="container">
   <div class="inner">
  		<!---this is for static -->
    	<div class="cat-article">
        <center>
    	  <h2 class="page-title">Contact</h2>
            
          <div class="single-article-content">
            	<h4>Casa Angkor Hotel</h4>
                <p>
                Oum Khun (St.), Mondul 1 Village, Sangkat Svay Dangkum, Siem Reap City, <br />
                Siem Reap, Cambodia<br />
                Tel: +855 63 963 658-9, (855) 63 966 234 <br />
                Fax: +855 63 963 657 <br />
                Email: reservation@casaangkorhotel.com</p>
          </div>
          <!--/.single-article-content -->
          </center>
        </div> <!--/end cat-article--> 
        <?php include('includes/latest-updated.php');?> 
    </div> <!-- /.inner -->
</div> <!-- /.container -->

<?php get_footer();?>