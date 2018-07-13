<?php
ob_start();
include 'header.php'; 
include("config.php");
?>

<?php  
   if(isset($_REQUEST['loginSubmit']))
	{
	
	 $username = @$_REQUEST['username'];
       
     $password =  @md5($_REQUEST['userpass']);
  
    $is_remember= @$_REQUEST['is_remember'];
	
$q="select * from tbl_users where user_name='$username' && password='$password'";
$res=mysqli_query($link,$q) or die(mysql_error());
$num=mysqli_num_rows($res);
$result=mysqli_fetch_array($res);
if(!empty($num))
{
$msg="success";
		$_SESSION[user_id]="$result[user_id]"; 
		$_SESSION[name]="$result[username]"; 
	    header("location:manage.php?s=$msg");
}
else
{
$msg="wrong";
header("location:index.php?p=$msg");
 /* echo "<script>
        window.location='manage.php?p=$msg';
    </script> " ; */
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



<section id="content" style="margin-bottom: 0px;">

	<div class="container clearfix">

		<div class="col_one_third nobottommargin">

			<div class="nobottommargin">
				<form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">

					<h3>Login to your Account</h3>

					<div class="col_full">
						<label for="login-form-username">Username:</label>
						<input type="text" id="login-form-username" name="username" value="" class="form-control">
					</div>

					<div class="col_full">
						<label for="login-form-password">Password:</label>
						<input type="password" id="login-form-password" name="userpass" value="" class="form-control">
					</div>

					<div class="col_full nobottommargin">
						<!--<button class="button button-3d nomargin" id="login-form-submit" name="login-form-submit" value="login">Login</button>-->
						<input type = "submit" value="submit"  name="loginSubmit" id="loginSubmit"  class="button button-3d nomargin"  />
						<!--<a href="#" class="fright">Forgot Password?</a>-->
					</div>
					
					<div class="col_full">
					<span><a href="register.php">Register new account</a></span>
					|
					<span><a href="#">I forgot my password</a></span>
					</div>

				</form>
			</div>

		</div>

		

	</div>

</section>




<?php include('footer.php'); ?>