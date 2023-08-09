<?php
    session_start();
    include 'dbh.inc.php';
    if(isset(($_POST['submit2'])))
    {
        $problem_no = mysqli_real_escape_string($conn, $_POST['problem_no']);
        $lang = mysqli_real_escape_string($conn, $_POST['language']);
        $code = mysqli_real_escape_string($conn, $_POST['cde']);
        $course=mysqli_real_escape_string($conn, $_POST['course']);
        $roll=$_SESSION['roll'];

        if(empty($code) || empty($problem_no)){ 
            header("Location:../submit_code.php?error=empty");
            exit();
        }
        $dt=date('Y-m-d H:i:s');
        $sql2="INSERT INTO code (roll,problem_id,course_name,response,code_language,submission_time) VALUES ('$roll','$problem_no', '$course', '$code', '$lang', '$dt');";
        mysqli_query($conn,$sql2);
        header("Location:../student_panel.php");
    }
    else{
        header("Location:../submit_code.php?error=empty2");
        exit();
    }
?>
