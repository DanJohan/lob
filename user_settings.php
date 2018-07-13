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
		<h1>User Settings</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item"><a href="profile.php">Manage</a></li>
		</ol>
	</div>

</section>

<section id="content" style="margin-bottom: 0px;">

	<div class="container clearfix">

		<div class="col_one_third nobottommargin">

			<div class="nobottommargin">
			<div class="alert">
					<a class="close" data-dismiss="alert"><i class="icon-remove"></i></a>
					<strong><?php //echo $msg; ?></strong>
				</div>
				<form id="userprofile-form" name="register-form" class="nobottommargin" action="#" method="post">
		
					<h3>User Settings</h3>
					
					<div class="col_full">
						<label for="register-form-username">Username:</label>
						<input type="text" id="userprofile-form-user_name" name="user_name" value="<?php echo $user_name; ?>" class="form-control userName" required">
						<p class="d-error error_userName"></p>
					</div>

					<div class="col_full">
						<label for="register-form-useremail">User email:</label>
						<input type="text" id="userprofile-form-user_email" name="user_email" value="<?php echo $user_email; ?>" class="form-control userEmail">
					<p class="d-error error_userEmail"></p>
					</div>

								</div>
					<div class="col_full">
						<label for="register-form-password">First Name:</label>
				<input type="text" id="userprofile-form-user_first_name" name="user_first_name" value="<?php echo $user_first_name;?>" class="form-control firsName">
					<div class="d-error error_firsName"></div>
					</div>
					<div class="col_full">
						<label for="register-form-password">Last Name:</label>
						<input type="text" id="userprofile-form-user_last_name" name="user_last_name" value="<?php echo $user_last_name;?>" class="form-control lastName">
					<div class="d-error error_lastName"></div>
					</div>
					
					<div class="col_full">
						<label for="register-form-password">Password:</label>
				<input type="password" id="userprofile-form-user_password_new" name="user_password_new" value="<?php echo $password;?>" class="form-control passwordNew">
					   <div class="d-error error_passwordNew"></div>
					</div>
					
								
					<div class="col_full">
						<button class="button button-3d nomargin" id="upDProfile" name="upDProfile" value="pUpdate">UPDATE</button>
					</div>
					


				</form>
				
			</div>

		</div>

		

	</div>

</section>

	<?php include('footer.php'); ?>
