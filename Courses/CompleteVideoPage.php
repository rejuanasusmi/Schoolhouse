<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videoes</title>
    
</head>
<body>
    <a href="">Upload</a>
    <div cass = "alb">
        <?php
            include '../PHP/dbConnection.php';
            session_start();
            if (!isset($_SESSION['cour_id2'])) {
                header('Location:incompleteCourses.php');
                exit();
            }

            $c_id=$_SESSION['cour_id2'];
            $sql="SELECT * FROM courses WHERE course_id='$c_id'";
            $check=mysqli_query($conn,$sql);
            $result=mysqli_fetch_assoc($check);
            $img=$result['image'];
            $c_title=$result['course_title'];
            $c_price=$result['course_price'];
            $c_topic=$result['course_topic'];
            $c_video=$result['number_of_video'];
            
            $sql1 = "SELECT * FROM videos WHERE course_id = '$c_id' ORDER BY v_id DESC ";  
            $res = mysqli_query($conn,$sql1);

            if(mysqli_num_rows($res)>0){
                while($video = mysqli_fetch_assoc($res)){ 
                    print_r($video);
                    ?>
                       
                    <?php  
               }
            }else{
                echo "<h2>Empty</h2>";
            }
        ?>
    </div>
</body>
</html>
