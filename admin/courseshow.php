<?php
// Include your database connection file
include '../PHP/dbConnection.php';

// Fetch all courses from the courses table
$query = "SELECT courses.*, teachers.teacher_id FROM courses 
          JOIN teachers ON courses.teacher_id = teachers.teacher_id";  // Fetch course details along with teacher's name
$result = mysqli_query($conn, $query);

// Initialize an empty array to hold the courses
$courses = [];

if (mysqli_num_rows($result) > 0) {
    // Fetch all courses and store them in the $courses array
    while ($row = mysqli_fetch_assoc($result)) {
        $courses[] = $row;
    }
} else {
    // If no courses are found, handle it in the HTML section
    $courses = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Information</title>
    <style>
        /* Add your existing styles here */
    </style>
</head>
<body>


<!-- Approved Courses Section -->
<div class="approved-container mt-5">
    <h2>Approved Courses</h2>
    <div class="row">
        <?php if (!empty($approvedCourses)): ?>
            <?php foreach ($approvedCourses as $course): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img height="250" width="400" src="<?php echo htmlspecialchars($course['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($course['course_title']); ?>"/>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($course['course_title']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($course['course_topic']); ?></p>
                            <p class="card-text">Price: <strong>$<?php echo htmlspecialchars($course['course_price']); ?></strong></p>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-primary text-white" href="#">Enroll</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class='text-center'>No approved courses available</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
