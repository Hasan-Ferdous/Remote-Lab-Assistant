<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>RLA</title>
        <link rel="stylesheet" type="text/css" href="css/teacher_panel.css">
        <link rel="stylesheet" type="text/css" href="css/button.css">
        <link rel="icon" type="image/x-icon" href="resources/favicon.png">
        <script src="script/student_panel.js"></script>
    </head>
    <body>
        <?php include 'includes/header.student.inc.php'; ?>
        
        </div>
        <div class='landing'>
        <h1>Welcome, <span style="color: #4CAF50;"><?php echo $_SESSION['username']; ?></span></h1>

            <p>Roll: <?php echo $_SESSION['roll']; ?> </p>
            <p>Email: <?php echo $_SESSION['email']; ?> </p>
        </div>
    </body>
</html>
