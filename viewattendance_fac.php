<?php

session_start();

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="qrattendance";
$connect = new mysqli("$servername",$username,$password,$dbname);  

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
		<form method="post" action="attendancedata_fac.php" onsubmit="return vali()" id="form">
			<table>
			<tr>
				<td>Slot :</td>
				<td><input type="text" id="slot" name="slot" placeholder="Slot" class="inputfields" value=""></td>
			</tr>
			<tr>
				<td>Date :</td>
				<td><input type="date" id="date" name="date" placeholder="Date" class="inputfields" value=""></td>
			</tr>
		</table>
		<input type="submit" value="Submit" name="submit" id="submit">
		</form>
		
		<button style="border-radius:7px;border:2px solid black;position:relative;top:150px;height:35px;width:150px;cursor:pointer;color:black;font-size:18px;background-color:none;" id="back_btn" name="back_qr" onclick="goback()">Go Back</button>
		
	</center>

</body>

<script>
function vali()
{
	var sl = document.getElementById('slot').value;
	var date = document.getElementById('date').value;
	
	if(sl=='' && date=='')
	{
		alert('Atleast fill the slot or the date field.');
		return false;
	}
	return true;
}

function goback()
{
	window.location.href='fac_afterlogin.php';
}
</script>

</html>