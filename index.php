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
          <a class="nav-link" href="#">Courses</a>
        </li>
        <li class="nav-item custom-nav-item">
          <a class="nav-link" href="#">My Profile</a>
        </li>
        <li class="nav-item custom-nav-item">
          <a class="nav-link" href="#">Logout</a>
        </li>
        <li class="nav-item custom-nav-item" data-bs-toggle="modal" data-bs-target="#stuLoginModal">
          <a class="nav-link" href="#">Login</a>
        </li>
        <li class="nav-item custom-nav-item" data-bs-toggle="modal" data-bs-target="#stuRegModal">
          <a class="nav-link" href="#">Register</a>
        </li>
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

     
     <!-- start video bg -->
      <div class="container-fluid remove-vid-marg">
        <div class="vid-parent">
            <video playinline autoplay muted loop>
                <source src="video/intro.mp4">
            </video>
            <div class="vid-overlay"></div>
        </div>
        <div class="vid-content">
            <h1 class="my-content"> Welcome to SchoolHouse</h1>
            <small class="my-content">Learn New Things with Creativity</small><br>
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#stuRegModal">Get Started</a>
        </div>
      </div>
     <!-- end video bg -->
    
     <!-- text banner starts-->
      <div class="container-fluid bg-blue txt-banner my-class">
        <div class="row bottom-banner">
            <div class="col-sm">
                <h5><i class="fas fa-book-open mr-3"></i> 50+ Online Courses</h5>
            </div>
            <div class="col-sm">
                <h5><i class="fas fa-users mr-3"></i> Expert Instructors</h5>
            </div>
            <div class="col-sm">
                <h5><i class="fas fa-keyboard mr-3"></i>Lifetime Access</h5>
            </div>
            <div class="col-sm">
                <h5><i class="fas fa-dollar-sign mr-3"></i>Money Back Guarantee</h5>
            </div>
        </div>
      </div>
      <!-- text banner ends -->

      
    

    </section>
       <!-- Popular Course starts -->
       <div class="container mt-5">
    <h1 class="text-center">Popular Courses</h1>
    <div class="row mt-4">
        <!-- 1st -->
        <div class="col-md-4 mb-4">
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0px;">
                <div class="card">
                    <img height="250" width="400" src="https://images.pexels.com/photos/270632/pexels-photo-270632.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" alt="Guitar"/>
                    <div class="card-body">
                        <h5 class="card-title">Learn Guitar Easy Way</h5>
                        <p class="card-text">mkkihihigugvjufyufyjh</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text d-inline">Price: <small><del>&#478 980</del></small><span class="font-weight-bolder">&#478 980</span></p>
                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0px;">
                <div class="card">
                    <img height="250" width="400" src="https://images.pexels.com/photos/270632/pexels-photo-270632.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" alt="Guitar"/>
                    <div class="card-body">
                        <h5 class="card-title">Learn Guitar Easy Way</h5>
                        <p class="card-text">mkkihihigugvjufyufyjh</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text d-inline">Price: <small><del>&#478 980</del></small><span class="font-weight-bolder">&#478 980</span></p>
                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0px;">
                <div class="card">
                    <img height="250" width="400" src="https://images.pexels.com/photos/270632/pexels-photo-270632.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" alt="Guitar"/>
                    <div class="card-body">
                        <h5 class="card-title">Learn Guitar Easy Way</h5>
                        <p class="card-text">mkkihihigugvjufyufyjh</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text d-inline">Price: <small><del>&#478 980</del></small><span class="font-weight-bolder">&#478 980</span></p>
                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- 2nd -->
    <div class="row mt-4">
        <div class="col-md-4 mb-4">
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0px;">
                <div class="card">
                    <img height="250" width="400" src="https://images.pexels.com/photos/270632/pexels-photo-270632.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" alt="Guitar"/>
                    <div class="card-body">
                        <h5 class="card-title">Learn Guitar Easy Way</h5>
                        <p class="card-text">mkkihihigugvjufyufyjh</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text d-inline">Price: <small><del>&#478 980</del></small><span class="font-weight-bolder">&#478 980</span></p>
                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0px;">
                <div class="card">
                    <img height="250" width="400" src="https://images.pexels.com/photos/270632/pexels-photo-270632.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" alt="Guitar"/>
                    <div class="card-body">
                        <h5 class="card-title">Learn Guitar Easy Way</h5>
                        <p class="card-text">mkkihihigugvjufyufyjh</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text d-inline">Price: <small><del>&#478 980</del></small><span class="font-weight-bolder">&#478 980</span></p>
                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0px;">
                <div class="card">
                    <img height="250" width="400" src="https://images.pexels.com/photos/270632/pexels-photo-270632.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" alt="Guitar"/>
                    <div class="card-body">
                        <h5 class="card-title">Learn Guitar Easy Way</h5>
                        <p class="card-text">mkkihihigugvjufyufyjh</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text d-inline">Price: <small><del>&#478 980</del></small><span class="font-weight-bolder">&#478 980</span></p>
                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="text-center m-2">
        <a class="btn my-class btn-sm" href="#">View All Courses</a>
    </div>
