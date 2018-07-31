<?php

session_start();

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="qrattendance";
$connect = new mysqli("$servername",$username,$password,$dbname); 

session_unset();
unset($_SESSION['stuid']);
session_destroy();
echo "
	<script>
		alert('Logout Successful.');
		window.location.href='studentlogin.html';
	</script>
	";
?>