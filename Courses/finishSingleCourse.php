<?php
	include '../PHP/dbConnection.php';

    session_start();
    if (!isset($_SESSION['cour_id'])) {
        header('Location:completeCourses.php');
        exit();
     }

    $c_id=$_SESSION['cour_id'];
    $sql="SELECT course_id,image,course_title,course_topic,course_price,number_of_video FROM courses WHERE course_id='$c_id'";
    $check=mysqli_query($conn,$sql);
    $result=mysqli_fetch_assoc($check);
    $img=$result['image'];
    $c_title=$result['course_title'];
    $c_price=$result['course_price'];
    $c_topic=$result['course_topic'];
    $c_video=$result['number_of_video'];
    $hh="ll";
    if(isset($_POST['Continue'])){
        header('Location:../UploadCourse/uploadvideo.php');
    }
    if(isset($_POST['submit'])){
            
        $query = "UPDATE courses SET finish_value = '1' WHERE course_id = $c_id";
        header('Location:../courses/incompleteCourses.php');

        if (mysqli_query($conn, $query)) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
    
    
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/singleProduct.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<section class="Sinale-course"> 
        <!-- <h1>Single Product</h1> -->
        <div class="flex-box">
            <div class="left">
                <div class="big-img">
                    <img src="../image/<?php echo $img; ?>">
                </div>
            </div>
            <div class="right">
                <div class="url">Course Details</div>
                <div class="pname">Course Tittle: <?php echo $c_title; ?></div>
                <div class="topic">Course Topic: <?php echo $c_topic; ?></div>
                <div class="details">
                     <p>
                       Price: <?php echo $c_price; ?>
                    </p>
                </div>
                <form action="" method="post">
                <div class="quantity">Number Of Video: <?php echo $c_video; ?></div>
                              
                </form>
            </div>
        </div>
    </section>
</body>
</html>    