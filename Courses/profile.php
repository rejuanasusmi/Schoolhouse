<?php
   include '../PHP/dbConnection.php';

   session_start();
   if (!isset($_SESSION['teacher_email'])) {
       header('Location:../Login/teacherLogin.php');
       exit();
    }
    
    $email = $_SESSION['teacher_email'];
    $sql="SELECT * FROM teachers WHERE Email='$email'";
    $check=mysqli_query($conn,$sql);
    $result=mysqli_fetch_assoc($check);
    $email=$result['Email'];
    $name=$result['Name'];
    $phone=$result['Phone_number'];
    $chakri=$result['Institute_name'];
    $addr=$result['address'];
    $coo=$result['number_of_courses_offer'];
    $tech_id=$result['teacher_id'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Card</title>
    <style>
        
        .profile-card {
            display: flex;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 900px;
            max-width: 100%;
            margin-left: 150px; /* Shift the card to the right */
        }
        .profile-card .left {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            padding: 40px;
            color: white;
            width: 300px;
            text-align: center;
        }
        .profile-card .left img {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            object-fit: cover;
        }
        .profile-card .left h2 {
            margin-top: 20px;
            font-size: 2rem;
            font-weight: bold;
        }
        .profile-card .left p {
            font-size: 1.2rem;
            margin-top: 10px;
        }
        .profile-card .right {
            padding: 40px;
            width: 100%;
        }
        .profile-card .right h3 {
            margin-bottom: 20px;
            font-size: 1.6rem;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 10px;
        }
        .profile-card .right .info {
            margin-bottom: 25px;
        }
        .profile-card .right .info div {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .profile-card .right .info div span {
            color: #555;
            font-size: 1.3rem;
        }
        .profile-card .right .projects {
            margin-bottom: 25px;
        }
        .profile-card .right .projects div {
            display: flex;
            justify-content: space-between;
        }
        .profile-card .right .projects div p {
            color: #888;
            font-size: 1.2rem;
        }
        .profile-card .right .social {
            display: flex;
            justify-content: center;
        }
        .profile-card .right .social a {
            margin: 0 20px;
            text-decoration: none;
            color: white;
            background: #00c6ff;
            padding: 15px;
            border-radius: 50%;
            font-size: 1.5rem;
            display: inline-block;
        }
        .profile-card .right .social a:hover {
            background: #0072ff;
        }
    </style>

    <link href="img/logo/logo.png" rel="icon">
    <title>Teacher Profile</title>
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
        <div class="profile-card">
            <div class="left">
                <img src="https://via.placeholder.com/160" alt="Profile Picture">
                <h2><?php echo $name; ?></h2>
                <p>Teacher</p>
            </div>
            <div class="right">
                <h3>Profile</h3>
                <div class="info">
                    <div>
                        <span>Email</span>
                        <span><?php echo $name; ?></span>
                    </div>
                    <div>
                        <span>Phone</span>
                        <span><?php echo $phone; ?></span>
                    </div>
                    <div>
                        <span>Institute</span>
                        <span><?php echo $chakri; ?></span>
                    </div>
                    <div>
                        <span>Address</span>
                        <span><?php echo $addr; ?></span>
                    </div>
                    <div>
                        <span>Total Course Offer</span>
                        <span><?php echo $coo; ?></span>
                    </div>
                </div>
                
                <div class="social">
                    <a href="#"><i class="fab fa-facebook-f">F</i></a>
                    <a href="#"><i class="fab fa-twitter">T</i></a>
                    <a href="#"><i class="fab fa-instagram">I</i></a>
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
