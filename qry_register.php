<?php 
ini_set("display_errors",1);
include("config.php");
//echo "test"; 
//Ajax method
/* $username = mysqli_real_escape_string($link, $_POST['userName']);
$email = mysqli_real_escape_string($link, $_POST['userEmail']);
$user_first_name = mysqli_real_escape_string($link, $_POST['firstName']);
$user_last_name = mysqli_real_escape_string($link, $_POST['lastName']);
$user_password_new = mysqli_real_escape_string($link, $_POST['passwordNew']);
echo "insert tbl_users set user_name='$username',user_email='$email',user_first_name='$user_first_name',user_last_name='$user_last_name',password='$user_password_new',now())";
$sql="insert tbl_users set user_name='$username',user_email='$email',user_first_name='$user_first_name',user_last_name='$user_last_name',password='$user_password_new',now())";
$query=mysqli_query($sql);
header("location: register.php");
$msg="User Added Successfully."; */
 

/* $sql = "SELECT user_id FROM `users`";
$query = mysqli_query($link,$sql);
$rows = mysqli_fetch_row($query);
echo $rows['user_id'];
 */
   
 
 
 if(isset($_REQUEST['registerSubmit']))
 {

$random = substr(number_format(time() * rand(),0,'',''),0,10);
     
 // print_r($_REQUEST);die;
$username = mysqli_real_escape_string($link, $_POST['user_name']);
$email = mysqli_real_escape_string($link, $_POST['user_email']);
$user_first_name = mysqli_real_escape_string($link, $_POST['user_first_name']);
$user_last_name = mysqli_real_escape_string($link, $_POST['user_last_name']);
$user_password_new = mysqli_real_escape_string($link, md5($_POST['user_password_new']));
//echo "insert into tbl_users set user_name='$username',user_email='$email',user_first_name='$user_first_name',user_last_name='$user_last_name',password='$user_password_new'";die;

	$random = substr(number_format(time() * rand(),0,'',''),0,10);
	
    $to = $email;
    $subject = "Activating your Account";
   // $body = "Hi, in order to activate your account please visit http://smartserveinfotech.com/testing/LOB/activation.php?email=".$email." and fill in the verification code $random";
   
   $body = "Hi, in order to activate your account please visit http://smartserveinfotech.com/testing/LOB/activation.php?user_status=".$random."";
    if(mail($to, $subject, $body))
    {
        echo ("<p>Message success</p>");
    }
    else {
        echo ("<p>Message fail</p>");
    }



$sql="insert into tbl_users set user_name='$username',user_email='$email',user_first_name='$user_first_name',user_last_name='$user_last_name',password='$user_password_new'";
//$query=mysqli_query($link,$sql);
if(mysqli_query($link,$sql))
{
header("location:manage.php");
$msg="Record Added Successfully";
}
}


?>