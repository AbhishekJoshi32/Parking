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
			<td>Name*</td><td><input type="text" name="name" placeholder="Kenny" id="i1" onblur="f1()" onfocus="ff1()"><p id="p1"></p></td>
		</tr>
		<tr>
			<td>Username*</td><td><input type="text" name="username" placeholder="k3n" id="i2" onblur="f2()" onfocus="ff2()"><p id="p2"></p></td>
		</tr>
		<tr>
			<td>Email*</td><td><input type="text" name="email" placeholder="kennethantony@gmail.com" id="i3" onblur="f3()" onfocus="ff3()"><p id="p3"></p></td>
		</tr>
		<tr>
			<td>Password*</td><td><input type="password" name="password" id="i4" onblur="f4()" onfocus="ff4()"><p id="p4"></p></td>
		</tr>
		<tr>
			<td>Re-Enter Password*</td><td><input type="password" name="repassword" id="i5" onblur="f5()" onfocus="ff5()"><p id="p5"></p></td>
		</tr>
		<tr>
			<td>Address*</td><td><textarea rows="4" cols="22" name="address" placeholder="221 B 
			Baker Street" id="i6" onblur="f6()" onfocus="ff6()"></textarea><p id="p6"></p></td>
		</tr>
		<tr>
			<td>Pin*</td><td><input type="text" name="pin" placeholder="673001" id="i7" onblur="f7()" onfocus="ff7()"><p id="p7"></p></td>
		</tr>
		<tr>
			<td>Phone*</td><td><input type="text" name="phone" placeholder="7358326232"  id="i8" onblur="f8()" onfocus="ff8()"><p id="p8"></p></td>
		</tr>
		<tr>
		<td colspan="2">
					<button  type="submit" name="signup">SignUp</button>&nbsp&nbsp&nbsp<button  type="reset" name="clear">Clear</button></li>
					</ul>
				</td>
		</tr>
		</table>
		</form>
		</center>
<?php
 
if (isset($_POST['signup'])) 
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
         
         $password=$_POST['password'];
         $repassword=$_POST['repassword'];
         if($password==$repassword)
         {
             $name=$_POST['name'];
             $username=$_POST['username'];
             $email=$_POST['email'];
             $address=$_POST['address'];
             $pin=$_POST['pin'];
             $phone=$_POST['phone'];
             $sql="INSERT INTO admin__viewer(name,username,email,address,password,pin,phone) VALUES ('$name','$username','$email','$address','$password','$pin','$phone')";
             $result=mysqli_query($con,$sql);
             if($result)
             {
   
               echo "CONGRATULATIONS!!!....<br>you have succesfully signed up<br>click here to login ";
               echo "<a href='adminlogin.php'>LOGIN HERE</a>";
             }
             else
             {
               echo("input is not stored");
             }
         }
        else
        {
          echo"passwords does not match";
        }
    }
}
?>
<div  class="bottom" text="#E0E0E0" link="#E0E0E0">
    
    <center>
    <h1><font color="#FFC400" size="7">Book Your Parking....</font></h1>
    <p>and save your time</p>
    <p><b>MAIL US:&nbsp;&nbsp;&nbsp;&nbsp;</b><a href="mailto:adititiwari.pta@gmail.com">parketel.com</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ADDRESS:&nbsp;&nbsp;&nbsp;&nbsp;</b>500 Terry Francois Street &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>CONTACT US:&nbsp;&nbsp;&nbsp;&nbsp;</b>9814687644<br>San Francisco, CA 94158</p>

</center>
    
</div>


</body>
</html>
