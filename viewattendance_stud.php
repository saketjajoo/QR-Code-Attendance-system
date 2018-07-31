<?php

session_start();

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="qrattendance";
$connect = new mysqli("$servername",$username,$password,$dbname);  


if(isset($_POST['submit']))
{
	$sid = $_SESSION['stuid'];
	$slot = $_POST['slot'];
	$date = $_POST['date'];
	$sql = "select attend from attendance_post where sid='$sid' and slot='$slot' and date='$date' ";
	
	$result = mysqli_query($connect,$sql);
	$row = mysqli_fetch_assoc($result);
	
	if($row['attend']==='p')
	{
		echo "
		<script>
		alert('Present');
		</script>
		";
	}
	else
	{
		echo "
		<script>
		alert('Absent');
		</script>
		";
	}
}

?>

<html>
<head>
	<title>View Attendance</title>
	<link rel="stylesheet" href="faculty_createQR_style.css">
	<link rel="stylesheet" href="studentlogin_style.css">
</head>

<body>

	<center>
	</br></br>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<table>
			<tr>
				<td>Slot :</td>
				<td><input type="text" id="slot" name="slot" placeholder="Slot" class="inputfields" required></td>
			</tr>
			<tr>
				<td>Date :</td>
				<td><input type="date" id="date" name="date" placeholder="Date" class="inputfields" required></td>
			</tr>
		</table>
		<input type="submit" value="Submit" name="submit" id="submit">
		</form>
		
		<button style="border-radius:7px;border:2px solid black;position:relative;top:150px;height:35px;width:150px;cursor:pointer;color:black;font-size:18px;background-color:none;" id="back_btn" name="back_qr" onclick="goback()">Go Back</button>
		
	</center>

</body>

<script>
function goback()
{
	window.location.href='stu_afterlogin.php';
}
</script>

</html>