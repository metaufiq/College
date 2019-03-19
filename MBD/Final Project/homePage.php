<?php
	session_start();
	require ("database.php");

	$_SESSION["username"]= isset($_SESSION["username"]) ? $_SESSION["username"] : '';
	$_SESSION["diary"] = isset($_SESSION["diary"]) ? $_SESSION["diary"] : '';


	$selectDB = true;
	$share = isset($_POST["share"]) ? $_POST["share"] : '';
	$username = $_SESSION["username"];
	$IDUser = isset($_SESSION["IDUser"]) ? $_SESSION["IDUser"]: '';
	$diary = isset($_SESSION["diary"]) ? $_SESSION["diary"] : '';
	$search = isset($_POST["search"]) ? $_POST["search"] : '';
	$type = -1;
	$like = isset($_POST["like"]) ? $_POST["like"] : '';
	$comment = isset($_POST["comment"]) ? $_POST["comment"] : '';
	$submitComment = isset($_POST["submitComment"]) ? $_POST["submitComment"] : '';
	
	$reportClick = isset($_POST["reportClick"]) ? $_POST["reportClick"] : '';
	$reportC = isset($_POST["reportC"]) ? $_POST["reportC"] : '';
	$reportOption = isset($_POST["reportOption"]) ? $_POST["reportOption"] : '';
	if($reportClick !="") {
		# code...
		$query1 = "INSERT INTO REPORT VALUES(DEFAULT, '$reportClick', '$reportOption', '$reportC')";
		$insertDB = mysqli_query($conn,$query1);
	}

	if ($submitComment != "") {
		# code...
		$query1 = "INSERT INTO TRANSAKSI_DIARY VALUES(DEFAULT, '$submitComment', '200', '$IDUser', '$comment', CURDATE() )";
		$insertDB = mysqli_query($conn,$query1);
	}

	if ($like!= "") {
		# code...
		$query1 = "INSERT INTO TRANSAKSI_DIARY VALUES(DEFAULT, '$like', '100', '$IDUser', NULL, CURDATE() )";
		$insertDB = mysqli_query($conn,$query1);
	}

	if ($search!= "") {
		# code...
		$query1 = "SELECT * FROM DIARY WHERE SHARE = 'G' AND ID_USER IN(
				SELECT ID_USER FROM USER WHERE USERNAME = '$search'
			) ORDER BY 'ID_DIARY' DESC";
		$selectDB = mysqli_query($conn,$query1);

		$search = '';
	}
	else{
		$query1 = "SELECT * FROM DIARY WHERE SHARE = 'G' ORDER BY 'ID_DIARY' DESC";
		$selectDB = mysqli_query($conn,$query1);
	}


	if ($share!= "") {
		# code...
		$sql = "UPDATE DIARY SET SHARE = '$share' WHERE ID_USER = '$IDUser' AND CONTENT = '$diary'";
		$updateDB = mysqli_query($conn,$sql);

		$_SESSION["diary"]='';
	}


	$i = 0;
	while ($row = mysqli_fetch_array($selectDB)) {
		# code...
		$i++;

		$storyIdGlobal[$i] = $row['ID_DIARY'];
		$IDUser = $row['ID_USER'];
		$titleGlobal[$i] = $row['JUDUL'];

		$query2 = "SELECT USERNAME FROM USER WHERE ID_USER = '$IDUser'";
		$selectDB2 = mysqli_query($conn,$query2);
		while ($row2 = mysqli_fetch_array($selectDB2)) {
			# code...
			$usernameGlobal[$i] = $row2['USERNAME'];
		}


		$query3 = "SELECT COUNT(ID_TRANSAKSI) AS totallike FROM TRANSAKSI_DIARY WHERE ID_TYPE = '100' AND ID_DIARY = '$storyIdGlobal[$i]' ";
		$selectDB3 = mysqli_query($conn,$query3);
		while ($row3 = mysqli_fetch_array($selectDB3)) {
			# code...
			$totallike[$i] = $row3['totallike'];
		}

		$query4 = "SELECT COUNT(ID_TRANSAKSI) AS totalComment FROM TRANSAKSI_DIARY WHERE ID_TYPE = '200' AND ID_DIARY = '$storyIdGlobal[$i]' ";
		$selectDB4 = mysqli_query($conn,$query4);
		while ($row4 = mysqli_fetch_array($selectDB4)) {
			# code...
			$totalComment[$i] = $row4['totalComment'];
		}

		$diaryGlobal[$i] = $row['CONTENT'];
	}


  ?>