</div>

        <!--Popular Course ends  -->

        <!-- start contact us -->
        <div class="container mt-4" id="Contact">
            <h2 class="text-center mb-4"> Contact Us</h2>
            <div class="row">
                <div class="col-md-8">
                    <form action="" method="post">
                        <input type="text" class="form-control" name="name" placeholder="Name"><br>
                        <input type="text" class="form-control" name="subject" placeholder="Subject"><br>
                        <input type="email" class="form-control" name="email" placeholder="E-mail"><br>
                        <textarea class="form-control" name="message" placeholder="How can we help you?" style="height:150px;"></textarea><br>
                        <input class="btn btn-primary" type="submit" value="Send" name="submit"><br><br>
                    </form>
                </div>
                <div class="col-md-4 stripe text-white text-center">
                    <h4>SchoolHouse</h4>
                    <p>SchoolHouse,
                        Mirpur, Dhaka.
                        Email: maisha@gmail.com
                        Phone: 01777777643
                    </p>
                </div>
            </div>
        </div>
        <!-- end contact us -->

        <!-- Students testimonial starts -->

        <div class="container-fluid mt-5" style="background-color: #4e008e" id="Feedback">
        <h1 class="text-center testyheading p-4">Student's Feedback</h1>
        <!-- <div class="row">
            <div class="col-md-12"> -->
            <div class="testimonial-slider">
    <div id="owl-demo" class="owl-carousel owl-theme">
        <div class="item testimonial-item">
            <img src="image/student/student1.jpg" alt="Captain Marvel">
            <h4>Captain Marvel</h4>
            <p class="role">Web Designer</p>
            <p>My life at iSchool made me stronger and took me a step ahead for being an independent woman. I am thankful to all the teachers who supported us and corrected us throughout our career. I am very grateful to the iSchool for providing us the best of placement opportunities and finally I got placed in DC Marvel.</p>
        </div>
        <div class="item testimonial-item">
            <img src="path/to/ant-man.jpg" alt="Ant Man">
            <h4>Ant Man</h4>
            <p class="role">Web Developer</p>
            <p>I am grateful to iSchool - both the faculty and the Training & Placement Department. They have made efforts ensuring maximum number of placed students. Due to the efforts made by the faculty and placement cell, I was able to bag a job in the second company.</p>
        </div>
        <div class="item testimonial-item">
            <img src="path/to/dr-strange.jpg" alt="Dr Strange">
            <h4>Dr Strange</h4>
            <p class="role">Web Developer</p>
            <p>iSchool is a place of learning, fun, culture, lore, literature and many such life preaching activities. Studying at the iSchool brought an added value to my life.</p>
        </div>
    </div>
</div>
            <!-- </div>
        </div> -->
    </div>
        <!-- student testimonial ends -->
         <!-- Social info starts -->
          <div class="container-fluid bg-primary">
          <div class="row text-white text-center p-1">
            
            <div class="col-sm">
                <a href="#" class="text-white social-hover"><i class="fab fa-facebook"></i>Facebook</a>
            </div>
            <div class="col-sm">
                <a href="#" class="text-white social-hover"><i class="fab fa-twitter"></i>Twitter</a>
            </div>
            <div class="col-sm">
                <a href="#" class="text-white social-hover"><i class="fab fa-whatsapp"></i>Whatsapp</a>
            </div>
            <div class="col-sm">
                <a href="#" class="text-white social-hover"><i class="fab fa-instagram"></i>Instagram</a>
            </div>
          </div>
          </div> 

         <!-- Social info ends -->

         <!-- end Section starts -->
         <div class="container-fluid p-4" style="background-color: #E9ECEF">
            <div class="container" style="background-color: #E9ECEF">
                <div class="row text-center">
                    <div class="col-sm">
                    <h5>About Us</h5>
                    <p>Our platform is one of the best platforms in the web. We are committed to give
                        you the best service.
                    </p>
                </div>
                <div class="col-sm">
                    <h5>Category</h5>
                    <a class="text-dark" href="#">Web development</a><br/>
                    <a class="text-dark" href="#">Web designing</a><br/>
                    <a class="text-dark" href="#">Data Structure</a><br/>
                    <a class="text-dark" href="#">Python</a><br/>
                </div>
                <div class="col-sm">
                    <h5>Contact Us</h5>
                    <p>SchoolHouse Ltd<br> Mirpur,Dhaka<br> Phone: 01727378683</p>
                </div>
            </div>
         </div>
        </div>
         <!-- end section ends -->

         <!-- footer starts -->
          <footer class="container-fluid bg-dark text-center p-2">
            <small class="text-white">Copyright &copy; 2023 || Designed by .... ||<a class="nav-link" href="admin/adminlogin.php"> Admin Login</a></small>
          </footer>
          <!-- footer ends -->

    <!-- Registration starts -->
    <!-- Modal -->
