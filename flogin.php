<?php

session_start();

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="qrattendance";
$connect = new mysqli("$servername",$username,$password,$dbname);  

$fid=$_POST['fid'];
$fpass=$_POST['fpass'];

$q = "SELECT * FROM flogin WHERE fid = '$fid'";

$connect->query($q);
$result = mysqli_query($connect,$q);
$row = mysqli_fetch_array($result); 

if($row['fpass']===$fpass)
{
	$_SESSION["facid"] = $fid;
	header("Location:fac_afterlogin.php"); 
}
else
{
	header("Location:facultylogin.html"); 
}

?>