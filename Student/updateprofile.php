<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('../PHP/dbConnection.php');

// Ensure the student is logged in
if (isset($_SESSION['is_login'])) {
    $stuEmail = $_SESSION['stulogemail'];
} else {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit();
}

// Fetch the student data
$sql = "SELECT * FROM students WHERE stu_email = '$stuEmail'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $stuId = $row["stu_id"];
    $stuImg = $row["stu_img"];
}

// Handle form submission and file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stuName = mysqli_real_escape_string($conn, $_POST['stu_name']);
    $stuOcc = mysqli_real_escape_string($conn, $_POST['stu_occ']);

    $uploadStatus = 'no_file';
    $fileName = $stuImg;

    if (isset($_FILES['stu_img']) && $_FILES['stu_img']['error'] === 0) {
        $targetDir = "./uploads/";
        $fileName = time() . basename($_FILES["stu_img"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow only certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array(strtolower($fileType), $allowTypes)) {
            if (move_uploaded_file($_FILES["stu_img"]["tmp_name"], $targetFilePath)) {
                $uploadStatus = 'file_uploaded';
            } else {
                $uploadStatus = 'failed_to_upload';
            }
        } else {
            $uploadStatus = 'invalid_file';
        }
    }

    // Update the student data in the database
    $updateSQL = "UPDATE students SET stu_name='$stuName', stu_occ='$stuOcc'";
    if ($uploadStatus === 'file_uploaded') {
        $updateSQL .= ", stu_img='$fileName'";
    }
    $updateSQL .= " WHERE stu_id='$stuId'";

    if (mysqli_query($conn, $updateSQL)) {
        echo json_encode(['status' => 'success', 'uploadStatus' => $uploadStatus, 'newImage' => $fileName]);
    } else {
        echo json_encode(['status' => 'error', 'uploadStatus' => $uploadStatus]);
    }
} else {
    echo json_encode(['status' => 'data_missing']);
}
?>
