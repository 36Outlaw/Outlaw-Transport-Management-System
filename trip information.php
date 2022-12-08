<html>
<h2><center><u>Trip INFORMATION</u></center><h2>
<body background="UI dash 2.jpg">
</body>
<?php
include("connection.php");
error_reporting(0);
$query = "SELECT * FROM trip_info ";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);

if($total != 0)
{
	?>
	
	<table border="2" align="center">
	<tr>
	<th>driver_name</th>
	<th>trip_no</th>
	<th>trip_from</th>
	<th>trip_to</th>
	<th>trip_payment</th>
	<th colspan="2">OPERATION</th>
	
	</tr>
	
	
	<?php
	while($result = mysqli_fetch_assoc($data))
	{
		echo "<tr>
				<td>".$result['driver_name']."</td>
				<td>".$result['trip_no']."</td>
				<td>".$result['trip_from']."</td>
				<td>".$result['trip_to']."</td>
				<td>".$result['trip_payment']."</td>
				<td><a href='update trip.php?id=$result[id]&nm=$result[name]&fnm=$result[fathername]&db=$result[dob]&pup=$result[pickup]&dop=$result[drop1]&categ=$result[choose]&amt=$result[amount]'>Edit</a></td>
				<td><a href='delete.php?id=$result[trip_no]'>Delete</a></td>
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



