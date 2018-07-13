<?php session_start(); 
//ini_set('display_errors', 1);
include('../config.php');
include('top_header.php');
include('header.php'); 
$id=$_SESSION['admin_id'];
$sql = "SELECT * FROM tbl_admin where admin_id='".$id."'";
$res = mysqli_query($link,$sql); 
		            while($data=mysqli_fetch_array($res))
					{ 
						$admin_id= $data['admin_id'];
						$username= $data['username'];
						$password= $data['password'];
						$email= $data['email'];
						$status= $data['status'];
											 
					}	
					

	
if(isset($_POST['upDProfile']))
	{
	$admin_id= $_POST['admin_id'];
	$username= $_POST['username'];
	$email= $_POST['email'];
	$password= md5($_POST['password']);
	$status= $_POST['status'];
	$password= md5($_POST['password']);
 
  	
$q="UPDATE  `tbl_admin` SET  `username` =  '".$username."',`email` =  '".$email."', `password` =  '".$password."' WHERE  `tbl_admin`.`admin_id` ='".$id."'";


 if(mysqli_query($link,$q)==true)
    {
        $msg = 'Record updated successfully';
    }
    else
    {
        echo ''.mysql_error();
    }
}
				
?>

<section id="page-title">

	<div class="container clearfix">
		<h1>Profile</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="admin_profile.php">Home</a></li>
		
		</ol>
	</div>

</section>


<section id="content" class="minw py50" style="margin-bottom: 0px;">

	<div class="container clearfix">
		
		<div class="col-md-12">

			<img src="../images/img/avatar.jpg" class="alignleft img-circle img-thumbnail notopmargin nobottommargin" alt="Avatar" style="max-width: 84px;">

			<div class="heading-block noborder">
				<h3><?php echo @$username; ?></h3>
				<span>Your Profile Details </span>
				<p><span>Name:&nbsp;:&nbsp;&nbsp;&nbsp;</span><span><?php echo @$username; ?></span>
				<br>
				<span>Email&nbsp;:&nbsp;&nbsp;&nbsp;</span><span><?php echo @$email; ?></span></p>
			</div>

		</div>
		
		
	</div>

</section>

<script>

function toggle_visibility(id) {
var e = document.getElementById(id);
e.style.display = ((e.style.display!='none') ? 'none' : 'block');
}
/* 
$(document).ready(function(){
    $("#test").click(function(){
        $("#showme").show();
       

    });

}); */
</script>


	<?php include('footer.php'); ?>
