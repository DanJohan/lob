<?php
session_start();
include("config.php");
require_once 'core/init.php';
include('header.php'); 
 
if(!isset($_SESSION['user_id']) && empty($_SESSION['user_id']))
{
	header('location:manage.php');
}
 
/*  $q="select * from tbl_users where user_name='".$username."' AND password='".$password."' AND com_code='".$confirmCode."'";

$res=mysqli_query($link,$q);
$num=mysqli_num_rows($res);
$result=mysqli_fetch_array($res); */


?>

		<style>
		.d-error {
			color: red;
			font-size: 11px;
			margin-bottom: 0;
			position: absolute;
		}
		</style>
	<section id="page-title">

			<div class="container clearfix">
				<h1>Add A Business</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item"><a href="add-business.php">Add A Business</a></li>
				</ol>
			</div>

		</section>
		
		<!-- Page Title
		============================================= -->
	
		<section id="add-bussines">

			<div class="container clearfix">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
				
				<ul>
					<li>Long and short description</li>
					<li>Keywords</li>
					<li>Entire street address</li>
					<li>Social media accounts</li>
					<li>Business hours</li>
				</ul>
				
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
				
				<form id="addb" name="add-bussines" id="add-bussines" method="post" action="business_query_add.php" enctype="multipart/form-data">
				<div id="message"></div>
					<!--<h3>Submitter Information</h3>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="inputName">Name</label>
						
					<input type="text" class="form-control userName" id="inputName"  name="user_name" placeholder="Name">
							<p class="d-error error_userName"></p>
							
						</div>
						<div class="form-group col-md-4">
							<label for="inputEmail4">Email</label>
							<input type="email" class="form-control userEmail" name="email" id="inputEmail4" placeholder="Email">
							 <p class="d-error error_userEmail"></p>
						</div>						
						<div class="form-group col-md-4">
							<label for="inputState">Are You Owner</label>
							<select id="inputState" class="form-control chosen-select" name="owner"> 
								<option selected="">Choose...</option>
								<option>Yes</option>
								<option>No</option>
							</select>
							<p class="d-error error_owner"></p>
						</div>
					</div>-->
					
					
					<h3>Business Information</h3>
					<div class="form-group col-md-4">
						<label for="bussinesName">Bussines Name</label>
						<input type="text" class="form-control businessName" name ="business_name" id="bussinesName" placeholder="Bussines Name*">
						<p class="d-error error_businessName"></p>
					</div>
					<div class="form-group col-md-4">
						<label for="inputAddress">Address 1</label>
						<input type="text" class="form-control businessAddress1" name="business_address1" id="inputAddress" placeholder="Address 1">
					   <p class="d-error error_businessAddress1"></p>
					</div>
					<div class="form-group col-md-4">
						<label for="inputAddress2">Address 2</label>
						<input type="text" class="form-control businessAddress2" name="business_address2" id="inputAddress2" placeholder="Address 2">
					<p class="d-error error_businessAddress2"></p>
					</div>
					<div class="form-group col-md-4">
						<label for="inputCity">City</label>
						<input type="text" class="form-control businessCity"  name="business_city" id="inputCity">
					<p class="d-error error_businessCity"></p>
					</div>
					<div class="form-group col-md-4">
						<label for="inputState">State</label>
						<select id="inputState" class="form-control businessState" name="business_state" id="business_state">
												<?php
												$states=get_states();
												if($states){
												foreach ($states as $index => $state) {
												?>
												<option value="<?php echo $state['id']; ?>"><?php echo $state['code']; ?></option>
												<?php
													}
													}
												?>
																							
											</select>
						
						
					</div>
					<div class="form-group col-md-4">
						<label for="inputZip">Zip</label>
						<input type="text" class="form-control businessZip" name="business_zip" id="inputZip">
						<p class="d-error error_businessZip"></p>
					</div>
					<div class="form-group col-md-4">
						<label for="BussinesEmail">Business Email Address</label>
						<input type="text" class="form-control businessEmail" id="BussinesEmail" name="business_email" placeholder="Business Email Address (required if no phone)">
					</div>
					<div class="form-group col-md-4">
						<label for="phone1">Phone</label>
						<input type="text" class="form-control businessPhone" id="phone1" name="business_phone" placeholder="Phone (required if no email)">
					</div>
					<div class="form-group col-md-4">
						<label for="website1">Website</label>
						<input type="text" class="form-control businessWebsite" id="website1" name="business_website" placeholder="Website">
					</div>					
					<div class="form-group col-md-4">
						<label for="category">Category</label>
						<select name="category" id="category" class="form-control category" >
							<option selected="">Select Category</option>
					 <?php 
					$res= mysqli_query($link, "select * from ".tbl_category."  order by category_id asc");
					while($data=mysqli_fetch_array($res))
					{
					?>
						<option value="<?php echo $data['category_id'];?>"><?php echo $data['category_name'];?></option>
					<?php } ?>
						</select>
						
					
							
					</div>					
					<div class="form-group col-md-4">
						<label for="scategory">Sub Category</label>
						<select name="scategory" id="scategory" class="form-control scategory">
							<option selected="">Select Sub Category</option>
							
							</select>
					</div>
					
					<div class="form-group col-md-12">
						<label for="scategory">Social Media</label>
					</div>
					
					<div class="form-group col-md-4">
						<input type="text" class="form-control tweet" id="twitter1" name="twitter" placeholder="Twitter Username">
					</div>
					
					<div class="form-group col-md-4">
						<input type="text" class="form-control fb" id="facebook1" name="facebook" placeholder="Facebook URL">
					</div>
					
					<div class="form-group col-md-4">
						<input type="text" class="form-control Google" id="Google1" name="google" placeholder="Google+ URL">
					</div>
					
					<div class="form-group col-md-4">
						<input type="text" class="form-control linkedin" id="linkedin1" name="linkedin" placeholder="Linkedin URL">
					</div>
					
					<div class="form-group col-md-4">
						<input type="text" class="form-control Instagram" id="Instagram1" name="instagram" placeholder="Instagram Username">
					</div>
					
					<div class="form-group col-md-4">
						<input type="text" class="form-control Rss" id="Rss1" name="rss" placeholder="Rss Feed URL">
					</div>
					
					<div class="form-group col-md-12">
						<label for="keywords1">Keywords (Max Phrases: 10 delimited by comma; Max Characters: 155)</label>
						<input type="text" class="form-control keyword" id="keywords1" name="keywords" placeholder="Keywords">
					</div>
					
					<div class="form-group col-md-12">
						<label for="shortdes">Short Description (Max Characters: 155) - Displayed on the search results page</label>
						<input type="text" class="form-control short-d" id="shortdes" name="short_desc" placeholder="Short Description">
					</div>
					
					<div class="form-group col-md-12">
						<label for="longdes">Long Description (Maximum Characters: 2048) - Displayed on your business listing page</label>
						<textarea class="form-control long-d" id="longdes" name="long_desc" rows="3"></textarea>
						
						
					</div>
					
					<div class="form-group col-md-12">
						<label for="file-upload">Upload Logo</label>
						<input type="file" class="form-control-file" id="up-logo" name="upload_logo">
					</div>
					
					<div class="form-group col-md-12">
						<div class="form-check agre">
							<input class="form-check-input" type="checkbox" id="gridCheck">
							<label class="form-check-label" for="gridCheck">
								Accept Terms of Business Submission
							</label>
						</div>
					</div>
						
					<p class="form-group col-md-12">Please confirm that this business is black-owned according to the following terms: "The Survey of Business Owners defines black-owned businesses as firms in which blacks or African-Americans own 51 percent or more of the equity, interest, or stock of the business."</p>
					<!--<button type="submit" class="btn btn-primary">Sign in</button>-->
					<div class="form-group col-md-12">
						<!--<input type = "submit" value="submit"  name="businessSubmit" id="businessSubmit"  class="btn btn-primary"  />-->
				<input type ="submit" value="submit"  name="businessSubmit" id="businessSubmit"  class="btn btn-primary"  />
					</div>
				</form>
			</div>
			
		</section>
		<!-- onChange category -->
