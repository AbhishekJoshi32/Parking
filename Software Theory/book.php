<?php
session_start();
include 'header.php';
include 'connect.php';

echo '
  <nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"></a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar">
          <li><a href="index.php">Home</a></li>
          <li><a href="about.html">About Us</a></li>
          <li class="cactive"><a href="city.php">Book Parking</a></li>
          <li><a href="managebooking.php">Manage Bookings</a></li>
          <li><a href="signup.php">Signup</a></li>
          <li><a href="login.php">Login</a></li> 
        </ul>
        <!--<ul>
          <li><a href="signout.php"></a>Logout</li>
          <li><a href="change_pass.php"></a>Change Password</li>
          <li><a href="#"></a></li>
        </ul>-->
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>';
if(!isset($_SESSION['signed_in']) || !$_SESSION['signed_in'])
{
	echo 'You are not signed in. Please <a href="login.php">sign in</a> to continue.';
}
else
{
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
				      <div class="submit-btn ">
		<input class="btn btn-primary" type="Submit" value="Book">
		</div>';
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
		$query="SELECT cus_id from customer_det where username='".$_SESSION['user_name']."'";
		$cus=mysql_query($query);
		while($rows1=mysql_fetch_array($cus))
		{
			$sql="INSERT INTO book(cus_id,book_date,book_time,duration,num_slots,cost,p_id) VALUES('".$rows1['cus_id']."',
		'".$_POST['date']."','".$_POST['time']."','".$_POST['duration']."','".$_POST['slots']."','.$cost.','.$pid.')";
			$result=mysql_query($sql);
			if(!$result)
			{
				echo "Not inserted booking details";
			}
			else
			{
				echo "<br>Parking successfully booked<br>";
				echo "Cost=".$cost;
			}
		}
	}
}
include 'footer.php';
?>