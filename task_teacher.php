<!DOCTYPE html>
<html>
<head>
    <title</title>
        <link rel="stylesheet" type="text/css" href="css/task_teacher.css">
        <link rel="stylesheet" type="text/css" href="css/teacher_panel.css">
        <link rel="stylesheet" type="text/css" href="css/button.css">
        <link rel="stylesheet" type="text/css" href="css/task.css">

        <link rel="icon" type="image/x-icon" href="resources/favicon.png">
        <script src="script/plagrarism.js"></script>
</head>
<body>

      <?php
        include 'includes/header.inc.php';
      ?>
      <div class="container1">
      <?php
        include 'includes/dbh.inc.php';
        session_start();
        $teacher_id = mysqli_real_escape_string($conn, $_SESSION['teacher_id']);
$course_name = mysqli_real_escape_string($conn, $_SESSION['course_name']);
$sql = "SELECT * FROM task WHERE teacher_id='$teacher_id' AND course_name='$course_name'";

        $result = mysqli_query($conn, $sql);
        $task_no=0;
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            $task_no=$task_no+1;
            $problem_no=$row['problem_id'];
           
            $course = $row['course_name'];
            $time = $row['posting_time'];
            $statement = nl2br($row['statement']);
            echo "<div class='task-box'>";
            echo "<h3>Task-$problem_no</h3>";
           
            echo "<div class='task-course'>Course: $course</div>";
            echo "<div class='task-time'>Posted on: $time</div>";
            echo "<div class='task-statement'>$statement</div>";
            echo "<div class='button-group'>";
            echo "<form method='POST' action='includes/delete_task.inc.php'>";
            echo "<input type='hidden' name='problem_no' value='$problem_no'>";
           echo "<div class='button-container'>";
            echo "<button type='submit' class='delete-button'>Delete</button>";
            echo "</form>";
            // echo "<button class='update-button'>Update</button>";
            echo "<button class='response-button' onclick=\"window.location.href='response.php'\">Responses</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<br><br><br>";
            
          }
        } else {
          echo "No tasks found.";
        }
      
      ?>
    </div>
  </body>

</body>
</body>
</html>