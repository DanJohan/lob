<?php
session_start();
include("config.php");
require_once 'core/init.php';
include 'header.php'; 

$category_sql='';
if(isset($_GET['category']) && !empty($_GET['category'])){
	$category_sql ="WHERE b.category=".sanitize($_GET['category']);
}

$page= (isset($_GET['page']))?sanitize($_GET['page']):1;
$limit = 10;
$offset= ($page-1) * $limit;	

$sql = "SELECT b.*,bc.name FROM tbl_blog AS b INNER JOIN tbl_blog_category AS bc ON b.category=bc.id ".$category_sql." ORDER BY id DESC LIMIT $offset, $limit";
$query = mysqli_query($link, $sql);
while($result = mysqli_fetch_array($query))
{
	$blogs[]=$result;			 
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
				<?php 

					if(!empty($blogs)){
						foreach ($blogs as $index => $blog) {

							$date = date('d',strtotime($blog['created_at']));
							$month = date('F',strtotime($blog['created_at']));
				?>
				<div class="entry clearfix">
					
					<div class="entry-c">
						<div class="entry-title">
							<h2><a href="single-blog.php?blog=<?php echo $blog['id']; ?>"><?php echo $blog['title']; ?></a></h2>
						</div>
						<div class="entry-content">
							<p><?php echo excerpt($blog['description'],500) ; ?></p>
							<a href="single-blog.php?blog=<?php echo $blog['id']; ?>" class="btn btn-danger">Read More</a>
						</div>
					</div>
					
				</div>
				<?php			
						}
					}else{
						echo "<h2>No result found !</h2>";
					}
				?>

			</div>

			<div class="col-sm-3">
				<h2>Categories</h2>
				<ul style="list-style-type: none;">
					<?php
						$page_url=(isset($_GET['page']))?'&page='.$_GET['page']:'';
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


		<div class="row new-old">
				<div class="col-12">
					<?php
					$category_query=(isset($_GET['category']))?'&category='.$_GET['category']:'';
					?>
					<?php if($page!=1) {?>
					<a href="blog.php?page=<?php echo ($page-1).$category_query; ?>" class="btn btn-outline-secondary float-left">← Older</a>
					<?php } ?>
					<a href="blog.php?page=<?php echo ($page+1).$category_query; ?>" class="btn btn-outline-dark float-right">Newer →</a>
				</div>
			</div>
		</div>

		</div>

	</div>

</section>

		
<?php include('footer.php'); ?>