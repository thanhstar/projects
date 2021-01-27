<?php
$servername ="localhost";
$username = "root";
$pass = "";
$dbname = "laptop";
// kết nối server
$conn = mysqli_connect($servername, $username, $pass, $dbname);
if (!$conn) {
	die( "error " .mysqli_connect_error());
}
else {
	echo "";
}
// 
