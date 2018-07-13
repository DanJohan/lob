<?php session_start(); 
//ini_set('display_errors', 1);
include('config.php');
require_once 'core/init.php';
include('header.php');
$id=$_SESSION['user_id'];
$sql = "SELECT * FROM tbl_users where user_id='".$id."'";
$res = mysqli_query($link,$sql); 
		            while($data=mysqli_fetch_array($res))
					{ 
						$user_id= $data['user_id'];
						$user_name= $data['user_name'];
						$user_email= $data['user_email'];
						$user_first_name= $data['user_first_name'];
						$user_last_name= $data['user_last_name'];
						$password= $data['password'];
						 
					}	
					

	
if(isset($_POST['upDProfile']))
	{
	//$user_id= $_POST['user_id'];
	$user_name= $_POST['user_name'];
	$user_email= $_POST['user_email'];
	$user_first_name= $_POST['user_first_name'];
	$user_last_name= $_POST['user_last_name'];
	$password= md5($_POST['password']);
 
  	
$q="UPDATE  `tbl_users` SET  `user_name` =  '".$user_name."',`user_email` =  '".$user_email."', `user_first_name` =  '".$user_first_name."', `user_last_name` =  '".$user_last_name."', `password` =  '".$password."' WHERE  `tbl_users`.`user_id` ='".$id."'";


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
			<li class="breadcrumb-item"><a href="user_profile.php">Home</a></li>
			<li class="breadcrumb-item"><a href="user_settings.php">Manage</a></li>
		</ol>
	</div>

</section>


<section id="content" class="minw py50" style="margin-bottom: 0px;">

	<div class="container clearfix">
		
		<div class="col-md-12">

			<img src="images/img/avatar.jpg" class="alignleft img-circle img-thumbnail notopmargin nobottommargin" alt="Avatar" style="max-width: 84px;">

			<div class="heading-block noborder">
				<h3><?php echo $user_name; ?></h3>
				<span>Your Profile Details </span>
				<p><span>Full Name&nbsp;:&nbsp;&nbsp;&nbsp;</span><span><?php echo $user_first_name." ".$user_last_name; ?></span>
				<br>
				<span>Email&nbsp;:&nbsp;&nbsp;&nbsp;</span><span><?php echo $user_email; ?></span></p>
			</div>

		</div>
		<div class="col-md-12">
		<!--<a href="business.php" id="d">View Business</a>-->
		<!--<a href="javascript:void(0);" id="test">View Business</a>-->
		
		<a href="javascript:void(0);" onclick="toggle_visibility('showme');">View Business</a>
		
		
		</div>
		<div class="col-md-12" id="showme" style="display:none">
				<div id="posts" class="events small-thumbs">
		
			 <?php 
			 
			$sql="SELECT b . * FROM tbl_businessinfo AS b INNER JOIN tbl_users AS u ON b.user_id = u.user_id WHERE b.user_id ='$user_id'";			
        			$query = mysqli_query($link, $sql);
					while($result=mysqli_fetch_array($query))
					{
					$business_name=$result['business_name']; 
					$business_city=$result['business_city'];
					$business_state=$result['business_state'];
					$short_desc=$result['short_description'];
					$upload_logo=$result['upload_logo'];
					$created_date=$result['created_date'];
					$date = date('d',strtotime($created_date));
					$month = date('F',strtotime($created_date));
					
					
					
					
				   
			?> 
			 
				<div class="entry clearfix">
					 
			 
					<div class="entry-image">
						<a href="#">
							<?php if($upload_logo!='') {?>
						<img src="uploads/<?php echo $upload_logo; ?>" alt="<?php echo $business_name; ?>" height="200px" width="200px">
						<?php } else {?>
						<img src="images/no-img.jpg" alt="No image" height="200px" width="200px">
						<?php } ?>
						<div class="entry-date"><?php echo $date; ?><span><?php echo $month; ?></span></div>
						</a>
					</div>
					<div class="entry-c">
						<div class="entry-title">
							<h2><a href="javascript:void();"><?php echo $business_name; ?></a></h2>
						</div>
						<ul class="entry-meta clearfix">
							<!--<li><a href="#"><i class="icon-time"></i> 11:00 - 19:00</a></li>-->
							<li><a href="javascript:void();"><i class="icon-map-marker2"></i><?php echo $business_city; ?></a>
							
							</li>
						</ul>
						<div class="entry-content">
							<p><?php echo $short_desc; ?></p>
							<!--<a href="#" class="btn btn-danger">Read More</a>-->
						</div>
					</div>
					
				</div>
				   <?php }?>

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
