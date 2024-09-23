<?php
include '../PHP/dbConnection.php';
session_start();

if (isset($_POST['submit-btn'])) {

  // Sanitize email (password does not need sanitizing this way)
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);  // Do not sanitize password with FILTER_SANITIZE_STRING
  
  // Query to select user based on email and password
  $select_user = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email' AND password = '$password'") or die('Query failed');

  // Debug: Check if query is fetching the correct data
  // echo "Query returned: " . mysqli_num_rows($select_user);

  if (mysqli_num_rows($select_user) > 0) {
      $row = mysqli_fetch_assoc($select_user);

      // Set session variables
      $_SESSION['admin_name'] = $row['Email'];  // Based on your database, 'name' is 'Email'
      $_SESSION['admin_email'] = $row['Email'];
      $_SESSION['admin_id'] = $row['ID'];

      // Redirect to the admin dashboard
      header('Location: admindashboard.php');
      exit();  // Ensure no further code executes after redirection

  } else {
      // Error message for incorrect email or password
      $message[] = 'Incorrect email or password';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login Panel</title>
  <link rel="stylesheet" href="adminlogin.css">
</head>
<body>
  
  <div class="container">
    <div class="myform">
      <form action="" method="POST">
        <h2>ADMIN LOGIN</h2>
        <input type="text" name="email" placeholder="Admin Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="submit-btn">LOGIN</button>
        <?php
        // Display error message if any
        if (isset($message)) {
            foreach ($message as $msg) {
                echo "<p style='color:red;'>$msg</p>";
            }
        }
        ?>
      </form>
    </div>
    <div class="image">
      <img src="image.jpg" alt="Admin login image">
    </div>
  </div>

</body>
</html>
