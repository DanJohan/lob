<?php include 'header.php'; ?>
		
		<?php 
		include("config.php");
		
		
		if(isset($_POST['keyword']))
		{

    $keyword = $_POST['keyword'];

    //$keywords = implode (",", $keywordarray);
	$sql = "SELECT * FROM tbl_businessinfo WHERE (`business_name` LIKE '%".$keyword."%') OR (`business_address1` LIKE '%".$keyword."%') OR (`business_city` LIKE '%".$keyword."%') OR (`business_state` LIKE '%".$keyword."%')" or die();


    
	$query = mysqli_query($link, $sql);
	 while($result = mysqli_fetch_array($query))
	 {
	echo  $business_name = $result['business_name'].'<br/>';
	echo  $business_address1 = $result['business_address1'].'<br/>';
	echo  $latitude = $result['lat'].'<br/>';
	echo  $longitude = $result['long'].'<br/>';
	echo $business_address1 = $result['business_state'].'<br/>';
		 
	 }
}
		
		
		?>
		
	<!-- About
		============================================= -->
		
		<section class="About">
			<div class="abt-txt">
			  <div class="container">
				<div class="aboutus col-md-12">					
					<div class="abtus col-md-4 col-sm-12 "><h2>Business</h2></div>
					<div class="txttt col-md-8 col-sm-12 ">					
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
					</div>
				</div>
			  </div>
			</div>
		</section>

		 </script>
	<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&#038;sensor=true&#038;ver=3.6.1'></script>
	<script src='js/jquery-ui-1.10.3.custom.min.js'></script>
	<script src='js/markerclusterer.js'></script>
	<script src='bootstrap/js/bootstrap.min.js'></script>
	<script src='js/jquery.carouFredSel-6.2.1-packed.js'></script>
	<script src='js/jquery.touchSwipe.min.js'></script>
	<script src='js/jquery.selectbox-0.2.min.js'></script>
	<script src='js/jquery.fancybox.pack.js'></script>
	<script src='js/jqplot/jquery.jqplot.min.js'></script>
	<script src='js/jqplot/shCore.min.js'></script>
	<script src='js/jqplot/shBrushJScript.min.js'></script>
	<script src='js/jqplot/shBrushXml.min.js'></script>
	<script src='js/jqplot/jqplot.cursor.min.js'></script>
	<script src='js/jqplot/jqplot.dateAxisRenderer.min.js'></script>
	<script src='js/jqplot/jqplot.highlighter.min.js'></script>
	<script src='js/jqplot/jqplot.canvasTextRenderer.min.js'></script>
	<script src='js/jqplot/jqplot.canvasAxisLabelRenderer.min.js'></script>
	<script src='js/main.js'></script>
	<script src='js/current-location.js'></script>
	<script src='js/typeahead.bundle.js'></script>
	<script src='js/typeahead.sources.js'></script>
	<script>
var placeSearch, autocomplete;


function initAutocomplete() {
  // location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */(document.getElementById('location')),
      {types: ['geocode']});
}


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
	<?php //$latitude="30.7333";
           // $longitude="76.7794";
			?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjmXeBbR8izEKm6REYz6MjCCw5GlSGLcU&signed_in=true&libraries=places&callback=initAutocomplete"
        async defer></script>	<script type="text/javascript">
		console.log("inside map");
		function initialize() {
			console.log("inside initialize");
 // var myLatlng = new google.maps.LatLng(29.383845, -94.9027002);
 var myLatlng = new google.maps.LatLng(<?php echo $latitude;?>,<?php echo $longitude;?>);
  var mapOptions = {
    zoom: 8,
    center: myLatlng
  }

  function getOffset( el ) {
    var _x = 0;
    var _y = 0;
    while( el && !isNaN( el.offsetLeft ) && !isNaN( el.offsetTop ) ) {
        _x += el.offsetLeft - el.scrollLeft;
        _y += el.offsetTop - el.scrollTop;
        el = el.offsetParent;
    }
    return { top: _y, left: _x };
}

	//var x = getOffset( document.getElementById('yourElId') ).left;
  var bounds = new google.maps.LatLngBounds();
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);


  // Display multiple markers on a map
	var infoWindow = new google.maps.InfoWindow(), marker, i;

	// Drop marker for current location
	var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            zIndex: 0
            });

  for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0],
            icon: 'images/google/number_' + markers[i][3] + '.png',
            zIndex: markers[i][4]
        });

        // Allow each marker to have an info window
       google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
            return function(e) {
            	
            	var business = i + 1;
				var tempX = 0;
				var tempY = 0;
				

    			
                var div = document.getElementById('highlighted-biz');
                var bizDiv = document.getElementById("infowindow-" + business);
                div.style.display = "inline";
				div.innerHTML = infoWindowContent[i][0];
				
				document.getElementById("infowindow-" + business).style.borderColor = "rgb(252, 199, 31)";
				document.getElementById("infowindow-" + business).style.borderWidth = "5px";

              
            }
        })(marker, i));

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                window.location.href = markers[i][5];
            }
        })(marker, i));

        google.maps.event.addListener(marker, 'mouseout', (function(marker, i) {
            return function() {
            		var business = i + 1;
            	document.getElementById("infowindow-" + business).style.borderColor = "rgba(0,0,0,.1)";
            	document.getElementById("infowindow-" + business).style.borderWidth = "1px";
    		
            }
        })(marker, i));



       
    }


}

google.maps.event.addDomListener(window, 'load', initialize);


    </script>
		
<?php include('footer.php'); ?>