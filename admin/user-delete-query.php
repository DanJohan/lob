<?php 
session_start();
if(!isset($_SESSION['admin_id']) && empty($_SESSION['admin_id']))
{
	header('location:index.php');
}
?>
<?php 
include('../config.php');

$del_id=$_GET['id'];
 
if(isset($del_id))
{
echo $sql = mysqli_query($link,"delete from tbl_users where user_id=$del_id");


$msg = "User deleted successfully!" ;

header("Location: user-detail.php?msg=$msg");

}

 
 
?>	

											
