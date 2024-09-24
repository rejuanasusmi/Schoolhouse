<?php
session_start();
include('../PHP/dbConnection.php');

// Ensure the student is logged in
if (isset($_SESSION['is_login'])) {
    $stulogemail = $_SESSION['stulogemail'];
} else {
    echo "<script> location.href='./index.php';</script>";
}

// Fetch the logged-in student's name and hashed password
$sql = "SELECT stu_pass, stu_name FROM students WHERE stu_email='$stulogemail'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Store the student's name for display
$loggedInStudentName = $row['stu_name'];

// Handle password update
if (isset($_POST['updatePassword'])) {
    $currentPassword = mysqli_real_escape_string($conn, $_POST['currentPassword']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    // Hash the current password input using md5 to match the stored hash
    $hashedCurrentPassword = md5($currentPassword);

    // Verify the current password using md5
    if ($hashedCurrentPassword === $row['stu_pass']) {
        // Check if the new password matches the confirm password
        if ($newPassword === $confirmPassword) {
            // Hash the new password using md5
            $hashedNewPassword = md5($newPassword);
            $updateSql = "UPDATE students SET stu_pass='$hashedNewPassword' WHERE stu_email='$stulogemail'";

            if (mysqli_query($conn, $updateSql)) {
                $msg = '<div class="alert alert-success">Password Updated Successfully</div>';
            } else {
                $msg = '<div class="alert alert-danger">Failed to Update Password</div>';
            }
        } else {
            $msg = '<div class="alert alert-warning">New Password and Confirm Password do not match</div>';
        }
    } else {
        $msg = '<div class="alert alert-danger">Current Password is Incorrect</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/studentstyle.css"> <!-- Link your existing CSS -->

    <style>
        body {
            background-color: #f4f4f4;
        }

        .change-password-container {
            margin: 50px auto;
            max-width: 600px;
            background: #fff;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-custom {
            background-color: #28a745;
            color: white;
            font-size: 16px;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        .btn-custom:hover {
            background-color: #218838;
        }

        .student-name {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<?php include('./studentinclude/header.php'); ?> <!-- Include your sidebar here -->

<div class="container-fluid">
    <div class="change-password-container">
        <div class="student-name">Logged in as: <?php echo $loggedInStudentName; ?></div> <!-- Display the logged-in student name -->
        <h2 class="text-center">Change Password</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="currentPassword">Current Password</label>
                <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
            </div>
            <div class="form-group">
                <label for="newPassword">New Password</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm New Password</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
            </div>
            <button type="submit" name="updatePassword" class="btn btn-custom ">Save Changes</button>
        </form>
        <?php if (isset($msg)) { echo $msg; } ?>
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
