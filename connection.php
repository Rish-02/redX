<?php 
$host = "localhost";
$user = "dealsome_test";
$password = "12345";
$db = "dealsome_test";

//mysqli_connect($host, $user, $password);
$error = "";
if (mysqli_connect_error()) {
  echo "connection failed";
  die("database connection error.");
}
?>