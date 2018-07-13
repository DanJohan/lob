<?php
session_start();
include("config.php");
require_once 'core/init.php';
include 'header.php'; 
	 

$latitude_query = (isset($_GET['place_lat']))?'&place_lat='.$_GET['place_lat']:'';
$longitude_query = (isset($_GET['place_lng'])) ? '&place_lng='.$_GET['place_lng']:'';
$keyword_query = (isset($_GET['keyword'])) ? '&keyword='.$_GET['keyword']:'';
$locale_query = (isset($_GET['locale'])) ? '&locale='.$_GET['locale']:'';

$search_query=$latitude_query.$longitude_query.$keyword_query.$locale_query;

$category_query = (isset($_GET['category']))?'&category='.$_GET['category']:'';
$state_query = (isset($_GET['state']))?'&state='.$_GET['state']:'';
$page_query = (isset($_GET['page']))?'&page='.$_GET['page']:'';
$distance_query = (isset($_GET['distance'])) ? '&distance='.$_GET['distance']:'';

$latitude= (isset($_GET['place_lat']))? $_GET['place_lat']: '';
$longitude= (isset($_GET['place_lng']))? $_GET['place_lng']: '';
$keyword = (isset($_GET['keyword'])) ? $_GET['keyword'] : '';
$category = (isset($_GET['category'])) ? $_GET['category'] : '';
$state = (isset($_GET['state'])) ? $_GET['state'] :'';
$distance = (isset($_GET['distance'])) ? $_GET['distance'] : '';
$page= (isset($_GET['page']))?$_GET['page']:1;
$limit = 10;
$offset= ($page-1) * $limit;
$keyword_sql='';
$location_sql='';
$distance_sql='';

if(!empty($keyword)){
	$keyword_sql="WHERE b_info.business_name LIKE '%".$keyword."%'";
}

if(!empty($category)){
	if(!empty($keyword_sql)){
		$keyword_sql.=" AND b_info.business_category=".$category;
	}else{
		$keyword_sql = "WHERE b_info.business_category=".$category;
	}
}

if(!empty($state)){
	if(!empty($keyword_sql)){
		$keyword_sql.=" AND b_info.business_state=".$state;
	}else{
		$keyword_sql = "WHERE b_info.business_state=".$state;
	}
}

if(!empty($latitude)){
	$location_sql=",(((acos(sin((".$latitude."*pi()/180)) * sin((`Latitude`*pi()/180))+cos((".$latitude."*pi()/180)) * cos((`Latitude`*pi()/180)) * cos(((".$longitude."- `Longitude`)*pi()/180))))*180/pi())*60*1.1515) as distance";
	$distance_sql="HAVING distance <=50";
}

if(!empty($distance)){
	$distance_sql="HAVING distance <=".$distance;
}

$sql="SELECT b_info.*,cat.category_name,state.code,subcat.subcateory_name".$location_sql." FROM tbl_businessinfo AS b_info LEFT JOIN tbl_category AS cat ON b_info.business_category=cat.category_id LEFT JOIN tbl_states AS state ON b_info.business_state=state.id LEFT JOIN tbl_subcategory AS subcat ON b_info.business_subcategory= subcat.subcategory_id ".$keyword_sql." ".$distance_sql." LIMIT ".$offset.",".$limit;

$query = mysqli_query($link, $sql);
$business_infos=array();
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
	$business_infos[]=$result;
}

if($business_infos){
	$categories_ids=get_categories_bussiness_number($business_infos);
	$categories=array_unique(array_column($categories_ids,'cat_name'));
	$categories_total=array_count_values(array_column($categories_ids,'cat_code'));

	$states_ids=get_states_bussiness_number($business_infos);
	$states= array_unique(array_column($states_ids,'state_name'));
	$states_total=array_count_values(array_column($states_ids,'state_code'));
}

?> 
		
	
<section id="page-title">

	<div class="container clearfix">
		<h1>Business</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item"><a href="business.php">Business</a></li>
		</ol>
	</div>

