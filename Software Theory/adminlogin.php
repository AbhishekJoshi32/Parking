<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>



<div id="top">
<div id="topic">
        PARKTEL 
        </div>
        
        <div id="add">
            Address:VIT university Chennai<br>
            <span>email: parketel@gmail.com</span>
        </div>
 </div>
<div id="menu">
     <a class="item" href="home.html">Home</a> 
     <a class="item" href="#">About us</a> 
     <a class="item" href="#">Manage Bookings</a>
      <a class="item" href="login.html">Login</a>
       <a class="item" href="signup.html">Sign up</a>
       </div>
<div class="parallax4">

<br><br>
<br><br>
<br><br>

<center>
<form action="#" method="POST">
<table bgcolor="#E0E0E0" cellpadding="7">
<tr>
<td>EMAIL:</td>
<td><input type="email" name="email" placeholder="email"></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="password" name="password" placeholder="password"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="login" value="Login"></td>
</tr>
<tr>
<td colspan="2">
Don't have an account? <a href="adminsignup.php" id="signup">click here</a>
</td>
</tr>
</table>  
</form> 
</center>
</div>
<?php
  if(isset($_POST['login']))
     {
       $host="localhost";
       $username="root";
       $password="";
       $database="parking";

       $con=mysqli_connect($host,$username,$password,$database);
       if(mysqli_connect_errno())
       {
          echo"Failed to connect to MySQL ".mysqli_connect_errno();
       }
      else
        {
          mysqli_select_db($con,$database);
          $email=$_POST['email'];
           $password=$_POST['password'];
          $sql="SELECT * FROM admin__viewer WHERE email='$email'";
          $result=mysqli_query($con,$sql);

          if($result==NULL)
          { 
            echo("Sorry you are not member<br>PLease click here to <br><a href='signup1.html'>Sign UP</a> ");
          }
          else
          { $row=mysqli_fetch_row($result);
            if($row[4]==$password)
            {
                session_start();
                $_SESSION["ssn_name"]=$row[0];
                $_SESSION["ssn_email"]=$email;
                echo"<center>CONGRATULATIONS....!!!<br>";
                echo($_SESSION['ssn_name']);
                echo"<br> You have logged in succesfully<br><a href='tableschoicces.php'>PROCEED</a></center></body></html>";
                //echo("<meta http-equiv='refresh content='0;URL=tableschoicces.php'> ");
                
             }
             else
             {
                echo("Wrong password");
             }  
          }
         }
      }
      include 'footer.php';

?>
