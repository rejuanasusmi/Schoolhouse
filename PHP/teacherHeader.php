<?php
   //include 'dbConnection.php';

   session_start();

   if (!isset($_SESSION['teacher_email'])) {
       header('Location: Login/teacherLogin.php');
       exit();
    }
    
    $email = $_SESSION['teacher_email'];
    $sql="SELECT Email,Name FROM teachers WHERE Email='$email'";
    $check=mysqli_query($conn,$sql);
    $result=mysqli_fetch_assoc($check);
    $email=$result['Email'];
    $name=$result['Name'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <Link rel="stylesheet" href="../CSS/adminDashStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <title>Admin Panel</title>

</head>
<body>
    <!--Wait-->
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="Dash">
                    <h1>Dashboard</h1>
                </div>
                <div class="search">
                    <input type="text" placeholder="Seach..">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <!-- <div class="user">
                    <a href="UploadCourse/uploadCourse.php" class="btn">Add New</a>
                    
                </div> -->
                <div class="Profile-Information">
                    <p>
                       <?php
                          echo $name;
                       ?><br>
                       <?php                          
                          echo $email;
                       ?>
                    </p>
                </div>
            </div>
        </div>
        
    </div>
    <!--Wait Exit-->
</body>
</html>