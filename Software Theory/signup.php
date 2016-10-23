<?php
<<<<<<< HEAD
include 'header.php';
include 'connect.php';

=======

include 'connection.php';

if(isset($_POST['submit'])){
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$repass=$_POST['repass'];
	if ($pass==$repass) {
		$sql="INSERT INTO customer (username,password) VALUES ('$user','$pass')";
		$result=mysqli_query($con,$sql);
		if(!$result){
			echo "INSERT failed: $query <br>".$connection->error;
		}

		else
		{
			session_start();
				$_SESSION['user']=$user;
				?>
                  <script>
                  window.location="home.php";
                  </script>
				<?php
		}
	}
}

?>
>>>>>>> 98103db41d6decb6ba5ff35add62ca6faf9b3f64
