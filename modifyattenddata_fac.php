<?php

session_start();

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="qrattendance";
$connect = new mysqli("$servername",$username,$password,$dbname);  

if(isset($_POST['submit']))
{
	$sid = $_POST['sid'];
	$slot = $_POST['slot'];
	$date = $_POST['date'];
	$attend = $_POST['attend'];
	
	$fid=$_SESSION['facid'];
		
	$checkforstu = "select * from slogin where sid='$sid' ";
	$res_check = mysqli_query($connect,$checkforstu);
	$rowcount_check=mysqli_num_rows($res_check);	
	if($rowcount_check==0)
	{
		echo "
				<script>
					alert('There is no such student.');
					window.location.href='fac_afterlogin.php';
				</script>
				";
	}
	else
	{
		$sql = "select * from attendance_post where fid='$fid' and slot='$slot' and date='$date' and sid='$sid' ";
		$res = mysqli_query($connect,$sql);
		$rowcount=mysqli_num_rows($res);
		if($rowcount==0)
		{
			if($attend=='p')
			{
				$modify = "insert into attendance_post values ('$sid','$fid','$slot','$date','p') ";
				if($connect->query($modify)==true)
				{
					echo "
					<script>
						alert('Attendance modified successfully.');
						window.location.href='fac_afterlogin.php';
					</script>
					";
				}
			}
		}
		else
		{
			if($attend=='a')
			{
				$modify = "delete from attendance_post where attend='p' and fid='$fid' and slot='$slot' and date='$date' and sid='$sid' ";
				if($connect->query($modify)==true)
				{
					echo "
					<script>
						alert('Attendance modified successfully.');
						window.location.href='fac_afterlogin.php';
					</script>
					";
				}
			}
		}
	}
}

?>

<html>
<head>
	<title>Modify Attendance</title>
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