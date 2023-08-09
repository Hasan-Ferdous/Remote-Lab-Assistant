function takeattendence() {
    var attendenceForm = document.getElementById("attendenceForm");
    var checkboxes = attendenceForm.querySelectorAll('input[name^="attendence["]');

    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            var roll = checkboxes[i].name.replace('attendence[', '').replace(']', '');
            var username = checkboxes[i].parentNode.previousElementSibling.previousElementSibling.textContent;
            var email = checkboxes[i].parentNode.previousElementSibling.textContent;
            var status = checkboxes[i].value;

            // Call the function to mark attendence for each student
            markattendence(roll, username, email, status);
        }
    }
}

function markattendence(roll, username, email, status) {
    // Create an AJAX request to update attendence status
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "includes/attendence.inc.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Get the current timestamp
    var timestamp = new Date().toISOString();

    // Get the course name from PHP session
    var courseName = "<?php echo $_SESSION['course_name']; ?>";

    // Prepare data to send in the POST request
    var data =
        "roll=" +
        roll +
        "&username=" +
        encodeURIComponent(username) +
        "&email=" +
        encodeURIComponent(email) +
        "&timestamp=" +
        timestamp +
        "&courseName=" +
        encodeURIComponent(courseName) +
        "&status=" +
        status;

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // attendence status updated successfully, you can handle the response here if needed
            console.log(xhr.responseText);
        }
    };

    // Send the POST request with the attendence data
    xhr.send(data);
}
