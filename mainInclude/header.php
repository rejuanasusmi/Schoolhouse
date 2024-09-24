<!DOCTYPE html>
<html Lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS and Font Awesome CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/all.min.css">

        

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.min.css">
    <link rel="stylesheet" href="path/to/your/testyslider.css"> <!--  Testimonial Slider CSS -->
        <!-- Google font -->

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Custom css -->
        <link rel="stylesheet" href="css/style.css">

        <title>SchoolHouse</title>
    </head>
    <body>
     <!-- navication starts --> 
     <nav class="navbar navbar-expand-lg fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img height= 100 width=200 src = "image/logo.png" alt = "site icon" class="img-fluid"></a>
    <span class="navbar-text">Learn New Things with Creativity</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav custom-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item custom-nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item custom-nav-item">
          <a class="nav-link" href="courses.php">Courses</a>
        </li>
        <?php
        session_start();
        if(isset($_SESSION['is_login'])) {
          echo'<li class="nav-item custom-nav-item">
          <a class="nav-link" href="#">My Profile</a>
        </li>
        <li class="nav-item custom-nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>';
        } else {
          echo'<li class="nav-item custom-nav-item" data-bs-toggle="modal" data-bs-target="#stuLoginModal">
          <a class="nav-link" href="#">Login</a>
        </li>
        <li class="nav-item custom-nav-item" data-bs-toggle="modal" data-bs-target="#stuRegModal">
          <a class="nav-link" href="#">Register</a>
        </li>';
        }

        ?>
        
        
        <li class="nav-item custom-nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <li class="nav-item custom-nav-item">
          <a class="nav-link" href="Login/teacherLogin.php">Teacher's Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>  

     <!-- navication ends -->