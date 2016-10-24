<?php
session_start();
include 'header.php';
include 'connect.php';
	if($_POST['pass']==$_POST['repass'])
	{
		$sql1="UPDATE customer_det SET password='".$_POST['pass']."' WHERE username='".$_SESSION['user_name']."'";
		$res=mysql_query($sql1);
		if(!$res)
		{
			echo "Error in password updation";
		}
		else
		{
			echo "Password successfully updated";
		}
	}
	else
	{
		echo "Password and Re-password don't match";
	}
include 'footer.php';
?>