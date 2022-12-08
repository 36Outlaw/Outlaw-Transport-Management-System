<html>
<h2><center><u>Vehicle INFORMATION</u></center><h2>
<body background="UI dash 2.jpg">
</body>
<?php
include("connection.php");
error_reporting(0);
$query = "SELECT * FROM vehicle_info ";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);

if($total != 0)
{
	?>
	
	<table border="2" align="center">
	<tr>
	<th>v_companyname</th>
	<th>v_chesisnumber</th>
	<th>v_registration</th>
	<th>v_driver</th>
	<th>v_taxdate</th>
	<th>v_fitnessdate</th>
	<th colspan="2">OPERATION</th>
	
	</tr>
	
	
	<?php
	while($result = mysqli_fetch_assoc($data))
	{
		echo "<tr>
				<td>".$result['v_companyname']."</td>
				<td>".$result['v_chesisnumber']."</td>
				<td>".$result['v_registration']."</td>
				<td>".$result['v_driver']."</td>
				<td>".$result['v_taxdate']."</td>
				<td>".$result['v_fitnessdate']."</td>
				<td><a href='update vehicle.php?id=$result[id]&nm=$result[name]&fnm=$result[fathername]&db=$result[dob]&pup=$result[pickup]&dop=$result[drop1]&categ=$result[choose]&amt=$result[amount]'>Edit</a></td>
				<td><a href='delete.php?id=$result[v_registration]'>Delete</a></td>
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



