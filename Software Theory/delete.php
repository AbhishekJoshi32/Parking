<?php
session_start();
include 'header.php';
include 'connect.php';
$id=$_GET['id'];
$book_id=$_GET['book_id'];

$query="SELECT num_slots from book WHERE book_id='".$book_id."'";
$res=mysql_query($query);
if(!$res)
{
	echo 'Error in selection';
}
else
{
	while($rows=mysql_fetch_array($res))
	{
		$slots=$rows['num_slots'];
	}
}

$sql="DELETE FROM book WHERE book_id='".$book_id."'";
$result=mysql_query($sql);
if(!$result)
{
	echo 'Unable to delete. Please try again later';
}

$sql1="UPDATE parking_area SET vacant_slots=vacant_slots+'".$slots."' WHERE p_id='".$id."'";
$result1=mysql_query($sql1);
if(!$result1)
{
	echo "Error in updation";
}
else
{
	echo "Booking successfully deleted";
}
include 'footer.php';
?>