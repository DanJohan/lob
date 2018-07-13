<?php 
session_start();
$_SESSION['admin_id'];
if(!isset($_SESSION['admin_id']) && empty($_SESSION['admin_id']))
{
	header('location:index.php');
}

?>
<?php 
include("../config.php");
include('top_header.php');
include('header.php');
$user_id=$_GET['user_id'];
$sql="Select * from tbl_users where user_id=$user_id";
$res = mysqli_query($link,$sql);
while($result=mysqli_fetch_array($res))
{
	$user_name = $result['user_name'];
	$user_email = $result['user_email'];
	$user_first_name = $result['user_first_name'];
	$user_last_name = $result['user_last_name'];
	$status = $result['user_status'];
	if($status=0)
			echo "DeActive";
	else
			echo "Active";	
}

if(isset($_POST['EditUser']))
{
mysqli_query($link, "UPDATE  tbl_users  SET user_name='".$_POST['user_name']."' where user_id='".$user_id."'" );
		header('location:user-detail.php');
}



		
?>

<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include("nav_sidebar.php"); ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>User Detail</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>User</span></li>
								<li><span>Detail</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>


<div class="row">

<div class="col-md-12">
							<form id="form1" class="form-horizontal">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>

										<h2 class="panel-title">User Edit</h2>
										
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-2 control-label">Your Name: </label>
											<div class="col-sm-10">
												<input type="text" name="user_name" class="form-control" value="<?php echo $user_name; ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Your Email: </label>
											<div class="col-sm-10">
												<input type="email" name="user_email" class="form-control" value="<?php echo $user_email; ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">First Name: </label>
											<div class="col-sm-10">
												<input type="text" name="user_first_name" class="form-control" value="<?php echo $user_first_name; ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">First Name: </label>
											<div class="col-sm-10">
												<input type="text" name="user_first_name" class="form-control" value="<?php echo $user_last_name; ?>">
											</div>
										</div>
										
									</div>
									<footer class="panel-footer">
										<!--<button class="btn btn-primary">Submit </button>-->
										<input type="submit" name="EditUser" id="EditUser" value="Submit" class="btn btn-primary" />
										<button type="reset" class="btn btn-default">Reset</button>
									</footer>
								</section>
							</form>
						</div>
						</div>
							</div>



		<?php include("footer.php"); ?>