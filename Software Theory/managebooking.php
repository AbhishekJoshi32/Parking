<?php
session_start();
include 'header.php';
include 'connect.php';
if(!isset($_SESSION['signed_in']) || !$_SESSION['signed_in'])
{
	echo 'You are not signed in. Please <a href="login.php">sign in</a> to continue.';
}
else
{
	$query="SELECT cus_id from customer_det WHERE username='".$_SESSION['user_name']."'";
	$res=mysql_query($query);
	while($rows=mysql_fetch_array($res))
	{
		$sql="SELECT * from book WHERE cus_id='".$rows['cus_id']."'";
		$result=mysql_query($sql);
		if(!$result)
		{
		echo "Error";
		}
		else
		{
			if(mysql_num_rows($result)==0)
			{
				echo "Not bookings done yet";
			}
			else
			{
				echo '<table border="1">
				<th>Location</th>
				<th>Date</th>
				<th>Time</th>
				<th>Duration</th>
				<th>Slots</th>
				<th></th>';
				while($row=mysql_fetch_array($result))
				{
					echo '<tr><td>';
					$sql1="SELECT location from parking_area WHERE p_id='".$row['p_id']."'";
					$result1=mysql_query($sql1);
					while($row1=mysql_fetch_array($result1))
					{
						echo $row1['location'];
					}
					echo '</td>
					<td>'.$row['book_date'].'</td>
					<td>'.$row['book_time'].'</td>
					<td>'.$row['duration'].'</td>
					<td>'.$row['num_slots'].'</td>
					<td><a href="delete.php?id='.$row['p_id'].'&book_id='.$row['book_id'].'">Delete booking</a>
					</tr>';
				}
				echo '</table>';
			}
		}
	}
}
include 'footer.php';
?>