<?php
    session_start();
    include('connection.php');
    if(isset($_POST['signin'])){
		$name = $_POST['user_name'];
		$password = $_POST['u_password'];
        $stmt = $conn->prepare("SELECT user_name,user_email,u_password FROM user WHERE user_name = ? AND u_password = ? LIMIT  1");
        $stmt->bind_param('ss',$name,$password);
        if($stmt ->execute()){
            $stmt ->bind_result($user_name,$user_email,$u_password);
            $stmt ->store_result();
            if($stmt->num_rows() == 1){
           //$row = $stmt -> fetch();
                $stmt -> fetch();
                $_SESSION['user_name'] = $name;
                $_SESSION['u_password'] = $password;
                $_SESSION['logged_in'] = true;

                header('location: user dashboard.php?message= logged in successfully');
            }else{
                header('location: login.php?error= Could not verify your account');
            }
        }else{
            //error
            header('location: login.php?error=something went wrong');
		}
	}

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
				<form method="POST" action="login.php">
					<p style="color:red;"><?php 
					if(isset($_GET['error']))
					{
						echo $_GET['error'];
					}
					?></p>
					<label for="chk" aria-hidden="true">Log In</label>
					<input type="text" name="user_name" placeholder="User name" required="">
					<input type="password" name="u_password" placeholder="Password" required="">
					<button name="signin">log In</button>
					<button class="signupp"><a href="signup.php">Sign Up</a></button>
					</div>
				</form>
	</div>
</body>
</html>
</body>
</html>
