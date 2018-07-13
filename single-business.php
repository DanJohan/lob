<?php
session_start();
include("config.php");
require_once 'core/init.php';
include 'header.php'; 

//ini_set("display_errors",1);
/*if(!isset($_SESSION['user_id']) && empty($_SESSION['user_id']))
{
	header('location:manage.php');
}*/
  // $user_id = $_SESSION['user_id'];
/*   if(isset($_POST['keyword']))
		{

    $keyword = $_POST['keyword'];

    //$keywords = implode (",", $keywordarray);
	$sql = "SELECT * FROM tbl_businessinfo WHERE (`business_name` LIKE '%".$keyword."%') OR (`business_address1` LIKE '%".$keyword."%') OR (`business_city` LIKE '%".$keyword."%') OR (`business_state` LIKE '%".$keyword."%')";

  
	$query = mysqli_query($link, $sql);
	 while($result = mysqli_fetch_array($query))
	 {
	 //$business_name = $result['business_name'].'<br/>';
	// $business_address1 = $result['business_address1'].'<br/>';
	// $business_address1 = $result['business_state'].'<br/>';
		 
	 }
}*/
	 
		
?>

<?php 
	if(isset($_GET['keyword'])){
		$latitude= $_GET['place_lat'];
		$longitude= $_GET['place_lng'];
		$keyword = $_GET['keyword'];
		$keyword_sql='';
		$location_sql='';
		$distance_sql='';
		if(!empty($keyword)){
			$keyword_sql="WHERE b_info.business_name LIKE '%".$keyword."%'";
		}
		if(!empty($latitude)){
			$location_sql=",(((acos(sin((".$latitude."*pi()/180)) * sin((`Latitude`*pi()/180))+cos((".$latitude."*pi()/180)) * cos((`Latitude`*pi()/180)) * cos(((".$longitude."- `Longitude`)*pi()/180))))*180/pi())*60*1.1515) as distance";
			$distance_sql="HAVING distance <=50";
		}

		if(!empty($distance)){
			$distance_sql="HAVING distance <=".$distance;
		}

		$sql="SELECT b_info.*,cat.category_name,state.code,subcat.subcateory_name".$location_sql." FROM tbl_businessinfo AS b_info LEFT JOIN tbl_category AS cat ON b_info.business_category=cat.category_id LEFT JOIN tbl_states AS state ON b_info.business_state=state.id LEFT JOIN tbl_subcategory AS subcat ON b_info.business_subcategory= subcat.subcategory_id ".$keyword_sql." ".$distance_sql;

	}else{
		$sql="SELECT b_info.*,cat.category_name,state.code,subcat.subcateory_name FROM tbl_businessinfo AS b_info LEFT JOIN tbl_category AS cat ON b_info.business_category=cat.category_id LEFT JOIN tbl_states AS state ON b_info.business_state=state.id LEFT JOIN tbl_subcategory AS subcat ON b_info.business_subcategory= subcat.subcategory_id";
	}
	$query = mysqli_query($link, $sql);
	$business_infos=array();
	while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
		{
			$business_infos[]=$result;
		}

	if($business_infos){
		$categories_ids=get_categories_bussiness_number($business_infos);
		$categories=array_unique(array_column($categories_ids,'cat_name'));
		$categories_total=array_count_values(array_column($categories_ids,'cat_code'));

		$states_ids=get_states_bussiness_number($business_infos);
		$states= array_unique(array_column($states_ids,'state_name'));
		$states_total=array_count_values(array_column($states_ids,'state_code'));
	}
	//dd($business_infos,false);
	//dd($states_total,false);
	//dd($states,false);
	//dd($states_ids,false);
?> 
		
	
<section id="page-title" style="margin-bottom: 0px !important;">

	<div class="container clearfix">
		<h1>Business Name</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item"><a href="business.php">Business</a></li>
			<li class="breadcrumb-item"><a href="business.php">Business Name</a></li>
		</ol>
	</div>

</section>



