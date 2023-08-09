<?php
    function phpAlert($msg) {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }
    function emptyInputSignup($parameter1,$parameter2,$parameter3,$parameter4,$parameter5)
    {
        if(empty($parameter1)||empty($parameter2)||empty($parameter3)||empty($parameter4)||empty($parameter5))
        return true;

        else
        return false;
    }

    function invalidRoll($roll)
    {
        if(strlen($roll)>7)
        return true;
        else
        return false;
    }
    function invalidMail($email)
    {
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        return true;
        else
        return false;
    }
    function invalidPass($pwd)
    {
        if(strlen($pwd)>5)
        return true;
        else
        return false;
    }
    function pwdMatch($pwd,$pwd_cnf){
        if($pwd!==$pwd_cnf)
        return true;
        else
        return false;
    }
    function uidExists($conn,$roll,$email){
        $sql= "SELECT * FROM student WHERE roll='$roll' OR email='$email';";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            return true;
        }
        else 
            return false;
    }
    function createStudent($conn,$roll,$username,$email,$pwd){
        
        $sql="INSERT INTO student (roll,username,email,password) VALUES
        ('$roll','$username','$email','$pwd');";
        mysqli_query($conn,$sql);

        header("location:../index.php?signup=success");
        
    }
    function createTeacher($conn,$username,$course,$email,$pwd){
        
        $sql="INSERT INTO teacher (username,course_name,email,password) VALUES
        ('$username','$course','$email','$pwd');";
        mysqli_query($conn,$sql);

        header("location:../index.php?signup=success");
        
    }

?>