</section>



<section id="content" style="margin-bottom: 0px;">

	<div class="container clearfix">
		
		<div class="postcontent nobottommargin fullw mr-0">
		
			<div class="filterr"> 
			
				<form id="busi">
				
					<div class="form-group col-md-4">
						<label for="inputcateg">Category</label>
						<select id="inputcateg" class="form-control" name="inputcateg">
							<option value="">Select Category</option>
							<?php
								if($categories){
									foreach ($categories as $index => $name) {
							?>

								<option data-location="business.php?category=<?php echo $categories_ids[$index]['cat_code'].$search_query.$state_query.$distance_query.$page_query; ?>" value="<?php echo $categories_ids[$index]['cat_code']; ?>"><?php echo $name; ?>(<?php echo $categories_total[$categories_ids[$index]['cat_code']]?> )</option>
							<?php
									}
								}
							?>
						</select>
					</div>
					
					<!-- <div class="form-group col-md-4">
						<label for="inputsource">Source</label>
						<select id="inputsource" class="form-control" name="inputsource">
							<option value="">Select Source</option>
							<option value="AK">A</option>
							<option value="AL">B</option>
						</select>
					</div>
					 -->
					<div class="form-group col-md-4">
						<label for="inputState">State</label>
						<select id="inputState" class="form-control" name="business_state">
							<option value="">Select State</option>
							<?php
								if($states){
									foreach ($states as $index => $name) {
							?>
								<option data-location="business.php?state=<?php echo $states_ids[$index]['state_code'].$search_query.$category_query.$distance_query.$page_query; ?>" value="<?php echo $states_ids[$index]['state_code']?>"><?php echo $name; ?>(<?php echo $states_total[$states_ids[$index]['state_code']]?> )</option>
							<?php
									}
								}
							?>
						</select>
					</div>
					<?php
					if(!empty($_GET['place_lat'])) {
					?>
					<div class="form-group col-md-4">
						<label for="inputdistance">Distance</label>
						<select id="inputdistance" class="form-control" name="distance">
							<?php 
								$distance_url=getAddress();
								$distance_url.=(isset($_GET['keyword']) || isset($_GET['category']) || isset($_GET['state'])|| isset($_GET['distance']))? '&' : '?';
							?>
							<option  value="">Select Distance</option>
							<option data-location="business.php?distance=5<?php echo $search_query.$category_query.$state_query.$page_query; ?>" value="5">5 mi</option>
							<option data-location="business.php?distance=10<?php echo $search_query.$category_query.$state_query.$page_query; ?>"; ?>" value="10">10 mi</option>
							<option data-location="business.php?distance=25<?php echo $search_query.$category_query.$state_query.$page_query; ?>" value="25">25 mi</option>
							<option data-location="business.php?distance=50<?php echo $search_query.$category_query.$state_query.$page_query; ?>" value="50">50 mi</option>
							<option data-location="business.php?distance=100<?php echo $search_query.$category_query.$state_query.$page_query; ?>" value="100">100 mi</option>
						</select>
					</div>
					<?php
					}
					?>
				</form>
				
			</div>

			<div id="posts" class="events small-thumbs col-sm-8">
			<?php
			 if(!empty($business_infos)) {
			 	foreach ($business_infos as $index => $business_info) {
					$business_state=$business_info['business_state'];
					$short_desc=$business_info['short_description'];
					$upload_logo=$business_info['upload_logo'];
					$created_date=$business_info['created_date'];
					$date = date('d',strtotime($created_date));
					$month = date('F',strtotime($created_date));
					
			?>
				<div class="entry clearfix" id="business_id_<?php echo $business_info['business_id']; ?>">
					 
			 
					<div class="entry-image">
						<?php if($upload_logo!='') {?>
						<img src="uploads/<?php echo $upload_logo; ?>" alt="<?php echo $business_name ;?>" height="200px" width="200px">
						<?php } else {?>
						<img src="images/no-img.jpg" alt="No image" height="200px" width="200px">
						<?php } ?>
						<div class="entry-date"><?php echo $date; ?><span><?php echo $month; ?></span></div>
					</div>
					<div class="entry-c">
						<div class="entry-title">
							<h2><a href="#"><?php echo $business_info['business_name']; ?></a></h2>
						</div>
						<ul class="entry-meta clearfix">
							<!--<li><a href="#"><i class="icon-time"></i> 11:00 - 19:00</a></li>-->
							<li><a target="_blank" href="http://maps.google.com/?q=<?php echo $business_info['latitude']; ?>,<?php echo $business_info['longitude']; ?>"><i class="icon-map-marker2"></i><?php echo $business_info['business_city']; ?></a>&nbsp;&nbsp;<a href="#"><i class="icon-map-marker2"></i><?php echo $business_info['code']; ?></a></li>
						</ul>
						<div class="entry-content">
							<p><?php echo $short_desc; ?></p>
							<a href="#" class="btn btn-danger">Read More</a>
						</div>
					</div>
					
				</div>
			<?php
				}
			}
			?>
			</div>
			<div class="col-sm-4">
				<?php
				if(!empty($_GET['place_lat'])) { 
				?>
				<div id="map" style="height: 500px;"></div>
				<?php
				}
				?>
			</div>

			<!-- Pagination
			============================================= -->
			<div class="row new-old">
				<div class="col-12">
					<?php
						$page_url=getAddress();
						$page_url.=(isset($_GET['keyword']) || isset($_GET['category']) || isset($_GET['state']) || isset($_GET['distance']))? '&' : '?';
					?>
					<?php if($page!=1) {?>
					<a href="business.php?page=<?php echo ($page-1).$search_query.$category_query.$state_query.$distance_query; ?>" class="btn btn-outline-secondary float-left">← Older</a>
				    <?php } ?>
					<a href="business.php?page=<?php echo ($page+1).$search_query.$category_query.$state_query.$distance_query; ?>" class="btn btn-outline-dark float-right">Newer →</a>
				</div>
			</div>
			<!-- .pager end -->

		</div>
		

	</div>

