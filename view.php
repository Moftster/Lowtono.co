<?php

include('app/views/partials/header.php');

include('core/database/connection.php');

$id = $_GET['id'];

 try {
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     $stmt = $conn->prepare("SELECT * FROM heroku_75a209a499a855d.reviews WHERE ProductID = '$id'");

     $stmt->execute();

     $result = $stmt->setFetchMode(PDO::FETCH_OBJ);

     $Post = $stmt->fetch();

   }

 catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
 }

 $conn = null;


  ?>

  <div class="row">

  <div class="col-lg-3">

    <img class="img-fluid" src="/documents/images/<?php echo $Post->ProductImage?>"alt="Product image">

  </div>

  <div class="col-lg-8">

    <h1><?= $Post->ProductName ?></h1>

    <p> Reviewed by <?=$Post->posterID?> on <?php

                                              $dateInTimestampForm = strtotime($Post->postDateTime);
                                              $newDate = date('l jS F Y', $dateInTimestampForm);
                                              echo $newDate;
                                              // $new_date = date('Y-m-d H:i:s', $dateInTimestampForm);
                                              // echo $new_date;
    ?> </p>

    <p> <?php echo nl2br($Post->ProductReview) ?> </p>

    <h5 style="text-align: center"> Overall score: <?= $Post->ProductRating ?>/10</h5>

    <h6>Additional information</h6>

    <ul class="list-group">

        <li class="list-group-item"><?= $Post->ProductAlcohol ?></li>

      <?php

          $GFint = (int)$Post->GlutenFree;

            if($GFint == 1) {

              echo '<li class="list-group-item">Gluten-free</li>';

            }

          $DFint = (int)$Post->DairyFree;

            if($DFint == 1) {

              echo '<li class="list-group-item">Dairy-free</li>';

            }
       ?>


      <!-- <li class="list-group-item">Morbi leo risus</li>

      <li class="list-group-item">Porta ac consectetur ac</li>

      <li class="list-group-item">Vestibulum at eros</li> -->

    </ul>

  </div>

</div>
