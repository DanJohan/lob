<?php
session_start();
include("config.php");
require_once 'core/init.php';
include 'header.php'; 
		
?>

<?php 
$bid  = sanitize($_GET['bid']);
$sql="SELECT b.*,s.code from tbl_businessinfo AS b INNER JOIN tbl_states AS s ON b.business_state=s.id where b.business_id='$bid'";
	
$query = mysqli_query($link, $sql);
$result=mysqli_fetch_array($query,MYSQLI_ASSOC);
$business=$result;
if(empty($business)){
	header('location:business.php');
}
$cat_id = $business['business_category'];
?> 
		
	
<section id="page-title" style="margin-bottom: 0px !important;">

	<div class="container clearfix">
		<h1><?php echo $business['business_name']; ?></h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item"><a href="business.php">Business</a></li>
			<li class="breadcrumb-item"><a href="business.php"><?php echo $business['business_name']; ?></a></li>
		</ol>
	</div>

</section>



<section id="content" style="margin-bottom: 0px;">

	<div class="container clearfix">
		
		<div class="fullw mr-0">

			<div id="posts" class="col-sm-9 ">
				<div class="mt-4">
					<div class="col-sm-3">
						<h3>Business info</h3>
					</div>	
					<div class="col-sm-3 col-sm-offset-6">
						<h3><a href="business.php">Back to search</a></h3>
					</div>
				</div><hr style="margin-top: 80px;" />
				<div class="clearfix" id="business_id_<?php echo $business['business_id']; ?>">


					<div class="entry-image">
						<?php if($business['upload_logo']!='') {?>
							<img src="uploads/<?php echo $business['upload_logo']; ?>" alt="<?php echo $business_info['business_name'] ;?>" height="200px">
						<?php } else {?>
							<img src="images/no-img.jpg" alt="No image" height="200px" width="200px">
						<?php } ?>
					</div>
					<div class="entry-c">
						<div class="entry-title">
							<h2><a href="business-details.php?bid=<?php echo $business['business_id']; ?>"><?php echo $business['business_name']; ?></a></h2>
						</div>
						<ul class="entry-meta clearfix">
							<!--<li><a href="#"><i class="icon-time"></i> 11:00 - 19:00</a></li>-->
							<li><a target="_blank" href="http://maps.google.com/?q=<?php echo $business['latitude']; ?>,<?php echo $business['longitude']; ?>"><i class="icon-map-marker2"></i><?php echo $business['business_city']; ?></a>&nbsp;&nbsp;<a href="#"><i class="icon-map-marker2"></i><?php echo $business['code']; ?></a></li>
						</ul>
						<div class="entry-content">
							<p><?php echo $business['long_description']; ?></p>
						</div>
					</div>
					
				</div>
				<div style="margin-bottom: 20px;">
					<h3>Map</h3><hr/>
					<div  id="map" style="height: 300px;"></div>
				</div>
			</div>
			<div class="col-sm-3">
				

				<?php
				$businesses=get_featured_businesses();
				if($businesses) {
					echo "<h3 class='mt-4'>Featured</h3><hr/>";
				 foreach ($businesses as $index => $business) {
				 	if($index <6) {

				?>
				<div class="row" style="margin-bottom: 10px;">
				<div class="col-sm-4">
					<?php if($business['upload_logo']!='') {?>
						<img src="uploads/<?php echo $business['upload_logo']; ?>" alt="<?php echo $business['business_name'] ;?>" height="100px">
					<?php } else {?>
						<img src="images/no-img.jpg" alt="No image" height="100px" width="200px">
					<?php } ?>
				</div>
				<div class="col-sm-8">
					<h5 class="mb-5"><?php echo $business['business_name']; ?></h5>
					<a target="_blank" href="http://maps.google.com/?q=<?php echo $business['latitude']; ?>,<?php echo $business['longitude']; ?>"><i class="icon-map-marker2"></i><?php echo $business['business_city']; ?></a>&nbsp;&nbsp;<a href="#"><i class="icon-map-marker2"></i><?php echo $business['code']; ?></a>
				</div>
				</div>
				<?php
						}
					}
				 }
				?>
				
				<?php
				$businesses=get_similar_businesses($cat_id);
				if($businesses){
					echo "<h3 class='mt-4'>Similar busines</h3><hr/>";
				 foreach ($businesses as $index => $business) {
				?>
				<div class="row" style="margin-bottom: 10px;">
				<div class="col-sm-4">
					<?php if($business['upload_logo']!='') {?>
						<img src="uploads/<?php echo $business['upload_logo']; ?>" alt="<?php echo $business['business_name'] ;?>" height="100px">
					<?php } else {?>
						<img src="images/no-img.jpg" alt="No image" height="100px" width="200px">
					<?php } ?>
				</div>
				<div class="col-sm-8">
					<h5 class="mb-5"><?php echo $business['business_name']; ?></h5>
					<a target="_blank" href="http://maps.google.com/?q=<?php echo $business['latitude']; ?>,<?php echo $business['longitude']; ?>"><i class="icon-map-marker2"></i><?php echo $business['business_city']; ?></a>&nbsp;&nbsp;<a href="#"><i class="icon-map-marker2"></i><?php echo $business['code']; ?></a>
				</div>
				</div>
				<?php
					}
				 }
				?>
			</div>

		</div>

	</div>

