<?php 
include('../config.php');
include('top_header.php');
include('header.php'); 
require_once '../core/init.php';

if(!isset($_SESSION['admin_id']) && empty($_SESSION['admin_id']))
{
	header('location:index.php');
}
$flash_msg="";
if(isset($_POST['submit'])){

	$upload_ok = false;
	if(!empty($_FILES['post-image']['name'])){
		$target_dir = "../uploads/";
		$file_name = time()."_".$_FILES['post-image']['name'];
		$target_file=$target_dir.$file_name;
		if(move_uploaded_file($_FILES["post-image"]["tmp_name"], $target_file)){
			$upload_ok = true;
		}
	}

		$title = mysqli_real_escape_string($link,$_POST['title']);
		$category = mysqli_real_escape_string($link,$_POST['category']);
		$description = sanitize($_POST['description']);
		$image = ($upload_ok)? $file_name:'';
		$author = $_SESSION['admin_id'];

	$query = "INSERT INTO `tbl_blog` (`title`,`description`,`category`,`author`,`image`)
 	VALUES ('$title', '$description','$category', '$author', '$image')"; 
 	if(mysqli_query($link, $query)){
 		$flash_msg="Record Inserted successfully";
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
					<li><span>Add</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>

		<!-- start: page -->

		<div class="row">
			<div class="col-md-12">
				<section class="panel">
					<?php
						if($flash_msg != ""){
					?>
					<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					   <?php 
					   echo $flash_msg;
					   $flash_msg="";
					   ?>
					</div>
					<?php
						}
					 ?>
					<div class="panel-body">
					 <form id="post-add" action="" method="post" enctype="multipart/form-data">
						<div class="form-group">
							 <label for="title">Title:</label>
    						 <input type="text" class="form-control" id="title" name="title">
    						 <p id="title-error" class="error"></p>
						</div>
						<div class="form-group">
							<label for="category">Category:</label>
    						<select class="form-control" id="category" name="category">
    							<option value="">Please select</option>
    							<?php
    							$categories=get_blog_category();
    							if($categories){
    								foreach ($categories as $index => $category) {
    							?>
    								<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
    							<?php
    								}
    							} 
    							?>
    						</select>
    						<p id="category-error" class="error"></p>
						</div>
						<div class="form-group">
							<label for="description">Description:</label>
    						<textarea rows="7" name="description" class="form-control" id="description"></textarea>
    						<p id="description-error" class="error"></p>
						</div>
						<div class="form-group">
							<label for="image">Image:</label>
    						<input type="file" name="post-image" class="form-control" id="image">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary" name="submit">Submit</button>
						</div>
					 </form>
					</div>
				</section>
			</div>

		</div>

		<!-- end: page -->
	</section>

	<?php include("footer.php"); ?>
	<script type="text/javascript">
		$(document).on('submit','#post-add',function(){
			var title = $('#title').val().trim();
			var category = $('#category').val();
			var description = $('#description').val().trim();

			$("#title-error").text('');
			$("#category-error").text('');
			$("#description-error").text('');


			var error = false;
			if(title.length<=0){
				$("#title-error").text("Field is required!");
				error=true;
			}
			if(category.length<=0){
				$("#category-error").text("Field is required!");
				error=true;
			}

			if(description.length<=0){
				$("#description-error").text("Field is required!");
				error=true;
			}

			if(error){
				return false;
			}else{
				return true;
			}
		});
	</script>