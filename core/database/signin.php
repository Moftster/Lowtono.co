<?php

require('connection.php');

if(isset($_POST['insert'])) {

$firstName = $_POST['FirstName'];
$lastName = $_POST['LastName'];
$Email = $_POST['Email'];
$UserName = $_POST['UserName'];
$Password = $_POST['Password'];

$hashedPassword = password_hash($_POST['Password'], PASSWORD_DEFAULT);

if(empty($firstName && $lastName && $Email && $UserName && $Password)) {

  $message = "All fields must be completed";

  header("location:/signup.php?msg=" . $message);

} else {

$existingEmail = $conn->prepare("SELECT user_email FROM chillawe_lowtono.users WHERE ? = user_email");

$params = array($_POST['Email']);

$existingEmail->execute($params);

if($existingEmail->rowCount() > 0) {

  echo "Email already exists";

} else {

$existingUser = $conn->prepare("SELECT user_uname FROM chillawe_lowtono.users WHERE ? = user_uname");

$params = array($_POST['UserName']);

$existingUser->execute($params);

if($existingUser->rowCount() > 0) {

  echo "Username already exists";

} else {

$PDOQuery = "INSERT INTO chillawe_lowtono.users(`user_first`, `user_last`, `user_email`, `user_uname`, `user_pwd`) VALUES (:FirstName, :LastName, :Email, :UserName, :Password)";

$PDOResult = $conn->prepare($PDOQuery);

$PDOExecute = $PDOResult->execute(array(":FirstName"=>$firstName,
                                        ":LastName"=>$lastName,
                                        ":Email"=>$Email,
                                        ":UserName"=>$UserName,
                                        ":Password"=>$hashedPassword));
if ($PDOExecute) {

  header("location:/index.php");

  session_start();

  $_SESSION['UserName'] = $_POST['UserName'];

  header("location:/index.php");

  }

}

}

}

}
