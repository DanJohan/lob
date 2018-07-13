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
$id=$_GET['video_id'];
if(isset($_POST['button']) && !$_POST['video_id'])
{
$video_title = $_POST['video_title'];
$video_desc = $_POST['video_desc'];
$video_url = $_POST['video_url'];
$video_id = $_REQUEST['video_id'];

	$sql = mysqli_query($link, "INSERT into  tbl_videos  SET video_title='".$video_title."', video_desc='".$video_desc."',video_url='".$video_url."'" );
	if($sql)
	{
	header("Location:view-video.php");
	 //exit;
	}


}	

else
{
   
   if(isset($_POST['button']) && $_GET['video_id'])
	{  
	$video_id = $_POST['video_id'];
   $video_title=$_POST['video_title'];
   $video_desc=$_POST['video_desc'];
   $video_url=$_POST['video_url'];
     
    $sql1 = mysqli_query($link, "UPDATE tbl_videos  SET video_title='".$video_title."', video_desc='".$video_desc."',video_url='".$video_url."' where video_id='$video_id'");
	if($sql1)
	{
	header('location:view-video.php'); 
	/* echo "<script>window.alert('Record successfully updated.')
      window.location.href='view-video.php';
      </script>"; */
	  
	}
	 
	 
  }
    
  else {
	   $id=@$_GET['video_id'];
	   $sql_1 = "select * FROM tbl_videos where video_id='$id'";
	   $q_1 = mysqli_query($link, $sql_1);
	   $result=mysqli_fetch_array($q_1);
	  
	   $video_id = $result['video_id'];
	   $video_title = $result['video_title'];
	   $video_desc = $result['video_desc'];
	   $video_url = $result['video_url'];
   
		}  
    
}   

?>

<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include("nav_sidebar.php"); ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
					 <?php if(!@$_GET['video_id']){ ?>
						 <h2>Add Video</h2>
						<?php  }  else {  ?>
					 <h2>Edit Video</h2> 
					<?php } ?>


					<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								 <?php if(!@$_GET['video_id']){ ?>
								<li><span>Add</span></li>
									<?php  }  else {  ?>
									<li><span>Edit</span></li>
									<?php } ?>
							   <span>Video</span>
							</ol>
					
					
					
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>


							<div class="row">

							<div class="col-md-12">
							<form id="frm" class="form-horizontal" method="post" action="">
							 <input type="hidden" name="video_id" value="<?php echo $result['video_id']; ?>">
									<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
										 <?php if(!@$_GET['video_id']){ ?>
									<h2 class='panel-title'>Add Video</h2>
									<?php  }  else {  ?>
									<h2 class='panel-title'>Edit Video</h2>
									<?php } ?>
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-2 control-label">Video Title: </label>
											<div class="col-sm-10">
												<input type="text" name="video_title" class="form-control" value="<?php echo $video_title;?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Video Description: </label>
											<div class="col-sm-10">
												<input type="text" name="video_desc" class="form-control" value="<?php echo $video_desc;?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Video Url: </label>
											<div class="col-sm-10">
												<input type="text" name="video_url" class="form-control" value="<?php echo $video_url;?>">
											</div>
										</div>
													
									</div>
									<footer class="panel-footer">
										<!--<button class="btn btn-primary">Submit </button>-->
				                   <!--<input type="submit" name="AddVideo" id="AddVideo" value="Submit" class="btn btn-primary" />-->
								   
								   <input type="submit" name="button"  value="submit" class="btn btn-primary"  />
										<!--<button type="reset" onclick="goBack();"class="btn btn-default">back</button>-->
										<input type="button" name="cancel" value="Cancel" class="btn btn-default" onclick="return redirect();">
									</footer>
								</section>
							</form>
					<script>
					/* function goBack() {
						window.history.back();
					} */
					</script>
					
					<script>
function redirect()
{
   //alert('test');
window.location.href='view-video.php';
}
</script>
					
					
					
						</div>
						</div>
							</div>



		<?php include("footer.php"); ?>