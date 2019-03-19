<?php
	session_start();
	require ("database.php");
  ?>

<?php
	$query1 = "SELECT REPORT_TYPE,ID_TIPE FROM REPORT_TYPE";
	$selectDB = mysqli_query($conn,$query1);
	$reportButton = isset($_POST['reportButton']) ? $_POST['reportButton'] : '';
	$i= 0;
	while ($row = mysqli_fetch_array($selectDB)) {
		# code...
		$i++;
		$REPORT_TYPE[$i] = $row['REPORT_TYPE'];
		$REPORT_ID[$i] = $row['ID_TIPE'];
	}
  ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="report.css">
</head>
<body>
	<a href="homePage.php"> < < back to homepage</a>
	<center>
		<img src="https://png.icons8.com/metro/1600/doctor-fate-helmet.png">
		<h3>We Always Protect Our Friend!!</h3>
		<h2>but becarefull with your pencil!</h2>
		<form method="post" action="homePage.php">
			<select name="reportOption">
				<?php
					for ($i=1; $i <= sizeof($REPORT_TYPE) ; $i++) { ?>
						<option value="<?php echo $REPORT_ID[$i]?>"> <?php echo $REPORT_TYPE[$i] ?></option>
				<?}?>
			</select>
			<br>
			<br>
			<textarea name="reportC"></textarea>
			<br>
			<button name="reportClick" value="<?php echo $reportButton ?>">Report</button>
		</form>
	</center>
</body>
</html>