<script type="text/javascript">
 jQuery(document).ready(function(){
	 var category_id = jQuery('#category').val();
    jQuery('#category').on("change",function () {
        var category_id = jQuery(this).find('option:selected').val();
		//console.log(category_id);
        jQuery.ajax({
            url: "cat-subcat-ajax.php",
            type: "POST",
            data: "category_id="+category_id,
            success: function (response) {
                //console.log(response);
                jQuery("#scategory").html(response);
            },
        });
    });  
	
});
</script>

<!-- onChange category -->	


	<!-- form Validation -->
	<script>
	
	$(document).ready(function(){ 
  	 $('#businessSubmit').click(function(e){
		var valid = true;
	    var error_msg='';
		//alert('test');
	  /*  if ($('.userName').val() == '')
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

		
		 if (!$('select[name="owner"]').find(":selected").val())
        {
           $(".error_owner").text("Are you owner");
		   valid = false;
        }
		 */
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
		
		if ($('.businessState').val() == '')
        {
         $(".error_businessState").text("Please enter Business State");
		  valid = false;
        } 
		
		/*  if (!$('select[name="business_state"]').find(":selected").val())
        {
           $(".error_businessState").text("Please enter Business State");
		   valid = false;
        } */
		
		if (!valid) {
    e.preventDefault();
} else {
 // allow the form to be submitted.
}
	});
 });
  

	
	
	
 /*   $(document).ready(function(){ 
  	$('#businessSubmit').click(function(e){
		var valid = true;
	    var error_msg='';
         var userName = $(".userName").val();
		 var userEmail = $(".userEmail").val();
		 var businessName = $(".businessName").val();
		 var businessAddress1 = $(".businessAddress1").val();
		 var businessAddress2 = $(".businessAddress2").val();
		 var businessCity = $(".businessCity").val();
		 var businessState = $(".businessState").val();
		 var businessZip = $(".businessZip").val();
		 var businessEmail = $(".businessEmail").val();
		 var businessPhone = $(".businessPhone").val();
		 var businessWebsite = $(".businessWebsite").val();
		 var category = $(".category").val();
		 var scategory = $(".scategory").val();
		 
		 
	    if (userName == '')
        {
         $(".error_userName").text("Please enter name");
		  valid = false;
        }
		if (userEmail == '')
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
	
	
		if (businessName == '')
        {
         $(".error_businessName").text("Please enter Business Name");
		  valid = false;
        }
		  
		if (businessAddress1 == '')
        {
         $(".error_businessAddress1").text("Please enter Business Address1");
		  valid = false;
        }
		
		if (businessAddress2 == '')
        {
         $(".error_businessAddress2").text("Please enter Business Address2");
		  valid = false;
        } 
		
		if (businessCity == '')
        {
         $(".error_businessCity").text("Please enter Business City");
		  valid = false;
        } 
		
		if (businessZip == '')
        {
         $(".error_businessZip").text("Please enter Business zip code");
		  valid = false;
        } 
		if (businessZip == '')
        {
         $(".error_businessWebsite").text("Please enter Business businessWebsite");
		  valid = false;
        } 
		if (!valid) {
			e.preventDefault();
		} else {
			
			 var fromData = {userName:userName,userEmail:userEmail,businessName:businessName,businessAddress1:businessAddress1,businessAddress2:businessAddress2,businessCity:businessCity,businessState:businessState,businessZip:businessZip,businessEmail:businessEmail,businessPhone:businessPhone,businessWebsite:businessWebsite,category:category,scategory:scategory};
			$.ajax({
				url: "addbusiness-ajax.php",
				type: "POST",			   
				data: fromData,
				dataType: 'html',
				success: function (response) {
					console.log(response);
					
				},
			}); 
			
		}
	});
 });
  
   */
  
</script>
	
	<!-- form Validation -->

		
<?php include('footer.php'); ?>