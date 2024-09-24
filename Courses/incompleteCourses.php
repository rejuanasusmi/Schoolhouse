<?php
    include '../PHP/dbConnection.php';
    session_start();
    if (isset($_GET['details'])) {
        
        $course_details = $_GET['details'];
        $_SESSION['cour_id'] = $course_details;
        //$_SESSION['teacher_id'] =   $tech_id;
        header('location:singleCourse.php');
    }

    if (isset($_GET['details1'])) {
        
        $course_details1 = $_GET['details1'];
        $_SESSION['cour_id1'] = $course_details1;
        //$_SESSION['teacher_id'] =   $tech_id;
        header('location:VideoPage.php');
    }

    if (!isset($_SESSION['teacher_email1'])) {
        header('Location:../Login/teacherLogin.php');
        exit();
     }
    $email = $_SESSION['teacher_email1'];
    $sql="SELECT Email,Name,teacher_id FROM teachers WHERE Email='$email'";
    $check=mysqli_query($conn,$sql);
    $result=mysqli_fetch_assoc($check);
    $email=$result['Email'];
    $name=$result['Name'];
    $tt_id=$result['teacher_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/courseview.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="img/logo/logo.png" rel="icon">
    <title>RuangAdmin - Dashboard</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../CSS/ruang-admin.min.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <?php
            include '../PHP/teacherNavHead.php';
        ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php
                    include '../PHP/teacherTop.php';
                ?>
                <div class="container">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Incomplete Courses</h1>
                    </div>        
                    <div class="content1">
                    <div class="cards">
                        <?php
                            $select_course = mysqli_query($conn, "SELECT course_title, course_topic, image,course_id FROM courses WHERE finish_value='0' and teacher_id = '$tt_id'") or die('query failed');
                            if (mysqli_num_rows($select_course) > 0 && mysqli_num_rows($select_course) <5  ) {
                                while ($fetch_course = mysqli_fetch_assoc($select_course)) {
                        ?>
                        <div class="card">
                            <div class="box">
                                <h2><?php echo htmlspecialchars($fetch_course['course_title']); ?></h2>
                                <h3><?php echo htmlspecialchars($fetch_course['course_topic']); ?></h3>
                            </div>
                            <div class="view">
                                <!-- <a href="customerTable.php" class="btn">Details</a> -->
                                <a href="incompleteCourses.php?details=<?php echo $fetch_course['course_id'];?>">
                                <button class="btn">Details</button>
                                </a>
                                <a href="incompleteCourses.php?details1=<?php echo $fetch_course['course_id'];?>">
                                <button class="btn">Videos</button>
                                </a>
                            </div>
                        </div>
                        <?php
                                }
                            }else{
                                echo "You Have no Course";
                            }
                        ?>
                        </div>
                        <div class="add-btn">
                            <a href="../UploadCourse/upload.php">
                            <button class="btn">Add new</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/ruang-admin.min.js"></script>
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../js/demo/chart-area-demo.js"></script> 
</body>
</html>