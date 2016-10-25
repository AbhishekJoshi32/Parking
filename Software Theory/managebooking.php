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
          <li><a href="aboutus.html">About Us</a></li>
          <li><a href="city.php">Book Parking</a></li>
          <li class="cactive"><a href="managebooking.php">Manage Bookings</a></li>
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
				echo "No bookings done yet";
			}
			else
			{
						echo '  <div class="container get-park">
    <div class="row-head">
      <div class="col-md-2">
        <p>Location</p>
      </div>
      <div class="col-md-2">
        <p>Date</p>
      </div>
      <div class="col-md-2">
        <p>Time</p>
      </div>
      <div class="col-md-2">
        <p>Duration</p>
      </div>
            <div class="col-md-2">
        <p>Slots</p>
      </div>
            <div class="col-md-2">
        <p>Delete</p>
      </div>
    </div>';
				while($row=mysql_fetch_array($result))
				{
					echo '<tr><td>';
					$sql1="SELECT location from parking_area WHERE p_id='".$row['p_id']."'";
					$result1=mysql_query($sql1);
					while($row1=mysql_fetch_array($result1))
					{
									echo '  <div class="row">
      <div class="col-md-2">
        <p>'.$row1['location'].'</p>
      </div>';
					}
					     echo '<div class="col-md-2">
        <p>'.$row['book_date'].'</p>
      </div>
      <div class="col-md-2">
        <p>'.$row['book_time'].'</p>
      </div>
       <div class="col-md-2">
        <p>'.$row['duration'].'</p>
      </div>
       <div class="col-md-2">
        <p>'.$row['num_slots'].'</p>
      </div>    
      <div class="col-md-2">
        <p><a href="delete.php?id='.$row['p_id'].'&book_id='.$row['book_id'].'">Delete booking</a></p>
      </div>
    </div>';
				}
			}
		}
	}
}
include 'footer.php';
?>