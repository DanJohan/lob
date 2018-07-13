<?php
include 'header.php'; 
include("config.php");
?>


<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
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
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
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

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($user_password_new);//encrypt the password before saving in the database

  	$query = "INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_email`, `user_first_name`, `user_last_name`, `password`, `user_status`, `created_at`, `update_at`) 
	VALUES ('', '$username', '$email', '$user_first_name', '$user_last_name', '$password', 1, CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000')";
			  
			  
  	mysqli_query($link, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}






?>


		<style>
		.d-error
		{
			color: red;
			font: 12px;
		}
		</style>
	<section id="page-title">

			<div class="container clearfix">
				<h1>Manage</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Register</a></li>
				</ol>
			</div>

		</section>
		
		<!-- Page Title
		============================================= -->
		
		<section id="add-bussines">

			
					
					<h3>Register</h3>
					<div class="form-group col-md-6">
						
						 
						 <form method="post" action="register.php" name="registerform">
    <label for="user_name">Username (only letters and numbers, 2 to 64 characters)</label>
    <input id="user_name" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />

    <label for="user_email">User's email (please provide a real email address, you'll get a verification mail with an activation link)</label>
    <input id="user_email" type="email" name="user_email" required />
    
    <label for="user_email_repeat">Email repeat</label>
    <input id="user_email_repeat" type="email" name="user_email_repeat" required />
    
    <label for="user_first_name">First Name</label>
    <input id="user_first_name" type="text" name="user_first_name" required />
    
    <label for="user_last_name">Last Name</label>
    <input id="user_last_name" type="text" name="user_last_name" required />

    <label for="user_password_new">Password (min. 6 characters!)</label>
    <input id="user_password_new" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />

    <label for="user_password_repeat">Password repeat</label>
    <input id="user_password_repeat" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
	<br>


    <label>Please enter these characters</label>
    <input type="text" name="captcha" required />
	<br>
    <input type="submit"  value="Register" name="registerSubmit" id="registerSubmit"  class="btn btn-primary"  />
</form>
						 
						 
					</div>
				
<!-- onChange category -->	
	<!-- form Validation -->
	<script>
$(document).ready(function(){ 
   	$('#registerSubmit').click(function(e){
		var valid = true;
	    var error_msg='';
		//alert('test');
	    if ($('.userName').val() == '')
        {
         $(".error_userName").text("Please enter name");
		  valid = false;
        }
		if ($('.userEmail').val() == '')
        {
		  $(".error_userEmail").text("Please enter email address");
		  valid = false;
        }
       if ($('.userEmail').val() != '')
        { 
		   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            if (reg.test($('.userEmail').val()) == false) 
            {
                $(".error_userEmail").text("Please enter valid email address");
				valid = false;
            }
		   
        }

		/*if ($('.owner').val() == '')
        {
         $(".error_owner").text("Please enter owner");
		  valid = false;
        }
		*/
		if (!$('select[name="owner"]').find(":selected").val())
        {
           $(".error_owner").text("Are you owner");
		   valid = false;
        }
		 
		if ($('.businessName').val() == '')
        {
         $(".error_businessName").text("Please enter Business Name");
		  valid = false;
        }
		  
		if ($('.businessAddress1').val() == '')
        {
         $(".error_businessAddress1").text("Please enter Business Address1");
		  valid = false;
        }
		
		if ($('.businessAddress2').val() == '')
        {
         $(".error_businessAddress2").text("Please enter Business Address2");
		  valid = false;
        } 
		
		if ($('.businessCity').val() == '')
        {
         $(".error_businessCity").text("Please enter Business City");
		  valid = false;
        } 
		
		if ($('.businessCity').val() == '')
        {
         $(".error_businessCity").text("Please enter Business City");
		  valid = false;
        } 
		
		if (!valid) {
    e.preventDefault();
} else {
 // allow the form to be submitted.
}
	});
 });
  
</script>
	
	<!-- form Validation -->

		
<?php include('footer.php'); ?>