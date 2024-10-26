<?php
session_start();

include("../Utilities/connection.php");




if (isset($_POST["btn"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $city = $_POST["city"];
    $address = $_POST["address"];
    $date_created = date('Y-m-d H:i:s');

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>$(document).ready(function() { $('#e-error').html('Please enter a valid email address.'); });</script>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $insert = "INSERT INTO `hospital`(`email`, `password`, `name`, `city`,`address`, `date_created`) VALUES ('$email','$hashed_password','$name','$city','$address','$date_created')";
        
            $run = mysqli_query($con, $insert);

            
            if ($run) {
              // Set session variable after successful signup
              $_SESSION['hospital_id'] = mysqli_insert_id($con); // Set the session to the new user ID
              
              // Redirect to the index page or any other page
              header("Location: index.php");
              exit();
          }
          
        
    }
}


?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {

// Function to check if the email exists in the database
function checkEmail() {
    var email = $("input[name='email']").val();
    $.ajax({
        url: "./Common/check_email.php", // Replace with the PHP file that checks the email
        method: "POST",
        data: { email: email },
        success: function(response) {
            if (response === "exists") {
                $("#e-error").html("Email already exists!");
            } else {
                $("#e-error").html("");
            }
            checkButtonStatus();
        }
    });
}

function checkEmptyFields() {
    var email = $("input[name='email']").val();
    var password = $("input[name='password']").val();
    var repeatpassword = $("input[name='pass2']").val();

    var isEmpty =  !email || !password || !repeatpassword;
    if (isEmpty) {
        $("#sign-error").html("");
    } else {
        $("#sign-error").html("");
    }

    // Check password length
    if (password.length < 8) {
        $("#pass-error").html("Weak Password");
    } else {
        $("#pass-error").html("");
    }

    // Recheck password match when either password field is updated
    checkPasswordMatch();

    checkButtonStatus();
}


function checkPasswordMatch() {
    var password = $("input[name='password']").val();
    var repeatPassword = $("input[name='pass2']").val();

    if (password === repeatPassword) {
        $("#pass2-error").html("");
    } else {
        $("#pass2-error").html("Passwords do not match.");
    }

    checkButtonStatus();
}

// Function to check the overall button status and enable/disable it accordingly
function checkButtonStatus() {
  
    var emailError = $("#e-error").html();
    var passwordMatchError = $("#pass2-error").html();
    var emptyFieldsError = $("#sign-error").html();
    var passwordLengthError = $("#pass-error").html(); // New variable for password length error

    // Disable the button if there are any errors or empty fields or password length error
    $("button[name='btn']").prop("disabled", emailError || passwordMatchError || emptyFieldsError || passwordLengthError);
}

// Bind events to input fields to trigger validation
$("input[name='email']").on("input", checkEmail);
$("input[name='password'], input[name='pass2']").on("input", checkEmptyFields); // Check empty fields for both passwords


// Initial button status check
checkButtonStatus();
});
</script>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Medicare  HTML5 Template">
  <title>Medicare = We Care, We Heal</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="../Main/assets/media/favicon.png">

  <!-- All CSS files -->
  <link rel="stylesheet" href="../Main/assets/css/vendor/bootstrap.min.css">
  <link rel="stylesheet" href="../Main/assets/css/vendor/font-awesome.css">
  <link rel="stylesheet" href="../Main/assets/css/vendor/slick.css">
  <link rel="stylesheet" href="../Main/assets/css/app.css">
</head>

<body>
  <!-- Main Wrapper Start -->
  <div id="main-wrapper" class="main-wrapper overflow-hidden">
    <div class="bg-wrapper-2">
      <div class="bg-wrapper-3">
        <!-- Appointment Form Start -->
        <section class="app-booking p-120">
          <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
              <div class="col-xl-12 col-lg-12">
                <div class="appointment-form p-24 mt-xl-0 mt-24">
                  <h6 class="color-primary">Detail</h6>
                  <h2 class="light-black">Hospital Registration</h2>
                  <form method="post" class="form-group mt-32">
                    <div class="row">
                    <div class="col-sm-3">
                        <div class="icon-block mb-24">
                          <label for="city" class="mb-4p">Email*</label>
                          <input type="text" class="form-control" id="email" name="email" required placeholder="liaquat@gmail.com">
                        </div>
                      </div>

                 
                    <div class="col-sm-4">
                        <div class="icon-block mb-24">
                          <label for="pass" class="mb-4p">Password*</label>
                          <input type="password" class="form-control" id="pass" name="password" required>
                          <label id="pass-error" style="color: red;">&nbsp; </label>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="icon-block mb-24">
                          <label for="pass" class="mb-4p">Confirm Password*</label>
                          <input type="password" class="form-control" id="pass2" name="pass2" required>
                          <label id="pass2-error" style="color: red;">&nbsp; </label>
                        </div>
                      </div>
                
                      <div class="col-sm-4">
                        <div class="icon-block mb-24">
                          <label for="name" class="mb-4p">Hospital Name*</label>
                          <input type="text" class="form-control" id="name" name="name" required placeholder="Liaquat National Hospital">
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="icon-block mb-24">
                          <label for="city" class="mb-4p">City*</label>
                          <input type="text" class="form-control" id="city" name="city" required placeholder="Karachi">
                        </div>
                      </div>
                    
                      <div class="col-sm-12">
                        <div class="icon-block mb-24">
                          <label for="address" class="mb-4p">Address*</label>
                          <input type="text" class="form-control" id="address" name="address" required placeholder="House no 34, Street no 3, LA 318, US">
                        </div>
                      </div>
                    </div>
                    <button name="btn" type="submit" class="cus-btn small-pad">Submit</button>
                    <!-- Alert Message -->
                    <br>
                    <a class="mt-4" href="signin.php">Already Registered? Login</a>
                    <div id="message" class="alert-msg"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Appointment Form End -->
      </div>
    </div>
  </div>

  <!-- Jquery Js -->
  <script src="../Main/assets/js/vendor/jquery-3.6.3.min.js"></script>
  <script src="../Main/assets/js/vendor/bootstrap.min.js"></script>
  <script src="../Main/assets/js/vendor/slick.min.js"></script>
  <script src="../Main/assets/js/vendor/jquery-appear.js"></script>
  <script src="../Main/assets/js/vendor/jquery-validator.js"></script>

  <!-- Site Scripts -->
  <script src="../Main/assets/js/app.js"></script>
</body>

</html>
