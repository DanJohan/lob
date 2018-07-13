<!-- Footer
		============================================= -->
		<footer class="footer">
		  <div class="container">
			<div class="footrr col-md-12">
			  <div class="footrrmenu col-md-8">
				<ul class="footrr12">
				  <li class="footerhome"><a href="active" class="footertext">Home</a></li>
				  <li class="footerhome"><a href="about.php" class="footertext">About</a></li>
				  <li class="footerhome"><a href="business.php" class="footertext">Browse Businesses</a></li>
				  <li class="footerhome"><a href="javascript:void(0);" class="footertext">Blog</a></li>
				  <li class="footerhome"><a href="contact.php" class="footertext">Contact</a></li>
				  <li class="footerhome"><a href="manage.php" class="footertext">Manage</a></li>
				</ul>
			  </div>
			  <div class="footericon col-md-4">
				<div class="icon">
				  <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				  <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				  <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
				  <a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a>
				  <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
				</div>
			  </div>
			</div>
			
			<div class="footer2nd col-md-12">
			  <div class="news col-md-6">
				<h3>subscribe to Newsletter</h3>
				<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. It is a long established fact that a reader will be distracted by the readable content. </p>
				<input class="nltr" type="text" name="email" Placeholder="Email">
			  </div>
			  <div class="contact col-md-3">
				<h3>contact info</h3>
				<ul class="contact-list">
				  <li>121 king street,USA</li>
				  <li>+ 99 9999999999</li>
				  <li>email@email.com</li>
				  <li>Skype.Skype</li>
				</ul>
			  </div>
			  <div class="photo col-md-3">
				<h3>photo stream</h3>
				<div class="photoo">
				  <a href="#"><img src="images/img/1st.png"></a>
				  <a href="#"><img src="images/img/2nd.png"></a>
				  <a href="#"><img src="images/img/3rd.png"></a>
				  <a href="#"><img src="images/img/4th.png"></a>
				  <a href="#"><img src="images/img/5th.png"></a>
				  <a href="#"><img src="images/img/6th.png"></a>
				</div>
			  </div>
			</div>
			<div class="empty">
				<p><span>© 2018</span>league of bosses</p>
			  </div>
		  </div>
		</footer>
	
	<!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/jquery.calendario.js"></script>
	<script src="typeahead.bundle.js"></script>
	<script src="typeahead.sources.js"></script>
	<script src="js/events-data.js"></script>
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyDMxJ92oBkSnVNHFX3R8XhtYQPEgk1_IiI&libraries=places"></script>
	<script src="js/jquery.gmap.js"></script>
	
	<!-- Footer Scripts
	============================================= -->
	<script src="js/functions.js"></script>

	<script>
		/* jQuery(document).ready( function($){
			var newDate = new Date(2018, 9, 31);
			$('#countdown-ex1').countdown({until: newDate});
		});

		var cal = $( '#calendar' ).calendario( {
			onDayClick : function( $el, $contentEl, dateProperties ) {

				for( var key in dateProperties ) {
					console.log( key + ' = ' + dateProperties[ key ] );
				}

			},
			caldata : canvasEvents
		} ),
		$month = $( '#calendar-month' ).html( cal.getMonthName() ),
		$year = $( '#calendar-year' ).html( cal.getYear() );

		$( '#calendar-next' ).on( 'click', function() {
			cal.gotoNextMonth( updateMonthYear );
		} );
		$( '#calendar-prev' ).on( 'click', function() {
			cal.gotoPreviousMonth( updateMonthYear );
		} );
		$( '#calendar-current' ).on( 'click', function() {
			cal.gotoNow( updateMonthYear );
		} );

		function updateMonthYear() {
			$month.html( cal.getMonthName() );
			$year.html( cal.getYear() );
		}

		$('#google-map4').gMap({
			 address: 'Australia',
			 maptype: 'ROADMAP',
			 zoom: 3,
			 markers: [
				{
					address: "Melbourne, Australia",
					html: "Melbourne, Australia"
				},
				{
					address: "Sydney, Australia",
					html: "Sydney, Australia"
				},
				{
					address: "Perth, Australia",
					html: "Perth, Australia"
				}
			 ],
			 doubleclickzoom: false,
			 controls: {
				 panControl: true,
				 zoomControl: true,
				 mapTypeControl: false,
				 scaleControl: false,
				 streetViewControl: false,
				 overviewMapControl: false
			 }
		}); */
</script>
<script type="text/javascript">
function initialize()
    {
        var input = document.getElementById('location');
        var autocomplete = new google.maps.places.Autocomplete(
                /** @type {HTMLInputElement} */(input),
                {
                    types: ['(cities)'],
                });
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }

            var address = '';
            if (place.address_components)
            {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }
            document.getElementById('place_lat').value=place.geometry.location.lat();
            document.getElementById('place_lng').value=place.geometry.location.lng();
            document.getElementById('location').value=place.getPlace();
           // LoadEventCategory();
           // LoadYelpData();
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script>
		function getLocation() {
		    if (navigator.geolocation) {
		        navigator.geolocation.getCurrentPosition(showPosition);
		    } else {
		        console.log("Geolocation is not supported by this browser.");
		    }
		}
		function showPosition(position) {
			document.getElementById('place_lat').value=position.coords.latitude;
            document.getElementById('place_lng').value=position.coords.longitude;
            document.getElementById('location').value="Current location";
		}

		$(document).on('click','#use_location',getLocation);
</script>
	
</body>
</html>