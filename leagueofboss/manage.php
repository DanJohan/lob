<?php
ob_start();
include 'header.php'; 
include("config.php");
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

			<div class="well well-lg nobottommargin">
				<form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">

					<h3>Login to your Account</h3>

					<div class="col_full">
						<label for="login-form-username">Username:</label>
						<input type="text" id="login-form-username" name="login-form-username" value="" class="form-control">
					</div>

					<div class="col_full">
						<label for="login-form-password">Password:</label>
						<input type="password" id="login-form-password" name="login-form-password" value="" class="form-control">
					</div>

					<div class="col_full nobottommargin">
						<button class="button button-3d nomargin" id="login-form-submit" name="login-form-submit" value="login">Login</button>
						<a href="#" class="fright">Forgot Password?</a>
					</div>
					
					<div class="col_full">
					<span><a href="#">Register new account</a></span>
					|
					<span><a href="#">I forgot my password</a></span>
					</div>

				</form>
			</div>

		</div>

		

	</div>

</section>




<?php include('footer.php'); ?>