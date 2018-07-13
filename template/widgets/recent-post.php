<?php 
$blogs=get_blog();
if($blogs) {
	foreach ($blogs as $index => $blog) {
		if($index<10){
			?>
			<li><a href="single-blog.php?blog=<?php echo $blog['id']; ?>"><?php echo $blog['title']; ?></a></li>
			<?php
		}
	}
}
?>