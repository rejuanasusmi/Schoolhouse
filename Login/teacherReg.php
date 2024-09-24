<?php
    include '../PHP/dbConnection.php';
    $msg="";
    if(isset($_POST['submit'])){
        $name=mysqli_real_escape_string($conn,$_POST['Name']);
        $email=mysqli_real_escape_string($conn,$_POST['Email']);
        $phone=mysqli_real_escape_string($conn,$_POST['Phone']);
        $Institute=mysqli_real_escape_string($conn,$_POST['school_name']);
        $address=mysqli_real_escape_string($conn,$_POST['address']);
        $password=$_POST['password'];
        $confirm_password=$_POST['confirm-password'];
        // if($_FILES["image"]["error"]===4){
        //     echo "<script> alert('Image does not exist')</script>";
        // }else{
        //     $fileName = $_FILES["image"]["name"];
        //     $fileSize = $_FILES["image"]["size"];
        //     $tmpName = $_FILES["image"]["tmp_name"];

        //     $validImageExsention = ['jpg','jpeg','png','webp'];
        //     //$imageExtension = explode('.',$fileName);
        //     $imageExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        //     //$imageExtension= strtolower(end($imageExtension));
        //     if(!in_array($imageExtension,$validImageExsention)){
        //         echo "<script> alert('Invalid Image Extension');</script>";
        //     }
        //     if($fileSize>100000000){
        //         echo"<script>alert('Image Size is too Large');</script>";
        //     }
        //     else{
        //         $newImageName = uniqid();
        //         $newImageName .='.'.$imageExtension;
        //         move_uploaded_file($tmpName,'../img/'.$newImageName);
        //     }

        // }
        if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM teachers WHERE email='{$email}'"))>0){
            //$msg ="<div class='alert alert=danger'>{$email} - this email already exits</div>";
            echo "<script> alert('{$email}-this email alreay have a registered account')</script>";
        }else{
            if($password===$confirm_password){
                $hashedPassword = md5($password);
                $query = "INSERT INTO teachers (Name, Email, Phone_number, Password,Institute_name,address,number_of_courses_offer) VALUES ('$name', '$email', '$phone', '$hashedPassword','$Institute','$address','0')";
                
                if(mysqli_query($conn,$query)){
                    echo"<div style='display:none;'>";
                    echo "<script> alert('Successfully Account Created');
                    document.location.href='teacherLogin.php';
                    </script>";
                }else{
                    echo "<script> alert('Something Went Wrong');
                    document.location.href='teacherReg.php';
                    </script>";
                }
            } else{
                echo "<script> alert('Password does not match');
                document.location.href='teacherReg.php';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/adminReg.css" />
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="" method="post">
                <h1>Create Teacher Account</h1>
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
                <span>use your email for registration</span>
                <input type="text" name="Name" placeholder="Name" value="<?php if(isset($_POST['submit'])){echo $name;}?>" required>
                <input type="email" name="Email"placeholder="Email" value="<?php if(isset($_POST['submit'])){echo $email;}?>" required>
                <input type="phone" name="Phone" placeholder="Phone" value="<?php if(isset($_POST['submit'])){echo $phone;}?>" required>
                <input type="text" name="school_name" placeholder="Institute Name" value="<?php if(isset($_POST['submit'])){echo $school;}?>" required>
                <input type="text" name="address" placeholder="Address" value="<?php if(isset($_POST['submit'])){echo $address;}?>" required>
               <!-- <input type="file" name="image" required> -->
                <input type="password"name="password" placeholder="Password" required>
                <input type="password" name="confirm-password" placeholder="Confirm Password"required><br/>
                <button type="submit" name="submit" class="btn">Sign Up</button>
            </form>
            <!-- <center>
                <div>
                    <a href="adminLog.php">
                    <button>Sign Up</button>
                    </a>
                </div>
            </center> -->
        </div>
        <div class="overplay-container">
            <div class="overplay">
                <div class="overplay-panel overplay-right">
                    <h1>Already Have An Account?</h1>
                    <p>To keep connect</p>   
                    <a href="teacherLogin.php">                
                    <button class="ghost" id="signIn">Sign In</button>
                    </a>
                </div>
                <!-- <div class="overplay-panel overplay-right">
                    <h1>Create An Account?</h1>
                    <p>Enter you Details</p>   
                    <a href="adminReg.php">              
                    <button class="ghost" id="signUp">Sign Up</button>
                    </a> 
                </div> -->
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="./index.js"></script>
   
</body>
</html>

