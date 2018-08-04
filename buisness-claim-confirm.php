<?php
include("config.php");
$business_id = (isset($_GET['bid'])) ? base64_decode($_GET['bid']):'';
$email = (isset($_GET['email'])) ? $_GET['email']:'';
$hash = (isset($_GET['hash']))? $_GET['hash']:'';

if(!empty($business_id) && !empty($email) && !empty($hash)) {
	$sql = "SELECT * FROM tbl_users WHERE user_email='".$email."' AND business_claim_hash='".$hash."'";
	$query=mysqli_query($link,$sql);

   	$result=mysqli_fetch_assoc($query);
   	if(!empty($result)){
   		$sql ="UPDATE tbl_businessinfo SET user_id='".$result['user_id']."' WHERE business_id=".$business_id;
   		mysqli_query($link, $sql);
   	}
   	header('location:user_profile.php');
} 

?>