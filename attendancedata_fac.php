<?php

session_start();

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="qrattendance";
$connect = new mysqli("$servername",$username,$password,$dbname);  

if(isset($_POST['submit']))
{
	$slot = $_POST['slot'];
	$date = $_POST['date'];
	
	$fid=$_SESSION['facid'];
	
	if($slot=='' && $date!='')
	{
		$sql = "select * from attendance_post where fid='$fid' and attend='p' and date='$date' ";
		$res = mysqli_query($connect,$sql);
		
		echo "
		<center>
		<table>
			<tr>
				<td>Student ID</td>
				<td>Date</td>
				<td>Slot</td>
			</tr>
		";
		while($row = mysqli_fetch_assoc($res))
		{
			echo"<tr>";
			echo "<td>".$row['sid']."</td>";
			echo "<td>".$row['date']."</td>";
			echo "<td>".$row['slot']."</td>";
			echo"</tr>";
		}
		echo "
		</table>
		</center>
		";
	}
	else if($date=='' && $slot!='')
	{
		$sql = "select * from attendance_post where fid='$fid' and attend='p' and slot='$slot' ";
		$res = mysqli_query($connect,$sql);
		
		echo "
		<center>
		<table>
			<tr>
				<td>Student ID</td>
				<td>Date</td>
				<td>Slot</td>
			</tr>
		";
		while($row = mysqli_fetch_assoc($res))
		{
			echo"<tr>";
			echo "<td>".$row['sid']."</td>";
			echo "<td>".$row['date']."</td>";
			echo "<td>".$row['slot']."</td>";
			echo"</tr>";
		}
		echo "
		</table>
		</center>
		";
	}
	else
	{		
		$sql = "select * from attendance_post where fid='$fid' and attend='p' and slot='$slot' and date='$date' ";
		$res = mysqli_query($connect,$sql);
		echo "
		<center>
		<table>
			<tr>
				<td>Student ID</td>
				<td>Date</td>
				<td>Slot</td>
			</tr>
		";
		while($row = mysqli_fetch_assoc($res))
		{
			echo"<tr>";
			echo "<td>".$row['sid']."</td>";
			echo "<td>".$row['date']."</td>";
			echo "<td>".$row['slot']."</td>";
			echo"</tr>";
		}
		echo "
		</table>
		</center>
		";
	}
}

?>

<html>
<head>
	<title>View Attendance</title>
	<link rel="stylesheet" href="viewatt_fac_style.css">
</head>

<body>

	<center>
		<button style="border-radius:7px;border:2px solid black;position:relative;top:150px;height:35px;width:150px;cursor:pointer;color:black;font-size:18px;background-color:none;" id="back_btn" name="back_qr" onclick="goback()">Go Back</button>		
	</center>

</body>

<script>
function goback()
{
	window.location.href='fac_afterlogin.php';
}
</script>

</html>