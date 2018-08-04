<?php 
include('../config.php');
include('top_header.php');
include('header.php'); 
require_once '../core/init.php';

if(!isset($_SESSION['admin_id']) && empty($_SESSION['admin_id']))
{
	header('location:index.php');
}

if(isset($_GET['blog']) && !empty($_GET['blog'])){
	$blog_id = mysqli_real_escape_string($link,$_GET['blog']);
	$sql = "DELETE FROM tbl_blog WHERE id=".$blog_id;

	if (mysqli_query($link, $sql)) {
    	header("location:blog.php");
	} else {
	   // echo "Error deleting record: " . mysqli_error($link);
	}
}

?>	



<div class="inner-wrapper">
	<!-- start: sidebar -->
	<?php include("nav_sidebar.php"); ?>
	<!-- end: sidebar -->

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Blog</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.html">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Blog</span></li>
					<li><span>Detail</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>

		<!-- start: page -->

		<div class="row">
			<div class="col-md-12">
				<div style="margin-bottom: 10px;">
					<a href="add-blog.php" class="btn btn-primary">Add Post</a>
				</div>
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
							<table class="table mb-none" id="blog_table">
								<thead>
									<tr>
										<th>#</th>
										<th>Title</th>
										<th>Description</th>
										<th>Category</th>
										<th>Created on</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
								<?php 
								 $blogs = get_blog();
								 if($blogs){
								 	foreach ($blogs as $index => $blog) {
								?>
									<tr>
									<td></td>
									<td><?php echo $blog['title']; ?></td>
									<td><?php echo excerpt($blog['description'],20); ?></td>
									<td><?php echo $blog['name']; ?></td>
									<td><?php echo $blog['created_at']; ?></td>
									<td class="actions"><a href="edit-blog.php?blog=<?php echo $blog['id']; ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;<a href="blog.php?blog=<?php echo $blog['id']; ?>"><i class="fa fa-trash-o"></i></a></td>
									</tr>
								<?php
								 	}
								 }else{
								 	echo "<p>No record found</p>";
								 }
								?>
									
								</tbody>
							</table>
						</div>
					</div>
				</section>
			</div>

		</div>

		<!-- end: page -->
	</section>

	<?php include("footer.php"); ?>

	<script type="text/javascript">
		$(document).ready( function () {
		    $('#blog_table').DataTable();
		} );

	</script>