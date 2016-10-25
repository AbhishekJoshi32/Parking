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
          <li class="cactive"><a href="index.php">Home</a></li>
          <li><a href="about.html">About Us</a></li>
          <li><a href="city.php">Book Parking</a></li>
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
		echo '  <div class="container get-park">
    <div class="row-head">
      <div class="col-md-3">
        <p>Location</p>
      </div>
      <div class="col-md-3">
        <p>Total Slots</p>
      </div>
      <div class="col-md-3">
        <p>Vacant Slots</p>
      </div>
      <div class="col-md-3">
        <p>Confirm</p>
      </div>
    </div>';
		while($row=mysql_fetch_array($result))
		{
			echo '  <div class="row">
      <div class="col-md-3">
        <p>'.$row['location'].'</p>
      </div>
      <div class="col-md-3">
        <p>'.$row['total_slots'].'</p>
      </div>
      <div class="col-md-3">
        <p>'.$row['vacant_slots'].'</p>
      </div>
      <div class="col-md-3">
        <p><a href="book.php?id='.$row['p_id'].'">Book Parking</a></p>
      </div>
    </div>';
		}
	}
}
include 'footer.php';