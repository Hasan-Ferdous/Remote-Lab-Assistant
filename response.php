<!DOCTYPE html>
<html>
<head>
    <title>Responses</title>
    <link rel="icon" type="image/x-icon" href="resouces/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/response.css">
    <link rel="stylesheet" type="text/css" href="css/teacher_panel.css">
    <link rel="stylesheet" type="text/css" href="css/button.css">
</head>
<body>
<?php
include 'includes/header.inc.php';
include 'includes/dbh.inc.php';
session_start();
?>

<h1>Responses</h1>

<?php
// Select all distinct problem numbers
$sql_problems = "SELECT DISTINCT problem_id FROM code ORDER BY problem_id";
$result_problems = mysqli_query($conn, $sql_problems);

// Loop through all problems and show their submissions
while ($row_problems = mysqli_fetch_assoc($result_problems)) {
    $problem_id = $row_problems['problem_id'];
    echo "<h2 class='problem-title'>Problem ID: $problem_id</h2>";
    echo "<table class='submission-table'>
            <tr>
                <th>Roll</th>
                <th>Name</th>
                <th>Code</th>
                <th>Submission Time</th>
            </tr>";

    // Fetch submissions for the current problem ID and group by student roll and problem ID
    $sql = "SELECT code.*, student.username
            FROM code
            INNER JOIN student ON code.roll = student.roll
            WHERE code.course_name = '" . $_SESSION['course_name'] . "' AND code.problem_id = '$problem_id'
            GROUP BY code.roll, code.problem_id
            ORDER BY code.problem_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $r = $row['roll'];
            $_SESSION['res'] = $r;

            echo "
                <tr>
                    <td>" . $row['roll'] . "</td>
                    <td>" . $row['username'] . "</td>
                    <td>
                        <button class='view-code-button' onclick=\"window.location.href = 'show_code.php?id=" . $row['roll'] . "&problem_id=" . $problem_id . "'\">View Code</button>
                    </td>
                    <td>" . $row['submission_time'] . "</td>
                </tr>";
        }
    }
    echo "</table>";
}
?>
<div class="button-container">
  <a class="link-button" href="includes/clearresponses.inc.php">Clear All Responses</a>
</div>

</body>
</html>
