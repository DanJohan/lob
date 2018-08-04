<?php
session_start();

if(!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])) {
	header('location:manage.php?bid='.$_GET['bid']);
}

include("config.php");
require_once 'core/init.php';
include 'header.php';  

if(isset($_GET['bid']) && !empty($_GET['bid'])){
	$business_id = $_GET['bid'];
	if(isset($_SESSION['claim_id'])){
		unset($_SESSION['claim_id']);
	}
}else{
	header('location:user_profile.php');
}

$error = '';
if(isset($_POST['email'])) {

   if(empty($_POST['email'])){
   		$error = "Email is required";
   }elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
   		$error = 'Please enter a valid email address';
   }else{
   		$sql ="SELECT * FROM tbl_users WHERE user_id =".$_SESSION['user_id'];
   		$query=mysqli_query($link,$sql);
   		$result=mysqli_fetch_assoc($query);
   		$hash = md5(uniqid('',true)); 
   		$sql = "UPDATE tbl_users SET business_claim_hash='".$hash."' WHERE user_id=".$_SESSION['user_id'];

   		if(mysqli_query($link, $sql)) {
	   		$to = $_POST['email'];
	   		$subject = "Claim business"; 

	   		$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <info@business.com>' . "\r\n";
	   		ob_start();
	   		require_once 'template/email/claim-business.php';
	   		$message = ob_get_clean();
	   		ob_end_clean();
			$is_sent = mail($to,$subject,$message,$headers);
			if($is_sent) {
				$_SESSION['success_msg'] = "A verification link has been send to your email";
			}else{
				$_SESSION['success_msg'] = "Email not send!Please try again.";
			}
				
		}else{
			//echo mysqli_error($link);
			//die("here");
		}
		header('location:claim-buisness.php?bid='.$_GET['bid']);
		exit;
		}
  }

	
?> 
		
	
<section id="page-title">

	<div class="container clearfix">
		<h1>Business</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item"><a href="business.php">Claim business</a></li>
		</ol>
	</div>

</section>



<section id="content" style="margin-bottom: 0px;">

	<div class="container clearfix">
		
		<div class="postcontent nobottommargin fullw mr-0">

			<div id="posts" class="events small-thumbs col-sm-12">
				<p style="font-size: 20px;">
					Thank you for taking the time to claim your business. Once verified, you will have the ability to manage your business listings and ensure consumers are always up to date with your business.
				</p>
				<p style="font-size: 20px;">
					Enter your email to claim your business process
				</p>
				<?php if(isset($_SESSION['success_msg']) && !empty($_SESSION['success_msg'])) { ?>

					<div class="alert alert-success">
						<?php 
						$msg = $_SESSION['success_msg'];
						echo $msg;
						unset($_SESSION['success_msg']); 
						?>
					</div>
				<?php } ?>
				<form action="" method="post" class="col-md-6">
					<div class="form-group">
						<label for="email">Enter email</label>
						<input type="email" class="form-control" name ="email" id="email" placeholder="Enter Business email">
						<p style="color:red;"><?php echo $error ; ?></p>
					</div>
					<div class="form-group">
						<button type="submit" class="button button-3d nomargin">Submit</button>
					</div>
				</form>


			</div>
		

	</div>

</section>

		
<?php include('footer.php'); ?>



