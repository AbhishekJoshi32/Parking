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
    <th colspan="2">
    Tables You Want To View
    </th>
 </tr>
 <tr>
 	<td>
 		<input type="radio" name="table" value=areas>
 	</td>
 	<td>
 		Areas details
 	</td>
 </tr>
 <tr>
 	<td>
 		<input type="radio" name="table" value="city">
 	</td>
 	<td>
 		City details
 	</td>
 </tr>
 <tr>
 	<td>
 		<input type="radio" name="table" value=parking_area>
 	</td>
 	<td>
 		Parking Areas details
 	</td>
 </tr>
 <tr>
 	<td>
 		<input type="radio" name="table" value="employee" selected>
 	</td>
 	<td>
 		Employes details details
 	</td>
 </tr>
 <tr>
 	<td colspan="2">
 		<input type="submit" name="submit" value="Show">
 	</td>
 </tr>
 </table>
 </form>
 </center>
 <center>
<?php
//session_start();
if(isset($_POST['submit']))
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
          $table=$_POST['table'];
          if ($table=='areas') 
          {
          	$sql="SELECT * FROM areas";
          	$result=mysqli_query($con,$sql);
          	$row=mysqli_fetch_row($result);
          	echo"<table bgcolor='#E0E0E0, cellpadding='7'><tr><th>area_id</th><th>area_name</th><th>no_park</th><th>city_id</th></tr>";
          	while ($row=mysqli_fetch_row($result))
           {
          		echo"<tr><td>'$row[0]'</td><td>		'$row[1]'</td>		<td>'$row[2]</td>'		<td>'$row[3]'</td></tr>";
          	}
          }
          if ($table=='city') 
          {
          	$sql="SELECT * FROM city";
          	$result=mysqli_query($con,$sql);
          	$row=mysqli_fetch_row($result);
          	echo"<table bgcolor='#E0E0E0, cellpadding='7'><tr><th>city_id</th><th>city_name</th></tr>";
          	while ($row=mysqli_fetch_row($result))
           {
          		echo"<tr><td>'$row[0]'</td>	<td>'$row[1]'</td></tr>";
          	}
          }
          if ($table=='parking_area') 
          {
          	$sql="SELECT * FROM parking_area";
          	$result=mysqli_query($con,$sql);
          	$row=mysqli_fetch_row($result);
          	echo"<table bgcolor='#E0E0E0, cellpadding='7'><tr><th>p_id</th>		<th>manager_id</th>		<th>total_slots</th>		<th>vacant_slots</th>		<th>area_id</th><th>location</th></tr>";
          	while ($row=mysqli_fetch_row($result))
           {
          		echo"<tr><td>'$row[0]'</td>		<td>'$row[1]'</td>		<td>'$row[2]'</td>		<td>'$row[3]'</td>		<td>'$row[4]'</td>		<td>'$row[5]'</td></tr>";
          	}
          }
           if ($table=='employee') 
          {
          	$sql="SELECT * FROM employee";
          	$result=mysqli_query($con,$sql);
          	$row=mysqli_fetch_row($result);
          	echo"<table bgcolor='#E0E0E0, cellpadding='7'><tr><th>emp_id</th>		<th>emp_name</th>		<th>p_id</th>		<th>salary</th></tr>";
          	while ($row=mysqli_fetch_row($result))
           {
          		echo"<tr><td>'$row[0]'</td>		<td>'$row[1]'</td>		<td>'$row[3]'</td>		<td>'$row[4]'</td>";
          	}
          }
      }
     }
     echo"</table><center>";
     include 'footer.php';
     ?>
          
