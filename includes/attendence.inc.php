<?php
session_start();
include 'dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $attendance = $_POST['attendance'];

    foreach ($attendance as $roll => $status) {
        // Sanitize the input to prevent SQL injection
        $roll = mysqli_real_escape_string($conn, $roll);
        $status = mysqli_real_escape_string($conn, $status);
        $course_name = mysqli_real_escape_string($conn, $_SESSION['course_name']);

        // Get the current date
        $attendance_date = date("Y-m-d");

        // Insert attendance into the database
        $sql_insert_attendance = "INSERT INTO attendence (roll, course_name, attendance_date, status)
                                 VALUES ('$roll', '$course_name', '$attendance_date', '$status');";

        mysqli_query($conn, $sql_insert_attendance);
    }

    // Redirect back to the teacher panel after updating the database
    header("Location:../task_teacher.php");
    exit();
}
?>
