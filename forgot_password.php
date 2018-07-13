<?php
include 'header.php'; 
include("config.php");
?>
<script>
	$(function(){
		
		$('#message').hide('fast');	
		
		
			$('#Login').click(function(){
			$('#message').hide('fast');	
			var x=$('#email').val();
			var atpos=x.indexOf("@");
			var dotpos=x.lastIndexOf(".");

			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
			{
			$('#message').html("Please enter a valid e-mail.");
			$('#message').show('slow');	
				return false;
			}
			
			
			$.post( "sendforgot_pass_email.php", { email:$('#email').val() })
			.done(function( data ) {
				if(data == 1){
					
					$('#message').html("Your password has been sent to your e-mail.");
					$('#message').show('slow');		
				}
				if(data == 0){
				
					$('#message').html(" This is not a registered e-mail.");
					$('#message').show('slow');	
				}
				
			});
						
			
			
			
		});
	
	})
</script>
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
	font-color:red;
	font-weight:12px;
}
</style>

<section id="content" style="margin-bottom: 0px;">

	<div class="container clearfix">

		<div class="col_one_third nobottommargin">

			<div class="nobottommargin">
					<form name="login-form" id="login-form"  class="nobottommargin" method="post"  onSubmit="return false"; >

					<h3>Forgot Password</h3>

					<div class="col_full">
						<label for="login-form-username">Email * :</label>
						 <input name="email" type="text" class="form-control username" id="email" />
						 <div class="login_div_links_sec" id="message" style="color:red;">
					</div>

					<div class="col_full nobottommargin">
					  <input name="Login" type="submit" class="button button-3d nomargin" id="Login" value="Submit" />
					  					   
					</div>
					  <div id="passs"></div>
				</form>
			</div>

		</div>

		

	</div>

</section>


<?php include 'footer.php'; ?>