<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="homePage.css">
	<title></title>
</head>
<body>
	<?php

		if ($_SESSION["username"] == "dosen") {
			# code...?>
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
					<h3>Menu [SUPER_USER]</h3>
			
					<ul>
						<li><a href="editSQL.php">EditViaSQL</a></li>
					</ul>
					<br>
					<h3>Menu</h3>
			
					<ul>
						<li><a>World</a></li>
						<li><a href="readDiary.php">Read Your Own Story</a></li>
						<li><a href="write.php">Write</a></li>
						<li><a href="feedback.php">feedback</a></li>
					</ul>
				</div>
			</div>

		<?
			if ($i>0) {
				# code...
				for ($i=1; $i <= sizeof($usernameGlobal) ; $i++) { 
					# code...
				?>
		
					<div id="posting" style="margin-top: 20px;">
						<h3><?php echo $titleGlobal[$i] ?></h3>
						<?php echo $diaryGlobal[$i] ?>
						<br><br><br>
						<p id="writer">writen by: </p> <?php echo $usernameGlobal[$i] ?><br>
						<div id="likeunlike">
							<form method="post" action="">
								<button name="like" value="<?php echo $storyIdGlobal[$i] ?>" style="color: green;">like ( <?php echo $totallike[$i] ?> )</button>
								<span> | </span>
								<span style="margin-left: 5px;">comment ( <?php echo $totalComment[$i] ?> )</span>
							</form>
						</div>
						<form method="post" action="report.php" id="report">
								<button name="reportButton" style="color: red;" value="<?php echo $storyIdGlobal[$i] ?>">Report</button>
							</form>
						<img src="http://icons.iconarchive.com/icons/martz90/circle/512/books-icon.png">
					</div>

					<form id= "comment" method="post" action="">
						<textarea name="comment" placeholder="put your comment here. . ." ></textarea>
						<button name="submitComment" value="<?php echo $storyIdGlobal[$i] ?>" > send </button>
					</form>
			
				<?
					//$return_arr = array("likes"=>$likesGlobal[$i],"unlikes"=>$dislikeGlobal[$i]);
					//echo json_encode($return_arr);
				}

			}

		}

		else if ($_SESSION["username"]) {?>
			<header>
				<div>
					<font style="color: white">WriteYourStory</font>
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
					<h3>Menu</h3>
			
					<ul>
						<li><a>World</a></li>
						<li><a href="readDiary.php">Read Your Own Story</a></li>
						<li><a href="write.php">Write</a></li>
						<li><a href="feedback.php">feedback</a></li>
					</ul>
				</div>
			</div>

		<?
		if ($i>0) {
			# code...
			for ($i=1; $i <= sizeof($usernameGlobal) ; $i++) { 
			# code...
				
			?>
		
					<div id="posting" style="margin-top: 20px;">
						<h3><?php echo $titleGlobal[$i] ?></h3>
						<?php echo $diaryGlobal[$i] ?>
						<br><br><br>
						<p id="writer">writen by: </p> <?php echo $usernameGlobal[$i] ?><br>
						<div id="likeunlike">
							<form method="post" action="">
								<button name="like" value="<?php echo $storyIdGlobal[$i] ?>" style="color: green;">like ( <?php echo $totallike[$i] ?> )</button>
								<span> | </span>
								<span style="margin-left: 5px;">comment ( <?php echo $totalComment[$i] ?> )</span>
							</form>
						</div>
						<form method="post" action="report.php" id="report">
								<button name="reportButton" style="color: red;" value="<?php echo $storyIdGlobal[$i] ?>">Report</button>
							</form>
						<img src="http://icons.iconarchive.com/icons/martz90/circle/512/books-icon.png">
					</div>

					<form id= "comment" method="post" action="">
						<textarea name="comment" placeholder="put your comment here. . ." ></textarea>
						<button name="submitComment" value="<?php echo $storyIdGlobal[$i] ?>" > send </button>
					</form>
			
			<?
				//$return_arr = array("likes"=>$likesGlobal[$i],"unlikes"=>$dislikeGlobal[$i]);
				//echo json_encode($return_arr);
			}

		}

	}
		else{?>
			<center>
				<div id="err">
					<h1>HI!</h1>
					<h3>To access this page you need to create account or login with your account</h3>
					<a href="loginPage.php"><font class="link">Login</font></a>
				</div>
			</center>
		<?}


	  ?>

</body>
</html>