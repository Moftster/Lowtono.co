<?php include('app/views/partials/header.php'); ?>

<div class-"col-lg-8">

<form class="form-control-lg" action="core/database/signin.php" method="POST">

  <h2 class="display-4 bottom-margin-20">Sign up</h2>

  <?php

    if(isset($_GET['msg']))

    echo "<p class='text-danger'>" . $_GET['msg'] . "</p>";

  ?>


  <div class="form-group" >
    <input type="text" class="form-control" name="FirstName" placeholder="Firstname">
  </div>

  <div class="form-group">
    <input type="text" class="form-control" name="LastName" placeholder="Lastname">
  </div>

  <div class="form-group">
    <input type="email" class="form-control" name="Email" placeholder="Email">
  </div>

  <div class="form-group">
    <input type="text" class="form-control" name="UserName" placeholder="Username">
  </div>

  <div class="form-group">
    <input type="password" class="form-control" name="Password" placeholder="Password">
  </div>

  <div class="form-group">
    <input type="submit" name="insert" class="btn btn-primary" value="Submit">
  </div>

</form>

</div>


<?php include('app/views/partials/footer.php'); ?>
