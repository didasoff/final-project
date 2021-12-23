<?php 

$dbHost = DB_HOST;
$dbUser = DB_USER;
$dbPass = DB_PASS;
$dbName = DB_NAME; 

$conn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
if(!$conn){
   die("Connection Failed : " . mysqli_connect_error());
}

?>