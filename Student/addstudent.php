<?php
if(!isset($_SESSION)) {
    session_start();
}
include_once('../PHP/dbConnection.php');
// Check if form is submitted
if (isset($_POST['stusignup']) && isset($_POST['stuname']) && isset($_POST['stuemail'])
&& isset($_POST['stupass']) && isset($_POST['stupassconfirm'])) {
    // Get form inputs and escape strings to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $_POST['stuname']);
    $email = mysqli_real_escape_string($conn, $_POST['stuemail']);
    $password = $_POST['stupass'];
    $confirm_password = $_POST['stupassconfirm'];

    // Check if email already exists
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM students WHERE stu_email='$email'")) > 0) {
        echo json_encode("this email already has a registered account");
    } else {
        // Check if passwords match
        if ($password === $confirm_password) {
            // Hash the password
            $hashedPassword = md5($password);

            // Insert data into the database
            $query = "INSERT INTO students (stu_name, stu_email, stu_pass) VALUES ('$name', '$email', '$hashedPassword')";
            if (mysqli_query($conn, $query)) {
                echo json_encode("ok");
            } else {
                echo json_encode("failed");
            }
        } else {
            echo json_encode("password incorrect");
        }
    }
}

// Student Login Verification
if(!isset($_SESSION['is_login'])) {
if (isset($_POST['checkLogemail']) && isset($_POST['stulogemail']) && isset($_POST['stulogpass'])) {
    $stulogemail = mysqli_real_escape_string($conn, $_POST['stulogemail']);
    $stulogpass = $_POST['stulogpass'];

    // Check if email exists
    $query = "SELECT stu_pass FROM students WHERE stu_email='$stulogemail'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['stu_pass'];

        // Verify the password
        if (md5($stulogpass) === $hashedPassword) {
            $_SESSION['is_login'] = true;
            $_SESSION['stulogemail'] = $stulogemail;
            echo json_encode("login success");
        } else {
            echo json_encode("invalid password");
        }
    } else {
        echo json_encode("email not found");
    }
}
}
?>