<?php
    // Include database connection file
    include '../PHP/dbConnection.php';

    // Check if form is submitted
    if (isset($_POST['submit'])) {
        // Get form inputs and escape strings to prevent SQL injection
        $name = mysqli_real_escape_string($conn, $_POST['stuname']);
        $email = mysqli_real_escape_string($conn, $_POST['stuemail']);
        $password = $_POST['stupass'];
        $confirm_password = $_POST['stupassconfirm'];

        // Check if email already exists
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM students WHERE email='$email'")) > 0) {
            echo "<script>alert('$email - this email already has a registered account')</script>";
        } else {
            // Check if passwords match
            if ($password === $confirm_password) {
                // Hash the password
                $hashedPassword = md5($password);

                // Insert data into the database
                $query = "INSERT INTO students (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";
                if (mysqli_query($conn, $query)) {
                    echo "<script>
                            alert('Account Successfully Created'); 
                            // document.location.href='StudentLog.php'; 
                          </script>";
                } else {
                    echo "<script>
                            alert('Something Went Wrong'); 
                            // document.location.href='studentRegistration.php'; 
                          </script>";
                }
            } else {
                echo "<script>
                        alert('Password does not match'); 
                        // document.location.href='studentRegistration.php'; 
                      </script>";
            }
        }
    }
?>
