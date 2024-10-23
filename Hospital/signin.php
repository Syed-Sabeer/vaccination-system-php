<?php
session_start(); // Initialize session at the start

// Assuming you have a utilities/connection.php file for database connection
include("../utilities/connection.php");

$error_message = ""; // Initialize the error message

if (isset($_POST["btn"])) {
    $email2 = $_POST["email2"];
    $Pass2 = $_POST["pass2"];

    // Using a prepared statement to prevent SQL injection
    $signin = "SELECT * FROM `hospital` WHERE email = ?";
    $stmt = mysqli_prepare($con, $signin);

    // Bind the email parameter
    mysqli_stmt_bind_param($stmt, "s", $email2);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if a user with the provided email exists
    if ($result && mysqli_num_rows($result) > 0) {
        $array = mysqli_fetch_assoc($result);

        // Verify the password against the hashed password in the database
        if (password_verify($Pass2, $array['password'])) {
            // Set session variables
            $_SESSION['hospital_id'] = $array['id'];
            
         

            // Redirect to the index page after successful login
            header("location:index.php");
            exit();
        } else {
            // If password doesn't match, set an error message
            $error_message = "Email or Password is Incorrect";
        }
    } else {
        // If no user exists with the provided email, set an error message
        $error_message = "Email or Password is Incorrect";
    }
}
?>




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
          
              <div class="col-xl-5 col-lg-5">
                <div class="appointment-form p-24 mt-xl-0 mt-24">
                  <h6 class="color-primary">Sign In</h6>
                  <h2 class="light-black">Welcome Back</h2>
                  <form method="post" class="form-group mt-32">
                    <div class="row">
                    <div class="col-sm-10">
                        <div class="icon-block mb-24">
                          <label for="email" class="mb-4p">Email*</label>
                          <input type="email" class="form-control" id="email" name="email2" required
                            placeholder="email@example.com">
                          
                        </div>
                      </div>
                    
               
                      <div class="col-sm-10">
                        <div class="icon-block mb-24">
                          <label for="pass" class="mb-4p">Password*</label>
                          <input type="password" class="form-control" id="pass" name="pass2" required>
                          
                        </div>
                      </div>
                    
                    
                  
                    </div>
                    <button type="submit" class="cus-btn small-pad" name="btn">Login</button>
                    <!-- Alert Message -->
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
