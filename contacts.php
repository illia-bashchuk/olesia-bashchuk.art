<?php
/*
Template Name: Contacts
*/
get_header();
?>

<!--////////////////////////////////////Container-->

<section id="container">
	<div class="wrap-container">
		<!-----------------Content-Box-------------------->
		<section class="content-box zerogrid">
			<div class=" wrap-box">
				<!--Start Box-->

				<!--Start Map-->
				<div id="map" style="height: 350px;"></div>
				<!--End Map-->

				<div class="contact-form">
					<h3 class="t-center">Contact Form</h3>
					
					<!---->
					<div id="contact_form">
						<?= do_shortcode('[contact-form-7 id="5" title="contact-form"]'); ?>
						
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