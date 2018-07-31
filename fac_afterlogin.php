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
<title>Welcome Faculty #<?php echo $_SESSION['facid'];?></title>
<link rel="stylesheet" href="fac_index_style.css">
</head>

<body>
	<center>
	<div id="maindiv">
		<div id="head">
			<div id="head_content">
				Welcome Faculty #<?php echo $_SESSION['facid'];?>
			</div>			
		</div>
		<div id="action">
			<table class="a">
				<tr class="a">
					<td class="a"><a href="faculty_createQR.php">Generate QR code for attendance</a></td>
				</tr>
				<tr class="a">
					<td class="a"><a href="viewattendance_fac.php">View Attendance</a></td>
				</tr>
				<tr class="a">
					<td class="a"><a href="modifyattendance.php">Modify Attendance</a></td>
				</tr>
			</table>
			
			<table class="b">
			<tr class="b">
				<td class="b">
					<div id="logout">
						<div id="logout_content">
							<a href="fac_logoutwodany.php">Logout</a>
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