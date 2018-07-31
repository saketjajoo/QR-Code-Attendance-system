<?php

session_start();

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="qrattendance";
$connect = new mysqli("$servername",$username,$password,$dbname);  

$sid=$_POST['sid'];
$spass=$_POST['spass'];

$q = "SELECT * FROM slogin WHERE sid = '$sid'";

$connect->query($q);
$result = mysqli_query($connect,$q);
$row = mysqli_fetch_array($result); 

if($row['spass']===$spass)
{
	$_SESSION["stuid"] = $sid;
	header("Location:stu_afterlogin.php");
}
else
{
	header("Location:studentlogin.html"); 
}

?>