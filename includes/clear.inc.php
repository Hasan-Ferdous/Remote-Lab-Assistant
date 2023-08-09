<?php
    include 'dbh.inc.php';
     if(isset($_POST['clear'])){

            $sql="DELETE FROM tasks;";
            mysqli_query($conn,$sql);
            header("LOCATION: ../teacher_panel.php");
     }
?>