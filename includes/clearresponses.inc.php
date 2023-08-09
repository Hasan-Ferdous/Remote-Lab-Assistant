<?php
session_start();
    include 'dbh.inc.php';

            $sql="DELETE FROM code WHERE course_name='{$_SESSION['course_name']}';";
            mysqli_query($conn,$sql);
            header("LOCATION: ../response.php");
?>