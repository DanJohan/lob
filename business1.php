<?php
ob_start();
include 'header.php'; 
include("config.php");
?>

<section id="page-title">

	<div class="container clearfix">
		<h1>Business</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item"><a href="#">Business</a></li>
		</ol>
	</div>

</section>



<section id="content" style="margin-bottom: 0px;">

	<div class="container clearfix">
		
		<div class="postcontent nobottommargin fullw mr-0">
		
			<div class="filterr"> 
			
				<form id="busi">
				
					<div class="form-group col-md-4">
						<label for="inputcateg">Category</label>
						<select id="inputcateg" class="form-control" name="inputcateg">
							<option value="">Select Category</option>
							<option value="AK">A</option>
							<option value="AL">B</option>
						</select>
					</div>
					
					<div class="form-group col-md-4">
						<label for="inputsource">Source</label>
						<select id="inputsource" class="form-control" name="inputsource">
							<option value="">Select Source</option>
							<option value="AK">A</option>
							<option value="AL">B</option>
						</select>
					</div>
					
					<div class="form-group col-md-4">
						<label for="inputState">State</label>
						<select id="inputState" class="form-control" name="business_state">
							<option value="">Select State</option>
							<option value="AK">AK</option>
							<option value="AL">AL</option>
							<option value="AR">AR</option>
							<option value="AZ">AZ</option>
							<option value="CA">CA</option>
							<option value="CO">CO</option>
							<option value="CT">CT</option>
							<option value="DC">DC</option>
							<option value="DE">DE</option>
							<option value="FL">FL</option>
							<option value="GA">GA</option>
							<option value="HI">HI</option>
							<option value="IA">IA</option>
							<option value="ID">ID</option>
							<option value="IL">IL</option>
							<option value="IN">IN</option>
							<option value="KS">KS</option>
							<option value="KY">KY</option>
							<option value="LA">LA</option>
							<option value="MA">MA</option>
							<option value="MD">MD</option>
							<option value="ME">ME</option>
							<option value="MI">MI</option>
							<option value="MN">MN</option>
							<option value="MO">MO</option>
							<option value="MS">MS</option>
							<option value="MT">MT</option>
							<option value="NC">NC</option>
							<option value="ND">ND</option>
							<option value="NE">NE</option>
							<option value="NH">NH</option>
							<option value="NJ">NJ</option>
							<option value="NM">NM</option>
							<option value="NV">NV</option>
							<option value="NY">NY</option>
							<option value="OH">OH</option>
							<option value="OK">OK</option>
							<option value="OR">OR</option>
							<option value="PA">PA</option>
							<option value="RI">RI</option>
							<option value="SC">SC</option>
							<option value="SD">SD</option>
							<option value="TN">TN</option>
							<option value="TX">TX</option>
							<option value="UT">UT</option>
							<option value="VA">VA</option>
							<option value="VT">VT</option>
							<option value="WA">WA</option>
							<option value="WI">WI</option>
							<option value="WV">WV</option>
							<option value="WY">WY</option>
						</select>
					</div>
					
				</form>
				
			</div>

			<div id="posts" class="events small-thumbs">

				<div class="entry clearfix">
					<div class="entry-image">
						<a href="#">
							<img src="images/img/1a.jpg" alt="Inventore voluptates velit totam ipsa tenetur">
							<div class="entry-date">10<span>Apr</span></div>
						</a>
					</div>
					<div class="entry-c">
						<div class="entry-title">
							<h2><a href="#">Inventore voluptates velit totam ipsa tenetur</a></h2>
						</div>
						<ul class="entry-meta clearfix">
							<li><a href="#"><i class="icon-time"></i> 11:00 - 19:00</a></li>
							<li><a href="#"><i class="icon-map-marker2"></i> Melbourne, Australia</a></li>
						</ul>
						<div class="entry-content">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur voluptate rerum molestiae eaque possimus exercitationem eligendi fuga.</p>
							<a href="#" class="btn btn-danger">Read More</a>
						</div>
					</div>
				</div>

				<div class="entry clearfix">
					<div class="entry-image">
						<a href="#">
							<img src="images/img/1a.jpg" alt="Nemo quaerat nam beatae iusto minima vel">
							<div class="entry-date">16<span>Apr</span></div>
						</a>
					</div>
					<div class="entry-c">
						<div class="entry-title">
							<h2><a href="#">Nemo quaerat nam beatae iusto minima vel</a></h2>
						</div>
						<ul class="entry-meta clearfix">
							<li><a href="#"><i class="icon-time"></i> 11:00 - 19:00</a></li>
							<li><a href="#"><i class="icon-map-marker2"></i> Perth, Australia</a></li>
						</ul>
						<div class="entry-content">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur voluptate rerum molestiae eaque possimus exercitationem eligendi fuga.</p>
							<a href="#" class="btn btn-danger">Read More</a>
						</div>
					</div>
				</div>

				<div class="entry clearfix">
					<div class="entry-image">
						<a href="#">
							<img src="images/img/1a.jpg" alt="Ducimus ipsam error fugiat harum recusandae">
							<div class="entry-date">3<span>May</span></div>
						</a>
					</div>
					<div class="entry-c">
						<div class="entry-title">
							<h2><a href="#">Ducimus ipsam error fugiat harum recusandae</a></h2>
						</div>
						<ul class="entry-meta clearfix">
							<li><a href="#"><i class="icon-time"></i> 11:00 - 19:00</a></li>
							<li><a href="#"><i class="icon-map-marker2"></i> Melbourne, Australia</a></li>
						</ul>
						<div class="entry-content">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur voluptate rerum molestiae eaque possimus exercitationem eligendi fuga.</p>
							<a href="#" class="btn btn-danger">Read More</a>
						</div>
					</div>
				</div>

				<div class="entry clearfix">
					<div class="entry-image">
						<a href="#">
							<img src="images/img/1a.jpg" alt="Nisi officia adipisci molestiae aliquam">
							<div class="entry-date">16<span>Jun</span></div>
						</a>
					</div>
					<div class="entry-c">
						<div class="entry-title">
							<h2><a href="#">Nisi officia adipisci molestiae aliquam</a></h2>
						</div>
						<ul class="entry-meta clearfix">
							<li><a href="#"><i class="icon-time"></i> 12:00 - 18:00</a></li>
							<li><a href="#"><i class="icon-map-marker2"></i> New York</a></li>
						</ul>
						<div class="entry-content">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur voluptate rerum molestiae eaque possimus exercitationem eligendi fuga.</p>
							<a href="#" class="btn btn-danger">Read More</a>
						</div>
					</div>
				</div>

			</div>

			<!-- Pagination
			============================================= -->
			<div class="row new-old">
				<div class="col-12">
					<a href="#" class="btn btn-outline-secondary float-left">← Older</a>
					<a href="#" class="btn btn-outline-dark float-right">Newer →</a>
				</div>
			</div>
			<!-- .pager end -->

		</div>
		

	</div>

</section>




<?php include('footer.php'); ?>