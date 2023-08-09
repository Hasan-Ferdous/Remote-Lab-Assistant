<?php
            include 'dbh.inc.php';
            if(!isset($_POST['submit']))
            {
                
                $username=mysqli_real_escape_string($conn,$_POST['username']);
                $email=mysqli_real_escape_string($conn,$_POST['email']);
                $roll=mysqli_real_escape_string($conn,$_POST['roll']);
                $pwd=mysqli_real_escape_string($conn,$_POST['pass1']);
                $pwd_cnf=mysqli_real_escape_string($conn,$_POST['pass2']);
                $designation=mysqli_real_escape_string($conn,$_POST['designation']);
                $course=mysqli_real_escape_string($conn,$_POST['course']);

                include_once 'dbh.inc.php';
                include_once 'functions.inc.php';

                if($designation=="teacher" and emptyInputSignup($username,$email,$pwd,$pwd_cnf,$course)){
                    phpAlert("Fill all the Blank Field");
                    header("Location:../index.php?error=empty1");
                    exit();
                }
                if($designation=="student" and emptyInputSignup($username,$email,$pwd,$pwd_cnf,$roll)){
                    phpAlert("Fill all the Blank Field");
                    header("Location:../index.php?error=empty2");
                    exit();
                }

                if(invalidRoll($roll)!==false){
                    
                    header("Location:../index.php?error=invalidroll");
                    exit();
                }
                if(invalidMail($email)!==false){
                    header("Location:../index.php?error=invalidemail");
                    exit();
                }
                if(invalidPass($pwd)==false){
                    header("Location:../index.php?error=invalidepass");
                    exit();
                }
                if(pwdMatch($pwd,$pwd_cnf)!==false){
                    header("Location:../index.php?error=passdontmatch");
                    exit();
                }
                
                if(uidExists($conn,$roll,$email)){
                    header("Location:../index.php?error=uidexists");
                    exit();
                }
                if($designation=="student")
                createStudent($conn,$roll,$username,$email,$pwd);

                if($designation=="teacher")
                createTeacher($conn,$username,$course,$email,$pwd);


            }
            else{
                header("Location:../index.php?signup=error");
                exit();
            }
        ?>