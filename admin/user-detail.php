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

$del_id=$_GET['id'];


//if(isset($del_id) && $_REQUEST['act']=="delete")
if(isset($del_id))
{
	echo $sql = mysqli_query($link,"delete from tbl_users where user_id=$del_id");


	$msg = "User deleted successfully!" ;

	header("Location: user-detail.php?msg=$msg");

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

		<!-- start: page -->

		<div class="row">
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
							<table class="table mb-none" id="user_table">
								<thead>
									<tr>
										<th>#</th>
										<th>User Name</th>
										<th>User Email</th>
										<th>First name</th>
										<th>Last name</th>
										<th>Created on</th>
										<th>Status</th>
										<th>Actions</th>
									</tr>
								</thead>

								<?php 

								$sql = "select * FROM tbl_users";
								$query = mysqli_query($link, $sql);

								while($result=mysqli_fetch_array($query)) {
									$user_id = $result['user_id'];
									$user_name = $result['user_name'];
									$user_email = $result['user_email'];
									$user_first_name = $result['user_first_name'];
									$user_last_name = $result['user_last_name'];
									$created_at = $result['created_at'];

									$status=$result['user_status'];
									if($status==1) 
										$status='Active';
									else
										$status='DeActive';
									?>

									<tbody>
										<tr>
											<td></td>
											<td><a href="user-business-detail.php?user_id=<?php echo$user_id; ?>"><?php echo $user_name; ?></a></td>
											<td><?php echo $user_email; ?></td>
											<td><?php echo $user_first_name; ?></td>
											<td><?php echo $user_last_name; ?></td>
											<td><?php echo $created_at; ?></td>
											<th><?php echo $status; ?></th>
											<td class="actions">


												<!--<a href="user-edit.php?user_id=<?php //echo $user_id; ?>"><i class="fa fa-pencil"></i></a>-->
												<a href="user-delete-query.php?id=<?php echo $user_id; ?>" class="delete-row" onclick="return confirm('Are you sure?');"><i class="fa fa-trash-o"></i></a>


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
				alert("Are you want to Delete Record?");
				location.href='user-detail.php';
			} 
			</script>

			<!-- end: page -->
			</section>
			
			<?php include("footer.php"); ?>

	<script type="text/javascript">
		$(document).ready( function () {
		    $('#user_table').DataTable();
		} );

	</script>