<?php
// Start the session
if (!isset($_SESSION)) {
    session_start();
}

// Include database connection
include_once('../PHP/dbConnection.php');
include('./studentinclude/header.php');

// Ensure student is logged in
if (!isset($_SESSION['is_login'])) {
    echo "<script> location.href='./login.php';</script>";
    exit();
}

// Get the logged-in student's info
$studentEmail = $_SESSION['stulogemail'];

// Fetch student ID and name from the database
$sql = "SELECT stu_id, stu_name FROM students WHERE stu_email = '$studentEmail'";
$result = mysqli_query($conn, $sql);
$studentData = mysqli_fetch_assoc($result);
$studentID = $studentData['stu_id'];
$studentName = $studentData['stu_name'];

// Handle form submission for the review
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = mysqli_real_escape_string($conn, $_POST['comment_box']);
    $created_at = date("Y-m-d H:i:s");

    // Insert review into the database
    $query = "INSERT INTO review (student_id, student_name, img, comment_box, created_at) 
              VALUES ('$studentID', '$studentName', 'default.jpg', '$comment', '$created_at')";
    
    if (mysqli_query($conn, $query)) {
        $message = "Review submitted successfully!";
    } else {
        $message = "Error submitting review: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Your Review</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f9fc;
        }
        .review-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }
        .review-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .review-header h2 {
            color: #333;
            font-size: 28px;
        }
        .form-control {
            border-radius: 0;
            box-shadow: none;
        }
        .btn-submit {
            background-color: #007bff;
            color: white;
            border-radius: 0;
            width: 100%;
            padding: 10px;
        }
        .btn-submit:hover {
            background-color: #0056b3;
        }
        .alert {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="review-container">
    <div class="review-header">
        <h2>Submit Your Review</h2>
        <p>We value your feedback!</p>
    </div>

    <?php if (isset($message)) { ?>
        <div class="alert alert-info"><?php echo $message; ?></div>
    <?php } ?>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="studentName" class="form-label">Student Name</label>
            <input type="text" class="form-control" id="studentName" name="studentName" value="<?php echo $studentName; ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="comment_box" class="form-label">Your Review</label>
            <textarea class="form-control" id="comment_box" name="comment_box" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-submit">Submit Review</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php
include('./studentinclude/footer.php');
?>