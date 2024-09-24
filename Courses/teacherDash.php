<?php
   include '../PHP/dbConnection.php';  
   
   session_start();
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
    <Link rel="stylesheet" href="../CSS/adminDashStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Admin Panel</title>

</head>
<body>
    <?php
        include '../PHP/teacherNav.php';
    ?>
    <!--Wait-->
    <div class="container">
        <?php
          include  '../PHP/teacherHeader.php';
        ?>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h2>30000</h2>
                        <h3>Students</h3>
                    </div>
                    <div class="icon-case">
                        <i class="fa-solid fa-user-group"style="color: #168aad;"></i>
                    </div>
                    <div class="view">
                        <a href="" class="btn">Details</a>
                    </div>
                </div>

                <div class="card">
                    <div class="box">
                        <h2>200</h2>
                        <h3>Schools</h3>
                    </div>
                    <div class="icon-case">
                        <i class="fa-solid fa-shop" style="color: #168aad;"></i></i>
                    </div>
                    <div class="view">
                        <a href="#" class="btn">Details</a>
                    </div>
                </div>

                <div class="card">
                    <div class="box">
                        <h2>1500</h2>
                        <h3>Teachers</h3>
                    </div>
                    <div class="icon-case">
                        <i class="fa-solid fa-users" style="color: #168aad;"></i></i>
                    </div>
                    <div class="view">
                        <a href="#" class="btn">Details</a>
                    </div>
                </div>

                <div class="card">
                    <div class="box">
                        <h2>600000</h2>
                        <h3>Income</h3>
                    </div>
                    <div class="icon-case">
                        <i class="fa-solid fa-money-bill-trend-up" style="color: #168aad;"></i></i>
                    </div>
                    <div class="view">
                        <a href="" class="btn">Details</a>
                    </div>
                </div>

            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Recent Payments</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Shop</th>
                            <th>Amount</th>
                            <th>Option</th>
                        </tr>
                        <tr>
                            <td>Rejuana Sushmi</td>
                            <td>Honey-Bunny</td>
                            <td>$1234</td>
                            <td><a href="#" class="btn">View</a></td>

                        </tr>
                        <tr>
                            <td>Maisha Mim</td>
                            <td>Honey-Bunny</td>
                            <td>$1234</td>
                            <td><a href="#" class="btn">View</a></td>

                        </tr>
                        <tr>
                            <td>Puspita Anjum</td>
                            <td>Honey-Bunny</td>
                            <td>$1234</td>
                            <td><a href="#" class="btn">View</a></td>

                        </tr>
                        <tr>
                            <td>Sadia Islam</td>
                            <td>Honey-Bunny</td>
                            <td>$1234</td>
                            <td><a href="#" class="btn">View</a></td>

                        </tr>
                    </table>
                </div>
                <div class="new-sellers">
                    <div class="title">
                        <h2>New Students</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Option</th>
                        </tr>
                        <tr>
                            <td>Seller</td>
                            <td>Rejuana Sushmi</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>Customer</td>
                            <td>Maisha Mim</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>Seller</td>
                            <td>Sadia Islam</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>Customer</td>
                            <td>Puspita Anjum</td>
                            <td><a href="../payment/next.php" class="btn">View</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Wait Exit-->
</body>
</html>