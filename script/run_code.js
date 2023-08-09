<script>
  $(document).ready(function() {
    // Get the button element and output element
    var runBtn = $('#run-code');
    var output = $('#output');

    // Add a click event listener to the button
    runBtn.on('click', function() {
      // Get the code from the editor
      var code = editor.getValue();

      // Send a POST request to the run_code.php script
      $.ajax({
        type: 'POST',
        url: 'run_code.php',
        data: {code: code},
        dataType: 'json',
        success: function(response) {
          output.html(response.output);
        },
        error: function(xhr, status, error) {
          output.html('Error: ' + error);
        }
      });
    });
  });
</script>
