<?php
session_start();
include 'header.php';
include 'connect.php';

if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'])
{
    echo 'You are already signed in, you can <a href="signout.php">sign out</a> if you want.';
}
else
{
    if(!$_POST)
    {
	echo '<div class="parallax3">
	<br><br>
	<br><br>
	<br><br>
	<br><br>
	<center>

	<form action="" method="post">
	<table bgcolor="#E0E0E0" cellpadding="5">
	<tr>
	<td>Username:</td>
	<td><input type="text" name="user" placeholder="Username"></td>
	</tr>
	<tr>
	<td>Password:</td>
	<td><input type="password" name="pass" placeholder="password"></td>
	</tr>
	<tr>	
	<td><input type="submit" name="action" value="Forgot Password"></td>
    <td align="right"><input type="submit" name="action" value="Sign in"></td>
    </tr>
	<tr>
	<td colspan="2">
	Don\'t have an account? <a href="signup.html" id="signup">click here</a>
	</td>
	</tr>
	</table>  
	</form>  
	</center>
	</div>';
    }
    elseif($_POST['action']!='Sign in')
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
 
include 'footer.php';
?>