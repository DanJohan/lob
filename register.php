<?php
//ob_start();
include 'header.php'; 

?>
<style>
.d-error
{
	color:red;
	font-weight:12px;
}
</style>
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
			<div id="message"></div>
				<!--<form id="register-form" name="register-form" class="nobottommargin" action="qry_register.php" method="post">-->
				<form id="register-form" name="register-form" class="nobottommargin" action="reg_query.php" method="post">

					<h3>Register</h3>

					<div class="col_full">
						<label for="register-form-username">Username:</label>
						<input type="text" id="register-form-user_name" name="user_name" value="" class="form-control userName" required">
						<p class="d-error error_userName"></p>
					</div>

					<div class="col_full">
						<label for="register-form-useremail">User email:</label>
						<input type="text" id="register-form-user_email" name="user_email" value="" class="form-control userEmail">
					<p class="d-error error_userEmail"></p>
					</div>

					<div class="col_full">
						<label for="register-form-password">Email repeat:</label>
						<input type="text" id="register-form-user_confirm_email" name="user_confirm_email" value="" class="form-control confirmEmail">
					<p class="d-error error_confirmEmail"></p>
					
					</div>
					<div class="col_full">
						<label for="register-form-password">First Name:</label>
						<input type="text" id="register-form-user_first_name" name="user_first_name" value="" class="form-control firstName">
					<div class="d-error error_firstName"></div>
					</div>
					<div class="col_full">
						<label for="register-form-password">Last Name:</label>
						<input type="text" id="register-form-user_last_name" name="user_last_name" value="" class="form-control lastName">
					<div class="d-error error_lastName"></div>
					</div>
					
					<div class="col_full">
						<label for="register-form-password">Password:</label>
						<input type="password" id="register-form-user_password_new" name="user_password_new" value="" class="form-control passwordNew">
					   <div class="d-error error_passwordNew"></div>
					</div>
					
					<div class="col_full">
						<label for="register-form-password">Password repeat:</label>
						<input type="password" id="register-form-user_confirm_password" name="user_confirm_password" value="" class="form-control confirmPassword">
					<div class="d-error error_confirmPassword"></div>
					</div>
					
					<div class="col_full">
						<!--<button class="button button-3d nomargin" id="registerSubmit" name="registerSubmit" value="Register">Register</button>-->
						
						<!--for Ajax form submit<input type="button"value="Register"  name="registerSubmit" id="registerSubmit"  class="button button-3d nomargin"  />-->
					<input type="submit"value="Register"  name="registerSubmit" id="registerSubmit"  class="button button-3d nomargin"  />	
					</div>
					


				</form>
			</div>

		</div>

		

	</div>

</section>

	<script>
$(document).ready(function(){ 
 
	$('#registerSubmit').click(function(e){
		var valid = true;
	    var error_msg='';
	 
	     var userName = $(".userName").val();
		 var userEmail = $(".userEmail").val();
		 var confirmEmail = $(".confirmEmail").val();
		 var firstName = $(".firstName").val();
		 var lastName = $(".lastName").val();
		 var passwordNew = $(".passwordNew").val();
		 var confirmPassword = $(".confirmPassword").val();
		 	
		
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
		
		/*   if ($('.confirmEmail').val() == '')
        {
		     $(".error_confirmEmail").text("Please confirm email address");
			 valid = false;
           
        }  */
		
		if ($('.confirmEmail').val() != '')
        { 
		   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            if (reg.test($('.confirmEmail').val()) == false) 
            {
                $(".error_emailRepeat").text("Please enter valid email address");
				valid = false;
            }
		   
        }
			
	if($('.userEmail').val() !=$('.confirmEmail').val()){
		     $(".error_confirmEmail").text("email does not match!");
			 valid = false;
		} 
		
			
	  if ($('.firstName').val() == '')
        {
         $(".error_firstName").text("Please enter first name");
		  valid = false;
        }	
		
		if ($('.lastName').val() == '')
        {
         $(".error_lastName").text("Please enter last name");
		  valid = false;
        }
		
		 if ($('.passwordNew').val() == '')
        {
		     $(".error_passwordNew").text("Please enter password");
			 valid = false;
           
        }
		 if ($('.confirmPassword').val() == '')
        {
		     $(".error_confirmPassword").text("Please confirm password");
			 valid = false;
           
        }
		
		if($('.passwordNew').val() !=$('.confirmPassword').val()){
		     $(".error_confirmPassword").text("Password does not match!");
			 valid = false;
		}  
		//alert('tste');		 
		if (!valid) {
    e.preventDefault();
} else {
 // allow the form to be submitted.
 /* var fromData = {userName:userName,userEmail:userEmail,firstName:firstName,lastName:lastName,passwordNew:passwordNew};

			$.ajax({
				url: "register-ajax.php",
				type: "POST",			   
				data: fromData,
				dataType: 'html',
				success: function (response) {
					
					//console.log(response);
					//$("#message").html(data);
					
				},
			});  */
 // allow the form to be submitted end.
 
}
	});
 });
  
</script>


<?php include('footer.php'); ?>