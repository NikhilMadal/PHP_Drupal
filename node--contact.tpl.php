
<div class="container">

	<div class="row">
	
		<div class="col-md-6">
		  <?php 
		    require_once drupal_get_path('module', 'contact') .'/contact.pages.inc'; 
	      $contact_form = drupal_get_form('contact_site_form');
	      print drupal_render($contact_form); 
			?>  
		</div>

		<div class="col-md-6">
			<?php
	      // We hide the comments and links now so that we can render them later.
	      hide($content['comments']);
	      hide($content['links']);
	      hide($content['field_map_address']);
	      hide($content['field_map_html']);
	      hide($content['field_map_latitude']);
	      hide($content['field_map_longitude']);
	      print render($content);
	    ?>
		</div>
		


<hr/>
<div class="col-md-6" style="margin-bottom: 28px;">
<h2 class="short" style="text-align: center;">Office site</h2>
<a class="img-thumbnail1 lightbox pull-left" data-plugin-options='{"type":"image"}' href="./sites/all/themes/Porto/img/projects/office.jpg"><img class="img-responsive" src="./sites/all/themes/Porto/img/projects/office.jpg" width="243" /> <span class="zoom"> <i class="icon1 icon-16 icon-white-shadowed icon-search"></i></span> </a>
</div>
<div class="col-md-6" style="margin-bottom: 28px;">
<h2 class="short" style="text-align: center;">Godown site</h2>
<a  class="img-thumbnail1 lightbox pull-left" data-plugin-options='{"type":"image"}' href="./sites/all/themes/Porto/img/projects/godown.jpg"><img class="img-responsive" src="./sites/all/themes/Porto/img/projects/godown.jpg" width="243" /> <span class="zoom"> <i class="icon1 icon-16 icon-white-shadowed icon-search"></i></span> </a>

</div>
<br>
<br>

	</div></div><br>
	
<style>




.img-thumbnail1 {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    display: inline-block;
    height: auto;
    line-height: 1.42857;
    margin-left: 136px;
    max-width: 100%;
    padding: 4px;
    position: relative;
    transition: all 0.2s ease-in-out 0s;
}

@media (max-width: 600px){
.img-thumbnail1{
	margin-left:7%;
}
}

.icon1 {
    display: inline-block;
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    line-height: 1;
    margin-left: 218px;
}
</style>	




<?php if ($content['field_map_address'] && $content['field_map_latitude'] && $content['field_map_longitude']): ?>
<!-- Google Maps -->
<div id="googlemaps" class="google-map"></div>
<?php endif; ?>




<script src="//maps.google.com/maps/api/js?sensor=false"></script>
<script>
  jQuery(document).ready(function ($) {
	/*
	Map Settings

		Find the Latitude and Longitude of your address:
			- http://universimmedia.pagesperso-orange.fr/geo/loc.htm
			- http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

	*/

	// Map Markers
	var mapMarkers = [{
		address: "<?php print strip_tags(render($content['field_map_address'])); ?>",
		html: "<?php print render($content['field_map_html']); ?>",
		icon: {
			image: "<?php print base_path() . drupal_get_path('theme', 'porto'); ?>/img/pin.png",
			iconsize: [26, 46],
			iconanchor: [12, 46]
		},
		popup: true
	}];

	// Map Initial Location
	var initLatitude = <?php print strip_tags(render($content['field_map_latitude'])); ?>;
	var initLongitude = <?php print strip_tags(render($content['field_map_longitude'])); ?>;

	// Map Extended Settings
	var mapSettings = {
		controls: {
			panControl: true,
			zoomControl: true,
			mapTypeControl: true,
			scaleControl: true,
			streetViewControl: true,
			draggable: true, //false
			overviewMapControl: true
		},
		scrollwheel: false,
		markers: mapMarkers,
		latitude: initLatitude,
		longitude: initLongitude,
		zoom: 12
	};

	var map = $("#googlemaps").gMap(mapSettings);

	// Map Center At
	var mapCenterAt = function(options, e) {
		e.preventDefault();
		$("#googlemaps").gMap("centerAt", options);
	}
});
</script>