<section id="content" style="margin-bottom: 0px;">

			<div class="content-wrap">

				<div class="single-event">

					<div class="entry-image parallax header-stick skrollable skrollable-between" style="background-image: url(&quot;images/10.jpg&quot;); height: 600px; background-position: 0px 163.209px;" data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">
						<div class="entry-overlay-meta">
							<h2><a href="#">Ibiza: Full Moon Beach Party</a></h2>
							<ul class="iconlist">
								<li><i class="icon-calendar3"></i> <strong>Date:</strong> 15th March, 2015</li>
								<li><i class="icon-time"></i> <strong>Timing:</strong> 20:00 - 02:00</li>
								<li><i class="icon-map-marker2"></i> <strong>Location:</strong> Ibiza, Spain</li>
								
							</ul>
							
						</div>
					</div>

					<div class="container topmargin clearfix">

						<div class="postcontent nobottommargin clearfix">

							<div class="col_three_fourth">

								<h3>Details</h3>

								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae, voluptatum, amet, eius esse sit praesentium similique tenetur accusamus deserunt modi dignissimos debitis consequatur facere unde sint quasi quae architecto eum!</p>

								<p>Obcaecati dolores perspiciatis eveniet adipisci repellendus consequatur ab officiis ipsa laudantium! Provident expedita odio iste corporis nam natus illum. Cupiditate, quis libero distinctio reiciendis quos adipisci eius animi.</p>

								<h4>Inclusions</h4>

								<div class="col_half nobottommargin">

									<ul class="iconlist nobottommargin">
										<li><i class="icon-ok"></i> Return Flight Tickets</li>
										<li><i class="icon-ok"></i> All Local/Airport Transfers</li>
										<li><i class="icon-ok"></i> Resort Accomodation</li>
										<li><i class="icon-ok"></i> All Meals Included</li>
										<li><i class="icon-ok"></i> Adventure Activities</li>
									</ul>

								</div>

								<div class="col_half nobottommargin col_last">

									<ul class="iconlist nobottommargin">
										<li><i class="icon-ok"></i> Erotic Games</li>
										<li><i class="icon-ok"></i> Local Guides</li>
										<li><i class="icon-ok"></i> Support Staff</li>
										<li><i class="icon-ok"></i> Personal Security</li>
										<li><i class="icon-ok"></i> VISA Fees &amp; Medical Insurance</li>
									</ul>

								</div>

							</div>

							<div class="col_one_fourth col_last">

								<h4>Location</h4>

								<section id="event-location" class="gmap" style="height: 300px; position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"><div class="gm-style" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;"><div tabindex="0" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: pan-x pan-y;"><div style="z-index: 1; position: absolute; left: 50%; top: 50%; transform: translate(0px, 0px);"><div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div style="position: absolute; z-index: 1; transform: matrix(1, 0, 0, 1, -233, -231);"><div style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div style="position: absolute; z-index: 1; transform: matrix(1, 0, 0, 1, -233, -231);"><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 0px;"></div></div></div><div style="width: 20px; height: 34px; overflow: hidden; position: absolute; left: -9px; top: -34px; z-index: 0;"><img alt="" src="https://www.google.com/mapfiles/marker.png" draggable="false" style="position: absolute; left: 0px; top: 0px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 20px; height: 34px;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div style="position: absolute; z-index: 1; transform: matrix(1, 0, 0, 1, -233, -231);"><div style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px;"><img draggable="false" alt="" src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i16518!3i12521!4i256!2m3!1e0!2sm!3i427129740!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0!23i1301875&amp;key=AIzaSyDMxJ92oBkSnVNHFX3R8XhtYQPEgk1_IiI&amp;token=66890" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;"><img draggable="false" alt="" src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i16519!3i12520!4i256!2m3!1e0!2sm!3i427130748!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0!23i1301875&amp;key=AIzaSyDMxJ92oBkSnVNHFX3R8XhtYQPEgk1_IiI&amp;token=116057" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px;"><img draggable="false" alt="" src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i16519!3i12521!4i256!2m3!1e0!2sm!3i427129704!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0!23i1301875&amp;key=AIzaSyDMxJ92oBkSnVNHFX3R8XhtYQPEgk1_IiI&amp;token=102097" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;"><img draggable="false" alt="" src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i16518!3i12520!4i256!2m3!1e0!2sm!3i427130748!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0!23i1301875&amp;key=AIzaSyDMxJ92oBkSnVNHFX3R8XhtYQPEgk1_IiI&amp;token=36958" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div></div><div class="gm-style-pbc" style="z-index: 2; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0;"><p class="gm-style-pbt"></p></div><div style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;"><div style="z-index: 4; position: absolute; left: 50%; top: 50%; transform: translate(0px, 0px);"><div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"><div class="gmnoprint" title="" style="width: 20px; height: 34px; overflow: hidden; position: absolute; opacity: 0.01; cursor: pointer; touch-action: none; left: -9px; top: -34px; z-index: 0;"><img alt="" src="https://www.google.com/mapfiles/marker.png" draggable="false" style="position: absolute; left: 0px; top: 0px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 20px; height: 34px;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div></div><iframe frameborder="0" style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none;" src="about:blank"></iframe><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" rel="noopener" href="https://maps.google.com/maps?ll=39.02001,1.482148&amp;z=15&amp;t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3" title="Click to see this area on Google Maps" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 66px; height: 26px; cursor: pointer;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/google4.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div><div style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 132px; height: 148px; position: absolute; left: 5px; top: 60px;"><div style="padding: 0px 0px 10px; font-size: 16px;">Map Data</div><div style="font-size: 13px;">Map data ©2018 Google, Inst. Geogr. Nacional</div><div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 72px; bottom: 0px; width: 56px;"><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="text-decoration: none; cursor: pointer;">Map Data</a><span style="display: none;">Map data ©2018 Google, Inst. Geogr. Nacional</span></div></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data ©2018 Google, Inst. Geogr. Nacional</div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/en-US_US/help/terms_maps.html" target="_blank" rel="noopener" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Terms of Use</a></div></div><button draggable="false" title="Toggle fullscreen view" aria-label="Toggle fullscreen view" type="button" style="background: none rgb(255, 255, 255); border: 0px; margin: 10px 14px; padding: 0px; position: absolute; cursor: pointer; user-select: none; width: 25px; height: 25px; overflow: hidden; display: none; top: 0px; right: 0px;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/sv9.png" draggable="false" class="gm-fullscreen-control" style="position: absolute; left: -52px; top: -86px; width: 164px; height: 175px; user-select: none; border: 0px; padding: 0px; margin: 0px;"></button><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px; display: none; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_blank" rel="noopener" title="Report errors in the road map or imagery to Google" href="https://www.google.com/maps/@39.0200099,1.4821482,15z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Report a map error</a></div></div><div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false" controlwidth="28" controlheight="55" style="margin: 10px; user-select: none; position: absolute; bottom: 69px; right: 28px;"><div class="gmnoprint" controlwidth="28" controlheight="55" style="position: absolute; left: 0px; top: 0px;"><div draggable="false" style="user-select: none; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; background-color: rgb(255, 255, 255); width: 28px; height: 55px;"><button draggable="false" title="Zoom in" aria-label="Zoom in" type="button" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; width: 28px; height: 27px; top: 0px; left: 0px;"><div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: 0px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;"></div></button><div style="position: relative; overflow: hidden; width: 67%; height: 1px; left: 16%; background-color: rgb(230, 230, 230); top: 0px;"></div><button draggable="false" title="Zoom out" aria-label="Zoom out" type="button" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; width: 28px; height: 27px; top: 0px; left: 0px;"><div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: -15px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;"></div></button></div></div></div><div class="gmnoprint" style="margin: 10px; z-index: 0; position: absolute; cursor: pointer; left: 0px; top: 0px;"><div class="gm-style-mtc" style="float: left; position: relative;"><div role="button" tabindex="0" title="Show street map" aria-label="Show street map" aria-pressed="true" draggable="false" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 8px; border-bottom-left-radius: 2px; border-top-left-radius: 2px; background-clip: padding-box; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; min-width: 21px; font-weight: 500;">Map</div><div style="background-color: white; z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; position: absolute; left: 0px; top: 29px; text-align: left; display: none;"><div draggable="false" title="Show street map with terrain" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 6px 8px 6px 6px; direction: ltr; text-align: left; white-space: nowrap;"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; background-color: rgb(255, 255, 255); border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle;"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden; display: none;"><img alt="" src="https://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Terrain</label></div></div></div><div class="gm-style-mtc" style="float: left; position: relative;"><div role="button" tabindex="0" title="Show satellite imagery" aria-label="Show satellite imagery" aria-pressed="false" draggable="false" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(86, 86, 86); font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 8px; border-bottom-right-radius: 2px; border-top-right-radius: 2px; background-clip: padding-box; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; min-width: 39px; border-left: 0px;">Satellite</div><div style="background-color: white; z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; position: absolute; right: 0px; top: 29px; text-align: left; display: none;"><div draggable="false" title="Show imagery with street names" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 6px 8px 6px 6px; direction: ltr; text-align: left; white-space: nowrap;"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; background-color: rgb(255, 255, 255); border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle;"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden;"><img alt="" src="https://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Labels</label></div></div></div></div></div></div></section>

							</div>

							<div class="clear"></div>

							

							

						</div>

						<div class="sidebar nobottommargin col_last clearfix">
						<div class="sidebar-widgets-wrap">

							<div class="widget clearfix">

								<h4>Similar Bussiness</h4>
								<div id="post-list-footer">

									<div class="spost clearfix">
										<div class="entry-image">
											<a href="#" class="nobg"><img src="images/1.jpg" alt=""></a>
										</div>
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
											</div>
											<ul class="entry-meta">
												<li>10th July 2014</li>
											</ul>
										</div>
									</div>

									<div class="spost clearfix">
										<div class="entry-image">
											<a href="#" class="nobg"><img src="images/1.jpg" alt=""></a>
										</div>
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
											</div>
											<ul class="entry-meta">
												<li>10th July 2014</li>
											</ul>
										</div>
									</div>

									<div class="spost clearfix">
										<div class="entry-image">
											<a href="#" class="nobg"><img src="images/1.jpg" alt=""></a>
										</div>
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
											</div>
											<ul class="entry-meta">
												<li>10th July 2014</li>
											</ul>
										</div>
									</div>

								</div>

							</div>

							

							

							

						</div>
					</div>

					</div>

				</div>

			</div>

		</section>

		
