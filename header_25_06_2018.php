<?php if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        ob_start();
?>
		
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap-grid.min.css" type="text/css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="css/custom.css" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
	<link rel="stylesheet" href="css/calendar.css" type="text/css" />
	<link href="font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	
	<!-- JS
	============================================= -->	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>League of Bosses</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="full-header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>


					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul>
							<li class="current"><a href="index.php"><div>Home</div></a></li>
							<!--<li><a href="#"><div>Features</div></a>
								<ul>
									<li><a href="#"><div><i class="icon-stack"></i>Sliders</div></a></li>
									<li><a href="widgets.html"><div><i class="icon-gift"></i>Widgets</div></a></li>
									<li><a href="#"><div><i class="icon-umbrella"></i>Headers</div></a></li>
									<li><a href="side-panel.html"><div><i class="icon-line-layout"></i>Side Panel</div></a></li>
									<li><a href="mega-menu.html"><div><i class="icon-line-columns"></i>Mega Menu</div></a></li>
								</ul>
							</li>-->
							
							<li><a href="javascript:void(0);"><div>Store</div></a></li>
							<!--<li class="mega-menu"><a href="manage.php"><div>Manage</div></a></li>-->
							<?php 
							 if(isset($_SESSION['user_id'])) {
								 
							   ?>
							   <?php //echo $_SESSION['name']; ?>
							   <!-- <li class="mega-menu"><a href="user_profile.php"><div><span style="color:#fff;">
								</span>Profile</div></a></li>-->
								<li class="mega-menu"><a href="user_profile.php"><div>Welcome&nbsp;&nbsp;<?php echo $_SESSION['name']; ?></div>
								 <li class="mega-menu"><a href="logout.php"><div>Logout</div></a></li>
							<?php } else {
								
							?>
							<li class="mega-menu"><a href="business.php"><div>Browse Business</div></a></li>
							<li class="mega-menu"><a href="about.php"><div>About Us</div></a></li>
							<li class="mega-menu"><a href="contact.php"><div>Contact Us</div></a></li>
							<li class="mega-menu"><a href="javascript:void(0);"><div>Blog</div></a></li>
							<li class="mega-menu"><a href="manage.php"><div>Manage</div></a></li>
							<?php }?>
						</ul>

					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->
		
		
		<section class="search-box">
			<div class="container">
				<div class="section1 col-md-12">
					<div class="find col-md-10">
				<form method="post" action="add-business.php" class="searchform">					
						<input id="search s typeahead" class="findd" type="text" name="keyword" placeholder="Find...">
						<!--<input class="near" type="text" name="near" placeholder="near...">-->
						<input type="text" id="location" value="" name="locale" class="s" placeholder="Near">
						<button class="button search-button btn">Go</button>
						<!--<button class="button mr-0">Add A Business</button>-->
						 <input type = "submit" value="Add A Business"  name="addbusiness" id="addbusiness"  class="button mr-0"  />
						<a href="#"><i class="fa fa-location-arrow" aria-hidden="true"></i>Choose Location</a>
						</form>
						
					</div>
				</div>
			</div>
		</section>