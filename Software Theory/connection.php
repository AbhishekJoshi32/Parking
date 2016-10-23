<?php
global $con;
$con=mysqli_connect("localhost","root","","cab");
if(!$con)
{
	die("Database connection failed!");
}

$db_select=mysqli_select_db($con,"cab");
if(!$db_select){
	die("Database failed!");
}

?>