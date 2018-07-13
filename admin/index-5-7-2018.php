<?php 
session_start();
?>

<?php

require_once('../config.php');
 $msg=""; 
if(isset($_POST['submitField']))
{

$sql="SELECT * FROM  tbl_admin WHERE username='".$_POST['adminUsername']."' and password='".md5($_POST['adminPassword'])."'";
   
	$result=mysqli_query($link, $sql);

    $count=mysqli_num_rows($result);
	$rs=mysqli_fetch_array($result);
	if($count==1){
	$_SESSION['admin_id']=$rs['admin_id'];
	$_SESSION['username']=$rs['username']; 

 if(isset($_REQUEST['rememberMe']) && $_REQUEST['rememberMe']=="1")
			{	
				setcookie("adminUsernameCookie", $_POST['adminUsername'], time()+60*60*24*30);		
				setcookie("adminPasswordCookie", $_POST['adminPassword'], time()+60*60*24*30);
				setcookie("remembermeCookie", $_REQUEST["rememberMe"], time()+60*60*24*30);	
			}
			else
			{
				 setcookie("adminUsernameCookie", "");		
				 setcookie("adminPasswordCookie", "");
				 setcookie('remembermeCookie',"");
			}


header("location:dashboard.php");
}
else {

$msg="Wrong Username or Password";


}
}
?>
	


<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>
<script language="javascript">
	function validate()
	{
		x = document.frmLogin

		if ((x.adminUsername.value) == "")
		{
			alert("Please valid Admin Name.")
			x.adminUsername.focus();
			return false;			
		}
		
		document.getElementById("nameError").style.display = "inline";
document.getElementById("FieldData0").select();
document.getElementById("FieldData0").focus();
		if (x.adminPassword.value=="")
		{
			alert("please valid admin password.")
			x.adminPassword.focus();
			return false;
		}
		return true;
	}
</script>
	</head>
	
	<?php

	$adminUsernameCookie1='';
	$adminPasswordCookie1='';
	$remembermeCookie1='';
	
	if(isset($_COOKIE['adminUsernameCookie']) && $_COOKIE['adminUsernameCookie']!="")
	{	
		$adminUsernameCookie1 = $_COOKIE['adminUsernameCookie'];
	}
	if(isset($_COOKIE['adminPasswordCookie']) && $_COOKIE['adminPasswordCookie']!="")
	{	
		$adminPasswordCookie1 = $_COOKIE['adminPasswordCookie'];	
	}	
	if(isset($_COOKIE['remembermeCookie']) && $_COOKIE['remembermeCookie']!="")
	{	
		$remembermeCookie1 = $_COOKIE['remembermeCookie'];	
	}
	else
	{ 
		$remembermeCookie1 = '';
	} 
?>
	
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo pull-left">
					<img src="assets/images/logo.png" height="54" alt="LOB Admin" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
					</div>
					<div class="panel-body">
					<?php echo $msg; ?>
						<!--<form name="frmLogin" id="loginForm" method="POST" action="check_adminlogin.php" onSubmit="return validate()">-->
						<form name="frmLogin" id="loginForm" method="POST" action="" onSubmit="return validate()">
						
							<div class="form-group mb-lg">
								<label>Username</label>
								<div class="input-group input-group-icon">
									<!--<input name="username" type="text" class="form-control input-lg" />-->
									 <input name="adminUsername" id="adminUsername" type="text" size="27" value="<?php if($adminUsernameCookie1 != '') { echo $adminUsernameCookie1; }?>" class="form-control input-lg" />
									
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Password</label>
									<!--<a href="pages-recover-password.html" class="pull-right">Lost Password?</a>-->
								</div>
								<div class="input-group input-group-icon">
									<!--<input name="pwd" type="password" class="form-control input-lg" />-->
								 <input name="adminPassword" id="adminPassword" type="password" size="27" value="<?php if($adminPasswordCookie1 != '') { echo $adminPasswordCookie1; }?>" class="form-control input-lg"/>
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<!--<input id="RememberMe" name="rememberme" type="checkbox"/>-->
										
										 <input type="checkbox" name="rememberMe" id="rememberMe" value="1" <?php if($remembermeCookie1 == 1) {?> checked="checked" <?php } ?>/>
										
										<label for="RememberMe">Remember Me</label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
								<!--	<button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
									<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>-->
									
									  <input type="submit" name="submitField" id="submitField" class="btn btn-primary hidden-xs" />
									
								</div>
							</div>

						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All Rights Reserved.</p>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>

	</body>
</html>