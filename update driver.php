
<?php
include("connection.php");
error_reporting(0);

?>

<?php
if($_POST['submit'])
{
	$name = $_POST['driver_name'];
	$address = $_POST['driver_address'];
	$number = $_POST['driver_number'];
	$nid = $_POST['driver_nid'];
	$license = $_POST['driver_license'];
	$dob = $_POST['driver_dob'];
	$payment = $_POST['driver_payment'];
	$query=mysqli_query($conn,"update driver_info set driver_name='$name',driver_address='$address',driver_number='$number', driver_nid='$nid', driver_license='$license',driver_dob='$dob',driver_payment='$payment' where driver_name='$name'");
if($query)
{
	echo "successfully updated";
}
}
?>
<html>
<head>
<title>UPDATE FORM</title>
<center><body background="UI dash 2.jpg">
<table border="2" align="center">
<form name="UPDATE" method="POST" action="">
<!-- we will create registration.php after registration.html -->
<center><h3>UPDATE Driver INFORMATION</h3></center>
<tr>
<th>driver_name</th>
<td><input type="text" name="driver_name" value="<?php echo $_GET['driver_name']; ?>"/></br></td>
</tr>
<tr>
<th>driver_address</th>
<td><input type="text" name="driver_address" value="<?php echo $_GET['driver_address']; ?>"/></br></td>
</tr>

<tr>
<th>driver_number</th>
<td><input type="text" name="driver_number" value="<?php echo $_GET['driver_number']; ?>"/></br></td>
</tr>
<tr>
<th>driver_nid</th>
<td><input type="text" name="driver_nid" value="<?php echo $_GET['driver_nid']; ?>"/></br></td>
</tr>

<tr>
<th>driver_license</th>
<td><input type="text" name="driver_license" value="<?php echo $_GET['driver_license']; ?>"/></br></td>
</tr>

<tr>
<th>driver_dob</th>
<td><input type="date" name="driver_dob" value="<?php echo $_GET['driver_dob']; ?>"/></br></td>
</tr>

<tr>
<th>driver_payment</th>
<td><input type="text" name="driver_payment" value="<?php echo $_GET['driver_payment']; ?>"/></br></td>
</tr>

<tr>
<th><input type="submit" name="submit" value="update"></th>
<td><a href="driver information.php">click here for view </a></td>
</tr>
</form>

</table>
</body>
</center>
</head>
</html>