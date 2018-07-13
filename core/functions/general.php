<?php

function dd($data,$dump=true){
	if(is_array($data)){
		echo "<pre>",print_r($data),"</pre>";
	}else{
		echo $data;
	}
	if($dump){
		exit;
	}
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

function getAddress() {
    $protocol ='http'; //$_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    return $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}


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


function excerpt($title, $cutOffLength) {

    $charAtPosition = "";
    $titleLength = strlen($title);

    do {
        $cutOffLength++;
        $charAtPosition = substr($title, $cutOffLength, 1);
    } while ($cutOffLength < $titleLength && $charAtPosition != " ");

    return substr($title, 0, $cutOffLength) . '...';

}

function sanitize($data){
	return htmlentities($data,ENT_QUOTES,'UTF-8');
}

function array_sanitize($data){
	array_walk($data,'sanitize');
}
?>