<?php include('footer.php'); ?>

<script>

$(document).on('change','#inputcateg',function(){
	window.location.href=$(this).find(':selected').data('location');
});

$(document).on('change','#inputState',function(){
	window.location.href=$(this).find(':selected').data('location');
});


		function initialize()
    {
        var input = document.getElementById('location');
        var autocomplete = new google.maps.places.Autocomplete(
                /** @type {HTMLInputElement} */(input),
                {
                    types: ['(cities)'],
                });
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }

            var address = '';
            if (place.address_components)
            {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }
            document.getElementById('place_lat').value=place.geometry.location.lat();
            document.getElementById('place_lng').value=place.geometry.location.lng();
            document.getElementById('location').value=place.getPlace();
           // LoadEventCategory();
           // LoadYelpData();
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script>
		function getLocation() {
		    if (navigator.geolocation) {
		        navigator.geolocation.getCurrentPosition(showPosition);
		    } else {
		        console.log("Geolocation is not supported by this browser.");
		    }
		}
		function showPosition(position) {
			document.getElementById('place_lat').value=position.coords.latitude;
            document.getElementById('place_lng').value=position.coords.longitude;
            document.getElementById('location').value="Current location";
		}
</script>

<script type="text/javascript">
	var map;
var infoWindow;

var markersData=<?php echo (!empty($business_infos))?json_encode($business_infos):''; ?>


