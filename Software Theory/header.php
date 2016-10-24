<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">


  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <script src="js/script.js"></script>

</head>
<body>



<div id="top">
<div id="topic">
PARKTEL 
</div>
<div id="add">
    Address:VIT university Chennai<br>
    <span>email: parketel@gmail.com</span>
    <br>
    <br>
    <?php
      if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'])
      {
        echo "Welcome to Parketel, ".$_SESSION['user_name']." !";
      }    
    ?>
</div>
 </div>
<div id="menu">
     <a class="item" href="index.php" >Home</a>  
     <a class="item" href="#" >About us</a>     
     <a class="item" href="city.php">Book Parking</a>
     <a class="item" href="managebooking.php">Manage Bookings</a>
      <a class="item" href="change_pass.php">Change Password</a> 
    <?php
      if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'])
      {
        echo '<a class="item" href="signout.php">Log out</a>';
      }
      else
      { 

        echo'<a class="item" href="login.php">Login</a>
          <a class="item" href="signup.php">Sign up</a>';
     }
     ?>
</div>
