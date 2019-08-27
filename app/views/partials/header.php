<!doctype html>

<?php

include('core/database/connection.php')

?>

<html lang="en">

  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/9ccdbad9ac.js"></script>


    <link rel="shortcut icon" href="documents/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="document/images/favicon.ico" type="image/x-icon">

    <title>Lowtono.co</title>

  </head>

  <body>

    <div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

      <a class="navbar-brand" href="/"><img class="nav-logo" src="/documents/images/logo.png"alt="Logo"></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

          <span class="navbar-toggler-icon"></span>

      </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/about.php">About</a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="/contact.php">Contact</a>
      </li>

      <?php

      session_start();

      if(isset($_SESSION['UserName'])) { ?>

      <li class="nav-item ">

        <a class="nav-link" href="/add.php">Post</a>

      </li>

    <?php } ?>

    <li class="nav-item ">

      <?php

      if(isset($_SESSION['UserName']))

        { ?>

          <li class="nav-item">

            <a class="nav-link" href="/admin.php">Admin</a>

          </li>

          <a class="nav-link" href="/core/database/logout.php">Log out</a>

    <?php } else { ?>

          <a class="nav-link" href="/login.php">Login</a>

    <?php } ?>

    </li>

    </ul>


        <form action="search.php" method="POST" class="form-inline my-2 my-lg-0">

          <div class="input-group md-form form-sm form-2 pl-0">

              <div class="input-group-append">

                <span class="input-group-text"><input class="form-control mr-sm-2" type="search" name="searchText" aria-label="Search"><button name="searching" class="btn fas fa-search" type="submit"></button></span>

              </div>
          </div>

        </form>

      </div>


      <!-- <input class="form-control mr-sm-2" type="search" name="searchText" aria-label="Search"> -->

      <!-- <button name="searching" class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button> -->



</nav>
