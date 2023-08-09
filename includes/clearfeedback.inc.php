<?php
session_start();
    include 'dbh.inc.php';

            $sql="DELETE FROM feedback WHERE student_roll='{$_SESSION['roll']}';";
            mysqli_query($conn,$sql);
            header("LOCATION: ../feedback.php");
?>