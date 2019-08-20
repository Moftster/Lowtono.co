<?php

session_start();

require('connection.php');

if(isset($_POST['delete']))

{

      $id= $_POST['PostID'];

      $statement = $conn->prepare("DELETE FROM heroku_75a209a499a855d.reviews WHERE ProductID = '$id'");

      $execute = $statement->execute();

      if($execute) {

        $message = "Post deleted";

        header("location:/admin.php?msg=".$message);

      } else {

        "Deletion failed";

      }




}
