<?php
session_start(); // Start the session

// Include database connection
include '../PHP/dbConnection.php';

// SQL query to fetch student ID, student name, and review comments
$query = "SELECT students.student_id, students.name, review.comment_box
          FROM review 
          INNER JOIN students ON review.student_id = students.student_id";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if there are any reviews
if (mysqli_num_rows($result) > 0) {
    $reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $reviews = [];
}

// Close the connection
mysqli_close($conn);

// Initialize approved reviews in session if not already set
if (!isset($_SESSION['approved_reviews'])) {
    $_SESSION['approved_reviews'] = [];
}

// Handle approval
if (isset($_POST['approve'])) {
    $student_id = $_POST['student_id'];
    // Add the student_id to the approved list in the session
    if (!in_array($student_id, $_SESSION['approved_reviews'])) {
        $_SESSION['approved_reviews'][] = $student_id;
    }
}

// Handle deletion
if (isset($_POST['delete'])) {
    $student_id = $_POST['student_id'];
    // Remove the review from the list (without affecting the database)
    foreach ($reviews as $key => $review) {
        if ($review['student_id'] == $student_id) {
            unset($reviews[$key]); // Remove the review
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Reviews</title>
    <style>
        /* CSS for review.php page */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #5e72e4;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            font-size: 1.2rem;
            color: #666;
        }
        /* Button styles */
        .btn {
            padding: 8px 12px;
            font-size: 0.9rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-approve {
            background-color: #007bff;
            color: white;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        .btn-approve:hover {
            background-color: #0056b3;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Student Reviews</h1>

        <?php if (!empty($reviews)) { ?>
            <table>
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Review</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reviews as $review) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($review['student_id']); ?></td>
                        <td><?php echo htmlspecialchars($review['name']); ?></td>
                        <td><?php echo htmlspecialchars($review['comment_box']); ?></td>
                        <td>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="student_id" value="<?php echo $review['student_id']; ?>">
                                <button type="submit" name="approve" class="btn btn-approve">Approve</button>
                            </form>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="student_id" value="<?php echo $review['student_id']; ?>">
                                <button type="submit" name="delete" class="btn btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p class="no-data">No reviews found.</p>
        <?php } ?>

    </div>

</body>
</html>
