<?php
ob_start();
include 'header.php'; 
include("config.php");
?>
<?php

$username = "";
$email    = "";
$user_first_name = "";
$user_last_name    = "";
$user_password_new  = "";
$user_password_repeat    = "";
$errors = array(); 

if (isset($_REQUEST['registerSubmit'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($link, $_POST['user_name']);
  $email = mysqli_real_escape_string($link, $_POST['user_email']);
  $user_first_name = mysqli_real_escape_string($link, $_POST['user_first_name']);
  $user_last_name = mysqli_real_escape_string($link, $_POST['user_last_name']);
  $user_password_new = mysqli_real_escape_string($link, $_POST['user_password_new']);
  $user_password_repeat = mysqli_real_escape_string($link, $_POST['user_password_repeat']);

  // form validation: ensure that the form is correctly filled 
   if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($user_password_new)) { array_push($errors, "Password is required"); }
  if ($user_password_new != $user_password_repeat) {
	array_push($errors, "The passwords do not match");
  }
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM tbl_users WHERE user_name='$username' OR user_email='$email' LIMIT 1";
  $result = mysqli_query($link, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['user_name'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['user_email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($user_password_new);

  	$query = "INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_email`, `user_first_name`, `user_last_name`, `password`, `user_status`, `created_at`, `update_at`) 
	VALUES ('', '$username', '$email', '$user_first_name', '$user_last_name', '$password', 1, CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000')";
			  
			  
  	mysqli_query($link, $query);
  echo "<script>
        window.location='index.php';
    </script> "; 
  	//header('location: index.php');
  }
}

?>
<section id="page-title">

	<div class="container clearfix">
		<h1>Add A Business</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item"><a href="#">Manage</a></li>
		</ol>
	</div>

</section>



<section id="content" style="margin-bottom: 0px;">

	<div class="container clearfix">

		<div class="col_one_third nobottommargin">

			<div class="nobottommargin">
				<form id="register-form" name="register-form" class="nobottommargin" action="#" method="post">

					<h3>Register</h3>

					<div class="col_full">
						<label for="register-form-username">Username:</label>
						<input type="text" id="register-form-user_name" name="user_name" value="" class="form-control">
						
					</div>

					<div class="col_full">
						<label for="register-form-useremail">User email:</label>
						<input type="text" id="register-form-user_email" name="user_email" value="" class="form-control">
					</div>

					<div class="col_full">
						<label for="register-form-password">Email repeat:</label>
						<input type="text" id="register-form-user_first_name" name="password" value="" class="form-control">
					</div>
					<div class="col_full">
						<label for="register-form-password">First Name:</label>
						<input type="text" id="register-form-firstname" name="user_first_name" value="" class="form-control">
					</div>
					<div class="col_full">
						<label for="register-form-password">Last Name:</label>
						<input type="text" id="register-form-user_last_name" name="user_last_name" value="" class="form-control">
					</div>
					
					<div class="col_full">
						<label for="register-form-password">Password:</label>
						<input type="password" id="register-form-user_password_new" name="user_password_new" value="" class="form-control">
					</div>
					
					<div class="col_full">
						<label for="register-form-password">Password repeat:</label>
						<input type="password" id="register-form-user_password_repeat" name="user_password_repeat" value="" class="form-control">
					</div>
					
					<div class="col_full">
						<button class="button button-3d nomargin" id="registerSubmit" name="registerSubmit" value="Register">Register</button>
					</div>
					


				</form>
			</div>

		</div>

		

	</div>

</section>




<?php include('footer.php'); ?>