<?php
session_start();
include ('connection.php');
if (isset($_POST['signup'])){
	$cname = $_POST['v_companyname'];
	$vnum = $_POST['v_chesisnumber'];
	$vreg= $_POST['v_registration'];
	$vdriver= $_POST['v_driver'];
	$vtax = $_POST['v_taxdate'];
	$vfit = $_POST['v_fitnessdate'];
		$stmt=$conn->prepare("SELECT count(*) FROM vehicle_info where v_registration=?");
		$stmt->bind_param('s',$vreg);
		$stmt->execute();
		$stmt->bind_result($num_rows);
		$stmt->store_result();
		$stmt->fetch();
		if($num_rows !=0){
			header('location: user dashboard.php?error=vehicle with this registration already exists');
		}
		else{
			$stmt=$conn -> prepare("INSERT INTO user(v_companyname,v_chesisnumber,v_registration,v_driver,v_taxdate,v_fitnessdate) VALUES (?,?,?,?,?,?)");
			$stmt->bind_param('ssssss',$cname,$vnum,$vreg,$vdriver,$vtax,$vfit);
			if($stmt->execute())
			{
				$_SESSION['v_registration'] = $vreg;
				$_SESSION['logged_in'] = true;
				$_SESSION['status'] = "Add Successfully";
				header('location: vehicle information.php');
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
  <title>Add Vehicle Form</title>
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
				<form method="POST" action="add vehicle.php">
					<p style="color:red;"><?php 
					if(isset($_GET['error']))
					{
						echo $_GET['error'];
					}
					?></p>
					<label for="chk" aria-hidden="true" style="font-size:small;">Vehicle information</label>
					<input type="text" name="v_companyname" placeholder="v_companyname" required="">
					<input type="text" name="v_chesisnumber" placeholder="v_chesisnumber" required="">
					<input type="text" name="v_registration" placeholder="v_registration" required="">
					<input type="text" name="v_driver" placeholder="v_driver" required="">
					<input type="text" name="v_taxdate" placeholder="v_taxdate" required="">
					<input type="text" name="v_fitnessdate" placeholder="v_fitnessdate" required="">
					<button name="signup">ADD</button>
					<button class="signupp"><a href="user dashboard.php">Back</a></button>
				</form>
			</div>
	</div>
</body>
</html>
</body>
</html>
