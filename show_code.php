<!DOCTYPE html>
<html>
  <head>
    <title>Show Code</title>
    <link rel="stylesheet" type="text/css" href="css/teacher_panel.css">
    <link rel="stylesheet" type="text/css" href="css/button.css">
    <link rel="stylesheet" href="css/prism-okadia.min.css">
    <link rel="icon" type="image/x-icon" href="resources/favicon.png">
    <script>
          function openCodeWindow(id, problem_id) {
            window.open("http://localhost/includes/feedback.inc.php?id=" + id + "&problem_id=" + problem_id, "_blank");
          }
        </script>


    <link rel="icon" type="image/x-icon" href="resouces/favicon.png">
    <style>
      #feedback-box {
        background-color: #DAFDBA;
        width: 70%;
        height: 180px;
        margin-top: 20px;
        border: 1px solid #ccc;
        padding: 10px;
        font-size: 16px;
        resize: none;
        
      }
      .container {
        text-align: center;
    }

    .textarea_style {
        margin: 0 auto;
        width: 70%;
    }

    .post_button button {
        margin: 0 auto;
        background-color: #4CAF50;
        color: white;
    }

    </style>
  </head>
  <body>
  

    
    
      <?php
        include 'includes/header.inc.php';
      ?>
      <?php

      $roll = $_GET['id'];
      $p = $_GET['problem_id'];

      // Connect to the database
      include 'includes/dbh.inc.php';

      // Retrieve the code from the database
      $sql = "SELECT * FROM code WHERE roll = '$roll'  AND problem_id ='$p';";
      $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $code= $row['response'];
          $lang=$row['code_language'];
        }
      ?>

      

<div data-pym-src='https://www.jdoodle.com/plugin' data-language="<?php echo $lang; ?>"

        data-version-index="4" data-libs="mavenlib1, mavenlib2"
        style="width:70%;margin-left: auto; margin-right: auto;">
        <?php echo htmlspecialchars($code); ?>
      </div>
      <script src="https://www.jdoodle.com/assets/jdoodle-pym.min.js" type="text/javascript"></script>

      <div class="container">
    <form method="POST" action="includes/feedback.inc.php">
        <input type="hidden" name="student_roll" value="<?php echo $roll; ?>">
        <input type="hidden" name="problem_id" value="<?php echo $p; ?>">
        
        <div class="textarea_style">
            <textarea class="textarea" id="feedback-box" name="feedback" placeholder="Give your feedback here" rows="10" cols="50" required></textarea>
        </div>
      
        <button type="submit" name="submit">Give Feedback</button>
    </form>
</div>



   

  </body>
</html>
