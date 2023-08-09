<?php
            session_start();
            include 'dbh.inc.php';
            $email=mysqli_real_escape_string($conn,$_POST['email']);
            $pwd=mysqli_real_escape_string($conn,$_POST['pass1']);


            $sql= "SELECT * FROM teacher WHERE password='$pwd' AND email='$email';";


            $sql2="SELECT * FROM student WHERE password='$pwd' AND email='$email';";

            
            if(isset($_POST['submit']))
            {
                
                $result=mysqli_query($conn,$sql);
                $result2=mysqli_query($conn,$sql2);
                if(mysqli_num_rows($result)>0)
                {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['user_type'] = 'teacher';
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['course_name'] = $row['course_name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['teacher_id'] = $row['teacher_id'];
                    
                    header("Location:../teacher_panel.php");
                }
                else if(mysqli_num_rows($result2)>0)
                {
                    $row = mysqli_fetch_assoc($result2);
                    $_SESSION['user_type'] = 'student';
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['roll'] = $row['roll'];
                    $_SESSION['email'] = $row['email'];
                    header("Location:../student_panel.php");
                }
                else{
                    header("Location:../index.php?login=notfound");
                    exit();
                }
                
            }
            else{
                
                  header("ungabunga.php");     
            }
            
        ?>