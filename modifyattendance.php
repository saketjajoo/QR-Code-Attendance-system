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
	<title>Modify Attendance</title>
	<link rel="stylesheet" href="modifyatt_fac_style.css">
</head>

<body>

	<center>
	</br></br>
		<form method="post" action="modifyattenddata_fac.php" onsubmit="return vali()" id="form">
			<table>
			<tr>
				<td>Student ID :</td>
				<td><input type="text" id="sid" name="sid" placeholder="Student ID" class="inputfields" required></td>
			</tr>
			<tr>
				<td>Slot :</td>
				<td><input type="text" id="slot" name="slot" placeholder="Slot" class="inputfields" required></td>
			</tr>
			<tr>
				<td>Date :</td>
				<td><input type="date" id="date" name="date" placeholder="Date" class="inputfields" required></td>
			</tr>
			<tr>
				<td>Attendance :</td>
				<td>
					<select name="attend" id="attend">
						<option value="none">--</option>
						<option value="p">Present</option>
						<option value="a">Absent</option>
					</select>
				</td>
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
	var dd = document.getElementById("attend").value;
	if(dd=='none')
	{
		alert('Please select the status of attendance.');
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