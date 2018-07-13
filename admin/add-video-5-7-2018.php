<?php 
session_start();
if(!isset($_SESSION['admin_id']) && empty($_SESSION['admin_id']))
{
	header('location:index.php');
}
?>
<?php 
include("../config.php");
include('top_header.php');
include('header.php');

$video_id = $_GET['video_id'];
// if(isset($_POST['AddVideo']) && $video_id)
// {
     
	// $video_title = mysqli_real_escape_string($link,$_POST['video_title']);
	// $video_desc = mysqli_real_escape_string($link,$_POST['video_desc']);
	// $video_url = mysqli_real_escape_string($link,$_POST['video_url']);
	
	// $sql1 = mysqli_query($link, "UPDATE into  tbl_videos  SET video_title='".$video_title."', video_desc='".$video_desc."',video_url='".$video_url."' where video_id='$video_id'");
	// if($sql1)
	// {
	// echo "<script>window.alert('Record successfully updated.')
      // window.location.href='view-video.php';
      // </script>";
	// }
// }

if(isset($_POST['AddVideo']))
{
//add mode;


	$video_title = mysqli_real_escape_string($link,$_POST['video_title']);
	$video_desc = mysqli_real_escape_string($link,$_POST['video_desc']);
	$video_url = mysqli_real_escape_string($link,$_POST['video_url']);
	
	$sql = mysqli_query($link, "INSERT into  tbl_videos  SET video_title='".$video_title."', video_desc='".$video_desc."',video_url='".$video_url."'" );
	if($sql)
	{
		echo "<script>window.alert('Record successfully inserted.')
		window.location.href='view-video.php';
      </script>";
	}
	
	//header('location:view-video.php'); 

}

/* if($_GET['video_id'])
{
$video_id=$_GET['video_id'];	
$sql_1 = "select * FROM tbl_videos where video_id='$video_id'";
$q_1 = mysqli_query($link, $sql_1);
$result=mysqli_fetch_array($q_1);
$video_id = $result['video_id'];
$video_title = $result['video_title'];
$video_desc = $result['video_desc'];
$video_url = $result['video_url'];

} */
		
?>

<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include("nav_sidebar.php"); ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
					<<h2>Add Videos</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Add</span></li>
							   <span>Video</span>
							</ol>
					
					
					
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>


							<div class="row">

							<div class="col-md-12">
							<form id="frm" class="form-horizontal" method="post" action="">
									<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
									<h2 class='panel-title'>Add Video</h2>
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-2 control-label">Video Title: </label>
											<div class="col-sm-10">
												<input type="text" name="video_title" class="form-control" value="">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Video Description: </label>
											<div class="col-sm-10">
												<input type="text" name="video_desc" class="form-control" value="">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Video Url: </label>
											<div class="col-sm-10">
												<input type="text" name="video_url" class="form-control" value="">
											</div>
										</div>
													
									</div>
									<footer class="panel-footer">
										<!--<button class="btn btn-primary">Submit </button>-->
				                   <input type="submit" name="AddVideo" id="AddVideo" value="Submit" class="btn btn-primary" />
										<!--<button type="reset" onclick="goBack();"class="btn btn-default">back</button>-->
									</footer>
								</section>
							</form>
					<script>
					function goBack() {
						window.history.back();
					}
					</script>
						</div>
						</div>
							</div>



		<?php include("footer.php"); ?>