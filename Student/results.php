<?php
session_start();
include('../PHP/dbConnection.php');

// Check if the student is logged in
if (!isset($_SESSION['is_login'])) {
    echo "<script> location.href='./index.php';</script>";
    exit;
}

// Check if the student ID is set in the session
// if (!isset($_SESSION['stu_id'])) {
//     echo "Student ID is not available in session.";
//     exit; // Exit the script if stu_id is not set
// }

//$student_id = $_SESSION['stu_id']; // Now the student_id should be available

// Fetch the quiz results for the logged-in student
$sql = "
    SELECT q.course_id, c.course_name, q.correct_count, q.total_questions, q.date_taken 
    FROM quiz_results q
    JOIN courses c ON q.course_id = c.course_id
    WHERE q.student_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$results = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        .result-table {
            margin: 50px auto;
            width: 80%;
            border-collapse: collapse;
        }
        .result-table th, .result-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        .result-table th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

<div class="container">
    <h3>Your Quiz Results</h3>

    <table class="result-table">
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Correct Answers</th>
                <th>Total Questions</th>
                <th>Date Taken</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($results->num_rows > 0) {
                while ($row = $results->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['course_name'] . "</td>";
                    echo "<td>" . $row['correct_count'] . "</td>";
                    echo "<td>" . $row['total_questions'] . "</td>";
                    echo "<td>" . $row['date_taken'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No quiz results available.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
