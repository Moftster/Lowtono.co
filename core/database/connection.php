<?php

// PDO connection

$dbServername = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbName = "lowtono";

try {

  $conn = new PDO("mysql:host=$dbServername;dbName=$dbName", $dbUsername, $dbPassword);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // echo "Successfuly connected to database";

}

catch(PDOException $e) {

  echo "Connection failed: " . $e->getMessage();

}



// MySQLi Connection

// $dbServername = "localhost";
// $dbUsername = "root";
// $dbPassword = "";
// $dbName = "lowtono";
//
// $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
//
// if ($conn) {
//
//   echo "Connected to database";
//
// } else {
//
//   echo "Not connected";
//
// }
