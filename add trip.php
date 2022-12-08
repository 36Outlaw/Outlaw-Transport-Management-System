<?php
session_start();
include ('connection.php');
if (isset($_POST['signup'])){
	$dname = $_POST['driver_name'];
	$tn = $_POST['trip_no'];
	$tf = $_POST['trip_from'];
	$tt = $_POST['trip_to'];
	$tp = $_POST['trip_payment'];
	
		$stmt=$conn->prepare("SELECT count(*) FROM trip_info where trip_no=?");
		$stmt->bind_param('s',$email);
		$stmt->execute();
		$stmt->bind_result($num_rows);
		$stmt->store_result();
		$stmt->fetch();
		if($num_rows !=0){
			header('location: login.php?error=Trip with this trip no already exists');
		}
		else{
			$stmt=$conn -> prepare("INSERT INTO trip_info(driver_name,trip_no,trip_from,trip_to,trip_payment) VALUES (?,?,?,?,?)");
			$stmt->bind_param('sssss',$dname,$tn,$tf,$tt,$tp);
			if($stmt->execute())
			{
				$_SESSION['trip_no'] = $tn;
				$_SESSION['logged_in'] = true;
				$_SESSION['status'] = "Add Successfully";
				header('location: trip information.php');
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
  <title>Trip Information</title>
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
				<form method="POST" action="add trip.php">
					<p style="color:red;"><?php 
					if(isset($_GET['error']))
					{
						echo $_GET['error'];
					}
					?></p>
					<label for="chk" aria-hidden="true" style="font-size:small;">Trip information</label>
					<input type="text" name="driver_name" placeholder="driver_name" required="">
					<input type="text" name="trip_no" placeholder="trip_no" required="">
					<input type="text" name="trip_from" placeholder="trip_from" required="">
					<input type="text" name="trip_to" placeholder="trip_to" required="">
					<input type="text" name="trip_payment" placeholder="trip_payment" required="">
					<button name="signup">ADD</button>
					<button class="signupp"><a href="user dashboard.php">Back</a></button>
				</form>
			</div>
	</div>
</body>
</html>
</body>
</html>
