<?php
// Include your database connection file
include '../PHP/dbConnection.php';
session_start(); // Start the session

// Initialize session array for approved courses
if (!isset($_SESSION['approved_courses'])) {
    $_SESSION['approved_courses'] = [];
}

// Handle Approve Request via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['approve'])) {
    $course_id = $_POST['course_id'];
    // Add course_id to the approved list if not already approved
    if (!in_array($course_id, $_SESSION['approved_courses'])) {
        $_SESSION['approved_courses'][] = $course_id;
    }
}
// Handle Delete Request via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $course_id = $_POST['course_id'];
    // Delete course from the database
    $sql = "DELETE FROM courses WHERE course_id = $course_id";
    $conn->query($sql);
}
// Fetch all courses from the courses table
$query = "SELECT courses.*, teachers.name AS teacher_name FROM courses 
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

// Fetch approved courses based on session
$approvedCourses = [];
if (!empty($_SESSION['approved_courses'])) {
    $approvedCoursesIds = implode(",", $_SESSION['approved_courses']);
    $approvedSql = "SELECT * FROM courses WHERE course_id IN ($approvedCoursesIds)";
    $approvedResult = mysqli_query($conn, $approvedSql);

    if (mysqli_num_rows($approvedResult) > 0) {
        while ($approvedRow = mysqli_fetch_assoc($approvedResult)) {
            $approvedCourses[] = $approvedRow;
        }
    }
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .table-container, .approved-container {
            width: 90%;
            max-width: 1000px;
            background-color: white;
            padding: 20px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #3b5998;
            color: white;
            font-weight: 600;
        }

        td {
            background-color: #f9f9f9;
        }

        .action-btn {
            background-color: #008CBA;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 5px;
        }

        .delete-btn {
            background-color: #e74c3c;
        }

        .action-btn:hover {
            background-color: #007bb5;
        }

        .delete-btn:hover {
            background-color: #c0392b;
        }

        .approved-btn {
            background-color: #2ecc71;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: default;
        }
    </style>
</head>
<body>

<!-- Course Information Section -->
<div class="table-container">
    <h2>Course Information</h2>
    <table>
        <thead>
            <tr>
                <th>Teacher Name</th>
                <th>Course Title</th>
                <th>Course Topic</th>
                <th>Course Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?php echo htmlspecialchars($course['teacher_name']); ?></td>
                    <td><?php echo htmlspecialchars($course['course_title']); ?></td>
                    <td><?php echo htmlspecialchars($course['course_topic']); ?></td>
                    <td><?php echo "$" . htmlspecialchars($course['course_price']); ?></td>
                    <td>
                        <?php if (!in_array($course['course_id'], $_SESSION['approved_courses'])): ?>
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="course_id" value="<?php echo $course['course_id']; ?>">
                                <button type="submit" name="approve" class="action-btn">Approve</button>
                            </form>
                        <?php else: ?>
                            <button class="approved-btn" disabled>Approved</button>
                        <?php endif; ?>
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="course_id" value="<?php echo $course['course_id']; ?>">
                            <button type="submit" name="delete" class="action-btn delete-btn">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

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
