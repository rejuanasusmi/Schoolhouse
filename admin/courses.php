<?php
include '../PHP/dbConnection.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Approve Request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['approve'])) {
    $course_id = $_POST['course_id'];
    $sql = "UPDATE courses SET is_approved = 1 WHERE course_id = $course_id";
    $conn->query($sql);
    header("Location: /your-course-list-page.php"); // Reload the page
}

// Handle Delete Request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $course_id = $_POST['course_id'];
    $sql = "DELETE FROM courses WHERE course_id = $course_id";
    $conn->query($sql);
    header("Location: /your-course-list-page.php"); // Reload the page
}

// Fetch Courses and Join Teachers
// Ensure that you use the correct column name from the teachers table
$sql = "SELECT c.course_id, t.name AS teacher_name, c.course_title, c.course_topic, c.course_price, c.number_of_video, c.is_approved
        FROM courses c
        JOIN teachers t ON c.teacher_id = t.teacher_id";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Information</title>
    <style>
        /* Same CSS as your example */
    </style>
</head>
<body>

<div class="table-container">
    <h2>Course Information</h2>
    <table>
        <thead>
            <tr>
                <th>Teacher Name</th>
                <th>Course Title</th>
                <th>Course Topic</th>
                <th>Course Price</th>
                <th>Number of Videos</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['teacher_name']; ?></td>
                        <td><?php echo $row['course_title']; ?></td>
                        <td><?php echo $row['course_topic']; ?></td>
                        <td><?php echo '$' . $row['course_price']; ?></td>
                        <td><?php echo $row['number_of_videos']; ?></td>
                        <td>
                            <?php if (!$row['is_approved']): ?>
                                <form method="POST" style="display: inline;">
                                    <input type="hidden" name="course_id" value="<?php echo $row['course_id']; ?>">
                                    <button type="submit" name="approve" class="action-btn">Approve</button>
                                </form>
                            <?php endif; ?>
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="course_id" value="<?php echo $row['course_id']; ?>">
                                <button type="submit" name="delete" class="action-btn delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No courses found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php $conn->close(); ?>
