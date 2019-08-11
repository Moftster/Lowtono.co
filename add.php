<?php

include('app/views/partials/header.php');

if(!isset($_SESSION['UserName'])){

  header("Location:Login.php");

}

?>


<form class="form-control-lg" action="core/database/post.php" method="POST" enctype="multipart/form-data">

  <?php if(isset($_GET['msg']))

  echo "<p class='text-danger'>" . $_GET['msg'] . "</p>";

  ?>

  <div class="col-lg-8">

  <h2 class="display-4 bottom-margin-20">Post a review</h2>

  <div class="form-group" >

    <h5><label for="ProductName">Product</label></h5>

    <input type="text" class="form-control" name="ProductName">

  </div>

  <div class="form-group">

    <h5><label for="ProductName">Review</label></h5>

    <textarea class="form-control" name="Review" rows="5"> </textarea>

  </div>

  <div class="form-group">

    <h5><label class="justify-content-center" for="rating">Rating</label></h5>

    <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">

      <input type="radio" id="star10" name="rating" value="10" /><label for="star10" title="10 star">10</label>
      <input type="radio" id="star9" name="rating" value="9" /><label for="star9" title="9 star">9</label>
      <input type="radio" id="star8" name="rating" value="8" /><label for="star8" title="8 star">8</label>
      <input type="radio" id="star7" name="rating" value="7" /><label for="star7" title="7 star">7</label>
      <input type="radio" id="star6" name="rating" value="6" /><label for="star6" title="6 star">6</label>
      <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star">5</label>
      <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 star">4</label>
      <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 star">3</label>
      <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 star">2</label>
      <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star">1</label>

     </div>

 </div>


 <h5>Additional info</h5>

  <div class="form-group">

    <div class="custom-control custom-radio">

      <input type="radio" id="alcoholFree" value="Alcohol-free" name="Alcohol" class="custom-control-input">

      <label class="custom-control-label" for="alcoholFree">Alcohol-free</label>

    </div>

    <div class="custom-control custom-radio">

      <input type="radio" id="alcoholLow" value="Low-alcohol" name="Alcohol" class="custom-control-input">

      <label class="custom-control-label" for="alcoholLow">Low-alcohol</label>

    </div>

  </div>

  <div class="form-group">

  <div class="form-check form-check-inline">

    <input type="checkbox" name="glutenFree" value="1" class="form-check-input" id="glutenFree">

    <label class="form-check-label" for="glutenFree">Gluten-free</label>

  </div>

  <div class="form-check form-check-inline">

    <input type="checkbox" name="dairyFree" value="1" class="form-check-input" id="dairyFree">

    <label class="form-check-label" for="dairyFree">Dairy-free</label>

  </div>

  </div>



  <div class="form-group">

    <h5><label for="Image">Product image</label></h5>

    <input type="file" class="form-control" name="Image" placeholder="Image">


  </div>

  <div class="form-group text-right">

    <input type="submit" name="insert" class="btn btn-primary " value="Submit">

  </div>

</form>

</div>
