<?php
            session_start();
            include 'dbh.inc.php';
            if(!isset($_POST['submit']))
            {
                
                $task=mysqli_real_escape_string($conn,$_POST['task']);
    
                if(empty($task)){
                    
                    header("Location:../submit_task.php?error=empty");
                    exit();
                }

                $sql = "INSERT INTO task (teacher_id, course_name, posting_time, statement) VALUES ('{$_SESSION['teacher_id']}', '{$_SESSION['course_name']}', NOW(), '$task')";

                mysqli_query($conn,$sql);
                header("Location:../teacher_panel.php");
                
            

            }
            else{
                header("Location:../submit_task.php?error=empty");
                exit();
            }
        ?>