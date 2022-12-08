<?php
session_start();
include ('connection.php');
if (isset($_POST['signup'])){
	$name = $_POST['driver_name'];
	$address = $_POST['driver_address'];
	$number = $_POST['driver_number'];
	$nid = $_POST['driver_nid'];
	$license = $_POST['driver_license'];
	$dob = $_POST['driver_dob'];
	$payment = $_POST['driver_payment'];
		$stmt=$conn->prepare("SELECT count(*) FROM driver_info where driver_nid=?");
		$stmt->bind_param('s',$nid);
		$stmt->execute();
		$stmt->bind_result($num_rows);
		$stmt->store_result();
		$stmt->fetch();
		if($num_rows !=0){
			header('location: user dashboard.php?error=driver with this information already exists');
		}
		else{
			$stmt=$conn -> prepare("INSERT INTO driver_info(driver_name,driver_address,driver_number,driver_nid,driver_license,driver_dob,driver_payment) VALUES (?,?,?,?,?,?,?)");
			$stmt->bind_param('sssssss',$name,$address,$number,$nid,$license,$dob,$payment);
			if($stmt->execute())
			{
				$_SESSION['driver_number'] = $number;
				$_SESSION['driver_nid'] = $nid;
				$_SESSION['logged_in'] = true;
				$_SESSION['status'] = "ADD Successfully";
				header('location: driver information.php');
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
  <title>Add Driver</title>
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
				<form method="POST" action="add driver.php">
					<p style="color:red;"><?php 
					if(isset($_GET['error']))
					{
						echo $_GET['error'];
					}
					?></p>
					
					<input type="text" name="driver_name" placeholder="driver_name" required="">
					<input type="text" name="driver_address" placeholder="driver_address" required="">
					<input type="text" name="driver_number" placeholder="driver_number" required="">
					<input type="text" name="driver_nid" placeholder="driver_nid" required="">
					<input type="text" name="driver_license" placeholder="driver_license" required="">
					<input type="text" name="driver_dob" placeholder="driver_dob" required="">
					<input type="text" name="driver_payment" placeholder="driver_payment" required="">
					<button name="signup">ADD</button>
					<button class="signupp"><a href="user dashboard.php">Back</a></button>
				</form>
			</div>
	</div>
</body>
</html>
</body>
</html>
