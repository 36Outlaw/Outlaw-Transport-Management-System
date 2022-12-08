<html>
<h2><center><u>USER INFORMATION</u></center><h2>
<body background="UI dash 2.jpg">
</body>
<?php
include("connection.php");
error_reporting(0);
$query = "SELECT * FROM user ";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);

if($total != 0)
{
	?>
	
	<table border="2" align="center">
	<tr>
	<th>USER NAME</th>
	<th>USER EMAIL</th>
	<th>USER ADDRESS</th>
	<th>USER NUMBER</th>
	<th>USER PASSWORD</th>
	<th colspan="2">OPERATION</th>
	
	</tr>
	
	
	<?php
	while($result = mysqli_fetch_assoc($data))
	{
		echo "<tr>
				<td>".$result['user_name']."</td>
				<td>".$result['user_email']."</td>
				<td>".$result['user_address']."</td>
				<td>".$result['user_number']."</td>
				<td>".$result['u_password']."</td>
				<td><a href='update.php?id=$result[id]&nm=$result[name]&fnm=$result[fathername]&db=$result[dob]&pup=$result[pickup]&dop=$result[drop1]&categ=$result[choose]&amt=$result[amount]'>Edit</a></td>
				<td><a href='delete.php?id=$result[user_name]'>Delete</a></td>
			</tr>";
	}
}
	else
	{
		echo "";
	}
	?>
	</table>
	<button><a href="admindashboard.php">Back</a></button>
	<html>



