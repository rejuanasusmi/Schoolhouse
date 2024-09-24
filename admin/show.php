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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student's Feedback</title>
    <style>
        /* General Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        h1 {
            font-size: 36px;
            color: white;
            margin: 0;
        }

        /* Container Styles */
        .container-fluid {
            padding: 50px 0;
            background-color: #4e008e;
        }

        /* Feedback Section */
        .testimonial-slider {
            margin: 20px auto;
            width: 90%;
            max-width: 1200px;
            padding: 20px;
            text-align: center;
        }

        .testimonial-item {
            background-color: #fff;
            border-radius: 8px;
            padding: 30px 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin: 10px;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .testimonial-item img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 15px;
            object-fit: cover;
        }

        .testimonial-item h4 {
            font-size: 22px;
            color: #4e008e;
            margin-bottom: 10px;
        }

        .testimonial-item p {
            font-size: 16px;
            color: #555;
            line-height: 1.5;
        }

        /* Carousel Styles */
        .owl-carousel {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .testimonial-item {
                padding: 20px 15px;
            }

            .testimonial-item h4 {
                font-size: 20px;
            }

            .testimonial-item p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="container-fluid mt-5" id="Feedback">
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

</body>
<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

<!-- Initialize the carousel -->
<script>
    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            items: 3, // Number of items to display
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3000,
            responsive: {
                0: { items: 1 },
                768: { items: 2 },
                1024: { items: 3 }
            }
        });
    });
</script>

</html>
