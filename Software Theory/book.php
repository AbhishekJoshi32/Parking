<?php
session_start();
include 'header.php';
include 'connect.php';
$pid=$_GET['id'];
$sql="SELECT location from parking_area WHERE p_id='".$pid."'";
$result=mysql_query($sql);
if(!$result)
{
	echo 'Error in getting location';
}
else
{
	while($row=mysql_fetch_array($result))
	{
		echo '<form>
		Location: <input type="text" name="location" value="'.$row['location'].'" readonly>
		</form>';
	}
}
if(!$_POST)
{
	echo '<form method="post" action="">
		Date: <input type="date" name="date" required><br>
		Time: <input type="time" name="time" required><br>
		Duration(in hours): <input type="number" name="duration" required><br>
		Number of slots: <select name="slots">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		</select><br>
		<input type="Submit" value="Book">';
}
else
{
	$sql="SELECT vacant_slots FROM parking_area WHERE p_id='".$pid."'";
	$res=mysql_query($sql);
	if(!$res)
	{
		echo 'Error';
	}
	else
	{
		while($row=mysql_fetch_array($res))
		{
			$rem_slots=$row['vacant_slots']-$_POST['slots'];
			if($rem_slots>=0)
			{
				$sql1="UPDATE parking_area SET vacant_slots='".$rem_slots."' WHERE p_id='".$pid."'";
				$result=mysql_query($sql1);
				if(!$sql1)
				{
					echo "Error in updation";
				}
			}
		}
	}
	$cost=20*$_POST['duration']*$_POST['slots'];
	$sql="INSERT INTO book(cus_id,book_date,book_time,duration,num_slots,cost,p_id) VALUES('".$_SESSION['cust_id']."',
		'".$_POST['date']."','".$_POST['time']."','".$_POST['duration']."','".$_POST['slots']."','.$cost.','.$pid.')";
	$result=mysql_query($sql);
	if(!$result)
	{
		echo "Not inserted booking details";
	}
	else
	{
		echo "Parking successfully booked";
		echo "Cost=".$cost;
	}
}
include 'footer.php';
?>