<?php
include '../PHP/dbConnection.php';
// Query to count the number of reviews
$sql = "SELECT COUNT(*) AS total_reviews FROM review";
$result = mysqli_query($conn, $sql);

// Fetch the result
$row = mysqli_fetch_assoc($result);
$total_reviews = $row['total_reviews'];


// SQL query to sum up the earnings from completed payments
$sql = "SELECT SUM(course_price) AS total_earnings FROM payment WHERE payment_status = 'Completed'";
$result = mysqli_query($conn, $sql);

// Initialize the earnings variable
$total_earnings = 0;

// Fetch the total earnings from the database
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $total_earnings = $row['total_earnings'] ?? 0;
}
/*session_start();
if (!isset($_SESSION['Email'])) {
    header("Location: admindashboard.php"); // Redirect to login page if not logged in
    exit();
}*/
// Fetch payment data from the database
$query = "
    SELECT 
        payment.payment_id,
        students.student_id,
        students.name,
        courses.course_id,
        courses.course_topic,
        courses.course_title,
        courses.course_price,
        payment.payment_status,
        payment.payment_date
    FROM 
        payment
    JOIN 
        students ON payment.student_id = students.student_id
    JOIN 
        courses ON payment.course_id = courses.course_id
";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
$query = "SELECT * FROM payment";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// Fetch course and teacher data
$course_query = "
    SELECT 
        courses.course_id,
        courses.course_title,
        courses.course_topic,
        courses.course_price,
        teachers.name AS teacher_name
    FROM 
        courses
    JOIN 
        teachers ON courses.teacher_id = teachers.teacher_id
";
$course_result = mysqli_query($conn, $course_query);

if (!$course_result) {
    die("Query failed: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="school"></ion-icon>
                        </span>
                        <span class="title">School House</span>
                    </a>
                </li>

                <li>
            <a href="admindashboard.php"> <!-- Link to the admin dashboard -->
                <span class="icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="title">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="studentslist.php"> <!-- Link to the students' dashboard -->
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">Students</span>
            </a>
        </li>

        <li>
            <a href="teacherslist.php"> <!-- Link to the teachers' dashboard -->
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">Teachers</span>
            </a>
        </li>
        <li>
            <a href="course.php"> <!-- Link to the teachers' dashboard -->
                <span class="icon">
                    <ion-icon name="book-outline"></ion-icon>
                </span>
                <span class="title">Course</span>
            </a>
        </li>
       

        <li>
            <a href="review.php"> <!-- Link to settings -->
                <span class="icon">
                    <ion-icon name="settings-outline"></ion-icon>
                </span>
                <span class="title">Review</span>
            </a>
        </li>

        <li>
            <a href="logout.php"> <!-- Link to log out -->
                <span class="icon">
                    <ion-icon name="log-out-outline"></ion-icon>
                </span>
                <span class="title">Sign Out</span>
            </a>
        </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                       <form method="GET" action="students_dashboard.php"> <!-- Form that submits the search query -->
                            <label>
                                 <input type="text" name="search" placeholder="Search by name" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                            </label>
                              <!--<input type="submit" value="Search">--> <!-- Make sure the input is inside the form -->
                            </form>
                </div>



                <h3>Puspita</h3> <!-- Display logged-in user's name -->
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
            <div class="card">
                    <div>
                        <?php
                        $students_query = "SELECT COUNT(*) as student_count FROM students";
                        $students_result = $conn->query($students_query);
                        $students_count = $students_result->fetch_assoc()['student_count'];
                        ?>
                        <div class="numbers"><?php echo $students_count; ?></div>
                        <div class="cardName">Students</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>

 <!-- Fetch and Display Teachers Count -->
                <div class="card">
                    <div>
                        <?php
                        $teachers_query = "SELECT COUNT(*) as teacher_count FROM teachers";
                        $teachers_result = $conn->query($teachers_query);
                        $teachers_count = $teachers_result->fetch_assoc()['teacher_count'];
                        ?>
                        <div class="numbers"><?php echo $teachers_count; ?></div>
                        <div class="cardName">Teachers</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $total_reviews; ?></div>
                        <div class="cardName">Comments</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo number_format($total_earnings, 2); ?></div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

                

            <!-- ================ Order Details List ================= -->
            <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Payments List</h2>
               
            </div>

            <table>
                <thead>
                    <tr>
                        <td>Payment ID</td>
                        <td>Student ID</td>
                        <td>Student Name</td>
                        <td>Course ID</td>
                        <td>Course Title</td>
                        <td>Course Price</td>
                        <td>Payment</td>
                        <td>Status</td>
                        <td>Payment Date</td>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    // Loop through all payment records and display them in the table
                    while ($row = mysqli_fetch_assoc($result)) {
                        $statusClass = ($row['payment_status'] == 'Completed') ? 'return' : 'inProgress';
                        $statusText = ($row['payment_status'] == 'Completed') ? 'Return' : 'In Progress';
                        echo "
                        <tr>
                            <td>{$row['payment_id']}</td>
                            <td>{$row['student_id']}</td>
                            <td>{$row['student_name']}</td>
                            <td>{$row['course_id']}</td>
                            <td>{$row['course_title']}</td>
                            <td>{$row['course_price']}</td>
                            <td>{$row['payment_status']}</td>
                            <td><span class='status $statusClass'>$statusText</span></td>
                            <td>{$row['payment_date']}</td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

             
        
            </div>
        </div>
    </div>

   


    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>