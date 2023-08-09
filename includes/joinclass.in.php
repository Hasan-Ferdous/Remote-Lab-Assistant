<?php
            session_start();
            include 'dbh.inc.php';

                $p = $_GET['id'];
                $sql = "INSERT INTO course_student (student_roll, joined_course) VALUES ('{$_SESSION['roll']}','$p')";
                mysqli_query($conn,$sql);
                header("Location:../joinclass.php");
        ?>