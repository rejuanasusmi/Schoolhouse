<?php
	include '../PHP/dbConnection.php';

    session_start();
   if (!isset($_SESSION['teacherId'])) {
       header('Location:../Courses/teacherdashboard.php');
       exit();
    }
    $tech_id = $_SESSION['teacherId'];
    if (isset($_POST['submit'])) {   
        $course_title = mysqli_real_escape_string($conn, $_POST['title']);
        $course_topic = mysqli_real_escape_string($conn, $_POST['topic']);
        $video_num = mysqli_real_escape_string($conn, $_POST['video_number']);
        $course_price = mysqli_real_escape_string($conn, $_POST['price']);
        if($_FILES["image"]["error"]===4){
            echo "<script> alert('Image does not exist')</script>";
        }else{
            $fileName = $_FILES["image"]["name"];
            $fileSize = $_FILES["image"]["size"];

            $tmpName = $_FILES["image"]["tmp_name"];
            $validImageExsention = ['jpg','jpeg','png','webp'];
            $imageExtension = explode('.',$fileName);
            $imageExtension = strtolower(end($imageExtension));
            if(!in_array($imageExtension,$validImageExsention)){
                echo "<script> alert('Invalid Image Extension');</script>";
            }
            else if($fileSize>100000000){
                echo"<script>alert('Image Size is too Large');</script>";
            }
            else{
                $newImageName = uniqid();
                $newImageName .='.'. $imageExtension;

                move_uploaded_file($tmpName,'../image/'. $newImageName);

                $query = "INSERT INTO courses ( teacher_id , course_title , course_topic , image , course_price ,number_of_video, finish_value )
                VALUES ('$tech_id', '$course_title', '$course_topic','$newImageName','$course_price','$video_num','0')" or die('query failed'); 
                mysqli_query($conn,$query);
                
                echo"<script>
                    alert('Successfully Added');
                    document.location.href='../Courses/incompleteCourses.php';
                    </script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/adminRegNew.css">
    
</head>
<body>
    <div class="wrapper">
        <form action="" method="post" enctype="multipart/form-data">
            <h1>Add Course</h1>
            <div class="input-box">
                <input type="text" name="title" placeholder="Course Title" required>
            </div>
            <div class="input-box">
                <input type="text" name="topic" placeholder="Course Topic"  required>
            </div>
            <div class="input-box">
                <input  name="video_number" placeholder="Number Of videos" required>
            </div>
            <div class="input-box">
                <input  name="price" placeholder="Course Price" required>
            </div>
            <div class="input-box">
                <input type="file" name="image" accept="image/jpg, image/jpeg, image/png, image/webp" placeholder="Course Image" required>
            </div>
            <!-- <div class="remember-forgot">
                <label><input type="checkbox">I agree with all terms</label>
                <a href="#">Already Have an Account</a>
            </div> -->
            <button type="submit" name="submit" class="btn">Upload</button>
            <!-- <input type="submit" value="Login"> -->
       </form>
    </div>
</body>
</html>
