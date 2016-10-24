<?php
session_start();
include 'header.php';
include 'connect.php';

echo '  <nav class="navbar navbar-inverse" role="navigation">
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
  </nav>
<body>';

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
		echo '<div class="parallax4_2"></div>
  <div class="city">
    <div class="container">
    <div class="head"><h1> Choose your city</h1></div>
      <div class="drop">';
		echo '<form method="post" action="">
			<select class="selectpicker" name="city_dropdown">';
		while($row=mysql_fetch_array($result))
		{
			echo '<option class="opt" value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
		}

		echo '</select>
		      <div class="submit-btn ">
		<input class="btn btn-primary" type="submit" name="city" value="Get areas">
		</div>
		</div>
		</div>
		</div>';
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
						echo '<div class="parallax4_2"></div>
 				 <div class="city">
    			<div class="container">
    			<div class="head"><h1> Choose your area</h1></div>
    			  <div class="drop">';
		echo '<form method="post" action="getparkings.php">
			<select class="selectpicker" name="area_dropdown">';
				while($row1=mysql_fetch_array($result2))
				{
					echo '<option class="opt" value="'.$row1['area_id'].'">'.$row1['area_name'].'</option>';
				}

				echo '</select>
		      <div class="submit-btn ">
		<input class="btn btn-primary" type="submit" value="Get parkings">
		</div>
		</div>
		</div>
		</div>';
			}


		}
	}
}
include 'footer.php';

