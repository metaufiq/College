<?php
	session_start();
	require ("database.php");

	$querry = isset($_POST["sql"]) ? $_POST["sql"] : '';
	$run = false;
	$_SESSION["username"]= isset($_SESSION["username"]) ? $_SESSION["username"] : '';


	if ($querry) {
		# code...
		$run=mysqli_query($conn,$querry);
	}
  ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="puguhtrigger.css">
</head>
<body>
	<?php
		if ($_SESSION["username"] == "dosen") {
			# code...
			if ($run && $querry!= '') {
			# code...?>
				<div id="success">
					<p>querry success</p>
				</div>
				<br>
				<br>
			<?}
			elseif (!$run && $querry!= '') {
				# code...?>
				<div id="fail">
					<p style="color: red;">querry fail</p>
				</div>
				<br>
				<br>
			<?}
		?>
			<div id="toolbar">
				<header>
					<H3>SQL MENU</H3>
				</header>
				<h4>View</h4>
				<ul>
					<li><a href="puguhview.php">PUGUH</a></li>
					<li><a href="taufiqview.php">TAUFIQ</a></li>
				</ul>
				<h4>TRIGER</h4>
				<ul>
					<li><a>PUGUH</a></li>
					<li><a href="taufiqtrigger.php">TAUFIQ</a></li>
				</ul>
				<H4>PROCEDURE</H4>
				<ul>
					<li><a href="puguhprocedure.php">PUGUH</a></li>
					<li><a href="taufiqprocedure.php">TAUFIQ</a></li>
				</ul>
				<H4>FUNCTION</H4>
				<ul>
					<li><a href="">PUGUH</a></li>
					<li><a href="">TAUFIQ</a></li>
				</ul>
				<H4>JOIN</H4>
				<ul>
					<li><a href="puguhjoin.php">PUGUH</a></li>
					<li><a href="taufiqjoin.php">TAUFIQ</a></li>
				</ul>
				<H4>CURSOR</H4>
				<ul>
					<li><a href="puguhcursor.php">PUGUH</a></li>
					<li><a href="taufiqcursor.php">TAUFIQ</a></li>
				</ul>
			</div>
			<center>	
			<section>
				<h3>cannot display this demo.</h3>
			</section>
			</center>

			<div id="bottom">
				<a href="homePage.php">HomePage</a>
			</div>
		<?}
		else{?>
			<center>
				<div id="err">
					<h1>YOU DON`T HAVE AUTHORY IN THIS PAGE!</h1>
					<h3>To access this page you need to login as an admin</h3>
				</div>
			</center>
		<?}?>
		
</body>
</html>