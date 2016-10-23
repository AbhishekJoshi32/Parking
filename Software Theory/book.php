<?php
session_start();
include 'header.php';
include 'connect.php';
$slots=$_POST['slots'];
$sql="UPDATE parking_area SET vacant_slots=vacant_slots-'.$slots.' WHERE p_id=$_POST['p_id']";
$result=mysql_query($sql);
if(!$result)
{
	echo "Error";
}
else
{

}
include 'footer.php';
?>