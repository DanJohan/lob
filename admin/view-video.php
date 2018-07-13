<?php 
session_start();
if(!isset($_SESSION['admin_id']) && empty($_SESSION['admin_id']))
{
	header('location:index.php');
}
?>
<?php 
include('../config.php');
include('top_header.php');
include('header.php'); 

//Deleted record 
$del_id=$_GET['id'];
 
//if(isset($del_id) && $_REQUEST['act']=="delete")
if(isset($del_id))
{

$sql_1 = mysqli_query($link,"delete from tbl_videos where video_id=$del_id");

$msg = "Record deleted successfully!" ;

header("Location: view-video.php?msg=$msg");
}
//Deleted record 


?>	
	<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include("nav_sidebar.php"); ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>View video</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>View</span></li>
								<li><span>video</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
									
						<div class="row">
						
							<div class="col-md-12">

								<a type="button" href="add-video.php" class="mb-1 mt-1 mr-1 btn btn-light pull-right" >Add Videos</a>

							</div>
						
							<div class="col-md-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title">Actions</h2>
									</header>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table mb-none">
												<thead>
													<tr>
														<th>#</th>
														<th>Video Title</th>
														<th>Video Description</th>
														<th>video url</th>
														<th>Created on</th>
														<th>Actions</th>
													</tr>
												</thead>
																					
												<?php 
												
											//echo $sql = "SELECT * FROM  `tbl_videos`";
											$sql = "select * FROM tbl_videos";
											$query = mysqli_query($link, $sql);
											
											while($result=mysqli_fetch_array($query)) {
											   $video_id = $result['video_id'];
											   $video_title = $result['video_title'];
										       $video_desc = $result['video_desc'];
											   $video_url = $result['video_url'];
											   $created_date = $result['created_date'];
											 	?>
																					
												<tbody>
													<tr><td></td>
													<td><?php echo $video_title; ?></td>
														<td><?php echo $video_desc; ?></td>
														<td><?php echo $video_url; ?></td>
														<td><?php echo $created_date; ?></td>
														<td class="actions">
														<a href="add-video.php?video_id=<?php echo $video_id; ?>"><i class="fa fa-pencil"></i></a>
														<!--<a href="user-detail.php?id=<?php echo $video_id; ?>&act=delete" class="delete-row" onclick="ConfirmDelete();"><i class="fa fa-trash-o"></i></a>-->
														<a href="view-video.php?id=<?php echo $video_id; ?>" class="delete-row" onclick="ConfirmDelete();"><i class="fa fa-trash-o"></i></a>
														
														</td>
													</tr>
											<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</section>
							</div>
							
						</div>
						<script type="text/javascript">
						function ConfirmDelete()
							{
							if (confirm("Are you want to Delete Record?"))
							location.href='view-video.php';
							}
						</script>
						
						<script language="javascript" type="text/javascript">
						function ChekAll()
						{
						  if(document.frmList.chkAll.checked)
						  {
							for(i=0;i<document.frmList.length;i++)
							{
							 document.frmList.elements[i].checked=true;
							}
						  }
						  else
						  {
							 for(i=0;i<document.frmList.length;i++)
							 {
							  document.frmList.elements[i].checked=false;
							 }
						  }
						}
				</script>
						
						
						
						
					<!-- end: page -->
				</section>
			
<?php include("footer.php"); ?>