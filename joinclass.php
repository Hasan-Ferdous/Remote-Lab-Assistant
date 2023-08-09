<!DOCTYPE html>
<html>
<head>
    <title</title>
        <link rel="stylesheet" type="text/css" href="css/task_teacher.css">
        <link rel="stylesheet" type="text/css" href="css/teacher_panel.css">
        <link rel="stylesheet" type="text/css" href="css/button.css">
        <link rel="stylesheet" type="text/css" href="css/joinclass.css">
        <link rel="stylesheet" type="text/css" href="css/task.css">


        <link rel="icon" type="image/x-icon" href="resources/favicon.png">
        <script>
  function openCodeWindow(id) {
            window.open("http://localhost/Project3100/includes/joinclass.in.php?id=" + id, "_blank");
          }
</script>
</head>
<body>

      <?php
        include 'includes/header.student.inc.php';
      ?>

      <?php
        include 'includes/dbh.inc.php';
        session_start();
        // Retrieve data from the "teacher" table
        $sql = "SELECT * FROM teacher";
        $result = mysqli_query($conn, $sql);
    
        // Check if any rows were returned
        if (mysqli_num_rows($result) > 0) {
            // Output the table header
            echo "<table>";
            echo "<tr><th>Teacher Name</th><th>Course Name</th><th>Action</th></tr>";
    
            // Loop through the rows and output the data
            while ($row = mysqli_fetch_assoc($result)) {
              $teacherName = $row['username'];
              $courseName = $row['course_name'];
          
              // Output the data in a table row
              echo '<tr>';
              echo "<td>$teacherName</td>";
              echo "<td>$courseName</td>";
              echo '<td>';
              
              $sql2 = "SELECT * FROM course_student WHERE joined_course='$courseName' AND student_roll='{$_SESSION['roll']}';";
              $condition = mysqli_query($conn, $sql2);
              
              if (mysqli_num_rows($condition) != 0) {
                  echo '<img src="resources/tick.png" alt="Joined" width="16" height="16">';
                  echo ' Joined';
              } else {
                  echo '<button id="joinclass" onclick="openCodeWindow(`' . $courseName . '`)">Join Class</button>';
              }
              
              echo '</td>';
              echo '</tr>';
          }
          
    
            // Output the table footer
            echo "</table>";
        } else {
            echo "<p>No classes found.</p>";
        }
    ?>
    
    
    
  </body>

</body>
</body>
</html>