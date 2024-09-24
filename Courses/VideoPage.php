<?php
   include '../PHP/dbConnection.php';

    session_start();
    
    if (!isset($_SESSION['cour_id1'])) {
        header('Location:incompleteCourses.php');
        exit();
    }

    $c_id = $_SESSION['cour_id1'];
    $sql1 = "SELECT * FROM videos WHERE course_id = '$c_id' ORDER BY v_id DESC";  
    $res = mysqli_query($conn, $sql1);

    if (!isset($_SESSION['teacher_email'])) {
       header('Location:../Login/teacherLogin.php');
       exit();
    }
    
    $email = $_SESSION['teacher_email'];
    $sql="SELECT Email,Name,teacher_id FROM teachers WHERE Email='$email'";
    $check=mysqli_query($conn,$sql);
    $result=mysqli_fetch_assoc($check);
    $email=$result['Email'];
    $name=$result['Name'];
    $tech_id=$result['teacher_id'];
    
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos</title>
    <link href="img/logo/logo.png" rel="icon">
    <title>Teacher Dashboard</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../CSS/ruang-admin.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 300px;
            margin: 15px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card video {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .card h2 {
            font-size: 18px;
            margin: 15px 0;
        }

        .card button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: auto; /* Push button to the bottom */
        }

        .card button:hover {
            background-color: #218838;
        }

        h2 {
            text-align: center;
        }
    </style>
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
                <?php
                    $select_video = mysqli_query($conn, "SELECT * FROM videos") or die('query failed');
                    if (mysqli_num_rows($select_video) > 0 && mysqli_num_rows($select_video) <5  ) {
                        while ($fetch_video = mysqli_fetch_assoc($select_video)) {
                ?>
                <div class="container">
                    <?php                       

                        if (mysqli_num_rows($res) > 0) {
                            while ($video = mysqli_fetch_assoc($res)) { 
                                $vd_id = $fetch_video['v_id'];

                                    if (isset($_POST['submit'])) {
                                        
                                        $query = "DELETE FROM videos WHERE v_id = $vd_id";
                                        
                                        if (mysqli_query($conn, $query)) {                                           
                                            
                                            exit();
                                        } else {
                                            echo "Error deleting record: " . mysqli_error($conn);
                                        }
                                    }    
                                ?>
                                <div class="card">
                                    <video src="../UploadCourse/uploads/<?=$video['video_name']?>" controls></video>
                                    <h2><?=$video['video_name']?></h2>
                                    <form method="post">
                                        <button type="submit" name="submit">Delete Video</button>
                                    </form>
                                    
                                </div>
                                <?php  
                        }
                        } else {
                            echo "<h2>No videos available</h2>";
                        }
                    ?>
                </div>
                <?php
                                }
                            }
                        ?>
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
