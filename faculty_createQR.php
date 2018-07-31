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
	<title>QR Code for Attendance</title>
	<link rel="stylesheet" href="faculty_createQR_style.css">
</head>

<body>
	<center>
	<div id="mainheader">
		<div id="mainheader_content">
			Create a QR code for Attendance
		</div>
		<div id="logout" style="float:right;position:relative;top:-140px;">
			<div id="logout_content">
				<form method="post" action="logout.php">
				<input type="hidden" name="fidlog" id="fidlog">
				<input type="hidden" name="slotlog" id="slotlog">
				<input type="hidden" name="datelog" id="datelog">
				<input type="hidden" name="qrcodedata" id="qrcodedata">
				<input type="hidden" name="starttime" id="starttime">
				<input type="hidden" name="stoptime" id="stoptime">
				<button type="submit" value="submit" id="submit" style="position:relative;top:130px;float:right;background:transparent;border:2px solid black;border-radius:5px;font-size:17px;padding:12px;cursor:pointer;">Logout</button>
			</form>
			</div>
		</div>
	</div>
	
	<div id="data_qr">
		<table>
			<tr>
				<td>Faculty Id :</td>
				<td><input type="text" id="fid" value="<?php echo $_SESSION['facid'];?>" name="fname" placeholder="Faculty Id" class="inputfields" readonly required></td>
			</tr>
			<tr>
				<td>Slot :</td>
				<td><input type="text" id="slot" name="slot" placeholder="Slot" class="inputfields" required></td>
			</tr>
			<tr>
				<td>Date :</td>
				<td><input type="date" id="date" name="date" placeholder="Date" class="inputfields" required></td>
			</tr>
		</table>
	</div>
  
	<button type="submit" style="border-radius:7px;border:2px solid black;height:35px;width:100px;cursor:pointer;color:white;background-color:black;" id="genera" name="sub_qr" onclick="genQRcode()">Generate</button>
	</br></br></br>
  
			<div id="content">
			<p><img id="qrcode" src="" /></p>
		</div>	
		
		<button style="border-radius:7px;border:2px solid black;position:relative;top:150px;height:35px;width:150px;cursor:pointer;color:black;font-size:18px;background-color:none;" id="back_btn" name="back_qr" onclick="goback()">Go Back</button>
	</center>
</body>

	<script>  
	
		function goback()
		{
			window.location.href = "fac_afterlogin.php";
		}
			
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1;
		var yyyy = today.getFullYear();

		if(dd<10) 
		{
			dd = '0'+dd;
		} 
		if(mm<10) 
		{
			mm = '0'+mm;
		} 
		today = yyyy + '-' + mm + '-' + dd;
	
		var fid = document.getElementById("fid");
		var slot = document.getElementById("slot");
		var date = document.getElementById("date");
		document.getElementById("date").value=today;
		var rno = Math.floor(Math.random() * 999999) + 100000;
		
		var content = document.getElementById("content");  

		function genQRcode() 
		{
			if((slot.value=='') || (date.value==''))
			{
				window.location.href='faculty_createQR.php';
			}
			else
			{
				var d = new Date();
				document.getElementById("starttime").value = d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
				document.getElementById("stoptime").value = d.getHours()+":"+(d.getMinutes()+1)+":"+d.getSeconds();				
				
				document.getElementById("data_qr").style.display='none';
				var qr_text = rno+"_"+fid.value+"_"+date.value+"_"+slot.value;
				var qrdata = qr_text;
				document.getElementById('fidlog').value = <?php echo $_SESSION['facid'];?>;
				document.getElementById('slotlog').value = slot.value;
				document.getElementById('datelog').value = date.value;
				document.getElementById('qrcodedata').value = qrdata;
				
				var data = encodeURIComponent(qr_text),
				size = 300,
				chart = "http://chart.googleapis.com/chart?cht=qr&chs=" + size + "x" + size + "&choe=UTF-8&chld=L|0&chl=" + data;
				if (data === "") 
				{
					alert("Please enter a valid data!");
					document.getElementById("fid").focus();
					content.style.display = "none";
				} 
				else 
				{
					content.style.display = "";
					document.getElementById("qrcode").src = chart;
					document.getElementById("qrcode-url").value = chart;
				}
			}
		}
		
		document.addEventListener("keydown", function(e) 
		{
			if (e.ctrlKey && e.keyCode == 13) 
			{
				genQRcode();
			}
		});
		
	</script>
	



</html>