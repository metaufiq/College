<?php
	session_start();
	require("database.php");


	$newUsername = isset($_POST['newUsername']) ? $_POST['newUsername'] : '';
	$newEmail = isset($_POST['newEmail']) ? $_POST['newEmail'] : '';
	$newPassword = isset($_POST['newPassword']) ? $_POST['newPassword'] : '';
	$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
	$insertDB = true;

	if ($newUsername!="") {
		# code...
		$query = "INSERT INTO USER VALUES(DEFAULT,'1111','$newUsername', '$newEmail', '$newPassword', '$gender')";
		$insertDB = mysqli_query($conn, $query);
	}
	
  ?>



<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="accountCreated.css">
	<title></title>
</head>
<body>
	<?php
	if (!$insertDB && $newUsername!="") {
		# code...
		?>
		<center>
			<div id="err">
				<h1>:(</h1>
				<h3>Cannot Create Your Account because the username has been taken</h3>
				<a href="loginPage.php">SignIn again?</a>
			</div>
		</center>
	<?}
	
	elseif ($newUsername == "") {
		# code...
		?>
		<center>
			<div id="err">
				<h1>HI!</h1>
				<h3>To access this page you need to create account or login with your account</h3>
				<a href="loginPage.php"><font class="link">Login</font></a>
			</div>
		</center>
	<?}
	
	else{
		# code...
		$_SESSION["username"] = $newUsername;

		?>
		<center>
			<div id="err">
				<h1>WELCOME!</h1>
				<h3>Your account has been created,please enjoy your day!</h3>
				<a href="homePage.php">StartWriting</a>
			</div>
		</center>
	<?}

		?>
</body>
</html>