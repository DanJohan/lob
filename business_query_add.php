<?php
ini_set('display_error',0);
session_start();
include("config.php");
require_once 'core/init.php';

// initializing variables
if(isset($_REQUEST['businessSubmit']))
{
	//echo '<pre>'; print_r($_REQUEST);die;
$user_id = "";
//$user_name = "";
//$email    = "";
$owner="";
$business_name = "";
$business_address1 = "";
$business_address2 = "";
$business_city = "";
$business_state = "";
$business_zip = "";
$business_phone="";
$business_email="";
$business_website="";
$category = "";
$scategory = "";
$twitter = "";
$facebook="";
$google="";
$linkedin="";
$instagram="";
$rss="";
$keywords="";
$short_desc="";
$long_desc="";
$upload_logo="";

    $file = $_FILES['upload_logo'];
    $file_name = $file=time().'_'.$_FILES['upload_logo']['name'];
    $file_tmp_name = $_FILES['upload_logo']['tmp_name'];  

  // receive all input values from the form
  $user_id = mysqli_real_escape_string($link, $_SESSION['user_id']);
  //$owner = mysqli_real_escape_string($link, $_POST['owner']);
  $business_name = mysqli_real_escape_string($link, $_POST['business_name']);
  $business_address1 = mysqli_real_escape_string($link, $_POST['business_address1']);
  $business_address2 = mysqli_real_escape_string($link, $_POST['business_address1']);
  $business_city = mysqli_real_escape_string($link, $_POST['business_city']);
  $business_state = mysqli_real_escape_string($link, $_POST['business_state']);
  $business_zip = mysqli_real_escape_string($link, $_POST['business_zip']);
  $business_email = mysqli_real_escape_string($link, $_POST['business_email']);
  $business_phone = mysqli_real_escape_string($link, $_POST['business_phone']);
  $business_website = mysqli_real_escape_string($link, $_POST['business_website']);
  $category = mysqli_real_escape_string($link, $_POST['category']);
  $scategory = mysqli_real_escape_string($link, $_POST['scategory']);
  $twitter = mysqli_real_escape_string($link, $_POST['twitter']);
  $facebook = mysqli_real_escape_string($link, $_POST['facebook']);
  $google = mysqli_real_escape_string($link, $_POST['google']);
  $linkedin = mysqli_real_escape_string($link, $_POST['linkedin']);
  $instagram = mysqli_real_escape_string($link, $_POST['instagram']);
  $rss = mysqli_real_escape_string($link, $_POST['rss']);
  $keywords = mysqli_real_escape_string($link, $_POST['keywords']);
  $short_desc = mysqli_real_escape_string($link, $_POST['long_desc']);
  $long_desc = mysqli_real_escape_string($link, $_POST['long_desc']);
  $upload_logo = mysqli_real_escape_string($link, $file_name);
  
  
  
//geo code for lat and long 
$state = get_state_by_id($business_state);
$geoAddress = '';
$geoAddress .= str_replace(" ","+",$business_address1);
$geoAddress .= "+" . str_replace(" ","+",$business_city);
$geoAddress .= "+" . str_replace(" ","+",$state['code']);

$details_url = "http://maps.googleapis.com/maps/api/geocode/json?address=" . $geoAddress . "&sensor=false";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $details_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = json_decode(curl_exec($ch), true);
if($response['status'] != 'OK') 
{        
}else{
$geometry = $response['results'][0]['geometry'];
$longitude = $geometry['location']['lng'];
$latitude  = $geometry['location']['lat'];
}


    
    
	
	/*  echo "INSERT INTO `tbl_businessinfo` (`business_id`,`user_id`,`business_name`,`business_address1`, `business_address2`,`business_city`,`business_state`,`business_zip`,`business_email`,`business_phone`, `business_website`,`business_category`,`business_subcategory`,`latitude`,`longitude`,`twitter`,`facebook`,`google`,`linkedin`,`instagram`,`rss`,`keywords`,`short_description`,`long_description`,`upload_logo`)
 VALUES (NULL, '$user_id','$business_name', '$business_address1', '$business_address2', '$business_city', '$business_state', '$business_zip', '$business_email', '$business_phone', '$business_website', '$category', '$scategory','$latitude','$longitude','$twitter','$facebook','$google', '$linkedin', '$instagram', '$rss', '$keywords', '$short_desc', '$long_desc', '$upload_logo')";die;  */
 
 $query = "INSERT INTO `tbl_businessinfo` (`business_id`,`user_id`,`business_name`,`business_address1`, `business_address2`,`business_city`,`business_state`,`business_zip`,`business_email`,`business_phone`, `business_website`,`business_category`,`business_subcategory`,`latitude`,`longitude`,`twitter`,`facebook`,`google`,`linkedin`,`instagram`,`rss`,`keywords`,`short_description`,`long_description`,`upload_logo`)
 VALUES (NULL, '$user_id','$business_name', '$business_address1', '$business_address2', '$business_city', '$business_state', '$business_zip', '$business_email', '$business_phone', '$business_website', '$category', '$scategory','$latitude','$longitude','$twitter','$facebook','$google', '$linkedin', '$instagram', '$rss', '$keywords', '$short_desc', '$long_desc', '$upload_logo')"; 
	
  	mysqli_query($link, $query);

		//upload images to this folder (complete path)
    $target_dir = "uploads/$file_name"; 
 
    if(move_uploaded_file($file_tmp_name, $target_dir))
    {
        echo "File Successfully uploaded";
    }
    else
    {
        echo "There is something wrong in File Upload!";
    }	

  	header('location: business.php');
}
?>