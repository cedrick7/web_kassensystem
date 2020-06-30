<?php
// Database Connection

// $servername = "localhost";
// $username = "cacf23";
// $password = "1IZPvHarqNgkRyjZ";
// $dbname = "cacf23_1";

$dbServername = "localhost";
$dbUsername   = "root";
$dbPassword   = "";
$dbName       = "kassensystem";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
global $conn;

// Check connection
if (mysqli_connect_error()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();

  } //else{
    //  echo "Database connected...";
//  }
