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
          <li><a href="managebooking.php">Manage Bookings</a></li>
          <li class="cactive"><a href="signup.php">Signup</a></li>
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

if(!$_POST)
{
	echo '
  <div class="parallax3 " style="height:800px;"></div>
  <div class="signin">
  <div class="table">
    <form action="signup.php" method="post">
      <div class="input-group">
        <div class="col-md-4">
           <span>Username</span>
        </div>
        <div class="col-md-8">
           <input type="text" class="form-control" placeholder="" aria-describedby="basic-addon1" name="user" required>
        </div>
      </div>
      <div class="input-group">
        <div class="col-md-4">
           <span>First Name</span>
        </div>
        <div class="col-md-8">
           <input type="text" class="form-control" placeholder="" aria-describedby="basic-addon1" name="first_name" required>
        </div>
      </div>
      <div class="input-group">
        <div class="col-md-4">
           <span>Last Name</span>
        </div>
        <div class="col-md-8">
           <input type="text" class="form-control" placeholder="" aria-describedby="basic-addon1" name="last_name" required>
        </div>
      </div>

      <div class="input-group">
        <div class="col-md-4">
           <span>Email</span>
        </div>
        <div class="col-md-8">
           <input type="email" class="form-control" placeholder="" aria-describedby="basic-addon1" name="email" required>
        </div>
      </div>


      <div class="input-group">
        <div class="col-md-4">
           <span>Password</span>
        </div>
        <div class="col-md-8">
           <input type="password" class="form-control" placeholder="" aria-describedby="basic-addon1" name="pass" required>
        </div>
      </div>


      <div class="input-group">
        <div class="col-md-4">
           <span>Retype Password</span>
        </div>
        <div class="col-md-8">
           <input type="password" class="form-control" placeholder="" aria-describedby="basic-addon1" name="repass" required>
        </div>
      </div>


      <div class="input-group">
        <div class="col-md-4">
           <span>Address</span>
        </div>
        <div class="col-md-8">
           <textarea name="address" placeholder="address" required></textarea>
        </div>
      </div>


      <div class="input-group">
        <div class="col-md-4">
           <span>Mobile Number</span>
        </div>
        <div class="col-md-8">
           <input type="text" class="form-control" placeholder="" aria-describedby="basic-addon1" name="phone" required>
        </div>
      </div>

      <div class="submit-btn ">
        <input class="btn btn-primary" type="submit" name="action" value="Signup" required>
              </div>
    </form>  
  </div>
</div>';

}

