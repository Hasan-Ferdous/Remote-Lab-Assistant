<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/task_teacher.css">
    <link rel="stylesheet" type="text/css" href="css/teacher_panel.css">
    <link rel="stylesheet" type="text/css" href="css/button.css">
    <link rel="icon" type="image/x-icon" href="resources/favicon.png">

    <script>
        function openCodeWindow(id) {
            window.open("http://localhost/Project3100/statements.php?id=" + id);
        }
        function openCodeWindow2(id) {
            window.open("http://localhost/Project3100/includes/leaveclass.inc.php?id=" + id);
        }
    </script>

    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin-left: 350px;
            margin-right: 200px;
            margin-top: 70px;
        }

        th, td {
            text-align: center;
            padding: 8px;
            color: white;
        }

        th {
            background-color: #41BFB3;
        }

        #joinclass-visit {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
            margin-right: 10px;
        }

        #joinclass-leave {
            background-color: #008CBA;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
        }

        button:hover {
            background-color: #3e8e41;
        }
    </style>

</head>
<body>

<?php
    include 'includes/header.student.inc.php';
?>

<?php
    session_start();
    include 'includes/dbh.inc.php';
    // Retrieve data from the "teacher" table
    $sql = "SELECT * FROM course_student WHERE student_roll='$_SESSION[roll]'";
    $result = mysqli_query($conn, $sql);

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        // Output the table header
        echo "<table>";
        echo "<th>Course Name</th><th>Actions</th></tr>";

        // Loop through the rows and output the data
        while ($row = mysqli_fetch_assoc($result)) {
            $courseName = $row['joined_course'];

            // Output the data in a table row
            echo '<tr>';
            echo "<td>$courseName</td>";
            echo '<td><button id="joinclass-visit" onclick="openCodeWindow(`' . $courseName . '`)">Visit Class</button>
                  <button id="joinclass-leave" onclick="openCodeWindow2(`' . $courseName . '`)">Leave Class</button></td>';
            echo '</tr>';
        }
        // Output the table footer
        echo "</table>";
    } else {
        // echo "<p>No classes found.</p>";
    }
?>

</body>
</html>
