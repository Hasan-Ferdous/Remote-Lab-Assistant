<!DOCTYPE html>
<html>
<head>
    <title>Attendance</title>
    <link rel="stylesheet" type="text/css" href="css/teacher_panel.css">
    <link rel="stylesheet" type="text/css" href="css/button.css">
    <link rel="stylesheet" type="text/css" href="css/attendence.css">
    <link rel="icon" type="image/x-icon" href="resources/favicon.png">
    <script src="script/attendance.js"></script>
</head>
<body>
    <?php
    session_start();
    include 'includes/header.inc.php';
    include 'includes/dbh.inc.php';

    echo "<h1 style='font-family: Arial, sans-serif; color: white; margin-left: 200px;'>Instructor: " . $_SESSION["username"] . "</h1>";
    echo "<h2 style='font-family: Arial, sans-serif; color: #DAFDBA; margin-left: 200px;'>Course: " . $_SESSION["course_name"] . "</h2>";
    echo "<br><br>";
    echo "<h3 style='font-family: Arial, sans-serif; color: white; margin-left: 200px;'>Enrolled Students:</h3>";
    ?>
    <?php
    $sql_students = "SELECT student.roll, student.username, student.email
                    FROM student
                    JOIN course_student ON student.roll = course_student.student_roll
                    WHERE course_student.joined_course = '" . $_SESSION['course_name'] . "'
                    ORDER BY student.roll;";

    $result_students = mysqli_query($conn, $sql_students);

    echo "<form id='attendanceForm' method='post' action='includes\attendence.inc.php'>";
    echo "<table>";
    echo "
        <tr>
            <th>Roll</th>
            <th>Name</th>
            <th>Email</th>
            <th>Attendance</th>
        </tr>";
    while ($row = mysqli_fetch_assoc($result_students)) {
        echo "
            <tr>
                <td>".$row['roll']."</td>
                <td>".$row['username']."</td>
                <td>".$row['email']."</td>
                <td>
                    <input type='radio' name='attendance[".$row['roll']."]' value='present' checked> Present
                    <input type='radio' name='attendance[".$row['roll']."]' value='absent'> Absent
                </td>
            </tr>";
    }
    echo "</table>";
   echo' <div class="button-container">
    <button class="update-button" type="submit">Update Attendance Sheet</button>
  </div> ';
    echo "</form>";
    
    ?>

<div class="button-container">
  <a class="link-button" href="print.php">Download Attendance Sheet</a>
</div>


</body>
</html>
