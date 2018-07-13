<?php include('header.php'); ?>

<?php include("config.php"); 

?>
	
		<section class="bg">
		  <div class="container">
			<div class="container">
			  <div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
				  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				  <li data-target="#myCarousel" data-slide-to="1"></li>
				  <li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner">
				  <div class="item active">
					<img src="images/img/bg.jpg" alt="Los Angeles" style="width:100%;">
				  </div>
				  
				  <div class="item">
					<img src="images/img/bg.jpg" alt="Los Angeles" style="width:100%;">
				  </div>
				  
				  <div class="item">
					<img src="images/img/bg.jpg" alt="Los Angeles" style="width:100%;">
				  </div>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				  <span class="glyphicon glyphicon-chevron-left"></span>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
				  <span class="glyphicon glyphicon-chevron-right"></span>
				  <span class="sr-only">Next</span>
				</a>
			  </div>
			</div>
		  </div>
		</section>

		<!-- About
		============================================= -->
		
		<section class="About">
			<div class="abt-txt">
			  <div class="container">
				<div class="aboutus col-md-12">					
					<div class="abtus col-md-4 col-sm-12 "><h2>About Us</h2></div>
					<div class="txttt col-md-8 col-sm-12 ">					
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
					</div>
				</div>
			  </div>
			</div>
		</section>

		<!-- We Are The Best
		============================================= -->
		
		<section class="vrtb">
			<div class="fullr">
				<div class="container">
				<h2>We Are The Best</h2>
				<h4>No company in the world is better than ours</h4>
					<div class="col-md-3 col-sm-6">
						<a href="#"><img src="images/img/5.png"></a>
						<h4>Blog</h4>
					</div>
					<div class="col-md-3 col-sm-6">
						<a href="#"><img src="images/img/6.png"></a>
						<h4>Event</h4>
					</div>
					<div class="col-md-3 col-sm-6">
						<a href="#"><img src="images/img/7.png"></a>
						<h4>Store</h4>
					</div>
					<div class="col-md-3 col-sm-6">
						<a href="#"><img src="images/img/8.png"></a>
						<h4>Member</h4>
					</div>
				</div>
			</div>
		</section>
		
		<!-- We Are The Best -->
		
		<!-- Start Now -->
		
		<section class="start button">
		  <div class="container">
			<div class="button12">
			  <h2>don't know where to start? start here</h2>
			  <button class="start">start now</button>
			</div>
		  </div>
		</section>		
		
		<!-- Start Now -->
		
<script>
var placeSearch, autocomplete;	
	function initAutocomplete() {
  // Create the autocomplete object, restricting the search to geographical
  // location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */(document.getElementById('location')),
      {types: ['geocode']});
}

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
// [END region_geolocation]

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjmXeBbR8izEKm6REYz6MjCCw5GlSGLcU&signed_in=true&libraries=places&callback=initAutocomplete"
        async defer></script>

		<?php include 'footer.php'; ?>