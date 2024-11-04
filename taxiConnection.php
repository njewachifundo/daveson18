<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "taxi_management";
//reporting errors for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


?>
