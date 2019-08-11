<?php

include('app/views/partials/header.php');

require('core/database/connection.php');

if(isset($_POST['searching'])) {

$search = $_POST['searchText'];

?>

<h2 class="display-4 bottom-margin-20">Search results</h2>

<div class="row">

<?php

try {

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM lowtono.reviews WHERE ProductName LIKE '%$search%' OR ProductReview LIKE '%$search%'");

    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_OBJ);

    $searchResults = $stmt->fetchAll();

  }

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;

if(empty($searchResults)) {

  echo "<div class='col-md-4'> No relevant results </div>";

}

}

foreach($searchResults as $individualResults): ?>

  <div class="col-md-4">

    <div class="card">

      <div class="mb-4 shadow-sm">

        <img class="card-img-top" src="/documents/images/<?php echo $individualResults->ProductImage?>"alt="Product image">

          <div class="card-body text-center">

            <h4><?=$individualResults->ProductName; ?></h4>

            <h6 class="starrating">Rating: <?= $individualResults->ProductRating; ?>/10</h6>

            <div class="btn-group text-center">

              <a href="view.php?id=<?= $individualResults->ProductID?>"><button type="button" name"readMore" class="btn btn-md btn-outline-primary">Read review</button></a>

            </div>

          </div>

      </div>

    </div>

  </div>

<?php endforeach; ?>

</div>
