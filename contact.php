<?php
ob_start();
include("config.php");
require_once 'core/init.php';
include 'header.php'; 
?>

<section id="page-title">

	<div class="container clearfix">
		<h1>Contact Us</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item"><a href="#">Contact us</a></li>
		</ol>
	</div>

</section>



<section id="content" style="margin-bottom: 0px;">

	<div class="container clearfix">
	
	
		<div class="col_half">

			<div class="col_half">

				<div class="heading-block fancy-title nobottomborder title-bottom-border">
					<h4>Call<span>Us</span>.</h4>
				</div>

				<p> +xx xxxxx-xxxxx </p>

			</div>

			<div class="col_half col_last">

				<div class="heading-block fancy-title nobottomborder title-bottom-border">
					<h4>Email <span>Us</span>.</h4>
				</div>

				<p>Dummyemailid@mail.com</p>

			</div>

			<div class="col_half">

				<div class="heading-block fancy-title nobottomborder title-bottom-border">
					<h4>Follow <span>Us</span>.</h4>
				</div>

				<div class="social-icons">
			
					<a href="#" class="social-icon si-borderless si-facebook">
						<i class="icon-facebook"></i>
						<i class="icon-facebook"></i>
					</a>
					
					<a href="#" class="social-icon si-borderless si-twitter">
						<i class="icon-twitter"></i>
						<i class="icon-twitter"></i>
					</a>
					
					<a href="#" class="social-icon si-borderless si-instagram">
						<i class="icon-instagram"></i>
						<i class="icon-instagram"></i>
					</a>
					
					<a href="#" class="social-icon si-borderless si-gplus">
						<i class="icon-gplus"></i>
						<i class="icon-gplus"></i>
					</a>
					
					<a href="#" class="social-icon si-borderless si-email3">
						<i class="icon-email3"></i>
						<i class="icon-email3"></i>
					</a>
				
				</div>

			</div>

		</div>
		
		
		<div class="col_half col_last">

			<div class="fancy-title title-dotted-border">
				<h3>Send us an Email</h3>
			</div>

			<div class="contact-widget">

				<div class="contact-form-result"></div>

				<form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/sendemail.php" method="post" novalidate="novalidate">

					<div class="form-process"></div>

					<div class="col_one_third">
						<label for="template-contactform-name">Name <small>*</small></label>
						<input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control required">
					</div>

					<div class="col_one_third">
						<label for="template-contactform-email">Email <small>*</small></label>
						<input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control">
					</div>

					<div class="col_one_third col_last">
						<label for="template-contactform-phone">Phone</label>
						<input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control">
					</div>

					<div class="clear"></div>

					<div class="col_two_third">
						<label for="template-contactform-subject">Subject <small>*</small></label>
						<input type="text" id="template-contactform-subject" name="template-contactform-subject" value="" class="required sm-form-control">
					</div>

					<div class="col_one_third col_last">
						<label for="template-contactform-service">Services</label>
						<select id="template-contactform-service" name="template-contactform-service" class="sm-form-control">
							<option value="">-- Select One --</option>
							<option value="Wordpress">Wordpress</option>
							<option value="PHP / MySQL">PHP / MySQL</option>
							<option value="HTML5 / CSS3">HTML5 / CSS3</option>
							<option value="Graphic Design">Graphic Design</option>
						</select>
					</div>

					<div class="clear"></div>

					<div class="col_full">
						<label for="template-contactform-message">Message <small>*</small></label>
						<textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30"></textarea>
					</div>

					<div class="col_full hidden">
						<input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control">
					</div>

					<div class="col_full">
						<button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d nomargin">Submit Comment</button>
					</div>

				</form>
			</div>

		</div>
		
		
		

	</div>

</section>




<?php include('footer.php'); ?>