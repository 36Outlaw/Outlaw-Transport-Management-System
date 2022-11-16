<?php
session_start();
include ('connection.php');
if (isset($_POST['signup'])){
	$name = $_POST['user_name'];
	$email = $_POST['user_email'];
	$address = $_POST['user_address'];
	$number = $_POST['user_number'];
	$password = $_POST['u_password'];
	$confirm_password = $_POST['confirm_password'];
	if($password !== $confirm_password)
	{
		header('location: signup.php?error = password does not match');
	}
	else
	{
		$stmt=$conn->prepare("SELECT count(*) FROM signup where user_email=?");
		$stmt->bind_param('s',$email);
		$stmt->execute();
		$stmt->bind_result($num_rows);
		$stmt->store_result();
		$stmt->fetch();
		if($num_rows !=0){
			header('location: login.php?error=user with this email already exists');
		}
		else{
			$stmt=$conn -> prepare("INSERT INTO signup(user_name,user_email,user_address,user_number,u_password) VALUES (?,?,?,?,?)");
			$stmt->bind_param('sssss',$name,$email,$address,$number,$password);
			if($stmt->execute())
			{
				$_SESSION['user_email'] = $email;
				$_SESSION['user_name'] = $name;
				$_SESSION['logged_in'] = true;
				$_SESSION['status'] = "Signed Up Successfully";
				header('location: login.php');
			}
		}
		}
		$stmt->close();
		$conn->close();
	}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign up Form</title>
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

			<div class="signup">
				<form method="POST" action="signup.php">
					<p style="color:red;"><?php 
					if(isset($_GET['error']))
					{
						echo $_GET['error'];
					}
					?></p>
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="user_name" placeholder="User name" required="">
					<input type="email" name="user_email" placeholder="Email" required="">
					<input type="text" name="user_address" placeholder="Address" required="">
					<input type="text" name="user_number" placeholder="Number" required="">
					<input type="password" name="u_password" placeholder="Password" required="">
					<input type="password" name="confirm_password" placeholder="Confirm Password" required="">
					<button name="signup">Sign up</button>
				</form>
			</div>
	</div>
</body>
</html>
</body>
</html>
