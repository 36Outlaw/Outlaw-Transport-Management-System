<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link rel="stylesheet" href="./layout/styles/loginsignup.css">
</head>
<body>
<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="Log In">
			<?php
		if(isset($_SESSION['status']))
		{
			echo  $_SESSION['status'];
			unset( $_SESSION['status']);
		}
		?>
				<form>
					<label for="chk" aria-hidden="true">Log In</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button >Log In</button>
					<button class="signupp"><a href="signup.php">Sign Up</a></button>
					</div>
				</form>
	</div>
</body>
</html>
</body>
</html>
