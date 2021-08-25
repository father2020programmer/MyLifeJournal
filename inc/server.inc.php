<?php
// set db needed information
$dbServerName = "localhost";
$dbUserName = "randy";
$dbPassword = "123456";
$dbName = "acme";

// connect to local db
$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

// error check for db
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
} 

