<!DOCTYPE html>
<html>
    <head>
        <title>Tasks</title>
        <style>
        
    </style>
        <link rel="stylesheet" type="text/css" href="css/teacher_panel.css">
        <link rel="stylesheet" type="text/css" href="css/button.css">
        <link rel="stylesheet" type="text/css" href="css/task.css">
        <link rel="stylesheet" type="text/css" href="css/feedback.css">
        <link rel="icon" type="image/x-icon" href="resources/favicon.png">
        <script src="script/teacher_panel.js"></script>

        
    </head>
    <body>
        <?php
            include 'includes/header.student.inc.php';
        ?>
       
       <h1>Feedback:</h1>
    <br>

    <?php
    session_start();
    $rolll = $_SESSION['roll'];
    include_once 'includes/dbh.inc.php';

    $sql = "SELECT * FROM feedback WHERE student_roll='$rolll';";
    $result = mysqli_query($conn, $sql);
    echo "<div class='container'>";
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<br><br>";
            echo "<div class='feedback-info'>";
            echo "<p>Course: " . $row['course'] . "</p>";
            echo "<p>Problem ID: " . $row['problem_no'] . "</p>";
            echo "<p>Instructor: " . $row['teacher_name'] . "</p>";
            echo "</div>";
            echo "<div class='feedback-message'>";
            echo "<p>" . $row['f_back'] . "</p>";
            echo "</div>";
            
        }
    } else {
        echo "<p class='no-feedback'>No feedback available.</p>";
    }

    echo "</div>";

    ?>
    <div class="button-container">
  <a class="link-button" href="includes/clearfeedback.inc.php">Clear</a>
</div>
</div>

            
    </body>
</html>