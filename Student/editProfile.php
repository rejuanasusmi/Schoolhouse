<?php
session_start();
include('../PHP/dbConnection.php');

// Ensure student is logged in
if (isset($_SESSION['is_login'])) {
    $stulogemail = $_SESSION['stulogemail'];
}

// Get the student email from session
if (isset($stulogemail)) {
    $sql = "SELECT stu_name, stu_email, stu_occ, stu_img FROM students WHERE stu_email = '$stulogemail'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Assign the updated values to variables
    $stu_name = $row['stu_name'];
    $stu_email = $row['stu_email'];
    $stu_occ = $row['stu_occ'];
    $stu_img = $row['stu_img'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .profile-container {
            margin: 50px auto;
            max-width: 600px;
            background: #fff;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .profile-img {
            max-width: 150px;
            margin: 20px auto;
        }
        .profile-img img {
            width: 100%;
            border-radius: 50%;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="profile-container">
        <h2 class="text-center">Edit Profile</h2>

        <!-- Display current profile image -->
        <div class="profile-img text-center">
            <img src="./uploads/<?php echo $stu_img ?>?<?php echo time(); ?>" alt="studentimage">
        </div>

        <form id="editProfileForm" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="stu_name">Name</label>
                <input type="text" class="form-control" id="stu_name" name="stu_name" value="<?php echo $stu_name; ?>">
            </div>

            <div class="form-group">
                <label for="stu_email">Email</label>
                <input type="email" class="form-control" id="stu_email" name="stu_email" value="<?php echo $stu_email; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="stu_occ">Occupation</label>
                <input type="text" class="form-control" id="stu_occ" name="stu_occ" value="<?php echo $stu_occ; ?>">
            </div>

            <div class="form-group">
                <label for="stu_img">Profile Image</label>
                <input type="file" class="form-control-file" id="stu_img" name="stu_img">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
        </form>

        <div id="msg"></div>
    </div>
</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('#editProfileForm').on('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: 'Student/updateprofile.php', // Ensure this path is correct
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response); // Debugging: Log the raw response

                try {
                    var data = JSON.parse(response); // Parse the JSON response

                    if (data.status === 'success') {
                        $('#msg').html('<div class="alert alert-success">Profile Updated Successfully</div>');

                        // Update page elements
                        $('#stu_name').val(data.stuName);
                        
                        // Check if an image was uploaded
                        if (data.uploadStatus === 'file_uploaded') {
                            console.log('New image path: ./uploads/' + data.newImage); // Debugging
                            $('.profile-img img').attr('src', './uploads/' + data.newImage + '?' + new Date().getTime());
                        }
                    } else {
                        $('#msg').html('<div class="alert alert-danger">Failed to Update Profile</div>');
                    }
                } catch (e) {
                    console.error('Error parsing JSON:', e); // Log any JSON parsing errors
                    $('#msg').html('<div class="alert alert-danger">Failed to Update Profile - Invalid Response</div>');
                }
            },
            error: function() {
                $('#msg').html('<div class="alert alert-danger">Failed to Update Profile - Server Error</div>');
            }
        });
    });
});
</script>

</body>
</html>