else
{
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$repass=$_POST['repass'];
	if ($pass==$repass) 
	{
		$sql="INSERT INTO customer_det(first_name,last_name,address,phone,email,username,password) VALUES ('".$_POST['first_name']."','".$_POST['last_name']."','".$_POST['address']."','".$_POST['phone']."','".$_POST['email']."','".$user."','".$pass."')";
		$result=mysql_query($sql);
		if(!$result)
		{
			echo "<div style='height:50%;'>INSERT failed: ".mysql_error()."</div>";
		}

		else
		{
	             $_SESSION['signed_in'] = true;
				 $_SESSION['user_name']  = $user;
                 echo '<meta http-equiv="refresh" content="0;URL=index.php">';
		}
	}
}
echo ' 
<footer>
    <div class="container">
      <div class="head"><h1>Book your Parking..</h1></div>
    </div>
    <p>AND SAVE YOUR TIME!</p>
    <div class="row">
      <div class="col-sm-4">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="28.687166213989258 50.34516906738281 143.6256866455078 95.75167846679688" preserveAspectRatio="xMidYMid meet" style="stroke-width: 0px; height:30px;width:30px;fill: #605E5E;fill-opacity: 1;padding-top:15px;">
            <g>
              <path d="M100.491 100.909l71.821-33.113V53.338a2.99 2.99 0 0 0-2.992-2.992H31.68a2.99 2.99 0 0 0-2.992 2.992v14.681l71.803 32.89z"></path>
              <path d="M101.754 106.923a2.987 2.987 0 0 1-1.251.275h-.006c-.415 0-.838-.087-1.245-.269L28.688 74.6v68.504a2.99 2.99 0 0 0 2.992 2.992h137.64a2.99 2.99 0 0 0 2.992-2.992V74.389l-70.558 32.534z"></path>
            </g>
          </svg>
        <span>admin@parktel.com</span>
      </div>
      <div class="col-sm-4">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="38.888004302978516 16.584003448486328 123.92599487304688 165.17300415039062" preserveAspectRatio="xMidYMid meet" style="stroke-width: 0px;height:30px;width:30px;fill: #605E5E;fill-opacity: 1;padding-top:15px;">
              <g>
                  <path d="M100.785 16.62c-34.193.036-61.897 27.791-61.861 61.989.036 34.204 62.035 103.148 62.035 103.148s61.855-69.074 61.819-103.278c-.036-34.199-27.796-61.895-61.993-61.859zm.093 87.724c-17.098.018-30.972-13.83-30.99-30.929-.018-17.098 13.831-30.968 30.925-30.986 17.103-.018 30.976 13.823 30.994 30.921.018 17.099-13.827 30.976-30.929 30.994z"></path>
              </g>
          </svg>
        <span>VIT University Chennai Tamil Nadu</span>
      </div>
      <div class="col-sm-4">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="28.5 27.899978637695312 143.60000610351562 143.50003051757812" preserveAspectRatio="xMidYMid meet" style="stroke-width: 0px;height:30px;width:30px;fill: #605E5E;fill-opacity: 1;padding-top:15px;">
              <g>
                  <path d="M170.5 142.3l-.7-2.1c-1.7-5-7.2-10.2-12.2-11.6l-18.7-5.1c-5.1-1.4-12.3.5-16 4.2l-6.8 6.8c-24.6-6.6-43.8-25.9-50.5-50.5l6.8-6.8c3.7-3.7 5.6-10.9 4.2-16l-5.1-18.7c-1.4-5.1-6.6-10.6-11.6-12.2l-2.1-.7c-5-1.7-12.1 0-15.8 3.7L31.9 43.4c-1.8 1.8-3 6.9-3 7-.4 32.1 12.2 63.1 35 85.8 22.7 22.7 53.5 35.2 85.5 35 .2 0 5.5-1.1 7.3-2.9l10.1-10.1c3.7-3.9 5.3-11 3.7-15.9z"></path>
              </g>
          </svg>
        <span>Tel: 123-456-7890<br>
      Fax: 123-456-7890</span>
      </div>
    </div>    
  </footer>';
?>


<!-- <div class="parallax4"></div>
<br><br>
<br><br>
<br><br>
<center>
<form action="signup.php" method="post">
<table bgcolor="#E0E0E0" cellpadding="7">
<tr>
<td>Username:</td>
<td><input type="text" name="user" placeholder="username" required></td>
</tr>
<tr>
<td>First Name:</td>
<td><input type="text" name="first_name" placeholder="First Name" required></td>
</tr>
<tr>
<td>Last Name:</td>
<td><input type="text" name="last_name" placeholder="Last Name" required></td>
</tr>
<tr>
<td>Email:</td>
<td><input type="email" name="email" placeholder="example@example.com" required></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="password" name="pass" placeholder="********" required></td>
</tr>
<tr>
<td>Re-Enter Password:</td>
<td><input type="password" name="repass" placeholder="********" required></td>
</tr>
<tr>
<td>Address:</td>
<td><textarea name="address" placeholder="address"></textarea></td>
</tr>
<tr>
<td>Mobile No.:</td>
<td><input min="0" type="number" name="phone" placeholder="Mobile" required></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="submit" value="Sign Up"></td>
</tr>

</table>     
</form>  
    
</center>
</div>'-->