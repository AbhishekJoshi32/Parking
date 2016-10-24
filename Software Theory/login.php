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
<body>';
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'])
{
    echo 'You are already signed in, you can <a href="signout.php">sign out</a> if you want.';
}
else
{
    if(!$_POST)
    {
	echo '<div class="parallax3">
<div class="signin">
  <div class="table">
    <form action="login.php" method="post">
      <div class="input-group">
        <div class="col-md-4">
           <span>Username</span>
        </div>
        <div class="col-md-8">
           <input type="text" class="form-control" placeholder="" aria-describedby="basic-addon1" name="user">
        </div>
      </div>
      <div class="input-group">
        <div class="col-md-4">
           <span>Password</span>
        </div>
        <div class="col-md-8">
           <input type="text" class="form-control" placeholder="" aria-describedby="basic-addon1" name="pass">
        </div>
      </div>

      <div class="submit-btn ">
        <input class="btn btn-primary" type="submit" name="action" value="LOGIN">
        <input class="btn btn-primary" type="submit" name="action" value="FORGOT PASSWORD">
              </div>
    </form>  
  </div>
</div>';
    }
    elseif($_POST['action']!='LOGIN')
    {
        $_SESSION['user_name']=$_POST['user'];
        include 'password.php';

    }
    else
        {
	    if($_POST['pass']=="")
	    {
		echo "Please enter your password";
	    }
            $sql = "SELECT 
                        username,
                        password
                    FROM
                        customer_det
                    WHERE
                        username = '" . mysql_real_escape_string($_POST['user']) . "'
                    AND
                        password = '" . $_POST['pass'] . "'";
                         
            $result = mysql_query($sql);
            if(!$result)
            {
                echo 'Something went wrong while signing in. Please try again later.';
            }
            else
            {
                if(mysql_num_rows($result) == 0)
                {
                    echo 'You have supplied a wrong user/password combination. Please try again.';
                }
                else
                {
                    $_SESSION['signed_in'] = true;
                     
                    while($row = mysql_fetch_array($result))
                    {
                        $_SESSION['user_name']  = $row['username'];
                    }
                     
                    echo '<meta http-equiv="refresh" content="0;URL=index.php">';
                }
           }
      }
}      
 
?>