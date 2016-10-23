<?php
session_start();
include 'header.php';
include 'connect.php';
$sql="SELECT * from parking_area where area_id='".$_POST['area_dropdown']."'";
$result=mysql_query($sql);
if(!$result)
{
	echo "Error";
}
else
{
	if(mysql_num_rows($result)==0)
	{
		echo "Sorry.. There are no parkings in this area";
	}
	else
	{
		echo '<table border="1">
			<th>Location</th>
			<th>Total Slots</th>
			<th>Vacant Slots</th>
			<th></th> ';
		while($row=mysql_fetch_array($result))
		{
			echo '<tr><td>'.$row['location'].'</td>
				<td>'.$row['total_slots'].'</td>
				<td>'.$row['vacant_slots'].'</td>
				<td><form method="post" action="book.php">
				<a href="book.php?id='.$row['p_id'].'">Book Parking</a>
				</td></tr>';
		}
		echo '</table>';
	}
}
include 'footer.php';