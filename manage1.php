<?php
//include 'header.php'; 
include("config.php");
?>

<?php  
       
   /*   print_r($_REQUEST);
	 $username = @$_REQUEST['username'];
       
     $password =  @md5($_REQUEST['userpass']);
  
    $is_remember= @$_REQUEST['is_remember'];
    
  
    if(!empty($username) && !empty($password))
    {
    
	   echo "select * from tbl_users where user_name='$username' && password='$password'"; 
$q="select * from tbl_users where user_name='$username' && password='$password'";
$res=mysqli_query($link,$q) or die(mysql_error());
$num=mysqli_num_rows($res);
$result=mysqli_fetch_array($res);
	   
	 
        if($result == true)
        {
          if($is_remember){
    		setcookie('username',$username,time()+3600);
    		setcookie('password',$password,time()+3600);
    		setcookie('is_rem',$is_remember,time()+3600);
    	   }
    	   else{
    		setcookie('username','',time()-3600);
    		setcookie('password','',time()-3600);
    		setcookie('is_rem','',time()-3600);
    	   }
    	   echo "<script type='text/javascript'>alert('Successfully login');</script>";
    	      $_SESSION['name'] = $username;
              $_SESSION['user_session'];  
	      echo "<script type='text/javascript'>window.location='index.php';</script>";
        }
      if($result == false)
       {
        	
    	   echo "<script type='text/javascript'>alert('Wrong username or password. Please try again.');</script>";
       }
    }
    */
   
   if(isset($_POST['loginSubmit']))
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

		$_SESSION[user_id]="$result[user_id]"; 
		$_SESSION[name]="$result[username]"; 
	    header("location:dashboard.php");
}
else
{
$msg="wrong";
header("location:manage.php?p=$msg");
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
					<li class="breadcrumb-item"><a href="#">Manage</a></li>
				</ol>
			</div>

		</section>
		
		<!-- Page Title
		============================================= -->
		
		<section id="add-bussines">

			
					
					<h3>Manage</h3>
					
				<?php	
				if (isset($_SESSION['user_id'])) {
 ?>
   logged in HTML and code here
 <?php

 } else {
   ?>
  <div class="form-group col-md-6">
					<form name="mangelogin" action="" method="post">
						<label for="userName">User  Name</label>
						<input type="text" class="form-control userName" name ="username" id="username" placeholder="user Name*">
						<p class="d-error error_userName">
						
						
						<label for="userPass">Password</label>
						<input type="text" class="form-control userPass" name ="userpass" id="userpass" placeholder="user Password*">
						<p class="d-error error_userPass">
							
						
						
					
						<input type="checkbox" class="form-control is_remember" name="is_remember" id="is_remember" placeholder="remember me">Keep me logged in 
						
						
						 <input type = "submit" value="submit"  name="loginSubmit" id="loginSubmit"  class="btn btn-primary"  />
					<form>
					</div>
   <?php
 }
	?>				
				
<!-- onChange category -->	
	<!-- form Validation -->
	<script>
$(document).ready(function(){ 

  	$('#loginSubmit').click(function(e){
		
		var valid = true;
	    var error_msg='';
		//alert('test');
	    if ($('.userName').val() == '')
        {
         $(".error_userName").text("Please enter user name");
		  valid = false;
        }
			
		if ($('.userPass').val() == '')
        {
         $(".error_userPass").text("Please enter user Pass");
		  valid = false;
        }
		
		 e.preventDefault();
		
		if (!valid) {
   
} else {
 // allow the form to be submitted.
 alert('test');
}
	});
 });
  
</script>
	
	<!-- form Validation -->

		
<?php include('footer.php'); ?>