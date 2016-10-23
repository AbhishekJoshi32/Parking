<?php
session_start();
include 'header.php';
include 'connect.php';
$sql="SELECT * from city";
$result=mysql_query($sql);
if (!$result)
{
	echo "Error";
}
else
{
	if(!isset($_POST['city']) || !$_POST['city'])
	{
		echo '<form method="post" action="">
			<select name="city_dropdown">';
		while($row=mysql_fetch_array($result))
		{
			echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
		}

		echo '</select>
		<input type="submit" name="city" value="Get areas">';
	}
	else
	{
		if(!isset($_POST['area']) || !$_POST['area'])
		{
			$sql1="SELECT * from areas where city_id='".$_POST['city_dropdown']."'";
			$result2=mysql_query($sql1);
			if(!$sql)
			{
				echo 'Error'.mysql_error();
			}
			else
			{
				echo '<form method="post" action="getparkings.php">
				<select name="area_dropdown">';
				while($row1=mysql_fetch_array($result2))
				{
					echo '<option value="'.$row1['area_id'].'">'.$row1['area_name'].'</option>';
				}

				echo '</select>
				<input type="submit" name="area" value="Get parkings">';
			}


		}
	}
}
include 'footer.php';

