<?php
// Database Connection

// $servername = "localhost";
// $username = "cacf23";
// $password = "1IZPvHarqNgkRyjZ";
// $dbname = "cacf23_1";

$dbServername = "localhost:8889";
$dbUsername   = "root";
$dbPassword   = "root";
$dbName       = "kassensystem";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
global $conn;

// Check connection
if (mysqli_connect_error()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();

  } //else{
    //  echo "Database connected...";
//  }
