
<?php

error_reporting(E_ALL);
ini_set("display_error",1);

require '../config/config.php';


if($_SERVER["REQUEST_METHOD"] == "POST")
{

    try {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
        
        $dob=$_POST['dob'];
        $gender=$_POST['gender'];
        
    
    
        $sql = "INSERT INTO `user_table` (`name`,`email`,`password`,`dob`,`gender`) VALUES ('$name','$email','$password','$dob','$gender')";
        // die($sql);
    
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header('Location:dashbord.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        // Close connection
        $conn->close();
    }    catch (\Exception $e) {
print_r($e->getMessage());
    }



}





?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Form</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS for form validation styling (optional) -->
  <style>
    .was-validated .form-control:valid, .was-validated .form-control:invalid {
      border-color: #ced4da;
    }
    .was-validated .form-control:valid:focus, .was-validated .form-control:invalid:focus {
      border-color: #ced4da;
      box-shadow: none;
    }
    .was-validated .form-control:invalid {
      border-color: #dc3545;
    }
    .was-validated .form-control:invalid:focus {
      border-color: #dc3545;
      box-shadow: none;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            Register
          </div>
          <div class="card-body">
            <form action="register.php" method="POST" class="needs-validation" novalidate>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="name">First name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter your first name" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <div class="invalid-feedback">
                    Please provide a valid first name.
                  </div>
                </div>
                <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Please provide a valid email address.
                </div>
              </div>
              </div>
             
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <div class="invalid-feedback">
                    Please provide a valid password.
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="confirmPassword">Confirm Password</label>
                  <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
                  <div class="valid-feedback">
                    Passwords match!
                  </div>
                  <div class="invalid-feedback">
                    Passwords do not match.
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="dob">Date of Birth</label>
                  <input type="date" class="form-control" id="dob" name="dob" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <div class="invalid-feedback">
                    Please provide your date of birth.
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="gender">Gender</label>
                  <select class="form-control" id="gender" name="gender" required>
                    <option value="">Select...</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                  </select>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <div class="invalid-feedback">
                    Please select your gender.
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Register</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies (optional, for some features) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
  <!-- Custom JS for form validation (optional, for additional client-side validation) -->
  <!-- <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script> -->
</body>
</html>
