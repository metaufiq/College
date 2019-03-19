<?php
	session_start();
	require ("database.php");

	$_SESSION["username"]= isset($_SESSION["username"]) ? $_SESSION["username"] : '';
	$selectDB = true;
	$updateDB = true;
	$deleteDB = true;
	$share = isset($_POST["share"]) ? $_POST["share"] : '';
	$username = $_SESSION["username"];
	$diary = $_SESSION["diary"];
	$IDUser = $_SESSION["IDUser"];

	$query1 = "SELECT * FROM DIARY WHERE ID_USER = '$IDUser'";
	$selectDB = mysqli_query($conn,$query1);

	$search = isset($_POST["search"]) ? $_POST["search"] : '';
	$delete = isset($_POST["delete"]) ? $_POST["delete"] : '';


	if ($delete!= "") {
		# code...
		$query1 = "DELETE FROM DIARY WHERE CONTENT = '$delete'";
		$deleteDB = mysqli_query($conn,$query1);

		$delete = '';
	}

	if ($search!= "") {
		# code...
		$query1 = "SELECT * FROM DIARY WHERE SHARE = 'G'";
		$selectDB = mysqli_query($conn,$query1);
		$message = "wrong answer";
		$search = '';
	}


	$i = 0;

	while ($row = mysqli_fetch_array($selectDB)) {
		# code...
		$i++;

		$usernameGlobal[$i] = "ini nggak ada solusinya";
		$diaryGlobal[$i] = $row['CONTENT'];
		$titleGlobal[$i] = $row['JUDUL'];
	}


  ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="readDiary.css">
	<title></title>
</head>
<body>
	<?php
		if ($_SESSION["username"] == "dosen"){?>
			<header>
				<div>
					<font style="color: white">WriteYourStory[SUPER_USER]</font>
					<img src="http://downloadicons.net/sites/default/files/search-icon-8872.png">
					<form method="post" action="homePage.php">
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
						<li><a href="homePage.php">World</a></li>
						<li><a>Read Your Own Story</a></li>
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

					<form method="post" action="">
						<button  id="delete" name="delete" value="<?php echo $diaryGlobal[$i] ?>">
							<center>
								<img src="https://png.icons8.com/metro/1600/trash.png">
							</center>
						</button>		
					</form>
				</div>
			<?}
			}
			else{?>
				<div id="postinggone" style="margin-top: 20px;">
					<center>
						<h1 style="color:white;">make a story and your posting should display here</h1>
						<a href="write.php"><h3>make story</h3></a>
					</center>
				</div>
			<?}

		}
		else if ($_SESSION["username"]) {?>
			<header>
				<div>
					<font style="color: white">WriteYourStory</font>
					<img src="http://downloadicons.net/sites/default/files/search-icon-8872.png">
					<form method="post" action="homePage.php">
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
						<li><a href="homePage.php">World</a></li>
						<li><a>Read Your Own Story</a></li>
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
					<?php echo $diaryGlobal[$i] ?>
					<br><br><br>

					<form method="post" action="">
						<button  id="delete" name="delete" value="<?php echo $diaryGlobal[$i] ?>">
							<center>
								<img src="https://png.icons8.com/metro/1600/trash.png">
							</center>
						</button>		
					</form>
				</div>
			<?}
		}
		else{?>
			<div id="postinggone" style="margin-top: 20px;">
				<center>
					<h1 style="color:white;">make a story and your posting should display here</h1>
					<a href="write.php"><h3>make story</h3></a>
				</center>
			</div>
		<?}


	}
		else{?>
			<h1>HI!</h1>
			<h3>To access this page you need to create account or login with your account</h3>
			<a href="loginPage.php"><button>SignIn</button></a>
			<br>
			<br>
			<a href="loginPage.php"><button>Login</button></a>
		<?}


	  ?>

</body>
</html>