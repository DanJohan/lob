<?php
include 'header.php'; 
include("config.php");
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
							<select id="inputState" class="form-control">
								<option selected="">Choose...</option>
								<option>Yes</option>
								<option>No</option>
							</select>
						</div>
					</div>
					
					
					<h3>Business Information</h3>
					<div class="form-group col-md-4">
						<label for="bussinesName">Bussines Name</label>
						<input type="text" class="form-control" id" id="bussinesName" placeholder="Bussines Name*">
					</div>
					<div class="form-group col-md-4">
						<label for="inputAddress">Address 1</label>
						<input type="text" class="form-control" id="inputAddress" placeholder="Address 1">
					</div>
					<div class="form-group col-md-4">
						<label for="inputAddress2">Address 2</label>
						<input type="text" class="form-control" id="inputAddress2" placeholder="Address 2">
					</div>
					<div class="form-group col-md-4">
						<label for="inputCity">City</label>
						<input type="text" class="form-control" id="inputCity">
					</div>
					<div class="form-group col-md-4">
						<label for="inputState">State</label>
						<select id="inputState" class="form-control">
							<option selected="">Choose...</option>
							<option>...</option>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label for="inputZip">Zip</label>
						<input type="text" class="form-control" id="inputZip">
					</div>
					<div class="form-group col-md-4">
						<label for="BussinesEmail">Business Email Address</label>
						<input type="text" class="form-control" id="BussinesEmail" placeholder="Business Email Address (required if no phone)">
					</div>
					<div class="form-group col-md-4">
						<label for="phone1">Phone</label>
						<input type="text" class="form-control" id="phone1" placeholder="Phone (required if no email)">
					</div>
					<div class="form-group col-md-4">
						<label for="website1">Website</label>
						<input type="text" class="form-control" id="website1" placeholder="Website">
					</div>					
					<div class="form-group col-md-4">
						<label for="category">Category</label>
						<select name="category" id="category" class="form-control" onchange="showsubcat(this.value);" >
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
						<select name="scategory" id="scategory" class="form-control">
							<option selected="">Select Sub Category</option>
							
							 <?php $res= mysqli_query($link, "select * from ".tbl_subcategory." order by subcategory_id asc"); 
								while($data=mysqli_fetch_array($res))
								{
								?>
								<option value="<?php echo $data['subcategory_id'];?>"><?php echo $data['subcateory_name'];?></option>
								<?php } ?>
						</select>
					</div>
					
					<div class="form-group">
						<div class="form-check agre">
							<input class="form-check-input" type="checkbox" id="gridCheck">
							<label class="form-check-label" for="gridCheck">
								Accept Terms of Business Submission
							</label>
						</div>
					</div>
					
					<p>Please confirm that this business is black-owned according to the following terms: "The Survey of Business Owners defines black-owned businesses as firms in which blacks or African-Americans own 51 percent or more of the equity, interest, or stock of the business."</p>
					<!--<button type="submit" class="btn btn-primary">Sign in</button>-->
					 <input type = "submit" value="submit"  name="businessSubmit" id="businessSubmit"  class="btn btn-primary"  />
					</form>
			</div>
			
		</section>
		<!-- onChange category -->
<script type="text/javascript">
$(document).ready(function(){

    $('#category').on("change",function () {
        var category_id = $(this).find('option:selected').val();
		//alert('test');
        $.ajax({
            url: "ajax.php",
            type: "POST",
            data: "category_id="+category_id,
            success: function (response) {
                console.log(response);
                $("#scategory").html(response);
            },
        });
    }); 

});

</script>





	
<!-- onChange category -->	
	<!-- form Validation -->
	<script>
jQuery(document).ready(function(){ 
   	$('#businessSubmit').click(function(e){
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
		/* if ($('.owner').val() == '')
        {
         $(".error_owner").text("Please enter owner name");
		  valid = false;
        }
		
		if ($('.businessNamer').val() == '')
        {
         $(".error_businessNamer").text("Please enter Business Name");
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
		
		if ($('.businessZip').val() == '')
        {
         $(".error_businessZip").text("Please enter Business Zip");
		  valid = false;
        }
		if ($('.businessEmail').val() == '')
        {
         $(".error_businessEmail").text("Please enter Business Zip");
		  valid = false;
        }
		
		if ($('.businessEmail').val() == '')
        {
		  $(".error_businessEmail").text("Please enter Business Email");
		  valid = false;
        }
       if ($('.businessEmail').val() != '')
        { 
		   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            if (reg.test($('.businessEmail').val()) == false) 
            {
                $(".error_businessEmail").text("Please enter valid Business email address");
				valid = false;
            }
		   
        } 
		if($('.businessPhone').val() == '')
		{
			$(".error_businessPhone").text('Please enter Business Phone');
		}
		if($('.business_website').val() == '')
		{
			$(".error_businessWebsite").text('Please enter Business website');
		}
			*/
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