<div class="modal fade" id="stuRegModal" tabindex="-1" aria-labelledby="stuRegModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="stuRegModalLabel">Student Registration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- form -->
      <form>
        <div class="form-group">
            <i class="fas fa-user"></i><label for="stuname" class="pl-2 font-weight-bold">Name</label><input type="text"
            class="form-control" placeholder="Name" name="stuname" id="stuname" value="<?php if(isset($_POST['submit'])){echo $name;}?>" required>
        </div>
        <div class="form-group">
            <i class="fas fa-envelope"></i><label for="stuemail" class="pl-2 font-weight-bold">Email</label><input type="email"
            class="form-control" placeholder="Email" name="stuemail" id="stuemail" value="<?php if(isset($_POST['submit'])){echo $email;}?>" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i><label for="stupass" class="pl-2 font-weight-bold">New Password</label><input type="password"
            class="form-control" placeholder="Password" name="stupass" id="stupass" required>
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i><label for="stupassconfirm" class="pl-2 font-weight-bold">Confirm Password</label><input type="password"
            class="form-control" placeholder="Confirm Password" name="stupassconfirm" id="stupassconfirm" required>
        </div>
</form>
<!-- end form -->
      </div>
      <div class="modal-footer">
      <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
    <!-- Registration ends -->

       <!-- Student Login starts -->
    <!-- Modal -->
<div class="modal fade" id="stuLoginModal" tabindex="-1" aria-labelledby="stuLoginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="stuLoginModalLabel">Student Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- form -->
      <form id="stuLoginForm">
        <div class="form-group">
            <i class="fas fa-envelope"></i><label for="stulogemail" class="pl-2 font-weight-bold">Email</label><input type="email"
            class="form-control" placeholder="Email" name="stulogemail" id="stulogemail">
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i><label for="stulogpass" class="pl-2 font-weight-bold">Password</label><input type="password"
            class="form-control" placeholder="Password" name="stulogpass" id="stulogpass">
        </div>
</form>
<!-- end form -->
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" id="stuLogBtn">Login</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
    <!-- Student Login ends -->


    <!-- Jquery, JS and Font Awesome JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script>
    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            navigation : true, // Show next and prev buttons
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem:true,
            autoPlay: 3000,
            stopOnHover: true,
            transitionStyle : "fade"
        });
    });
</script>
    </body>
</html>



<!-- PHP registration -->

<?php
    // Include database connection file
    include 'PHP/dbConnection.php';

    // Check if form is submitted
    if (isset($_POST['submit'])) {
        // Get form inputs and escape strings to prevent SQL injection
        $name = mysqli_real_escape_string($conn, $_POST['stuname']);
        $email = mysqli_real_escape_string($conn, $_POST['stuemail']);
        $password = $_POST['stupass'];
        $confirm_password = $_POST['stupassconfirm'];

        // Check if email already exists
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM students WHERE email='$email'")) > 0) {
            echo "<script>alert('$email - this email already has a registered account')</script>";
        } else {
            // Check if passwords match
            if ($password === $confirm_password) {
                // Hash the password
                $hashedPassword = md5($password);

                // Insert data into the database
                $query = "INSERT INTO students (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";
                if (mysqli_query($conn, $query)) {
                    echo "<script>
                            alert('Account Successfully Created'); 
                            // document.location.href='StudentLog.php'; 
                          </script>";
                } else {
                    echo "<script>
                            alert('Something Went Wrong'); 
                            // document.location.href='studentRegistration.php'; 
                          </script>";
                }
            } else {
                echo "<script>
                        alert('Password does not match'); 
                        // document.location.href='studentRegistration.php'; 
                      </script>";
            }
        }
    }
?>




