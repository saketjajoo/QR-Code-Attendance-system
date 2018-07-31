<?php

session_start();

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="qrattendance";
$connect = new mysqli("$servername",$username,$password,$dbname);  

if($_SESSION['stuid']=='')
{
	header("Location: studentlogin.html"); 
}

?>

<html>
<head>
<title>Welcome Student #<?php echo $_SESSION["stuid"];?></title>
<link rel="stylesheet" href="fac_index_style.css">
</head>

<body>
	<center>
	<div id="maindiv">
		<div id="head">
			<div id="head_content">
				Welcome Student #<?php echo $_SESSION["stuid"];?>
			</div>			
		</div>
		<div id="action">
			<table class="a">
				<tr class="a">
					<td class="a"><a href="scanattend.php">Scan QR code for attendance</a></td>
				</tr>
				<tr class="a">
					<td class="a"><a href="viewattendance_stud.php">View Attendance</a></td>
				</tr>
			</table>
			
			<table class="b">
			<tr class="b">
				<td class="b">
					<div id="logout">
						<div id="logout_content">
							<a href="stu_logoutwodany.php">Logout</a>
						</div>
					</div>
				</td>
			</tr>
			</table>
			<table>
		</div>
	</div>
	</center>
</body>

</html>