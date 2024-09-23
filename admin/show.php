<?php
include '../PHP/dbConnection.php';
session_start();



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
