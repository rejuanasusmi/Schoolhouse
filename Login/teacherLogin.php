<?php
    include '../PHP/dbConnection.php';
    $msg="";
    if(isset($_POST['submit'])){
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $password=$_POST['password'];
        $sql="SELECT Email,Password FROM teachers WHERE Email='$email'";
        $check=mysqli_query($conn,$sql);
        if(!$check){
             echo"<script> alert('This email has no account');
             document.location.href='teacherLogin.php';
             </script>";
        }else{
            $result=mysqli_fetch_assoc($check);
            $email=$result['Email'];
            $encrePass=$result['Password'];

            if(mysqli_num_rows($check)>0){
                if(md5($password)==$encrePass){
                    session_start();
                    $_SESSION['teacher_email'] = $email;
                    echo "<script> alert('Successfully Logged In');
                    document.location.href='../Courses/teacherdashboard.php';
                    </script>";

                    $_SESSION['teacher_email1'] = $email;
                    echo "<script> alert('Successfully Logged In');
                    document.location.href='../Courses/incompleteCourses.php';
                    </script>";

                }
                else{
                    echo "<script> alert('Incorrect Password');
                    document.location.href='teacherLogin.php';
                    </script>";
                }
            }else{
            header('location:teacherLogin.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/adminLog.css" />
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="" method="post">
                <h1>Sign In As Teacher</h1>
                <div class="social-container">
                    <a href="#">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
                <span>Log in to your account</span>
                <input type="email" name="email" placeholder="Email" value="<?php if(isset($_POST['submit'])){echo $email;}?>" required>
                <input type="password" name="password" placeholder="Password"  required>
                <a href="#">Forgot Password?</a>
                <button type="submit" name="submit" class="btn">Sign In</button>
            </form>  
                <!-- <center>
                <div>
                <a href="AdminDash/adminDash.php">
                 <button>Sign In</button>
                </a>
                </div>
                </center> -->
        </div>
        <div class="overplay-container">
            <div class="overplay">
                <!-- <div class="overplay-panel overplay-left">
                    <h1>Already Have An Account?</h1>
                    <p>To keep connect</p>                   
                    <button class="ghost" id="signIn">Sign In</button>
                </div> -->
                <div class="overplay-panel overplay-right">
                    <h1>Create Teacher Account?</h1>
                    <p>Enter you Details</p>   
                    <a href="teacherReg.php">              
                    <button class="ghost" id="signUp">Sign Up</button>
                    </a> 
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="./index.js"></script>
   
</body>
</html>

