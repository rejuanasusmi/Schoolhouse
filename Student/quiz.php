<?php
session_start();
include('../PHP/dbConnection.php');

// Ensure the student is logged in
if (!isset($_SESSION['is_login'])) {
    echo "<script> location.href='./index.php';</script>";
    exit;
}

$course_id = $_GET['course_id'];

// Fetch course name
$sql_course = "SELECT course_name FROM courses WHERE course_id = ?";
$stmt_course = $conn->prepare($sql_course);
$stmt_course->bind_param("i", $course_id);
$stmt_course->execute();
$course_result = $stmt_course->get_result();
$course_name = ($course_result->num_rows > 0) ? $course_result->fetch_assoc()['course_name'] : '';

// Fetch course questions
$sql = "SELECT question_id, question_text FROM questions WHERE course_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $course_id);
$stmt->execute();
$questions = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz for <?php echo $course_name; ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        .quiz-container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .question-box {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }

        .question-text {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .form-check {
            display: block;
            text-align: left;
            padding-left: 35px;
            margin-bottom: 12px;
        }

        .form-check input {
            margin-right: 10px;
        }

        .result-box {
            margin-top: 30px;
            padding: 15px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            color: #155724;
        }

        .btn-primary {
            padding: 10px 20px;
            font-size: 1rem;
        }

        .centered-text {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }

    </style>
</head>
<body>

<div class="container quiz-container">
    <h3>Quiz for: <?php echo $course_name; ?></h3>

    <form action="submit_quiz.php" method="POST">
        <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
        <?php
        if ($questions->num_rows > 0) {
            while ($question = $questions->fetch_assoc()) {
                $question_id = $question['question_id'];
                echo "<div class='question-box'>";
                echo "<p class='question-text'>" . $question['question_text'] . "</p>";
                
                // Fetch options for each question
                $sql_options = "SELECT option_id, option_text FROM options WHERE question_id = ?";
                $stmt_options = $conn->prepare($sql_options);
                $stmt_options->bind_param("i", $question_id);
                $stmt_options->execute();
                $options = $stmt_options->get_result();
                
                while ($option = $options->fetch_assoc()) {
                    echo "<div class='form-check'>";
                    echo "<input class='form-check-input' type='radio' name='answers[$question_id]' value='" . $option['option_id'] . "' required>";
                    echo "<label class='form-check-label'>" . $option['option_text'] . "</label>";
                    echo "</div>";
                }
                echo "</div>";
            }
        } else {
            echo '<p>No questions available for this course.</p>';
        }
        ?>
        <button type="submit" class="btn btn-primary">Submit Quiz</button>
    </form>

    <?php
    if (isset($_GET['correct_count']) && isset($_GET['total_questions'])) {
        $correct_count = $_GET['correct_count'];
        $total_questions = $_GET['total_questions'];
        echo "<div class='result-box'>";
        echo "You answered $correct_count out of $total_questions questions correctly.";
        echo "</div>";
    }
    ?>

</div>

<!-- JS Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
