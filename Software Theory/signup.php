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
	echo '<div class="parallax4">

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
			echo "INSERT failed: ".mysql_error();
		}

		else
		{
	             $_SESSION['signed_in'] = true;
				 $_SESSION['user_name']  = $user;
                 echo '<meta http-equiv="refresh" content="0;URL=index.php">';
		}
	}
}
include 'footer.php';
?>
