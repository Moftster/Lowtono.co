<?php

include('app/views/partials/header.php');

include('core/database/connection.php');

if(!isset($_SESSION['UserName'])){

  header("Location:Login.php");

}

$id = $_GET['id'];

 try {
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     $stmt = $conn->prepare("SELECT * FROM lowtono.reviews WHERE ProductID = '$id'");

     $stmt->execute();

     $result = $stmt->setFetchMode(PDO::FETCH_OBJ);

     $Post = $stmt->fetch();

   }

 catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
 }

 $conn = null;


  ?>

  <form class="form-control-lg" action="core/database/update.php" method="POST" enctype="multipart/form-data">

    <h2 class="display-4 bottom-margin-20">Edit post</h2>

    <div class="form-group" >

      <?php if(isset($_GET['msg']))

      echo "<p class='text-danger'>" . $_GET['msg'] . "</p>";

      ?>

      <input type="hidden" name="postID" value=<?=$Post->ProductID?>>

      <input type="hidden" name="postImage" value=<?=$Post->ProductImage?>>


      <h5><label for="ProductName">Product</label></h5>

      <input type="text" class="form-control" name="ProductName" value="<?= $Post->ProductName?>">

    </div>

    <div class="form-group">

      <h5><label for="ProductName">Review</label></h5>

      <textarea class="form-control" name="Review" rows="3"><?=$Post->ProductReview?></textarea>

    </div>

    <div class="form-group">

      <h5><label class="justify-content-center" for="rating">Rating</label></h5>

      <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">



        <input type="radio" id="star10" name="rating" value="10" <?php if($Post->ProductRating == 10) { echo 'checked="checked"';} ?> /><label for="star10" title="10 star">10</label>
        <input type="radio" id="star9" name="rating" value="9" <?php if($Post->ProductRating == 9) { echo 'checked="checked"';} ?> /><label for="star9" title="9 star">9</label>
        <input type="radio" id="star8" name="rating" value="8" <?php if($Post->ProductRating == 8) { echo 'checked="checked"';} ?> /><label for="star8" title="8 star">8</label>
        <input type="radio" id="star7" name="rating" value="7" <?php if($Post->ProductRating == 7) { echo 'checked="checked"';} ?> /><label for="star7" title="7 star">7</label>
        <input type="radio" id="star6" name="rating" value="6" <?php if($Post->ProductRating == 6) { echo 'checked="checked"';} ?> /><label for="star6" title="6 star">6</label>
        <input type="radio" id="star5" name="rating" value="5" <?php if($Post->ProductRating == 5) { echo 'checked="checked"';} ?> /><label for="star5" title="5 star">5</label>
        <input type="radio" id="star4" name="rating" value="4" <?php if($Post->ProductRating == 4) { echo 'checked="checked"';} ?> /><label for="star4" title="4 star">4</label>
        <input type="radio" id="star3" name="rating" value="3" <?php if($Post->ProductRating == 3) { echo 'checked="checked"';} ?> /><label for="star3" title="3 star">3</label>
        <input type="radio" id="star2" name="rating" value="2" <?php if($Post->ProductRating == 2) { echo 'checked="checked"';} ?> /><label for="star2" title="2 star">2</label>
        <input type="radio" id="star1" name="rating" value="1" <?php if($Post->ProductRating == 1) { echo 'checked="checked"';} ?> /><label for="star1" title="1 star">1</label>

       </div>

   </div>

   <h5>Additional info</h5>

    <div class="form-group">

      <div class="custom-control custom-radio">

        <input type="radio" id="alcoholFree" value="Alcohol-free" name="Alcohol" class="custom-control-input" <?php if($Post->ProductAlcohol == 'Alcohol-free') { echo 'checked="checked"';} ?>>

        <label class="custom-control-label" for="alcoholFree">Alcohol-free</label>

      </div>

      <div class="custom-control custom-radio">

        <input type="radio" id="alcoholLow" value="Low-alcohol" name="Alcohol" class="custom-control-input" <?php if($Post->ProductAlcohol == 'Low-alcohol') { echo 'checked="checked"';} ?>>

        <label class="custom-control-label" for="alcoholLow">Low-alcohol</label>

      </div>

    </div>

    <div class="form-group">

    <div class="form-check form-check-inline">

      <?php

        $GFint = (int)$Post->GlutenFree;

        ?>

      <input type="checkbox" name="glutenFree" value="1" class="form-check-input" id="glutenFree" <?php if($GFint == 1) { echo 'checked="checked"';} ?>>

      <label class="form-check-label" for="glutenFree">Gluten-free</label>

    </div>

    <div class="form-check form-check-inline">

      <?php

        $DFint = (int)$Post->DairyFree;

        ?>

      <input type="checkbox" name="dairyFree" value="1" class="form-check-input" id="dairyFree" <?php if($DFint == 1) { echo 'checked="checked"';} ?>>

      <label class="form-check-label" for="dairyFree">Dairy-free</label>

    </div>

    </div>



    <div class="form-group">

      <h5><label for="Image">Product image</label></h5>

      <input type="file" class="form-control" name="Image" placeholder="">


    </div>

    <div class="form-group">

      <input type="submit" name="update" class="btn btn-primary" value="Update post">

    </div>

  </form>
