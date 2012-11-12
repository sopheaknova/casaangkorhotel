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
			var latitude = <?php echo $data['map_lat'];?>;
			var longitude = <?php echo $data['map_long'];?>;
			var myLatlng = new google.maps.LatLng(latitude, longitude);
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
    	  <h2 class="page-title"><?php echo $data['contact_page']; ?></h2>
            
          <div class="single-article-content">
            	<h4><?php bloginfo("name");   // get site title of website?></h4>
                <p><?php echo $data['address'] ;?>
                <br />
                <?php echo $data['province'].' , '.$data['country']."." ;?><br />
                Tel: <?php echo $data['tel_1'].' , '.$data['tel_2'] ;?>  <br />
                Fax:  <?php echo $data['fax'] ;?><br />
                Email: <?php echo $data['email'] ;?></p>
          </div>
          <!--/.single-article-content -->
          </center>
        </div> <!--/end cat-article--> 
        <?php include('includes/latest-updated.php');?> 
    </div> <!-- /.inner -->
</div> <!-- /.container -->

<?php get_footer();?>