<?php
	session_start();
	$_SESSION["username"] = isset($_SESSION["username"]) ? $_SESSION["username"] : '';

	if ($_SESSION["username"] != '') {
		# code...
		session_destroy();
	}

  ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="loginPage.css">
</head>
<body>
	<header id="loginDa">
			<font style="font-size: 30px;">ShareYourStory</font>
			<div id="loginAtt">
				<form method="post" action="loginSucces.php">
					<input type="text" name="Username" placeholder="UserName" required> 
					<input type="password" name="Password" placeholder="Password" required>
					<button>Login</button>
				</form>
			</div>
	</header>
	<center>
		<div id="signup">
			<img src="https://anushikaghajanyan.files.wordpress.com/2016/02/writing-a-letter-tdktx1gb.jpg">
			<div>
				<h3 style="margin-top: 50px;">Sign Up</h3>
				<form method="post" action="accountCreated.php">
					<input type="text" name="newUsername" placeholder="UserName" required><br><br>
					<input type="email" name="newEmail" placeholder="Email" required><br><br>
					<input type="password" name="newPassword" placeholder="Password" required><br><br>
					<p>Gender</p>
						<input type="radio" name="gender" value="M"><font>Male</font>
						<input type="radio" name="gender" value="F"><font>Female</font>
						<br><br>
					<button>Sign Up</button>
				</form>
			</div>
		</div>
	</center>
	
</body>
</html>