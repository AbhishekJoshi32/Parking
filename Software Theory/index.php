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
  </nav>
<div class="parallax"></div>
<div class="container why">
  <div class="why-head">
  <h1>Why Parktel</h1>
  </div>
<div class="row">
<div class="why-cont col-sm-3">
Parking for unlimited time
</div>
<div class="why-cont col-sm-3">
Nominal Centerlized rates
</div>
<div class="why-cont col-sm-3">
Priority Parking
</div>
<div class="why-cont col-sm-3">
Pre-approval
</div>
</div>
<!-- <p>Convenient Parking&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Parking for Unlimited Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nominal Centerlized rates&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Priority Parking&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pre-approval</p>
 --></div>

<div class="box">
  <div class="container park-det"><p>
  Out of spaces to park when in a hurry?
  Why not book a parking space in advance
  with ParKeTel..</p>
  <button class="button1"><b>FIND OUT MORE</b></button>
  </div>
</div>
<div class="parallax2"></div>';

include 'footer.php';
?>
