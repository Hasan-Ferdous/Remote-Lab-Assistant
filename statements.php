<!DOCTYPE html>
<html>
<head>
    <title>statements</title>
    <link rel="icon" type="image/x-icon" href="resources/favicon.png">
        <link rel="stylesheet" type="text/css" href="css/teacher_panel.css">
        <link rel="stylesheet" type="text/css" href="css/button.css">
        <link rel="stylesheet" type="text/css" href="css/statements.css">
        
        <script src="script/plagrarism.js"></script>
</head>
<body>

      <?php
        include 'includes/header.student.inc.php';
      ?>
      <div class="container1">
      <?php
        include 'includes/dbh.inc.php';
        $course_name=$_GET['id'];
       echo "<h1 style='text-align: center;'> $course_name</h1><br>";
        $sql = "SELECT * FROM task WHERE course_name='$course_name'";
        $result = mysqli_query($conn, $sql);
        $task_no=0;
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            $task_no=$task_no+1;
            $problem_no=$row['problem_id'];
            $teacher_name = $row['teacher_id'];
            $course = $row['course_name'];
            $time = $row['posting_time'];
            $statement = nl2br($row['statement']);
            echo "<div class='task-box'>";
            echo "<h3>Task-$problem_no</h3>";
            echo "<div class='task-course'>Course: $course (Teacher: $teacher_name)</div>";
            echo "<div class='task-time'>Posted on: $time</div>";
            echo "<div class='task-statement'>$statement</div>";
            echo "<div class='button-group'>";
            echo "<button class='response-button' onclick=\"window.location.href='submit_code.php?id=$course'\">Submit Code</button>";
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