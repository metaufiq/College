<?php
	session_start();
	require ("database.php");

	$share =  'L';
	$diary = isset($_POST["diary"]) ? $_POST["diary"] : '';
	$username = isset($_SESSION["username"]) ? $_SESSION["username"] : '';
	$IDUser = isset($_SESSION["IDUser"]) ? $_SESSION["IDUser"] : '';
	$day1 = '';
	$day1 = strtotime($_POST["date"]);
	$day1 = date('Y-m-d H:i:s', $day1);
	$Tittle = isset($_POST["Tittle"]) ? $_POST["Tittle"] : '';
	$genre = isset($_POST["genre"]) ? $_POST["genre"] : '';

  ?>



<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="LorG.css">
</head>
<body>
	
<center>
	<h1>Global or Local Share?</h1>

	<form method="post" action="homePage.php">
		<button id="global" name= "share" value="G">
			<center>
				<img src="https://cdn.iconscout.com/public/images/icon/free/png-512/earth-global-globe-international-map-planet-world-31f086acb2c23d8b-512x512.png">
				<br>
				<br>
				<p><b>share with the world what you just write and make them inspired by you</b></p>
			</center>
		</button>
			
		<button id="local"  name="share" value="L">
			<center>
				<img src="http://wfarm4.dataknet.com/static/resources/icons/set74/f5fc1545.png">
				<br>
				<br>
				<p><b>keep what your writing by yourself,to make sure no one knows about your secret</b></p>
			</center>
		</button>
	</form>		
	</center>

	<?php
		if ($diary != "") {
			# code...
			$sql = "INSERT INTO DIARY VALUES(DEFAULT,'$IDUser', '$genre' ,'$Tittle','$diary', '$share','$day1')";
			$insertDB = mysqli_query($conn,$sql);

			$_SESSION["diary"] = $diary;
		}
	  ?>
</body>
</html>