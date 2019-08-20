<?php

// PDO connection

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$dbServername = $url["host"];
$dbUsername = $url["user"];
$dbPassword = $url["pass"];
$dbName = "heroku_75a209a499a855d";

// $dbName = substr($url["path"], 1);



// GRANT ALL PRIVILEGES ON 0fb86246.table TO 'user'@'localhost';


// $dbServername = "us-cdbr-iron-east-02.cleardb.net";
// $dbUsername = "b28e4ead2d474b";
// $dbPassword = "0fb86246";
// $dbName = "lowtono";

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
