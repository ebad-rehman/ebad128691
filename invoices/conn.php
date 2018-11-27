<?php
$databaseHost = 'localhost';
$databaseName = 'ebad rehman 12869';
$databaseUsername = 'Ebad12869';
$databasePassword = '123456';
 
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>
