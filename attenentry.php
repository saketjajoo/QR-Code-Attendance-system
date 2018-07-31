<?php

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="qrattendance";
$connect = new mysqli("$servername",$username,$password,$dbname); 
session_start(); 

	$qr=$_POST['qrdat'];
	echo $qr;
	if($qr!='')
	{
		$rn = substr($qr,0,6);
		$fid = substr($qr,7,3);
		$date = substr($qr,11,10);
		$slot = substr($qr,22);
		$sid = $_SESSION['stuid'];
		
		$dupli = "select * from attendance_post where fid='$fid' and slot='$slot' and date='$date' and sid='$sid' ";
		$res = mysqli_query($connect,$dupli);
		$rowcount = mysqli_num_rows($res);
		if($rowcount>0)
		{
			echo "
				<script>
				alert('Attendance already posted.');
				window.location.href = 'stu_afterlogin.php';
				</script>
				";
		}
		else
		{
			$check = "select * from qrdata where fid='$fid' and slot='$slot' and date='$date' ";
			$sid = $_SESSION['stuid'];
			$result = mysqli_query($connect,$check);
			$row = mysqli_fetch_assoc($result);
			if( ($row['fid'] == $fid) and ($row['slot'] == $slot) and ($row['date'] == $date) and (substr($row['qrcode'],0,6) == $rn) )
			{
				$sql = "insert into attendance_post values ('$sid','$fid','$slot','$date','p')";
				if($connect->query($sql)==true)
				{
					echo "
					<script>
					alert('Attendance posted successfully.');
					window.location.href = 'stu_afterlogin.php';
					</script>
					";
				}
			}
		}
	}
	else
	{
		echo "
		<script>
		alert('QR code scan not complete. Please try again.');
		window.location.href = 'stu_afterlogin.php';
		</script>
		";
	}
?>