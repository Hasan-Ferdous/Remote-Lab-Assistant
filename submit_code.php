<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Submit Code</title>
    <link rel="stylesheet" type="text/css" href="css/submit_code.css">
    <link rel="stylesheet" type="text/css" href="css/button.css">
    <link rel="stylesheet" type="text/css" href="css/teacher_panel.css">
    <link rel="icon" type="image/x-icon" href="resources/favicon.png">
    <script src="script/teacher_panel.js"></script>
</head>
<body>
    <?php include 'includes/header.student.inc.php'; ?>
    <div class="container">
        <h1>Submit Code</h1>

        <form method="POST" action="includes/submit_code.inc.php">
            <div class="form-group">
                <label for="task_no">Problem Number</label>
                <select id="task_no" name="problem_no">
                    <?php
                    include 'includes/dbh.inc.php';
                    $course = $_GET['id'];
                    $roll = $_SESSION['roll'];

                    $sql = "SELECT * FROM task WHERE course_name='$course'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $problem_no = $row['problem_id'];
                            echo "<option value='" . $row['problem_id'] . "'>$problem_no</option>";
                        }
                    }
                    ?>
                </select>
                <h4>Course name: <?php echo $course; ?></h4>
            </div>

            <div class="form-group">
                <label for="textarea">Code</label>
                <textarea id="textarea" name="cde" placeholder="Submit your code here"></textarea>
            </div>

            <div class="form-group">
                <label for="language">Language</label>
                <select id="language" name="language">
                    <option value="c">C</option>
                    <option value="cpp">C++</option>
                    <option value="cpp">C++14</option>
                    <option value="perl">Perl</option>
                    <option value="php">PHP</option>
                    <option value="javascript">JavaScript</option>
                    <option value="python2">Python 2</option>
                    <option value="python3">Python 3</option>
                    <!-- Add more options for other languages as needed -->
                </select>
            </div>
            
            <!-- Hidden inputs to pass course and roll values -->
            <input type="hidden" name="course" value="<?php echo $course; ?>">
            <input type="hidden" name="roll" value="<?php echo $roll; ?>">

            <div class="submit-button" id="submit-button">
                <button type="submit" name="submit2">Submit Code</button>
            </div>
        </form>
    </div>
</body>
</html>
