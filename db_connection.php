<?php
// Database Connection

$servername = "https://hosting.iem.thm.de/phpmyadmin/";
$username = "jfhs38";
$password = "5Zcxh4eRqyRhwPaG";
$dbname = "jfhs38_1";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
global $conn;


// Check connection
if (mysqli_connect_error()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();

  } //else{
    //  echo "Database connected...";

//  }
