<?php
session_start();
include("config.php");
require_once 'core/init.php';
ini_set('display_errors', 1);
//ob_start();
include 'header.php'; 

?>

<?php  
   if(isset($_POST['loginSubmit']))
	{
	$username = $_POST['username'];
       
    $password =  md5($_POST['userpass']);
  
    $is_remember= $_POST['is_remember'];
	$confirmCode = "active";
	

 $q="select * from tbl_users where user_name='".$username."' AND password='".$password."' AND com_code='".$confirmCode."'";

$res=mysqli_query($link,$q);
$num=mysqli_num_rows($res);
$result=mysqli_fetch_array($res);
if(!empty($num))
{

	$_SESSION['user_id']=$result['user_id'];
	$_SESSION['name']=$result['user_name']; 
	header("location:user_profile.php");
}
else
{

echo "<SCRIPT LANGUAGE='JavaScript'>
   		 window.alert('Sorry wrong email & password or not verify email address')
  		 window.location.href='manage.php';
  		 </SCRIPT>";	
	
}
 

}
      
   
    ?>

<section id="page-title">

	<div class="container clearfix">
		<h1>Add A Business</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item"><a href="manage.php">Manage</a></li>
		</ol>
	</div>

</section>

<style>
.d-error
{
	color:red;
	font-weight:12px;
}
</style>

<section id="content" style="margin-bottom: 0px;">

	<div class="container clearfix">

		<div class="col_one_third nobottommargin">

			<div class="nobottommargin">
<form id="login-form" name="login-form" class="nobottommargin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

					<h3>Login to your Account</h3>

					<div class="col_full">
						<label for="login-form-username">Username:</label>
						<input type="text" id="login-form-username " name="username" value="" class="form-control userName ">
						 <p class="d-error error_userName"></p>
					</div>

					<div class="col_full">
						<label for="login-form-password">Password:</label>
						<input type="password" id="login-form-password" name="userpass" value="" class="form-control userPass ">
						<p class="d-error error_userPass"></p>
					</div>

					<div class="col_full nobottommargin">
						<!--<button class="button button-3d nomargin" id="login-form-submit" name="login-form-submit" value="login">Login</button>-->
						<input type = "submit" value="submit"  name="loginSubmit" id="loginSubmit"  class="button button-3d nomargin"  />
						<!--<a href="#" class="fright">Forgot Password?</a>-->
					</div>
					
					<div class="col_full">
					<span><a href="register.php">Register new account</a></span>
					|
					<span><a href="forgot_password.php">I forgot my password</a></span>
					</div>

				</form>
			</div>

		</div>

		

	</div>

</section>

<script>
jQuery(document).ready(function(){ 
   	$('#loginSubmit').click(function(e){
		var valid = true;
	    var error_msg='';
	   if ($('.userName').val() == '')
        {
         $(".error_userName").text("Please enter name");
		  valid = false;
        }
		if ($('.userPass').val() == '')
        {
		    $(".error_userPass").text("Please enter password");
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


<?php include('footer.php'); ?>