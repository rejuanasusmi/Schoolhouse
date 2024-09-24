<!-- including header starts -->
<?php
include('./mainInclude/header.php');
include_once('PHP/dbConnection.php');
// SQL query to fetch student ID, student name, and review comments
$query = "SELECT students.student_id, students.name, review.comment_box
          FROM review 
          INNER JOIN students ON review.student_id = students.student_id";

// Execute the query
$result = mysqli_query($conn, $query);

// Initialize the reviews array
$reviews = [];

if (mysqli_num_rows($result) > 0) {
    // Fetch all the reviews into the $reviews array
    $reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Close the connection
mysqli_close($conn);

?>
<!-- including header ends -->


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
        <?php
            if(!isset($_SESSION['is_login'])) {
                echo'<a href="#" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#stuRegModal">Get Started</a>';
            } else {
               echo '<a class="btn btn-primary mt-3" href="#">My Profile</a>';
            }
            ?>

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
                    <img height="250" width="400"
                        src="https://images.pexels.com/photos/270632/pexels-photo-270632.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        class="card-img-top" alt="Guitar" />
                    <div class="card-body">
                        <h5 class="card-title">Learn Guitar Easy Way</h5>
                        <p class="card-text">mkkihihigugvjufyufyjh</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text d-inline">Price: <small><del>&#478 980</del></small><span
                                class="font-weight-bolder">&#478 980</span></p>
                        <a class="btn btn-primary text-white font-weight-bolder float-right"
                            href="coursedetails.php">Enroll</a>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0px;">
                <div class="card">
                    <img height="250" width="400"
                        src="https://images.pexels.com/photos/270632/pexels-photo-270632.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        class="card-img-top" alt="Guitar" />
                    <div class="card-body">
                        <h5 class="card-title">Learn Guitar Easy Way</h5>
                        <p class="card-text">mkkihihigugvjufyufyjh</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text d-inline">Price: <small><del>&#478 980</del></small><span
                                class="font-weight-bolder">&#478 980</span></p>
                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0px;">
                <div class="card">
                    <img height="250" width="400"
                        src="https://images.pexels.com/photos/270632/pexels-photo-270632.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        class="card-img-top" alt="Guitar" />
                    <div class="card-body">
                        <h5 class="card-title">Learn Guitar Easy Way</h5>
                        <p class="card-text">mkkihihigugvjufyufyjh</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text d-inline">Price: <small><del>&#478 980</del></small><span
                                class="font-weight-bolder">&#478 980</span></p>
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
                    <img height="250" width="400"
                        src="https://images.pexels.com/photos/270632/pexels-photo-270632.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        class="card-img-top" alt="Guitar" />
                    <div class="card-body">
                        <h5 class="card-title">Learn Guitar Easy Way</h5>
                        <p class="card-text">mkkihihigugvjufyufyjh</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text d-inline">Price: <small><del>&#478 980</del></small><span
                                class="font-weight-bolder">&#478 980</span></p>
                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0px;">
                <div class="card">
                    <img height="250" width="400"
                        src="https://images.pexels.com/photos/270632/pexels-photo-270632.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        class="card-img-top" alt="Guitar" />
                    <div class="card-body">
                        <h5 class="card-title">Learn Guitar Easy Way</h5>
                        <p class="card-text">mkkihihigugvjufyufyjh</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text d-inline">Price: <small><del>&#478 980</del></small><span
                                class="font-weight-bolder">&#478 980</span></p>
                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0px;">
                <div class="card">
                    <img height="250" width="400"
                        src="https://images.pexels.com/photos/270632/pexels-photo-270632.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        class="card-img-top" alt="Guitar" />
                    <div class="card-body">
                        <h5 class="card-title">Learn Guitar Easy Way</h5>
                        <p class="card-text">mkkihihigugvjufyufyjh</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text d-inline">Price: <small><del>&#478 980</del></small><span
                                class="font-weight-bolder">&#478 980</span></p>
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
<?php
        include('./contactus.php');
        ?>
<!-- end contact us -->

<!-- Students testimonial starts -->

<div class="container-fluid mt-5" style="background-color: #4e008e" id="Feedback">
    <h1 class="text-center testyheading p-4">Student's Feedback</h1>
    <div class="testimonial-slider">
        <div id="owl-demo" class="owl-carousel owl-theme">
            <?php
            // Ensure $reviews is an array before looping through it
            if (!empty($reviews) && is_array($reviews)) {
                foreach ($reviews as $review) {
                    if (in_array($review['student_id'], $_SESSION['approved_reviews'])) { ?>
            <div class="item testimonial-item">
                <img src="image/student/student1.jpg" alt="Student Image"> <!-- Replace with dynamic image fetching -->
                <h4><?php echo htmlspecialchars($review['name']); ?></h4>
                <p><?php echo htmlspecialchars($review['comment_box']); ?></p>
            </div>
            <?php } } } else { ?>
            <p>No feedback available.</p>
            <?php } ?>
        </div>
           
    </div>
</div>
<!-- </div>
        </div> -->
</div>
<!-- student testimonial ends -->
<!-- including footer starts-->
<?php
         include('./mainInclude/footer.php');
         ?>

<!-- including footer ends -->