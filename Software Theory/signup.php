<?php

session_start();
include 'header.php';
include 'connect.php';

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
                 echo '<meta http-equiv="refresh" content="0;URL=index.php"';
		}
	}
}
?>
