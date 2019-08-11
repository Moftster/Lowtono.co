<?php include('app/views/partials/header.php'); ?>

<div class="col-lg-8">

<form class="form-control-lg" action="core/database/login.php" method="POST">

  <h2 class="display-4 bottom-margin-20">Login</h2>

  <?php if(isset($_GET['msg']))

    echo "<p class='text-danger'>" . $_GET['msg'] . "</p>";

    ?>

  <div class="form-group">
    <input type="text" class="form-control" name="UserName" placeholder="Username">
  </div>

  <div class="form-group">
    <input type="password" class="form-control" name="Password" placeholder="Password">
  </div>

  <div class="form-group">
    <input type="submit" name="insert" class="btn btn-primary" value="Submit">
  </div>

  <div class="form-group">
    <p>New user? Register <a href="signup.php">here.</a></p>
    <!-- <p>Forgotten your password? Reset <a href="resetpassword.php">here.</a></p> -->
  </div>

</form>

</div>

<?php include('app/views/partials/footer.php'); ?>
