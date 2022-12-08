<?php
    session_start();
    include('connection.php');
    if(isset($_POST['admin'])){
		$name = $_POST['a_name'];
		$password = $_POST['a_password'];
        $stmt = $conn->prepare("SELECT a_name,a_password FROM admin1 WHERE a_name = ? AND a_password = ? LIMIT  1");
        $stmt->bind_param('ss',$name,$password);
        if($stmt ->execute()){
            $stmt ->bind_result($a_name,$a_password);
            $stmt ->store_result();
            if($stmt->num_rows() == 1){
           //$row = $stmt -> fetch();
                $stmt -> fetch();
                $_SESSION['a_name'] = $name;
                $_SESSION['a_password'] = $password;
                $_SESSION['logged_in'] = true;

                header('location: admindashboard.php?message= logged in successfully');
            }else{
                header('location: admin login.php?error= Could not verify your account');
            }
        }else{
            //error
            header('location: admin login.php?error=something went wrong');
		}
	}

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
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
			<form method="POST" action="admin login.php">
					<p style="color:red;"><?php 
					if(isset($_GET['error']))
					{
						echo $_GET['error'];
					}
					?></p>
					<label for="chk" aria-hidden="true">Admin Login</label>
					<input type="text" name="a_name" placeholder="Admin name" required="">
					<input type="password" name="a_password" placeholder="Password" required="">
					<button name="admin">Log In</button>
					</div>
				</form>
	</div>
</body>
</html>
</body>
</html>
