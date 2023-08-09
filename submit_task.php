<!DOCTYPE html>
<html>
    <head>
        <title>Submit Task</title>
        <link rel="stylesheet" type="text/css" href="css/submit_task.css">
        <link rel="stylesheet" type="text/css" href="css/teacher_panel.css">
        <link rel="icon" type="image/x-icon" href="resources/favicon.png">
        <script src="script/submit_task.js"></script>
    </head>
    <body>
        <?php
            include 'includes/header.inc.php';
        ?>
        <div class="container">
            <form method="POST" action="includes/submit_task.inc.php">
                <label class="lebels" for="textarea">Problem Statement</label><br>
                <div class="textarea_style">
                    <textarea class="textarea" id="textarea" name="task" rows="10" cols="50" required></textarea>
                </div>
                <div class="post_button" id="post">
                    <button type="submit">Post</button>
                </div>
            </form>
        </div>
    </body>
</html>