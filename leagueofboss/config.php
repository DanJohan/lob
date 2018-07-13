<?php 
global $link;

$link = mysqli_connect('localhost','leagueuser','%(ftWM(ooGi=','leagueofbosses');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//mysqli_close($link);
?>

