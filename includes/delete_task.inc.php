<?php
// Check if the problem_no value was passed in the POST request
if(isset($_POST['problem_no'])) {
  // Get the problem_no value from the POST request
  $problem_no = $_POST['problem_no'];
  
  // Create a MySQLi object and connect to the database
  include 'dbh.inc.php';
  // Check if the connection was successful
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Construct the SQL query to delete the task from the database
  $sql = "DELETE FROM task WHERE problem_id = '$problem_no'";

  // Execute the query
  if ($conn->query($sql) === TRUE) {
    // If the query was successful, redirect the user back to the page with the list of tasks
    header("Location:../task_teacher.php");
  } else {
    echo "Error deleting task: " . $conn->error;
  }

  // Close the database connection
  $conn->close();
} else {
  // If the problem_no value was not passed in the POST request, redirect the user back to the page with the list of tasks
  header("Location:../task_teacher.php");
}
?>