function initialize() {
   var mapOptions = {
      center: new google.maps.LatLng(12.9715987,77.5945627),
      zoom: 13,
      mapTypeId: 'roadmap',
   };

   map = new google.maps.Map(document.getElementById('map'), mapOptions);

   // a new Info Window is created
   infoWindow = new google.maps.InfoWindow();

   // Event that closes the Info Window with a click on the map
   google.maps.event.addListener(map, 'click', function() {
      infoWindow.close();
   });

   // Finally displayMarkers() function is called to begin the markers creation
   displayMarkers();
}
google.maps.event.addDomListener(window, 'load', initialize);


// This function will iterate over markersData array
// creating markers with createMarker function
function displayMarkers(){

   // this variable sets the map bounds according to markers position
   var bounds = new google.maps.LatLngBounds();
   
   // for loop traverses markersData array calling createMarker function for each marker 
   for (var i = 0; i < markersData.length; i++){

      var latlng = new google.maps.LatLng(markersData[i].latitude, markersData[i].longitude);
      var name = markersData[i].business_name;
      var address1 = markersData[i].business_address1;
      var address2 = markersData[i].business_address2;
      var postalCode = markersData[i].business_zip;
      var business_id = markersData[i].business_id;

      createMarker(latlng, name, address1, address2, postalCode,i,business_id);

      // marker position is added to bounds variable
      bounds.extend(latlng);  
   }

   // Finally the bounds variable is used to set the map bounds
   // with fitBounds() function
   map.fitBounds(bounds);
}
var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
// This function creates each marker and it sets their Info Window content
function createMarker(latlng, name, address1, address2, postalCode,i,business_id){
   var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      title: name,
      icon:'https://raw.githubusercontent.com/Concept211/Google-Maps-Markers/master/images/marker_red'+(i+1)+'.png'
   });

   // This event expects a click on a marker
   // When this event is fired the Info Window content is created
   // and the Info Window is opened.
   google.maps.event.addListener(marker, 'click', function() {
      
      // Creating the content to be inserted in the infowindow
      var iwContent = '<div id="iw_container">' +
            '<div class="iw_title">' + name + '</div>' +
         '<div class="iw_content">' + address1 + '<br />' +
         address2 + '<br />' +
         postalCode + '</div></div>';
      
      // including content to the Info Window.
      infoWindow.setContent(iwContent);

      // opening the Info Window in the current map and at the current marker location.
      infoWindow.open(map, marker);
   });

   google.maps.event.addListener(marker, 'mouseover', function() {
      
   		document.getElementById('business_id_'+business_id).style.border = "3px solid yellow";
   });

   google.maps.event.addListener(marker, 'mouseout', function() {
      
   		document.getElementById('business_id_'+business_id).style.border = "0px solid yellow";
   });
}
</script>