<?php
	session_start();
	require ("database.php");

	$querry = "CALL anjing(2)";
	$run = false;
	$_SESSION["username"]= isset($_SESSION["username"]) ? $_SESSION["username"] : '';


	if ($querry) {
		# code...
		$run=mysqli_query($conn,$querry);

		$i = 0;
		while ($row = mysqli_fetch_array($run)) {
			# code...
			$i++;
			$G_DESCRIPT[$i] = $row['G_DESCRIPT'];
			$TOTAL_DIARY[$i] = $row['TOTAL_DIARY'];
		}
	}
  ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="puguhprocedure.css">
</head>
<body>
	<?php
		if ($_SESSION["username"] == "dosen") {
			# code...
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
					<li><a href="puguhtrigger.php">PUGUH</a></li>
					<li><a href="taufiqtrigger.php">TAUFIQ</a></li>
				</ul>
				<H4>PROCEDURE</H4>
				<ul>
					<li><a>PUGUH</a></li>
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
				<h3>all genre that have more than 2 posting:</h3>
				<?php
					for ($i=1; $i <= sizeof($G_DESCRIPT) ; $i++) { ?>
							<h5> <?php echo $G_DESCRIPT[$i] ?> (<?php echo $TOTAL_DIARY[$i] ?>) </h5>
						<?}?>	
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