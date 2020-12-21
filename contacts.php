<?php
/*
Template Name: Contacts
*/

//Load the css and js files on pages which contain contact forms 7
if (function_exists('wpcf7_enqueue_scripts')) {
	wpcf7_enqueue_scripts();
}

if (function_exists('wpcf7_enqueue_styles')) {
	wpcf7_enqueue_styles();
}
get_header();

?>

<!--////////////////////////////////////Container-->

<section id="container">
	<div class="wrap-container">
		<!-----------------Content-Box-------------------->
		<section class="single-post zerogrid">
			<div class="wrap-post">
				<!--Start Box-->

				<!--Start Map-->
				<div id="map" style="height: 350px;"></div>
				<!--End Map-->

				<div class="contact-form">
					<h3 class="t-center"><?= _e('Write to me', 'zpainting') ?></h3>

					<!---->
					<div id="contact_form">
						<?php
						// Change the translation according to the locale for contact form
						if (get_locale() == 'uk') {
							echo do_shortcode('[contact-form-7 id="261" title="contact-form_uk"]'); // needs change on production server
						} else {
							echo do_shortcode('[contact-form-7 id="5" title="contact-form"]'); // needs change on production server
						}
						?>
					</div>
				</div>
			</div>
		</section>

	</div>
</section>


<!-- Google Map -->
<script>
	var marker;
	var image = 'http://www.olesia-bashchuk.art/wp-content/themes/olesia-bashchuk.art/images/map-marker.png';

	function initMap() {
		var myLatLng = {
			lat: 49.04,
			lng: 28.11
		};

		// Specify features and elements to define styles.
		var styleArray = [{
			featureType: "all",
			stylers: [{
				saturation: -80
			}]
		}, {
			featureType: "road.arterial",
			elementType: "geometry",
			stylers: [{
					hue: "#000000"
				},
				{
					saturation: 50
				}
			]
		}, {
			featureType: "poi.business",
			elementType: "labels",
			stylers: [{
				visibility: "off"
			}]
		}];

		var map = new google.maps.Map(document.getElementById('map'), {
			center: myLatLng,
			scrollwheel: false,
			// Apply the map style array to the map.
			styles: styleArray,
			zoom: 7
		});

		var directionsDisplay = new google.maps.DirectionsRenderer({
			map: map
		});

		// Create a marker and set its position.
		marker = new google.maps.Marker({
			map: map,
			icon: image,
			draggable: true,
			animation: google.maps.Animation.DROP,
			position: myLatLng
		});
		marker.addListener('click', toggleBounce);
	}

	function toggleBounce() {
		if (marker.getAnimation() !== null) {
			marker.setAnimation(null);
		} else {
			marker.setAnimation(google.maps.Animation.BOUNCE);
		}
	}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDr4MmvpZpHuav980X_2xnaMt4QSFShk0k&callback=initMap" async defer></script>
<?php get_footer(); ?>