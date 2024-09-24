<?php
include '../PHP/dbConnection.php';
?>

<!-- ================= New teachers ================ -->

<div class="recentCustomers">
    <div class="cardHeader">
        <h2>Teachers List</h2>
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
            background-color:indigo;
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

    <table>
        <thead>
            <tr>
                <th>Teacher ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Institute Name</th>
                <th>Conduct Courses</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Fetching teacher data including the number of courses they offer
        $teachers_query = "
            SELECT 
                t.teacher_id,
                t.name,
                t.email,
                t.phone_number,
                t.institute_name,
                COUNT(c.course_id) AS number_of_courses_offer
            FROM 
                teachers t
            LEFT JOIN 
                courses c ON t.teacher_id = c.teacher_id
            GROUP BY 
                t.teacher_id, t.name, t.email, t.phone_number, t.institute_name
            ORDER BY 
                t.teacher_id DESC;
        ";
        $teachers_result = $conn->query($teachers_query);

        // Check if any teachers are found
        if ($teachers_result->num_rows > 0) {
            // Loop through each teacher and display their data
            while ($teacher = $teachers_result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($teacher['teacher_id']) . "</td>";
                echo "<td>" . htmlspecialchars($teacher['name']) . "</td>";
                echo "<td>" . htmlspecialchars($teacher['email']) . "</td>";
                echo "<td>" . htmlspecialchars($teacher['phone_number']) . "</td>";
                echo "<td>" . htmlspecialchars($teacher['institute_name']) . "</td>";
                echo "<td>" . htmlspecialchars($teacher['number_of_courses_offer']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No teachers found</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
