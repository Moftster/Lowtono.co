<?php

include('app/views/partials/header.php');

include('core/database/connection.php');

?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Lowtono.co</h1>
    <p class="lead">The low and no alcohol review site</p>
  </div>
</div>

 <div class="row">

<?php
try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT ProductID, ProductImage, ProductName, ProductReview, ProductRating FROM lowtono.reviews");

    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_OBJ);

    $allPosts = $stmt->fetchAll();

  }

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;

?>

 <?php foreach($allPosts as $individualPost): ?>

  <div class="col-md-4">
    <div class="card">
    <div class="mb-4 shadow-sm">
      <img class="card-img-top" src="/documents/images/<?php echo $individualPost->ProductImage?>"alt="Product image">
      <div class="card-body text-center">
        <h4><?=$individualPost->ProductName; ?></h4>
        <h6 class="starrating">Rating: <?= $individualPost->ProductRating; ?>/10</h6>
          <div class="btn-group text-center">
            <a href="view.php?id=<?= $individualPost->ProductID?>"><button type="button" name"readMore" class="btn btn-md btn-outline-primary">Read review</button></a>
          </div>

      </div>
    </div>
  </div>
  </div>

<?php endforeach; ?>

</div>





<!-- <script>

alert('hello world!');

</script> -->


<?php include('app/views/partials/footer.php'); ?>
