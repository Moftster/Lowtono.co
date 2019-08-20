<?php

session_start();


require('connection.php');

if(isset($_POST['update']))

{

  $ProdID = $_POST['postID'];

  $productName = $_POST['ProductName'];
  $productReview = $_POST['Review'];
  $productRating = $_POST['rating'];
  $productAlcohol = $_POST['Alcohol'];

  if(isset($_POST['glutenFree'])) {

    $productGluten = 1;

  } else {

    $productGluten = 0;

  }

  if(isset($_POST['dairyFree'])) {

    $productDairy = 1;

  } else {

    $productDairy = 0;

  }

  $UserID = $_SESSION['UserName'];

$folder = "../../documents/images/"; // Could add / at the end of the location

$image = $_POST['postImage'];

$path = $folder . $image ;

$target_file = $folder.basename($_FILES["Image"]["name"]);

$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

$allowed = array('jpeg','png' ,'jpg');

$filename = $_FILES['Image']['name'];

$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(empty($productName && $productReview && $productRating && $productAlcohol && $image)) {

  $message = "All fields must be completed";

  header("location:/edit.php?id=".$ProdID."&msg=".$message);

    // header("location:/add.php?msg=".$message);

} else {

if(!in_array($ext, $allowed)) {

 echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";

} else {

move_uploaded_file( $_FILES['Image']['tmp_name'], $path);

}

  $PDOQuery = "UPDATE heroku_75a209a499a855d.reviews SET `ProductName` = :ProductName,
                                          `ProductReview` = :Review,
                                          `ProductRating` = :rating,
                                          `ProductAlcohol` = :Alcohol,
                                          `GlutenFree` = :glutenFree,
                                          `DairyFree` = :dairyFree,
                                          `ProductImage` = :Image,
                                          `posterID` =  :posterID WHERE ProductID = '$ProdID'";

  $PDOPrepare = $conn->prepare($PDOQuery);

  $PDOExecute = $PDOPrepare->execute(array(

                                            ":ProductName"=>$productName,
                                            ":Review"=>$productReview,
                                            ":rating"=>$productRating,
                                            ":Alcohol"=>$productAlcohol,
                                            ":glutenFree"=>$productGluten,
                                            ":dairyFree"=>$productDairy,
                                            ":Image"=>$image,
                                            ":posterID"=>$UserID));

                                    // var_dump($PDOQuery);
                                    //
                                    // echo "<br>";
                                    //
                                    // var_dump($UserID);
                                    //
                                    // echo "<br>";
                                    //
                                    // var_dump($ProdID);
                                    //
                                    // echo "<br>";
                                    //
                                    // exit();


      if($PDOExecute) {

        header("location:/index.php");

      } else {

        echo "No go";

      }
}

}
