<?php
// Fetch only approved courses
$sql = "SELECT c.course_id, c.course_title, c.course_topic, c.course_price, t.teacher_name
        FROM courses c
        JOIN teachers t ON c.teacher_id = t.teacher_id
        WHERE c.is_approved = 1";
$result = $conn->query($sql);
?>

<div class="container mt-5">
    <h1 class="text-center">All Courses</h1>
    <div class="row mt-4">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="col-md-4 mb-4">
                <a href="#" class="btn" style="text-align: left; padding:0px; margin:0px;">
                    <div class="card">
                        <img height="250" width="400" src="https://via.placeholder.com/400x250" class="card-img-top" alt="Course Image"/>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['course_title']; ?></h5>
                            <p class="card-text"><?php echo $row['course_topic']; ?></p>
                        </div>
                        <div class="card-footer">
                            <p class="card-text d-inline">Price: <small><del>$<?php echo $row['course_price']; ?></del></small><span class="font-weight-bolder">$<?php echo $row['course_price']; ?></span></p>
                            <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
                        </div>
                    </div>
                </a>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php $conn->close(); ?>
