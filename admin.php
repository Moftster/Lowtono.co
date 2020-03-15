<?php

include('app/views/partials/header.php');

include('core/database/connection.php');

if(!isset($_SESSION['UserName'])){

  header("Location:Login.php");

}

?>

<div class="col-lg-12">

<div>

<h1 style="text-align: center"><?= $_SESSION['UserName'] ?> admin</h1>

</div>

<div>

<?php

if(isset($_GET['msg']))

echo "<p class='text-danger'>" . $_GET['msg'] . "</p>";

?>

<h2 class="display-4 bottom-margin-20">My posts</h2>

<?php

$uName = $_SESSION['UserName'];


try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM chillawe_lowtono.reviews WHERE posterID = '$uName'");

    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_OBJ);

    $allPosts = $stmt->fetchAll();

  }

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;

?>

<?php foreach($allPosts as $individualPost): ?>

  <div class="row">

    <div class="col-lg-3">

      <h6><?= $individualPost->ProductName; ?></h6>

    </div>

  <div class="col-lg-8">

    <div class="row">

      <div class="col-lg-1 bottom-margin"><a href="view.php?id=<?= $individualPost->ProductID?>"><button type="button" class="btn btn-primary btn-sm">View</button></a></div>

      <div class="col-lg-1"><a href="edit.php?id=<?= $individualPost->ProductID?>"><button type="button" class="btn btn-warning btn-sm">Edit</button></a></div>

      <div class="col-lg-1">

        <form action="core/database/delete.php" method="POST">

          <input type="hidden" name="PostID" value="<?= $individualPost->ProductID?>">

          <button type="submit" class="btn btn-danger btn-sm" name="delete">Delete</button>

        </form>

        </div>

    </div>

  </div>

  </div>

<?php endforeach; ?>


</div>


</div>

</div>
