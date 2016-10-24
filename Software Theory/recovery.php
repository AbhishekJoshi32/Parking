<?php
session_start();
include 'header.php';
include 'connect.php';
if($_POST['otp']==$_POST['recovery'])
{
$sql = "SELECT 
     cus_id, 
     username, 
     FROM
     customer_det WHERE
     username = '".mysql_real_escape_string($_SESSION['user_name'])."'";
                         
$result = mysql_query($sql);
if(!$result)
{
echo 'Something went wrong while signing in. Please try again later.';
}
else
{  
while($row = mysql_fetch_array($result))
{
$_SESSION['signed_in'] = true;
$_SESSION['user_name']=$row['username'];
$_SESSION['cust_id'] = $row['cus_id'];
}

if($_POST['action'])                   
echo 'Welcome, ' . $_SESSION['user_name'] . '. <a href="index.php">Proceed to home page</a>.';
}
include 'footer.php';
 }