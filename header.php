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
					
					<?php 
							 if(isset($_SESSION['user_id'])) {
								 
							   ?>
					<div id="top-account" class="dropdown">
						<a href="#" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-user"></i></a>
						<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1" x-placement="bottom-end" style="position: absolute; transform: translate3d(-117px, 31px, 0px); top: 0px; left: 0px; will-change: transform;">
							<a class="dropdown-item tleft" href="user_profile.php">Profile</a>
							<!--<a class="dropdown-item tleft" href="#">Messages <span class="badge badge-pill badge-secondary fright" style="margin-top: 3px;">5</span></a>-->
							<a class="dropdown-item tleft" href="user_settings.php">Edit Profile</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item tleft" href="logout.php">Logout <i class="icon-signout"></i></a>
						</ul>
					</div>
<?php }?>

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul>
						<?php 
							 if(!isset($_SESSION['user_id'])) {
								 
							   ?>
							<li class="current"><a href="index.php"><div>Home</div></a></li>
							 <?php } else {  ?>
							 <li class="current"><a href="user_profile.php"><div>Dashboard</div></a></li>
							 
							 <?php }  ?>
							<!--<li><a href="#"><div>Features</div></a>
								<ul>
									<li><a href="#"><div><i class="icon-stack"></i>Sliders</div></a></li>
									<li><a href="widgets.html"><div><i class="icon-gift"></i>Widgets</div></a></li>
									<li><a href="#"><div><i class="icon-umbrella"></i>Headers</div></a></li>
									<li><a href="side-panel.html"><div><i class="icon-line-layout"></i>Side Panel</div></a></li>
									<li><a href="mega-menu.html"><div><i class="icon-line-columns"></i>Mega Menu</div></a></li>
								</ul>
							</li>-->
							
							<li><a href="<?php echo BASE_URL."store"; ?>"><div>Store</div></a></li>
							<li class="mega-menu"><a href="add-business.php"><div>Add Business</div></a></li>
							<!--<li class="mega-menu"><a href="manage.php"><div>Manage</div></a></li>-->
							<?php 
							 if(isset($_SESSION['user_id'])) {
								 
							   ?>
							   <?php //echo $_SESSION['name']; ?>
							   <!-- <li class="mega-menu"><a href="user_profile.php"><div><span style="color:#fff;">
								</span>Profile</div></a></li>
								<li class="mega-menu"><a href="user_profile.php"><div>Welcome&nbsp;&nbsp;<?php echo $_SESSION['name']; ?></div>
								 <li class="mega-menu"><a href="logout.php"><div>Logout</div></a></li>-->
							<?php } else {
								
							?>
							<li class="mega-menu"><a href="business.php"><div>Browse Business</div></a></li>
							<li class="mega-menu"><a href="about.php"><div>About Us</div></a></li>
							<li class="mega-menu"><a href="contact.php"><div>Contact Us</div></a></li>
							<li class="mega-menu"><a href="blog.php"><div>Blog</div></a></li>
							<li class="mega-menu"><a href="manage.php"><div>Manage</div></a></li>
							<?php }?>
						</ul>

					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->
		
		<?php 
			 if(!isset($_SESSION['user_id'])) {
			  ?>
		<section class="search-box">
			<div class="container">





				
				<div class="section1 col-md-12">
					<div class="find col-md-10">
				<form method="get" action="business.php" class="searchform">					
						<input id="search s typeahead" class="findd" type="text" name="keyword" placeholder="Find..." value="<?php echo (!empty($_GET['keyword']))? $_GET['keyword'] :''; ?>">
						<!--<input class="near" type="text" name="near" placeholder="near...">-->
						<input type="text" id="location" value="<?php echo (!empty($_GET['locale']))? $_GET['locale'] :''; ?>" name="locale" class="s" placeholder="Near">
						<input type="hidden" id="place_lat" name="place_lat" value="">
						<input type="hidden" id="place_lng" name="place_lng" value="">
						<!--<button class="button search-button btn">Go</button>-->
						 <input type = "submit" value="Go" id="search"  class="button search-button btn" />
				</form>
						<!--<button class="button mr-0">Add A Business</button>-->
						<!--  <input type = "submit" value="Add A Business"  name="addbusiness" id="addbusiness"  class="button mr-0" /> -->
						   <a href = "add-business.php" id="addbusiness" style="width: 190px;"  class="button mr-0" >Add A Business</a> 
						<a href="#" id="use_location"><i class="fa fa-location-arrow" aria-hidden="true"></i>Use current location</a>
				
						
					</div>
				</div>
			</div>
		</section>
			 <?php } ?>