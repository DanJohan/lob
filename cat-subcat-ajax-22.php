<?php 
include("config.php");

$category_id = $_POST['category_id'];
 
$query = mysqli_query($link,"select * from tbl_subcategory  WHERE parent_id = '".$category_id."'");
while($row = mysqli_fetch_array($query)) {
	echo "<option value='$row[subcategory_id]'>$row[subcateory_name]</option>";
}
		
?>