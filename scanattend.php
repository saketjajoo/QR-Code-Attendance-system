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
	<title>Attendance Scanning</title>
	<style>  
		@import url('https://fonts.googleapis.com/css?family=Lobster');
		@import url('https://fonts.googleapis.com/css?family=Rokkitt');
		body
		{
			background-color:#f2f2f2;
		}
		#maindiv
		{
			position:relative;
			top:70px;
		}
		#head
		{
			position:relative;
			padding:25px;
		}
		#head_content
		{
			position:relative;
			font-family: 'Lobster', cursive;
			font-size:45px;
			letter-spacing:2px;
			padding-bottom:30px;
			border-bottom:2px solid #cccccc;
		}
		#login
		{
			padding:0px;
		}
		#login_content
		{
			padding:20px;
		}
		table,tr,td
		{
			padding:20px;
		}
		td
		{	
			width:250px;
			font-family: 'Rokkitt', serif;
			font-size:30px;
		}
		input#submit
		{
			top:100px;
			position:relative;
			width:200px;
			background:transparent;
			border:2px solid;
			padding:10px;
			font-size:25px;
			cursor:pointer;
		}
		input#submit:hover
		{
			background-color:#b3b3b3;
		}
		
		body, input {font-size:14pt}
		input, label {vertical-align:middle}
		.qrcode-text {padding-right:1.7em; margin-right:0}
		.qrcode-text-btn {display:inline-block; background:url(//dab1nmslvvntp.cloudfront.net/wp-content/uploads/2017/07/1499401426qr_icon.svg) 50% 50% no-repeat; height:1em; width:1.7em; margin-left:-1.7em; cursor:pointer}
		.qrcode-text-btn > input[type=file] {position:absolute; overflow:hidden; width:1px; height:1px; opacity:0}
		
	</style>
	
	<!--<script src='https://dmla.github.io/jsqrcode/src/qr_packed.js'></script>-->
	
</head>

<body>
	<center>	
		<div id="head">
			<div id="head_content">
				Attendance Scanning
			</div>
		</div>
	
		<form method="post" action="attenentry.php">
			<input type="hidden" size=16 id="qrtext" name="qrdat" value="" readonly class=qrcode-text>
			<label class=qrcode-text-btn><input type=file accept="image/*" capture=environment onclick="return showQRIntro();" onchange="openQRCamera(this);" tabindex=-1></label> 
			<input type="submit" value="submit" name="submit" id="submit">
		</form>
	</center>
	
	<script type="text/javascript" src="tp.js"></script>  
    <script  src="index.js"></script>
	
</body>
</html>
