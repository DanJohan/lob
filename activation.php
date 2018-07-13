<?php 
/* 
	$sql = "UPDATE tbl_users set user_status = '1' WHERE user_id='" . $user_id. "'";
	$query = mysqli_query($link,$sql);
		if(!empty($query)) {
			$message = "Your account is activated. you able to login at<a href="manage.php">Log in</a>";
			 } else {
			$message = "Problem in account activation.";
		}
	 */



include('config.php');
$key = $_GET['key'];
$sql = "UPDATE tbl_users SET com_code='active' WHERE com_code='$key'";
 $result = mysqli_query($link,$sql) or die(mysqli_error());
 if($result)
 {
  echo '<div>Your account is now active. You may now <a href="manage.php">Log in</a></div>';
}
 else
 {
  echo "Some error occur.";
 }
?>
	 
