<?php
include("config.php");

$email = mysqli_escape_string($link,$_POST['email']);

$sql = "SELECT password FROM tbl_users WHERE user_email = '$email' ";

$query = mysqli_query($link,$sql);

$data = mysqli_fetch_array($query);

$pass = $data['password'];

if(mysqli_num_rows($query)!=0){


$to = $email;
$subject = "League Password";




$message = "
<html>
<head>
<title>League</title>
</head>
<body>
<p>Password Recovery</p>
<table>
<tr> <td>Hi, </td> </tr>
<tr>

<td>Your Login Password is :$pass</td>

</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers



$headers .= 'From: <admin@leagueofbosess.com>' . "\r\n";

	mail($to,$subject,$message,$headers);
	echo  1;
	
}else{
	echo  0;

}

?>