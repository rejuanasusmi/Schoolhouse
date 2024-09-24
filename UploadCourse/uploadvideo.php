<?php
include '../PHP/dbConnection.php';

    session_start();
    if (!isset($_SESSION['cour_id'])) {
        header('Location:../Courses/singleCourse.php');
        exit();
     }
    
    $c_id=$_SESSION['cour_id'];
    $sql2="SELECT * FROM courses WHERE course_id='$c_id'";
    $check1=mysqli_query($conn,$sql2);
    $result1=mysqli_fetch_assoc($check1);
    $img=$result1['image'];

    
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
    $t_id=$result['teacher_id'];

    if(isset($_POST['submit']) && isset($_FILES['my_video'])){
        $video_name=$_FILES['my_video']['name'];
        $tmp_name=$_FILES['my_video']['tmp_name'];
        $error=$_FILES['my_video']['error'];

        if($error===0){
            $video_ex=pathinfo($video_name,PATHINFO_EXTENSION);
            $video_ex_lc = strtolower($video_ex);
            $allowed_exs = array('mp4','webm','avi','flv');

            if(in_array($video_ex_lc,$allowed_exs)){
                $new_video_name = uniqid("video-",true).'.'.$video_ex_lc;
                $video_upload_path = 'uploads/'.$new_video_name;
                move_uploaded_file($tmp_name,$video_upload_path);

                $sql = "INSERT INTO videos (teacher_id,course_id,video_name) VALUES ('$t_id','$c_id','$new_video_name')";
                mysqli_query($conn,$sql);
                header("Location:uploadvideo.php");

            }else{
                $em = "You can't upload this kind of files";
                // header("location:uploadvideo.php?error = $em");
            }
        }
    }else{
        // header("location:uploadvideo.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: url('../imm/vvv.jpg') no-repeat center center fixed;
    background-size: cover;
}

/* Wrapper for the form */
.wrapper {
    width: 400px;
    padding: 30px;
    background-color: rgba(255, 255, 255, 0.8); /* Transparent white */
    border-radius: 15px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
}

/* Title styling */
.wrapper h1 {
    text-align: center;
    font-size: 28px;
    margin-bottom: 30px;
    color: #21a9d3;
}

/* Input box for form fields */
.input-box {
    margin-bottom: 20px;
    position: relative;
}

.input-box input {
    width: 100%;
    padding: 10px 0;
    border: none;
    border-bottom: 2px solid #ccc;
    background: transparent;
    font-size: 16px;
    color: #333;
    outline: none;
}

.input-box input::placeholder {
    color: #aaa;
    font-size: 16px;
}


.input-box input:focus {
    border-bottom: 2px solid #21a9d3;
}

/* File input styling */
.input-box input[type="file"] {
    border-bottom: none;
    margin-top: 10px;
}

.input-box input[type="file"]::file-selector-button {
    background-color: #21a9d3;
    padding: 5px 10px;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
}

.input-box input[type="file"]::file-selector-button:hover {
    background-color: #1b8cb5;
}

/* Submit button styling */
.btn {
    width: 100%;
    padding: 10px;
    background-color: #21a9d3;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    color: #fff;
    cursor: pointer;
    margin-top: 20px;
}

.btn:hover {
    background-color: #1b8cb5;
}

    </style>
</head>
<body>
    <div class="wrapper">
        <form action="" method="post" enctype="multipart/form-data">
            <h1>Add Videos</h1>
            <div class="input-box">
                <input type="file" name="my_video" placeholder="Course Title" required>
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