</section>

		
<?php include('footer.php'); ?>



<script type="text/javascript">
	var map;
var infoWindow;

var markersData=<?php echo (!empty($business))?json_encode($business):''; ?>


function initialize() {
   var mapOptions = {
      center: new google.maps.LatLng(12.9715987,77.5945627),
      zoom: 5,
      mapTypeId: 'roadmap',
   };

   map = new google.maps.Map(document.getElementById('map'), mapOptions);

   // a new Info Window is created
   infoWindow = new google.maps.InfoWindow();

   // Event that closes the Info Window with a click on the map
   google.maps.event.addListener(map, 'click', function() {
      infoWindow.close();
   });

   // Finally displayMarkers() function is called to begin the markers creation
   displayMarkers();
}
google.maps.event.addDomListener(window, 'load', initialize);


// This function will iterate over markersData array
// creating markers with createMarker function
function displayMarkers(){

   // this variable sets the map bounds according to markers position
   var bounds = new google.maps.LatLngBounds();
   

      var latlng = new google.maps.LatLng(markersData.latitude, markersData.longitude);
      var name = markersData.business_name;
      var address1 = markersData.business_address1;
      var address2 = markersData.business_address2;
      var postalCode = markersData.business_zip;
      var business_id = markersData.business_id;

      createMarker(latlng, name, address1, address2, postalCode,business_id);

      // marker position is added to bounds variable
      bounds.extend(latlng);  

   // Finally the bounds variable is used to set the map bounds
   // with fitBounds() function
   map.fitBounds(bounds);
}
var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
// This function creates each marker and it sets their Info Window content
function createMarker(latlng, name, address1, address2, postalCode,business_id){
   var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      title: name,
      zoom:5
   });

   // This event expects a click on a marker
   // When this event is fired the Info Window content is created
   // and the Info Window is opened.
   google.maps.event.addListener(marker, 'click', function() {
      
      // Creating the content to be inserted in the infowindow
      var iwContent = '<div id="iw_container">' +
            '<div class="iw_title">' + name + '</div>' +
         '<div class="iw_content">' + address1 + '<br />' +
         address2 + '<br />' +
         postalCode + '</div></div>';
      
      // including content to the Info Window.
      infoWindow.setContent(iwContent);

      // opening the Info Window in the current map and at the current marker location.
      infoWindow.open(map, marker);
   });

   google.maps.event.addListener(marker, 'mouseover', function() {
      
   		document.getElementById('business_id_'+business_id).style.border = "3px solid yellow";
   });

   google.maps.event.addListener(marker, 'mouseout', function() {
      
   		document.getElementById('business_id_'+business_id).style.border = "0px solid yellow";
   });
}
</script>