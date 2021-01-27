<?php
session_start();
if ($_SERVER['REQUEST_METHOD']=='POST') {
	include('../inc/conn.php');
	$username = $_POST['name'];
	$password =$_POST['pass'];
	$sql = "SELECT *FROM user WHERE username='{$username}' AND password = '{$password}'";
	$user=mysqli_fetch_assoc(mysqli_query($conn,$sql));
	if ($user) {
		$_SESSION{'user'}= $user['username'];
		header('location:index.php'); //dua nguoi dung vef index
		die;

	}
	else
	{
		echo "sai thong tin";
	}
	
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../asset/from.css">
	<title>
		Form login
	</title>
</head>
<body>
	<div class="logincss" style="width: 300px;position: absolute;top: 50%;left: 50%;transform: translate(-50%;-50%);color: black;">
	<h1 style="float: left;font-size: 50px;border-bottom: 50px solid #FEA47F;margin-bottom: 50px;padding: 13px;">Login</h1>
	<form method="post" class="login-box" style="width: 100%;overflow: hidden;font-size: 20px;padding: 8px 0;margin: 8px 0;border-bottom: 1px solid #FEA47F;">
		<label for="username" >username </label> </br>
		<input id="us" type="text" name="name" > </br>
		<label for="password">password</label> </br>
		<input id="ps" type="password" name="pass" > </br>
		<input id="mys" type="submit" value="ok"> 
	</form>
	</div>

</body>
</html>