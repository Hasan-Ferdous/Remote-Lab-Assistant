<?php
            session_start();
            include 'dbh.inc.php';

                $p = $_GET['id'];
                $sql = "DELETE FROM course_student
                WHERE joined_course = '$p' AND student_roll = '{$_SESSION['roll']}';";
                mysqli_query($conn,$sql);
                header("Location:../joinclass.php");
        ?>