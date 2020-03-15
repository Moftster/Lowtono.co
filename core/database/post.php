<?php

session_start();

require('connection.php');

if(isset($_POST['insert']))

{

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

  $id = $_SESSION['UserName'];


$folder = "../../documents/images/"; // Could add / at the end of the location

$image = $_FILES['Image']['name'];

$path = $folder . $image ;

$target_file = $folder.basename($_FILES["Image"]["name"]);

$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

$allowed = array('jpeg','png' ,'jpg');

$filename = $_FILES['Image']['name'];

$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(empty($productName && $productReview && $productRating && $productAlcohol && $image)) {

  $message = "All fields must be completed";

  header("location:/add.php?msg=".$message);

} else {

if(!in_array($ext, $allowed)) {

 echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";

} else {

move_uploaded_file( $_FILES['Image']['tmp_name'], $path);


}

  $PDOQuery = "INSERT INTO chillawe_lowtono.reviews(`ProductName`, `ProductReview`, `ProductRating`, `ProductAlcohol`, `GlutenFree`, `DairyFree`, `ProductImage`, `posterID` ) VALUES (:ProductName, :Review, :rating, :Alcohol, :glutenFree, :dairyFree, :Image, :posterID)";

  $PDOPrepare = $conn->prepare($PDOQuery);

  $PDOExecute = $PDOPrepare->execute(array(

                                            ":ProductName"=>$productName,
                                            ":Review"=>$productReview,
                                            ":rating"=>$productRating,
                                            ":Alcohol"=>$productAlcohol,
                                            ":glutenFree"=>$productGluten,
                                            ":dairyFree"=>$productDairy,
                                            ":Image"=>$image,
                                            ":posterID"=>$id));

      if($PDOExecute) {

        header("location:/index.php");

      } else {

        echo "No go";

      }
}

}
