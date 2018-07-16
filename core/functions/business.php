<?php
function get_blog_category(){
	global $link;
	$categories=array();
	$sql = "SELECT * FROM tbl_blog_category";
	$query = mysqli_query($link, $sql);
	while($result = mysqli_fetch_array($query))
	{
		$categories[]=$result;			 
	}
	return (!empty($categories))?$categories:null;
}

function get_blog(){
	global $link;
	$blogs=array();
	$sql = "SELECT b.*,bc.name FROM tbl_blog AS b INNER JOIN tbl_blog_category AS bc ON b.category=bc.id ORDER BY id DESC";
	$query = mysqli_query($link, $sql);
	while($result = mysqli_fetch_array($query))
	{
		$blogs[]=$result;			 
	}
	return (!empty($blogs))?$blogs:null;
}

function get_blog_by_id($id){
	global $link;
	$blog=array();
	$sql = "SELECT b.*,bc.name FROM tbl_blog AS b INNER JOIN tbl_blog_category AS bc ON b.category=bc.id WHERE b.id=".$id;
	$query = mysqli_query($link, $sql);
	$result = mysqli_fetch_array($query,MYSQLI_ASSOC);
	$blog=$result;			 

	return (!empty($blog))?$blog:null;
}

function get_featured_businesses(){
	global $link;
	$businesses=array();
	$sql = "SELECT b.*,s.code from tbl_businessinfo AS b INNER JOIN tbl_states AS s ON b.business_state=s.id where b.is_featured=1";
	$query = mysqli_query($link, $sql);
	while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
		$businesses[]=$result;			 
	}
	return (!empty($businesses))?$businesses:null;
}


function get_similar_businesses($cat_id){
	global $link;
	$businesses=array();
	$sql = "SELECT b.*,s.code from tbl_businessinfo AS b INNER JOIN tbl_states AS s ON b.business_state=s.id where b.business_category=".$cat_id;
	$query = mysqli_query($link, $sql);
	while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
		$businesses[]=$result;			 
	}
	return (!empty($businesses))?$businesses:null;
}
function get_states(){
	global $link;
	$states=array();
	$sql = "SELECT * FROM tbl_states";
	$query = mysqli_query($link, $sql);
	while($result = mysqli_fetch_array($query))
	{
		$states[]=$result;			 
	}
	return (!empty($states))?$states:null;
}


function get_categories(){
	global $link;
	$categories=array();
	$sql = "SELECT * FROM tbl_category";
	$query = mysqli_query($link, $sql);
	while($result = mysqli_fetch_array($query))
	{
		$categories[]=$result;			 
	}
	return (!empty($categories))?$categories:null;
}


function get_categories_bussiness_number($data){
	$result=array();
	if(!empty($data)){
		foreach ($data as $index => $value) {
			$result[]=array(
				'cat_name'=>$value['category_name'],
				'cat_code'=>$value['business_category'],
			);
		}
	}
	return $result;
}

function get_states_bussiness_number($data){
	$result=array();
	if(!empty($data)){
		foreach ($data as $index => $value) {
			if(!empty($value['business_state'])){
				$result[]=array(
					'state_name'=>$value['code'],
					'state_code'=>$value['business_state'],
				);
			}
		}
	}
	return $result;
}

function get_blog_categories_with_number(){
	global $link;
	$sql="SELECT cat.*, COUNT(blog.category) AS total FROM tbl_blog_category AS cat INNER JOIN tbl_blog AS blog ON cat.id=blog.category GROUP BY cat.id";
	$categories=array();
	$query = mysqli_query($link,$sql);

	while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
		$categories[]=$result;			 
	}
	return (!empty($categories))?$categories:null;
}

function get_state_by_id($state_id) {
	global $link;
	$state=array();
	$sql = "SELECT * FROM tbl_states WHERE tbl_states.id=".$state_id;
	$query = mysqli_query($link, $sql);
	$result = mysqli_fetch_array($query,MYSQLI_ASSOC);
	$state=$result;			 

	return (!empty($state))?$state:null;
}

?>