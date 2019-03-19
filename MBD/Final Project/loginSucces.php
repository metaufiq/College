<?php
	session_start();
	require("database.php");

	$username = isset($_POST['Username']) ? $_POST['Username'] : '';
	$selectDB = true;
  ?>


<?php
	$query = "SELECT USERNAME,ID_USER FROM USER WHERE USERNAME = '$username'";
	$selectDB = mysqli_query($conn,$query);

	$i = 0;
	while ($row = mysqli_fetch_array($selectDB)) {
		# code...
		$IDUser = $row['ID_USER'];
		$i++;
	}
  ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="loginSucces.css">
</head>
<body>
	<?php
	if ($i == 0) {?>
		<center>
			<div id="err">
				<h1>:(</h1>
				<h3>404: account did not found</h3>
				<a href="loginPage.php">LoginPage</a>
			</div>
		</center>
		
	<?}
	else{
		$_SESSION["username"]=$username;
		$_SESSION["IDUser"] = $IDUser;
		?>
		<center>
			<div id="err">
				<h1>HI,<?php echo $username ?> !</h1>
				<h1>WELCOME BACK! </h1>
				<a href="homePage.php">StartWriting</a>
			</div>
		</center>

	<?}
	?>

</body>
</html>