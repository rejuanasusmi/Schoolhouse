<?php
   //include 'PHP/dbConnection.php';

//    session_start();

//    if (!isset($_SESSION['admin_email'])) {
//        header('Location: adminLogold.php');
//        exit();
//     }
    
//     $email = $_SESSION['admin_email'];
//     $sql="SELECT Email,Name FROM Admin WHERE Email='$email'";
//     $check=mysqli_query($conn,$sql);
//     $result=mysqli_fetch_assoc($check);
//     $email=$result['Email'];
//     $name=$result['Name'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <Link rel="stylesheet" href="../../CSS/adminDashStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <title>Admin Panel</title>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>Dashboard</h1>
        </div>
        <ul>
            <li>
                <a href="teacherDash.php">
                    <i class="fa-solid fa-users"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="../Profile/teacher.php">
                    <i class="fa-solid fa-users"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="../Courses/completeCourses.php">
                    <i class="fa-solid fa-user"></i>
                    <span>Complete Courses</span>
                </a>
            </li>
            <li>
                <a href="../Courses/completeCourses.php">
                    <i class="fa-solid fa-money-bill-trend-up"></i>
                    <span>Incomplete Courses</span>
                </a>
            </li>
            <li>
                <a>
                    <i class="fa-sharp fa-solid fa-bell"></i>
                    <span>Notifications</span>
                </a>
            </li>
            <li>
                <a>
                    <i class="fa-solid fa-circle-info"></i>
                    <span>Help</span>
                </a>
            </li>
            <li>
                <a>
                    <i class="fa-sharp fa-solid fa-gear"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li class="log-out">
                <a >
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</body>
</html>