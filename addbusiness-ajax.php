<?php
include("config.php");
//echo 'test';
// initializing variables
$username = "";
$email    = "";
$username = "";
$email = "";
$business_name = "";
$business_address1 = "";
$business_address2 = "";
$business_city = "";
$business_state = "";
$business_zip = "";
$business_website="";
$category = "";
$scategory = "";

  // receive all input values from the form
  $username = mysqli_real_escape_string($link, $_POST['userName']);
  $email = mysqli_real_escape_string($link, $_POST['userEmail']);
  $business_name = mysqli_real_escape_string($link, $_POST['businessName']);
  $business_address1 = mysqli_real_escape_string($link, $_POST['businessAddress1']);
  $business_address2 = mysqli_real_escape_string($link, $_POST['businessAddress2']);
  $business_city = mysqli_real_escape_string($link, $_POST['businessCity']);
  $business_state = mysqli_real_escape_string($link, $_POST['businessState']);
  $business_zip = mysqli_real_escape_string($link, $_POST['businessZip']);
  $business_email = mysqli_real_escape_string($link, $_POST['businessEmail']);
  $business_phone = mysqli_real_escape_string($link, $_POST['businessPhone']);
  $business_website = mysqli_real_escape_string($link, $_POST['businessWebsite']);
  $category = mysqli_real_escape_string($link, @$_POST['category']);
  $scategory = mysqli_real_escape_string($link, $_POST['scategory']);
  
 
  	 $query = "INSERT INTO `tbl_businessinfo` (`business_id`, `user_id`, `username`, `email`, `business_name`, `business_address1`, `business_address2`, `business_city`, `business_state`, `business_zip`, `business_email`, `business_phone`, `business_website`, `business_category`, `business_subcategory`)
 VALUES (NULL, '', '$username', '$email', '$business_name', '$business_address1', '$business_address2', '$business_city', '$business_state', 'business_zip', 'business_email', '$business_phone', '$business_website', '$category', '$scategory')"; 
			  
		
  	mysqli_query($link, $query);
  	header('location: business.php');



?>