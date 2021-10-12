<?php


$SQL = "SELECT * FROM general_settings"; 

$query=mysqli_query($con,$SQL);
$general_setting=mysqli_fetch_assoc($query);

?>