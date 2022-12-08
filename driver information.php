<html>
<h2><center><u>DRIVER INFORMATION</u></center><h2>
<body background="UI dash 2.jpg">
</body>
<?php
include("connection.php");
error_reporting(0);
$query = "SELECT * FROM driver_info ";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);

if($total != 0)
{
	?>
	
	<table border="2" align="center">
	<tr>
	<th>driver_name</th>
	<th>driver_address</th>
	<th>driver_number</th>
	<th>driver_nid</th>
	<th>driver_license</th>
	<th>driver_dob</th>
	<th>driver_payment</th>
	<th colspan="2">OPERATION</th>
	
	</tr>
	
	
	<?php
	while($result = mysqli_fetch_assoc($data))
	{
		echo "<tr>
				<td>".$result['driver_name']."</td>
				<td>".$result['driver_address']."</td>
				<td>".$result['driver_number']."</td>
				<td>".$result['driver_nid']."</td>
				<td>".$result['driver_license']."</td>
				<td>".$result['driver_dob']."</td>
				<td>".$result['driver_payment']."</td>
				<td><a href='update driver.php?id=$result[id]&nm=$result[name]&fnm=$result[fathername]&db=$result[dob]&pup=$result[pickup]&dop=$result[drop1]&categ=$result[choose]&amt=$result[amount]'>Edit</a></td>
				<td><a href='delete.php?id=$result[driver_name]'>Delete</a></td>
			</tr>";
	}
}
	else
	{
		echo "";
	}
	?>
	</table>
	<button><a href="user dashboard.php">Back</a></button>
	<html>



