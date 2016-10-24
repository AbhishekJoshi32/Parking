<?php
 session_start();
include 'header.php';
include 'connect.php';
?>
<!DOCTYPE html>
<html>
<style>
.abs{
position:absolute;
top:330px;
left:220px;
}

.def{
	background-color: green;
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
<canvas id="1" width="100" height="100" class="def" >
</canvas>
<canvas id="2" width="100" height="100" class="def" >
</canvas>
<canvas id="3" width="100" height="100" class="def" >
</canvas>
</div>


<canvas id="4" width="100" height="100" class="def" >
</canvas>
<canvas id="5" width="100" height="100" class="def" >
</canvas>
<canvas id="6" width="100" height="100" class="def" >
</canvas>
<canvas id="7" width="100" height="100" class="def" >
</canvas>
<canvas id="8" width="100" height="100" class="def" >
</canvas><br>

<canvas id="9" width="100" height="100" class="def">
</canvas><br>
<canvas id="10" width="100" height="100" class="def" >
</canvas><br>
<canvas id="11" width="100" height="100" class="def" >
</canvas>
<canvas id="12" width="100" height="100" class="def" >
</canvas>
<canvas id="13" width="100" height="100" class="def" >
</canvas>
<canvas id="14" width="100" height="100" class="def" >
</canvas>
<canvas id="15" width="100" height="100" class="def" >
</canvas>

<br>
<form action="slotbooked.php" method="POST">
<center>
	<p>SELECT SLOT NO.</p>
<?php
$sql="SELECT slot_id FROM parking_slot where state=0";
	    $res=mysql_query($sql);
		if(!$res)
		{
			echo 'Error';
		}
		else
		{
			echo '<p><select name="slot">';
			while($row=mysql_fetch_array($res))
			{
				echo '<option value="'.$row['slot_id'].'">'.$row['slot_id'].'</option>';
			}

		}

?>
	</select></p>
	<p><input type="submit" name="submit" value="SELECT"></p>
</center>
</form>
</body>
</html>


<?php
include 'footer.php';
?>
