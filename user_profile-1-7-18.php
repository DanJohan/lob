<?php session_start(); 
//ini_set('display_errors', 1);
include('config.php');
include('header.php');
$id=$_SESSION['user_id'];
$sql = "SELECT * FROM tbl_users where user_id='".$id."'";
$res = mysqli_query($link,$sql); 
		            while($data=mysqli_fetch_array($res))
					{ 
						$user_id= $data['user_id'];
						$user_name= $data['user_name'];
						$user_email= $data['user_email'];
						$user_first_name= $data['user_first_name'];
						$user_last_name= $data['user_last_name'];
						$password= $data['password'];
						 
					}	
					

	
if(isset($_POST['upDProfile']))
	{
	//$user_id= $_POST['user_id'];
	$user_name= $_POST['user_name'];
	$user_email= $_POST['user_email'];
	$user_first_name= $_POST['user_first_name'];
	$user_last_name= $_POST['user_last_name'];
	$password= md5($_POST['password']);
 
  	
$q="UPDATE  `tbl_users` SET  `user_name` =  '".$user_name."',`user_email` =  '".$user_email."', `user_first_name` =  '".$user_first_name."', `user_last_name` =  '".$user_last_name."', `password` =  '".$password."' WHERE  `tbl_users`.`user_id` ='".$id."'";


 if(mysqli_query($link,$q)==true)
    {
        $msg = 'Record updated successfully';
    }
    else
    {
        echo ''.mysql_error();
    }
}
	
				
?>

<section id="page-title">

	<div class="container clearfix">
		<h1>Profile</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item"><a href="profile.php">Manage</a></li>
		</ol>
	</div>

</section>


<section id="content" class="minw py50" style="margin-bottom: 0px;">

	<div class="container clearfix">
		
		<div class="col-md-12">

			<img src="images/img/avatar.jpg" class="alignleft img-circle img-thumbnail notopmargin nobottommargin" alt="Avatar" style="max-width: 84px;">

			<div class="heading-block noborder">
				<h3><?php echo $user_name; ?></h3>
				<span>Your Profile Details </span>
				<p><span>Full Name&nbsp;:&nbsp;&nbsp;&nbsp;</span><span><?php echo $user_first_name." ".$user_last_name; ?></span>
				<br>
				<span>Email&nbsp;:&nbsp;&nbsp;&nbsp;</span><span><?php echo $user_email; ?></span></p>
			</div>

		</div>
		<div class="col-md-12">
		<a href="business.php">View Business</a>
		</div>
		

	</div>

</section>




	<?php include('footer.php'); ?>
