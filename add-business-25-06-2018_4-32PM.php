<?php
ob_start();
include 'header.php'; 
include("config.php");
?>

<?php
// initializing variables
$username = "";
$email    = "";
$username = "";
$email = "";
$business_name = "";
$business_address1 = "";
$business_address2 = "";
$business_city = "";
$business_state = "";
$business_zip = "";
$business_website="";
$category = "";
$scategory = "";


if (isset($_REQUEST['businessSubmit'])) {
	//print_r($_REQUEST);
  // receive all input values from the form
  $username = mysqli_real_escape_string($link, $_POST['username']);
  $email = mysqli_real_escape_string($link, $_POST['email']);
  $business_name = mysqli_real_escape_string($link, $_POST['business_name']);
  $business_address1 = mysqli_real_escape_string($link, $_POST['business_address1']);
  $business_address2 = mysqli_real_escape_string($link, $_POST['business_address2']);
  $business_city = mysqli_real_escape_string($link, $_POST['business_city']);
  $business_state = mysqli_real_escape_string($link, $_POST['business_state']);
  $business_zip = mysqli_real_escape_string($link, $_POST['business_zip']);
  $business_website = mysqli_real_escape_string($link, $_POST['business_website']);
  $category = mysqli_real_escape_string($link, $_POST['category']);
  $scategory = mysqli_real_escape_string($link, $_POST['scategory']);
  
 

  	$query = "INSERT INTO ` tbl_businessinfo` (`business_id`, `username`, `email`, `business_name`, `business_address1`, `business_address2`, `business_city`, `business_state`, `business_zip`,`business_email`,`business_phone`,`business_website`,`business_category`,`business_subcategory`) 
	VALUES ('', '$username', '$email', '$business_name', '$business_address1', '$business_address2', '$business_city', '$business_state', '$business_zip','$business_website','$category',$scategory)";
			  
			  
  	mysqli_query($link, $query);
  	header('location: business.php');
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
				<h1>Add A Business</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Add A Business</a></li>
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
				
				<form id="addb" name="add-bussines" id="add-bussines" method="post">
					<h3>Submitter Information</h3>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="inputName">Name</label>
							<!--<input type="text" class="form-control userName" id="inputName"  name="username" placeholder="Name">-->
							<input type="text" class="form-control userName" id="inputName"  name="username" placeholder="Name">
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
					</div>
					
					
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
						<select id="inputState" class="form-control" name="business_state" id="business_state">
												<option value="">Select State</option>
												<option value="AK">AK</option>
												<option value="AL">AL</option>
												<option value="AR">AR</option>
												<option value="AZ">AZ</option>
												<option value="CA">CA</option>
												<option value="CO">CO</option>
												<option value="CT">CT</option>
												<option value="DC">DC</option>
												<option value="DE">DE</option>
												<option value="FL">FL</option>
												<option value="GA">GA</option>
												<option value="HI">HI</option>
												<option value="IA">IA</option>
												<option value="ID">ID</option>
												<option value="IL">IL</option>
												<option value="IN">IN</option>
												<option value="KS">KS</option>
												<option value="KY">KY</option>
												<option value="LA">LA</option>
												<option value="MA">MA</option>
												<option value="MD">MD</option>
												<option value="ME">ME</option>
												<option value="MI">MI</option>
												<option value="MN">MN</option>
												<option value="MO">MO</option>
												<option value="MS">MS</option>
												<option value="MT">MT</option>
												<option value="NC">NC</option>
												<option value="ND">ND</option>
												<option value="NE">NE</option>
												<option value="NH">NH</option>
												<option value="NJ">NJ</option>
												<option value="NM">NM</option>
												<option value="NV">NV</option>
												<option value="NY">NY</option>
												<option value="OH">OH</option>
												<option value="OK">OK</option>
												<option value="OR">OR</option>
												<option value="PA">PA</option>
												<option value="RI">RI</option>
												<option value="SC">SC</option>
												<option value="SD">SD</option>
												<option value="TN">TN</option>
												<option value="TX">TX</option>
												<option value="UT">UT</option>
												<option value="VA">VA</option>
												<option value="VT">VT</option>
												<option value="WA">WA</option>
												<option value="WI">WI</option>
												<option value="WV">WV</option>
												<option value="WY">WY</option>
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
						<input type="text" class="form-control" id="phone1" name="business_phone" placeholder="Phone (required if no email)">
					</div>
					<div class="form-group col-md-4">
						<label for="website1">Website</label>
						<input type="text" class="form-control" id="website1" name="business_website" placeholder="Website">
					</div>					
					<div class="form-group col-md-4">
						<label for="category">Category</label>
						<select name="category" id="category" class="form-control" >
							<option selected="">Select Category</option>
					 <?php 
					//$res= mysqli_query($link, "select * from ".tbl_category."");
					echo "select * from ".tbl_category."  order by category_id asc";
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
						<select name="scategory" id="scategory" class="form-control">
							<option selected="">Select Sub Category</option>
							
							</select>
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
						<input type = "submit" value="submit"  name="businessSubmit" id="businessSubmit"  class="btn btn-primary"  />
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
		console.log(category_id);
        jQuery.ajax({
            url: "cat-subcat-ajax.php",
            type: "POST",
            data: "category_id="+category_id,
            success: function (response) {
                console.log(response);
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
 //var onwer = document.getElementsByName("onwer");
  	$('#businessSubmit').click(function(e){
		 //e.preventDefault();
		var valid = true;
	    var error_msg='';
		//alert('test');
		 var userName = $(".userName").val();
		 var userEmail = $(".userEmail").val();
		 var businessName = $(".businessName").val();
		 var businessAddress1 = $(".businessAddress1").val();
		 var businessAddress2 = $(".businessAddress2").val();
		 var businessCity = $(".businessCity").val();
		 var businessZip = $(".businessZip").val();
		 var businessWebsite = $(".businessWebsite").val();
		 
		 
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
	
		/* if (!$('select[name="owner"]').find(":selected").val())
        {
           $(".error_owner").text("Are you owner");
		   valid = false;
        }
		*/ 
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
 // allow the form to be submitted.
 
 
 	 
		
  $.ajax({
            url: "doadd-business.php",
            type: "POST",
           //data: "userName="+userName&"userEmail="+userEmail&"businessName="+businessName&"businessAddress1="+businessAddress1&"businessAddress2="businessAddress2&"businessCity="+businessCity&"businessZip="+businessZip&"businessWebsite="+businessWebsite,
		   
		   data: "{userName:"+userName+" , userEmail: "+userEmail+", businessName:"+businessName+"}",
            success: function (response) {
                console.log(data);
				alert(data);
                //$("#scategory").html(response);
            },
        });
 

 
}
	});
 });
  
</script>
	
	<!-- form Validation -->

		
<?php include('footer.php'); ?>