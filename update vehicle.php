
<?php
include("connection.php");
error_reporting(0);

?>

<?php
if($_POST['submit'])
{
	$cname = $_POST['v_companyname'];
	$vnum = $_POST['v_chesisnumber'];
	$vreg= $_POST['v_registration'];
	$vdriver= $_POST['v_driver'];
	$vtax = $_POST['v_taxdate'];
	$vfit = $_POST['v_fitnessdate'];
	$query=mysqli_query($conn,"update user set user_name='$name',user_email='$email',user_address='$address', user_number='$number', u_password='$password' where user_name='$name'");
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
<center><h3>UPDATE USER INFORMATION</h3></center>
<tr>
<th>USER NAME</th>
<td><input type="text" name="user_name" value="<?php echo $_GET['user_name']; ?>"/></br></td>
</tr>
<tr>
<th>USER EMAIL</th>
<td><input type="email" name="user_email" value="<?php echo $_GET['user_email']; ?>"/></br></td>
</tr>

<tr>
<th>USER ADDRESS</th>
<td><input type="text" name="user_address" value="<?php echo $_GET['user_address']; ?>"/></br></td>
</tr>
<tr>
<th>USER NUMBER</th>
<td><input type="text" name="user_number" value="<?php echo $_GET['user_number']; ?>"/></br></td>
</tr>

<tr>
<th>USER PASSWORD</th>
<td><input type="password" name="u_password" value="<?php echo $_GET['u_password']; ?>"/></br></td>
</tr>


<tr>
<th><input type="submit" name="submit" value="update"></th>
<td><a href="user information.php">click here for view </a></td>
</tr>
</form>

</table>
</body>
</center>
</head>
</html>