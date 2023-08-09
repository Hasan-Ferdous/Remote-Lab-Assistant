<?php


// Connect to the database
include 'includes/dbh.inc.php';

// Retrieve the code from the database
$sql = "SELECT response FROM code WHERE roll = ?";
$stmt = $conn->prepare($sql);
$my_id = 1903154; // define the value of the roll parameter
$stmt->bind_param("i", $my_id);
$stmt->execute();
$stmt->bind_result($code);
$stmt->fetch();
$stmt->close();

?>


<body>
  <div data-pym-src='https://www.jdoodle.com/plugin' data-language="java"
    data-version-index="4" data-libs="mavenlib1, mavenlib2">
    <?php echo $code; ?>
  </div>
  <script src="https://www.jdoodle.com/assets/jdoodle-pym.min.js" type="text/javascript"></script>
</body>


