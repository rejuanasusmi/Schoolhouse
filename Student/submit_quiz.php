<?php
session_start();
include('../PHP/dbConnection.php');

// Ensure the student is logged in
if (!isset($_SESSION['is_login'])) {
    echo "<script> location.href='./index.php';</script>";
    exit;
}

$student_id = $_SESSION['stu_id'];
$course_id = $_POST['course_id'];
$answers = $_POST['answers'];
$correct_count = 0;
$total_questions = count($answers);

//$correct_count = $_GET['correct_count'];
//$total_questions = $_GET['total_questions'];
//$total_questions = count($answers);

foreach ($answers as $question_id => $option_id) {
    // Save the student's answer
    $sql = "INSERT INTO answers (student_id, question_id, option_id) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $student_id, $question_id, $option_id);
    $stmt->execute();
    
    // Check if the answer is correct
    $sql_check = "SELECT option_id FROM correct_answers WHERE question_id = ? AND option_id = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("ii", $question_id, $option_id);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    // Store the result (1 for correct, 0 for incorrect)
    if ($result_check->num_rows > 0) {
        $correct_count++;
    }

    // Save quiz result into the 'quiz_results' table
// $sql = "INSERT INTO quiz_results (student_id, course_id, correct_count, total_questions) VALUES (?, ?, ?, ?)";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("iiii", $student_id, $course_id, $correct_count, $total_questions);

// $stmt_result->execute(); // This saves the quiz results

// if ($stmt_result->affected_rows > 0) {
//     echo "Result saved successfully!";
// } else {
//     echo "Failed to save the result.";
// }

// // Close statements and connection
// $stmt_result->close();
// $stmt_answer->close();
// $stmt_check->close();
// $conn->close();
}

// Redirect to quiz page with the result
header("Location: quiz.php?course_id=$course_id&correct_count=$correct_count&total_questions=$total_questions");
exit;
?>
