<?php 
	session_start();
	require ("database.php");



	$diary=isset($_POST['diary']) ? $_POST['diary'] : '';
	$search = isset($_POST["search"]) ? $_POST["search"] : '';
	$selectDB = true;

	if ($search!= "") {
		# code...
		$query1 = "SELECT * FROM DIARY_USER WHERE share = 'G' AND username = '$search'";
		$selectDB = mysqli_query($conn,$query1);

		$search = '';
	}

	$query1 = "SELECT * FROM GENRE";
	$selectDB = mysqli_query($conn,$query1);

	$i = 0;
	while ($row = mysqli_fetch_array($selectDB)) {
		# code...
		$i++;
		$genre[$i] = $row['G_DESCRIPT'];
		$genreType[$i] = $row['GENRE_TYPE'];
	}
?>


<!DOCTYPE html>



<html>
<head>
	<link rel="stylesheet" type="text/css" href="write.css">
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
					<form method="post" action="homePage.php">
						<input type="text" name="search" placeholder="searchUser">
					</form>
				</div>
			</header>

			<img src="https://cdn3.iconfinder.com/data/icons/dental-blue-icons/512/Untitled-6.png" id="book">

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
						<li><a href="readDiary.php">Read Your Own Story</a></li>
						<li><a>Write</a></li>
						<li><a href="feedback.php">feedback</a></li>
					</ul>
				</div>

		<section>
			<form action="LorG.php" method="post">
				<input type="text" name="Tittle" placeholder=" Tittle"> <input type="date" name="date">
				<select name="genre">
					<?php
						for ($i=1; $i <= sizeof($genre) ; $i++) { ?>
							<option value="<?php echo $genreType[$i]?>"> <?php echo $genre[$i] ?></option>
						<?}?>
				</select>
				
				<br><br>
				<p></p>
				<textarea name="diary" placeholder="write your Story here.."></textarea>
				<button>Submit</button>
			</form>
			<p style="color: red;">*using html attribute </p>
		</section>
	<?}
	else if ($_SESSION["username"]) {
			# code...?>
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
				<li><a href="readDiary.php">Read Your Own Story</a></li>
				<li><a>Write</a></li>
				<li><a href="feedback.php">feedback</a></li>
			</ul>
		</div>

		<section>
			<form action="LorG.php" method="post">
				<input type="text" name="Tittle" placeholder=" Tittle"> <input type="date" name="date">
				<select name="genre">
					<?php
						for ($i=1; $i <= sizeof($genre) ; $i++) { ?>
							<option value="<?php echo $genreType[$i]?>"> <?php echo $genre[$i] ?></option>
						<?}?>
				</select>
				
				<br><br>
				<p></p>
				<textarea name="diary" placeholder="write your Story here.."></textarea>
				<button>Submit</button>
			</form>
			<p style="color: red;">*using html attribute </p>
		</section>
		<?}

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