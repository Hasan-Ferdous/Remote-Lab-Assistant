

  function validateName() {
    var name = document.getElementById("username").value;
    if (name == "") {
      alert("Name must be filled out");
      return false;
    }
    return true;
  }

  function validateRoll() {
    var designation = document.getElementById("designation").value;
    var roll = document.getElementById("roll").value;
    if (designation == "student" && roll == "") {
      alert("Roll must be filled out");
      return false;
    }
    return true;
  }

  function validateEmail() {
    var email = document.getElementById("email").value;
    var regex = /^\S+@\S+\.\S+$/;
    if (email == "") {
      alert("Email must be filled out");
      return false;
    }
    if (!regex.test(email)) {
      alert("Please enter a valid email address");
      return false;
    }
    return true;
  }

  function validateCourse() {
    var designation = document.getElementById("designation").value;
    var course = document.getElementById("course").value;
    if (designation == "teacher" && course == "") {
      alert("Course must be filled out");
      return false;
    }
    return true;
  }

  function validatePassword() {
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
  
    if (pass1 == "") {
      alert("Password must be filled out");
      return false;
    }
  
    if (pass1 != pass2) {
      alert("Passwords do not match");
      return false;
    }
  
    return true;
  }
  

  function validateForm() {
    var isValid = true;
    isValid = validateName() && isValid;
    isValid = validateRoll() && isValid;
    isValid = validateEmail() && isValid;
    isValid = validatePassword() && isValid;
    isValid = validateCourse() && isValid;
    return isValid;
  }
