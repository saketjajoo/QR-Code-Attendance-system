<?php

session_start();

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="qrattendance";
$connect = new mysqli("$servername",$username,$password,$dbname); 

$fid=$_POST['fidlog'];
//$fid = $_SESSION['facid'];
$slot=$_POST['slotlog'];
$date=$_POST['datelog'];
$qrdata=$_POST['qrcodedata'];
$starttime=$_POST['starttime'];
$stoptime=$_POST['stoptime'];

if($fid=='' || $slot=='' || $date=='' || $qrdata=='')
{
	session_unset();
	session_destroy();
	echo "
	<script>
		alert('Logout Successful.');
		window.location.href='facultylogin.html';
	</script>
	";
}

else
{
	$flag=0;
	$check = "SELECT * FROM qrdata";
	$query = mysqli_query($connect,$check);
	while($row = mysqli_fetch_assoc($query))
	{
		if((($row['slot']==strtolower($slot)) || ($row['slot']==strtoupper($slot))) && ($row['date']==$date))
		{
			$flag=1;
			break;
		}
		else
		{
			$flag=0;
		}
	}	
	
	if($flag!=1)
	{
		$sql = "INSERT INTO qrdata VALUES ('$fid','$slot','$date','$qrdata','$starttime','$stoptime')";
		if($connect->query($sql)===TRUE)
		{
			session_unset();
			session_destroy();
			echo "
			<script>
				alert('Logout Successful.');
				window.location.href='facultylogin.html';
			</script>
			";
		}
	}
	else
	{
		session_unset();
		session_destroy();
		echo "
		<script>
			alert('Attendance is already done for this slot.');
			window.location.href='facultylogin.html';
		</script>
		";
	}
}
?>