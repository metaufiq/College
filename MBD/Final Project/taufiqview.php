<?php
	session_start();
	require ("database.php");

	$querry = "SELECT * FROM(SELECT A1.USERNAME, A1.Total_like FROM ( SELECT COUNT(TRANSAKSI_DIARY.ID_DIARY) AS Total_like, USER.`USERNAME` FROM TRANSAKSI_DIARY, USER, DIARY, TYPE WHERE TRANSAKSI_DIARY.ID_TYPE = '100' AND USER.ID_USER = DIARY.ID_USER AND DIARY.ID_DIARY=TRANSAKSI_DIARY.ID_DIARY AND TYPE.`ID_TYPE`=TRANSAKSI_DIARY.`ID_TYPE` GROUP BY USER.ID_USER) A1 ORDER BY A1.Total_like DESC) A2 LIMIT 5";
	$run = false;
	$_SESSION["username"]= isset($_SESSION["username"]) ? $_SESSION["username"] : '';


	if ($querry) {
		# code...
		$run=mysqli_query($conn,$querry);

		$i = 0;
		while ($row = mysqli_fetch_array($run)) {
			# code...
			$i++;
			$USERNAME[$i] = $row['USERNAME'];
			$Total_like[$i] = $row['Total_like'];
		}
	}
  ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="taufiqview.css">
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
					<li><a>TAUFIQ</a></li>
				</ul>
				<h4>TRIGER</h4>
				<ul>
					<li><a href="puguhtrigger.php">PUGUH</a></li>
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
				<h3>5 most likeable user are:</h3>
				<?php
					for ($i=1; $i <= sizeof($USERNAME) ; $i++) { 
						# code...?>
						<h5><?php echo $USERNAME[$i] ?>(<?php echo $Total_like[$i] ?>)</h5>
					<?}
				  ?>
					
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