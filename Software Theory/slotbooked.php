<?php
session_start();
include 'header.php';
$pid=1;//$_GET['pid'];
	$arr_slotid=array();
	$arr_state=array();
	$res_arr=array();
 
if (isset($_POST['submit'])) 
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

    	$sql="SELECT slot_id, state FROM parking_slot where pid='".$pid."'";
	    $res=mysqli_query($con,$sql);
		if(!$res)
		{
			echo 'Error';
		}
		else
		{
			$slot=$_POST['slot'];
			//echo($slot);
    	    $sqla="UPDATE parking_slot SET state=1 WHERE slot_id='$slot'";
    	    $result=mysqli_query($con,$sqla);
    	    if($result)
    	    {
    	    	while($row=mysqli_fetch_array($res))
			    {
				  array_push($arr_slotid,$row[0]);
				  array_push($arr_state,$row[1]);
			    }
                $res_arr=array_combine($arr_slotid,$arr_state);
            }
            else
            {
            	echo("SORRY unexpected error try again");

            }
		}
	}
}
			
		?>

<!DOCTYPE html>
<html>
<style>
.abs{
position:absolute;
top:330px;
left:220px;
}
.red{
	background-color: red;
}
.green{
	background-color: green;
}
</style>

<script src=" js/jquery-2.1.4.min.js"></script>
<body>

<div class="abs">
<canvas id="1" width="100" height="100" style="border:1px solid #000000;" <?php if ($res_arr[1]==0) echo 'class="green"'; else echo'class="red"'?>" >
</canvas>
<canvas id="2" width="100" height="100" style="border:1px solid #000000;" <?php if ($res_arr[2]==0) echo 'class="green"';else echo'class="red"'?>>
</canvas>
<canvas id="3" width="100" height="100" style="border:1px solid #000000;" <?php if ($res_arr[3]==0) echo 'class="green"';else echo'class="red"'?>>
</canvas>
</div>


<canvas id="4" width="100" height="100" style="border:1px solid #000000;" <?php if ($res_arr[4]==0) echo 'class="green"';else echo'class="red"'?>>
</canvas>
<canvas id="5" width="100" height="100" style="border:1px solid #000000;" <?php if ($res_arr[5]==0) echo 'class="green"';else echo'class="red"'?>>
</canvas>
<canvas id="6" width="100" height="100" style="border:1px solid #000000;" <?php if ($res_arr[6]==0) echo 'class="green"';else echo'class="red"'?>>
</canvas>
<canvas id="7" width="100" height="100" style="border:1px solid #000000;" <?php if ($res_arr[7]==0) echo 'class="green"';else echo'class="red"'?>>
</canvas>
<canvas id="8" width="100" height="100" style="border:1px solid #000000;" <?php if ($res_arr[8]==0) echo 'class="green"';else echo'class="red"'?>>
</canvas><br>

<canvas id="9" width="100" height="100" style="border:1px solid #000000;" <?php if ($res_arr[9]==0) echo 'class="green"';else echo'class="red"'?>>
</canvas><br>
<canvas id="10" width="100" height="100" style="border:1px solid #000000;" <?php if ($res_arr[10]==0) echo 'class="green"';else echo'class="red"'?>>
</canvas><br>
<canvas id="11" width="100" height="100" style="border:1px solid #000000;" <?php if ($res_arr[11]==0) echo 'class="green"';else echo'class="red"'?>>
</canvas>
<canvas id="12" width="100" height="100" style="border:1px solid #000000;" <?php if ($res_arr[12]==0) echo 'class="green"';else echo'class="red"'?>>
</canvas>
<canvas id="13" width="100" height="100" style="border:1px solid #000000;" <?php if ($res_arr[13]==0) echo 'class="green"';else echo'class="red"'?>>
</canvas>
<canvas id="14" width="100" height="100" style="border:1px solid #000000;" <?php if ($res_arr[14]==0) echo 'class="green"';else echo'class="red"'?>>
</canvas>
<canvas id="15" width="100" height="100" style="border:1px solid #000000;" <?php if ($res_arr[15]==0) echo 'class="green"';else echo'class="red"'?>>
</canvas>
<br>
</body>
</html>

<?php
include 'footer.php';
?>