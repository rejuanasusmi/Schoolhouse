<?php
session_start();
include('../PHP/dbConnection.php');

// Ensure the student is logged in
if (isset($_SESSION['is_login'])) {
    $stulogemail = $_SESSION['stulogemail'];
} else {
    echo "<script> location.href='./index.php';</script>";
    exit;
}

// Fetch courses from the database
$sql = "SELECT course_id, course_name FROM courses";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - Courses</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/studentstyle.css"> <!-- Link your existing CSS -->

    <style>
        .course-list {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .course-list h3 {
            text-align: center;
            margin-bottom: 30px;
        }

        .course-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .course-item:last-child {
            border-bottom: none;
        }

        .take-quiz-btn {
            background-color: #007bff;
            color: #fff;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .take-quiz-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php include('./studentinclude/header.php'); ?> <!-- Include your sidebar here -->

<div class="container">
    <div class="course-list">
        <h3>Available Courses</h3>

        <!-- Loop through the courses from the database -->
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="course-item">
                    <span>' . $row['course_name'] . '</span>
                    <a href="quiz.php?course_id=' . $row['course_id'] . '" class="take-quiz-btn">Take Quiz</a>
                </div>';
            }
        } else {
            echo '<p>No courses available at the moment.</p>';
        }
        ?>

    </div>
</div>

<!-- JS Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>

<?php
include('./studentinclude/footer.php');
?>
