<?php
ob_start();
include("config.php");
require_once 'core/init.php';
include 'header.php'; 
?>

<section id="page-title">

	<div class="container clearfix">
		<h1>About Us</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item"><a href="#">About us</a></li>
		</ol>
	</div>

</section>



<section id="content" style="margin-bottom: 0px;">

	<div class="container clearfix">
		
		<div class="abt-txt">
			<h4><strong>"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."<br>– dummy text</strong></h4>
			
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
			
			<h2 style="font-weight: bold; text-align: center;">It is a long established fact that a reader will be distracted</h2>
			
			<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
		</div>
		
		<div class="our-team heading-block">
			
			<div class="fancy-title title-border">
				<h3>Our Team</h3>
			</div>
			
			<div class="col_one_third">

				<div class="team">
					<div class="team-image">
						<img src="images/img/11.jpg" alt="John Doe">
					</div>
					<div class="team-desc">
						<div class="team-title"><h4>John Doe</h4><span>CEO</span></div>
						<a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
							<i class="icon-facebook"></i>
							<i class="icon-facebook"></i>
						</a>
						<a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
							<i class="icon-twitter"></i>
							<i class="icon-twitter"></i>
						</a>
						<a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
							<i class="icon-gplus"></i>
							<i class="icon-gplus"></i>
						</a>
					</div>
				</div>

			</div>
			
			<div class="col_one_third">

				<div class="team">
					<div class="team-image">
						<img src="images/img/22.jpg" alt="John Doe">
					</div>
					<div class="team-desc">
						<div class="team-title"><h4>Jiny Den</h4><span>CFO</span></div>
						<a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
							<i class="icon-facebook"></i>
							<i class="icon-facebook"></i>
						</a>
						<a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
							<i class="icon-twitter"></i>
							<i class="icon-twitter"></i>
						</a>
						<a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
							<i class="icon-gplus"></i>
							<i class="icon-gplus"></i>
						</a>
					</div>
				</div>

			</div>
			
			<div class="col_one_third col_last">

				<div class="team">
					<div class="team-image">
						<img src="images/img/33.jpg" alt="Mary Jane">
					</div>
					<div class="team-desc">
						<div class="team-title"><h4>Mary Jane</h4><span>Sales</span></div>
						<a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
							<i class="icon-facebook"></i>
							<i class="icon-facebook"></i>
						</a>
						<a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
							<i class="icon-twitter"></i>
							<i class="icon-twitter"></i>
						</a>
						<a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
							<i class="icon-gplus"></i>
							<i class="icon-gplus"></i>
						</a>
					</div>
				</div>

			</div>
			
		</div>
		

	</div>

</section>




<?php include('footer.php'); ?>