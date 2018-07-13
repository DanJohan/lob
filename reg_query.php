<?php 
ini_set("display_errors",1);
require_once('config.php');

 
    $user_name = mysqli_real_escape_string($link, $_POST['user_name']);
	$email = mysqli_real_escape_string($link, $_POST['user_email']);
	$user_first_name = mysqli_real_escape_string($link, $_POST['user_first_name']);
	$user_last_name = mysqli_real_escape_string($link, $_POST['user_last_name']);
	$user_password_new = mysqli_real_escape_string($link, md5($_POST['user_password_new']));
	$code = md5(uniqid(rand()));
   // $server_date=date('Y-m-d');
	
	$result = mysqli_query($link,"SELECT * FROM `tbl_users`");
	while($row = mysqli_fetch_array($result)) {
	   $memail=$row["email"];
      }
  
	  // matching email 
	
	$query="insert into tbl_users set user_name='$user_name',user_email='$email',user_first_name='$user_first_name',user_last_name='$user_last_name',password='$user_password_new',com_code='$code'"; 
    
   //echo 'test';
    if ((mysqli_query($link, $query)))

	{
	
	  
   $to = $email;
   $subject = "Confirmation from  to $user_name";
   $header = "LOB: Confirmation from ";
   $message = "Please click the link below to verify and activate your account.";
   $message = 'http://' . $_SERVER['SERVER_NAME'] . '/testing/LOB/activation.php?key=' . $code;

   $sentmail = mail($to,$subject,$message,$header);

   if($sentmail)
            {
				echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Your Confirmation link Has Been Sent To Your Email Address.')
      window.location.href='manage.php';
      </SCRIPT>");
			}
   else
        {
			 echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Cannot send Confirmation link to your e-mail address')
      window.location.href='register.php';
      </SCRIPT>");
		}
    
   }

//} 
 
?>