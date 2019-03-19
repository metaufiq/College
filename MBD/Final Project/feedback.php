<?php
	session_start();
  ?>

<?php
	require ("database.php");
	$username = $_SESSION["username"];
	$IDUser = $_SESSION["IDUser"];
	$query1 = "SELECT * FROM TRANSAKSI_DIARY WHERE ID_DIARY IN(SELECT ID_DIARY FROM DIARY WHERE ID_USER = '$IDUser') AND ID_TYPE=200";
	$selectDB = mysqli_query($conn,$query1);

	$i=0;
	while ($row = mysqli_fetch_array($selectDB)) {
		# code...
		$i++;
		$ID_DIARY[$i]= $row['ID_DIARY'];
		$IDUserCommented[$i] = $row['ID_USER_OTHER'];
		$Comment[$i] = $row['KETERANGAN'];
		$DATE[$i] = $row['DATE'];
		
		$query2 = "SELECT ID_DIARY,JUDUL,CONTENT FROM DIARY WHERE ID_DIARY = '$ID_DIARY[$i]'";
		$selectDB2 = mysqli_query($conn,$query2);
		while ($row2 = mysqli_fetch_array($selectDB2)) {
			# code...
			$JUDUL[$i] = $row2['JUDUL'];
		}

		$query3 = "SELECT ID_USER,USERNAME FROM USER WHERE ID_USER = '$IDUserCommented[$i]'";
		$selectDB3 = mysqli_query($conn,$query3);
		while ($row3 = mysqli_fetch_array($selectDB3)) {
			# code...
			$UserCommented[$i] = $row3['USERNAME'];  
		}
	}

  ?>



<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="feedback.css">
	<title></title>
</head>
<body>
	<header>
			<div>
				<font style="color: white">WriteYourStory[SUPER_USER]</font>
				<img src="http://downloadicons.net/sites/default/files/search-icon-8872.png">
				<form method="post" action="">
					<input type="text" name="search" placeholder="searchUser">
				</form>
			</div>
	</header>
	
	<img src="https://cdn3.iconfinder.com/data/icons/dental-blue-icons/512/Untitled-6.png" id="book">
	<div>
		<div id="user">
			<center>
				<img src="https://cdn0.iconfinder.com/data/icons/users-groups-1/512/user_edit-512.png">
				<h3><?php echo $_SESSION["username"]  ?></h3>
				<a href="loginPage.php">logout</a>
			</center>
			<br>
			<br>
			<?php
				if ($username == "dosen") {?>
					<h3>Menu [SUPER_USER]</h3>
			
					<ul>
						<li><a href="editSQL.php">EditViaSQL</a></li>
					</ul>

				<?}
			 ?>
				<br>
				<h3>Menu</h3>
			
			<ul>
				<li><a href="homePage.php">World</a></li>
				<li><a href="readDiary.php">Read Your Own Story</a></li>
				<li><a href="write.php">Write</a></li>
				<li><a>feedback</a></li>
			</ul>
		</div>
		<?php
			$var = "isi disini";
			for ($i=1; $i <= sizeof($ID_DIARY); $i++) { 
				# code...?>
				<div id="commentList">
					<span><?php echo $UserCommented[$i] ?> comment on this Diary <b><?php echo $JUDUL[$i] ?></b>, </span>
					<span>"<i><?php echo $Comment[$i] ?></i>"</span>
					 <span><b> On <?php echo $DATE[$i] ?></b></span> 
				</div>
			<?}

		  ?>
	</div>
</body>
</html>