<?php 
session_start();
$user_id=$_GET['user_id'];
?>

<?php 
include('../config.php');
include('top_header.php');
include('header.php'); ?>	

											

		<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include("nav_sidebar.php"); ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>User Business Detail</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>User Business</span></li>
								<li><span>Detail</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<!-- start: page -->
						<div class="row">
							<div class="col-md-12">
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
											<table class="table mb-none">
												<thead>
													<tr>
														<th>#</th>
														<th>Business Name</th>
														<th>Business City</th>
														<th>Business state</th>
														<!--<th>Created on</th>-->
														<!--<th>Actions</th>-->
													</tr>
												</thead>
																					
												<?php 
												
												include('../config.php');
											$sql="SELECT b.*,s.code FROM tbl_businessinfo AS b INNER JOIN tbl_users AS u ON b.user_id = u.user_id LEFT JOIN tbl_states AS s ON b.business_state=s.id  WHERE b.user_id ='$user_id'";			
										   $query = mysqli_query($link, $sql);
											while($result=mysqli_fetch_array($query)) {
												$business_name=$result['business_name']; 
												$business_city=$result['business_city'];
												$business_state=$result['code'];
											?>
																					
												<tbody>
													<tr>
													    <td></td>
														<td><?php echo $business_name; ?></td>
														<td><?php echo $business_city; ?></td>
														<td><?php echo $business_state; ?></td>
													<!--	<td class="actions">
										<a href="" class="delete-row"><i class="fa fa-trash-o"></i></a>
														</td>-->
													</tr>
											<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</section>
							</div>
							
						</div>
						
						
					<!-- end: page -->
				</section>
				<script>
				
				</script>
			
<?php include("footer.php"); ?>