<?php
session_start();
include 'header.php';
include 'connect.php';
if($_POST['otp']==$_POST['recovery'])
{
$sql = "SELECT 
     cus_id, 
     username 
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
}
echo 'Welcome, ' . $_SESSION['user_name'] .'<br>';


	echo '<form action="pass.php" method="post">
	Enter new password: <input type="password" name="pass" placeholder="********" required><br>
	Re-enter password: <input type="password" name="repass" placeholder="********" required><br>
	<input type="submit" name="action" value="Change Password">';


}                  
}
include 'footer.php';
?>