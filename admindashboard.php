<?php
session_start();
include("connection.php");
?>

<html>
<style>
body{
	background: #2c3e50;
	margin: 0px;
	border: 0px;
}
#header{
	width: auto;
	height: 110px;
	background: #34495e;
	color: white;
}
#sidemenu{
	float: left;
	width: 300px;
	background: #34495e;
	color: white;
	
}
#data{
	width: auto;
	background:#2c3e50;
	color: white;
	padding-left:330px;
}
#head_img{
	background:white;
	border-radius:50px;
}
#sidemenu.ul li{
	display: inline-block;
	padding-bottom: 10px;
	
}
li{
	padding-bottom: 30px;
	border-bottom: 3px solid grey;
}
li:hover {
	background: black;
	color: white;
	padding-left:10px;
    -moz-transition: padding-left .3s ease-in;
    -o-transition: padding-left  .3s ease-in;
    -webkit-transition: padding-left  .3s ease-in;
    transition: padding-left  .3s ease-in;
}
a{
	text-decoration:none;
	color:white;
}
#back{
	width: 50px;
	height: 50px;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}
#back:hover{
	box-shadow: 0 4px 8px 0 white, 0 6px 20px 0 white;
}
#back{
	width: 50px;
	height: 50px;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}
#back:hover{
	box-shadow: 0 4px 8px 0 white, 0 6px 20px 0 white;
}
img{
	width: 70px;
	height: 70px;
	}

</style>

<body>

<div id="header">
<center><img src="a1.png">
<h3> Welcome to Admin Panel </h3></center>
</div>

<div id="sidemenu">
 <ul>
    <li><a href="signup.php" target="_blank"> ADD ACCOUNT</a></li>
	<li><a href="user information.php" target="_blank"> VIEW All USER</a></li>
	<li><a href ="logout.php">LOGOUT</a></li>
 </ul>	
</div>

</body>
</html>