</section>

		
<?php include('footer.php'); ?>

<script>

$(document).on('change','#inputcateg',function(){
	window.location.href=$(this).find(':selected').data('location');
});

$(document).on('change','#inputState',function(){
	window.location.href=$(this).find(':selected').data('location');
});

$(document).on('change','#inputdistance',function(){
	window.location.href=$(this).find(':selected').data('location');
});


</script>

<script type="text/javascript">
	var map;
var infoWindow;

var markersData=<?php echo (!empty($business_infos))?json_encode($business_infos):''; ?>


function initialize() {
   var mapOptions = {
      center: new google.maps.LatLng(12.9715987,77.5945627),
      zoom: 13,
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
   
   // for loop traverses markersData array calling createMarker function for each marker 
   for (var i = 0; i < markersData.length; i++){

      var latlng = new google.maps.LatLng(markersData[i].latitude, markersData[i].longitude);
      var name = markersData[i].business_name;
      var address1 = markersData[i].business_address1;
      var address2 = markersData[i].business_address2;
      var postalCode = markersData[i].business_zip;
      var business_id = markersData[i].business_id;

      createMarker(latlng, name, address1, address2, postalCode,i,business_id);

      // marker position is added to bounds variable
      bounds.extend(latlng);  
   }

   // Finally the bounds variable is used to set the map bounds
   // with fitBounds() function
   map.fitBounds(bounds);
}
var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
// This function creates each marker and it sets their Info Window content
function createMarker(latlng, name, address1, address2, postalCode,i,business_id){
   var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      title: name,
      icon:'https://raw.githubusercontent.com/Concept211/Google-Maps-Markers/master/images/marker_red'+(i+1)+'.png'
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

   google.maps.event.addDomListener(window, 'load', initialize);
}
</script>