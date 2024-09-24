<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS and Font Awesome CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.min.css">
    <link rel="stylesheet" href="path/to/your/testyslider.css"> <!--  Testimonial Slider CSS -->
    <!-- Google font -->

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Custom css -->
    <link rel="stylesheet" href="../css/studentstyle.css">
    <style>
        /* Fixing the sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            width: 250px;
            padding-top: 60px;
            padding-left: 0;
            padding-right: 0;
            background-color: #f8f9fa;
            overflow-y: auto;
        }

        .container-fluid {
            margin-left: 250px;
            padding-top: 60px;
        }

        .sidebar-sticky {
            position: sticky;
            top: 0;
            height: 100vh;
        }

        .nav-link {
            font-weight: bold;
            color: #333;
            padding: 15px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nav-link:hover {
            background-color:  #7F00FF;
            color: white;
        }

        .nav-link.active {
            background-color: #007bff;
            color: white;
        }

        .navbar {
            z-index: 1020;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-dark fixed-top p-0 shadow" style="background-color: #590098;">
        <a class="navbar-brand d-flex align-items-center" href="adminDashboard.php">
            <img height="100" width="200" src="../image/logo.png" alt="site icon" class="img-fluid mr-3">
            <small class="ml-3 dashboard-text">Student Dashboard</small>
        </a>
    </nav>

    <!-- sidebar -->
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                    <li class="nav-item">
                            <a href="studentDashboard.php" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="editProfile.php" class="nav-link">
                                <i class="fas fa-user-edit"></i>
                                Edit Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="changePassword.php" class="nav-link">
                                <i class="fas fa-key"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="myCourses.php" class="nav-link">
                                <i class="fas fa-book"></i>
                                My Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="results.php" class="nav-link">
                                <i class="fas fa-book"></i>
                               Result
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="reviewPage.php" class="nav-link">
                                <i class="fas fa-comment-dots"></i>
                                Add Review
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <!-- Script for highlighting active page -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var links = document.querySelectorAll('.nav-link');

            links.forEach(function (link) {
                if (link.href === window.location.href) {
                    link.classList.add('active');
                    link.style.backgroundColor = "#007bff";
                    link.style.color = "#fff";
                }
            });
        });
    </script>
</body>

</html>