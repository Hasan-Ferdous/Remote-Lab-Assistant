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
        <script src="script/teacher_panel.js"></script>
        
    </head>
    <body>
        <?php
            include 'includes/header.inc.php';
        ?>
        <div class="landing">
        <h1>Welcome, <span style="color: #4CAF50;"><?php echo $_SESSION['username']; ?></span></h1>
        <p>Email: <?php echo $_SESSION['email']; ?> </p>
        <p>Course: <?php echo $_SESSION['course_name']; ?> </p>
            
        </div>
            
    
    </body>
</html>