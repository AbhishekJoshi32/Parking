<?php
session_start();
include 'connect.php';
$sql="SELECT * from cities";
$result=mysql_query($sql);
if (!$result)
{
	echo "Error";
}
else
{
	if(!$_POST['city'])
	{
		echo '<form method="post" action="">
			<select name="city_dropdown">';
		while($row=mysql_fetch_array())
		{
			echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
		}

		echo '</select>
		<input type="submit" name="city" value="Get areas">';
	else
	{
		if(!$_POST['area'])
		{
			$sql1="SELECT * from area where area_city='".$_POST['city_dropdown']."'";
			$result2=mysql_query($sql1);
			if(!$sql)
			{
				echo 'Error'.mysql_error();
			}
			else
			{
				echo '<form method="post" action="">
				<select name="area_dropdown">';
				while($row=mysql_fetch_array())
				{
					echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
				}

				echo '</select>
				<input type="submit" name="area" value="Get parkings">';
			}


		}
	}
}

