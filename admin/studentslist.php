<?php
include '../PHP/dbConnection.php';
$students_query = "SELECT student_id, name, email, address,number_of_course, School_name FROM students ORDER BY student_id DESC LIMIT 9";
$students_result = $conn->query($students_query);

$students_data = [];
if ($students_result->num_rows > 0) {
    while ($row = $students_result->fetch_assoc()) {
        $students_data[] = $row;
    }
}
?>

<!-- ================= New teachers ================ -->

<div class="recentCustomers">
    <div class="cardHeader">
        <h2>Students List</h2>
    </div>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 1em;
            min-width: 400px;
            border-radius: 10px 10px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        thead tr {
            background-color: indigo;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
        }

        tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
            color: #009879;
        }
    </style>


        <table class="studentTable">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>School Name</th>
                    <th>Address</th>
                    <th>Courses Taken</th>
                </tr>
            </thead>
            <tbody>
        <?php if (!empty($students_data)) { ?>
            <?php foreach ($students_data as $student) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($student['student_id']); ?></td>
                    <td><?php echo htmlspecialchars($student['name']); ?></td>
                    <td><?php echo htmlspecialchars($student['email']); ?></td>
                    <td><?php echo htmlspecialchars($student['address']); ?></td>
                    <td><?php echo htmlspecialchars($student['School_name']); ?></td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="5">No results found.</td>
            </tr>
        <?php } ?>
    </tbody>
        </table>
    </div>
