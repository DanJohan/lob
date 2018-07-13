<?php
session_start();
include("config.php");
require_once 'core/init.php';

include 'header.php'; 
if(!isset($_GET['blog'])||empty($_GET['blog'])){
	header('location:blog.php');
}


$sql = "SELECT b.* FROM tbl_blog AS b WHERE b.id=".sanitize($_GET['blog']);
$query = mysqli_query($link, $sql);
$result = mysqli_fetch_array($query);
$blog=$result;
if(empty($blog)){
	header('location:blog.php');
}			 	
?>
<section id="page-title">

	<div class="container clearfix">
		<h1>Blog</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item"><a href="business.php">Blog</a></li>
		</ol>
	</div>

</section>

<section id="content" style="margin-bottom: 0px;">

	<div class="container clearfix">
		
		<div class="postcontent nobottommargin fullw mr-0">
			<div id="posts" class="events small-thumbs col-sm-9">
				<div>
					<p>Posted on <?php echo date('d M Y',strtotime($blog['created_at'])); ?></p>
					<?php if(!empty($blog['image'])) { ?>
						<img src="<?php echo BASE_URL."uploads/".$blog['image']; ?>" height="500" />
					<?php } ?>
					<p style="white-space: pre-line;margin-top:20px;"><?php echo $blog['description']; ?></p>
				</div>
			</div>

			<div class="col-sm-3">
				<h2>Categories</h2>
				<ul style="list-style-type: none;">
					<?php
						$categories= get_blog_categories_with_number();
						if($categories){
							foreach ($categories as $index => $category) {
					?>
						<li><a href="blog.php?category=<?php echo $category['id']; ?>"><?php echo $category['name']; ?>( <?php echo $category['total']; ?> )</li>
					<?php
							}
						}
					?>

				</ul>
				<hr>
				<h2>Recent post</h2>
				<ul style="list-style-type: none;">
					<?php require_once 'template/widgets/recent-post.php'; ?>
				</ul>
			</div>


		</div>

		</div>

	</div>

</section>

		
<?php include('footer.php'); ?>