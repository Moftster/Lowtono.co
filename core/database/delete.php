<?php

session_start();

require('connection.php');

if(isset($_POST['delete']))

{

      $id= $_POST['PostID'];

      $statement = $conn->prepare("DELETE FROM chillawe_lowtono.reviews WHERE ProductID = '$id'");

      $execute = $statement->execute();

      if($execute) {

        $message = "Post deleted";

        header("location:/admin.php?msg=".$message);

      } else {

        "Deletion failed";

      }




}
