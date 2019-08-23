<?php

require('connection.php');

if(isset($_POST['insert'])) {

$UserName = $_POST['UserName'];

$Password = $_POST['Password'];

$hashedPassword = password_hash($_POST['Password'], PASSWORD_DEFAULT);


//Error handlers - check if fields are empty

if(empty($UserName && $Password)) {

  $message = "All fields must be completed";

  header("location:/login.php?msg=".$message);

} else {

  try{

    $query = $conn->query("SELECT user_id, user_pwd FROM heroku_75a209a499a855d.users WHERE user_uname = '$UserName'");

    if($query->rowCount() > 0) {

      $data = $query->fetch(PDO::FETCH_ASSOC);

      if(password_verify($Password, $data['user_pwd'])) {

          session_start();

          $_SESSION['UserName'] = $_POST['UserName'];

          header("location:/index.php");

      }

    } else {

        $message = "Username/password not recognised";

        header("location:/login.php?msg=".$message);

    }



    // $query->bindParam(1, $UserName);
    //
    // $query->bindParam(2, $hashedPassword);

    // $query->execute();
    //
    // if(!$query->rowCount()) {
    //
    //   $message = "Username/password not recognised";
    //
    //   header("location:/login.php?msg=".$message);
    //
    // } else {
    //
    //   session_start();
    //
    //   $_SESSION['UserName'] = $_POST['UserName'];
    //
    //   header("location:/index.php");
    //
    // }

  }
 catch(Exception $e) {

  die($e->getMessage());

}

}

}
