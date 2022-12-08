<?php
include("connection.php");
error_reporting(0);
?>

<?php
if($_POST['submit'])
{
    $name = $_GET['user_name'];
	$query=mysqli_query($conn,"DELETE FROM user WHERE ='$name'");
if($query)
{
	echo "successfully updated";
    header("location:user information.php");
}
}
?>
<html>
<head>
<title>DELETE FORM</title>
<center><body background="UI dash 2.jpg">
<table border="2" align="center">
<form name="DELETE" method="POST" action="">
<!-- we will create registration.php after registration.html -->
<center><h3>DELETE USER INFORMATION</h3></center>
<tr>
<th><input type="submit" name="submit" value="delete"></th>
<td><a href="user information.php">click here for view </a></td>
</tr>
</form>

</table>
</body>
</center>
</head>
</html>