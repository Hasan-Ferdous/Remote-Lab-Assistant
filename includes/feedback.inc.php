<?php
session_start();
include 'dbh.inc.php';

if(isset($_POST['submit']))
{
    $s_roll = mysqli_real_escape_string($conn, $_POST['student_roll']);
    $p = mysqli_real_escape_string($conn, $_POST['problem_id']);
    $comment = mysqli_real_escape_string($conn, $_POST['feedback']);

    if(empty($comment)){
        header("Location:../submit_task.php?error=empty1");
        exit();
    }

    $sql = "INSERT INTO feedback (teacher_name, course, student_roll, problem_no, post_time, f_back) VALUES ('{$_SESSION['username']}', '{$_SESSION['course_name']}', '$s_roll','$p', NOW(), '$comment')";

    mysqli_query($conn, $sql);
    header("Location:../teacher_panel.php");
}
else{
    header("Location:../submit_task.php?error=empty");
    exit();
}
?>
