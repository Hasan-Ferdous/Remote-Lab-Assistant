<html>
    <head>
        <title>
            SignUp
        </title>
        <link rel="stylesheet" type="text/css" href="css/signup.css">
        <link rel="icon" type="image/x-icon" href="resources/favicon.png">
        <script src="script/signup.js"></script>
    </head>
    <body>
        <div class="create_account">
            <form method="POST" action="includes/signup.inc.php" onsubmit="return validateForm()">
                <h1>Create Account</h1>
                
        <label for="designation">SignUp as</label>
        <select id="designation" name="designation" onchange="updateForm()">
        <option value="teacher">Teacher</option>
        <option value="student">Student</option>
        </select><br><br>
        <label for="name">Name:</label>
        <input type="text" id="username" name="username" required><br><br>
        <div id="roll-container" style="display: none">
        <label for="roll">Roll:</label>
        <input type="text" id="roll" name="roll"><br><br>
        </div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="pass1" name="pass1" required><br><br>
        <label for="confirm password">Confirm Password:</label>
        <input type="password" id="pass2" name="pass2" required><br><br>
        <div id="course-container">
        <label for="course">Course:</label>
        <input type="text" id="course" name="course"><br><br>
        </div>
        <input type="submit" value="Submit">
                </select>
                
            </form>
        </div>

        <script>
     function updateForm() {
    var designation = document.getElementById("designation").value;
    var rollContainer = document.getElementById("roll-container");
    var courseContainer = document.getElementById("course-container");

    if (designation == "teacher") {
      rollContainer.style.display = "none";
      courseContainer.style.display = "block";
    } else {
      rollContainer.style.display = "block";
      courseContainer.style.display = "none";
    }
  }
    </script>
    </body>
</html>