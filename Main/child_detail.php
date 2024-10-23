<?php
session_start(); // Start the session

include("../utilities/connection.php");

// Check if child ID is set either in the session or in the URL as a GET parameter
if (isset($_SESSION['child_id'])) {
    $childId = $_SESSION['child_id']; // Retrieve from session
} elseif (isset($_GET['id'])) {
    $childId = $_GET['id']; // Retrieve from URL
} else {
    // If neither session nor GET contains the child ID, show an alert and stop the script
    echo "<script>alert('Child ID not found.')</script>";
    exit();
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $f_name = $_POST['fname'];
    $m_name = $_POST['mname'];
    $l_name = $_POST['lname'];
    $bloodgrp = $_POST['bloodgrp'];
    $age = $_POST['age'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    // Insert child details into the database
    $insert = $con->prepare("INSERT INTO `child_detail`(`child_id`, `firstname`, `middlename`, `lastname`, `bloodgroup`, `age`, `city`, `gender`, `address`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Use appropriate binding types - childId (int), age (int), rest are strings
    $insert->bind_param(
        "issssisss", // "i" for int, "s" for string
        $childId,
        $f_name,
        $m_name,
        $l_name,
        $bloodgrp,
        $age,
        $city,
        $gender,
        $address
    );

    // Execute the query
    $run = $insert->execute();

    if ($run) {
        $_SESSION['registration_step'] = 2; // Mark step 2 as completed
        header("Location: index.php"); // Redirect to the homepage or another page
        exit;
    } else {
        echo "<script>alert('Error occurred while inserting data.')</script>";
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
  <link rel="shortcut icon" type="image/x-icon" href="assets/media/favicon.png">

  <!-- All CSS files -->
  <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/vendor/font-awesome.css">
  <link rel="stylesheet" href="assets/css/vendor/slick.css">
  <link rel="stylesheet" href="assets/css/app.css">
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
                  <h2 class="light-black">Child Registration</h2>
                  <form method="post" class="form-group mt-32">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="icon-block mb-24">
                          <label for="fname" class="mb-4p">First Name*</label>
                          <input type="text" class="form-control" id="fname" name="fname" required placeholder="Syed">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="icon-block mb-24">
                          <label for="mname" class="mb-4p">Middle Name*</label>
                          <input type="text" class="form-control" id="mname" name="mname" required placeholder="Sabeer">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="icon-block mb-24">
                          <label for="lname" class="mb-4p">Last Name*</label>
                          <input type="text" class="form-control" id="lname" name="lname" required placeholder="Faisal">
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="icon-block mb-24">
                          <label for="bloodgrp" class="mb-4p">Blood Group*</label>
                          <input type="text" class="form-control" id="bloodgrp" name="bloodgrp" required placeholder="B+">
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="icon-block mb-24">
                          <label for="age" class="mb-4p">Age*</label>
                          <input type="number" class="form-control" id="age" name="age" required placeholder="16">
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="icon-block mb-24">
                          <label for="city" class="mb-4p">City*</label>
                          <input type="text" class="form-control" id="city" name="city" required placeholder="Karachi">
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="icon-block mb-24">
                          <label for="gender" class="mb-4p">Gender*</label>
                          <input type="text" class="form-control" id="gender" name="gender" required placeholder="male or female">
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
  <script src="assets/js/vendor/jquery-3.6.3.min.js"></script>
  <script src="assets/js/vendor/bootstrap.min.js"></script>
  <script src="assets/js/vendor/slick.min.js"></script>
  <script src="assets/js/vendor/jquery-appear.js"></script>
  <script src="assets/js/vendor/jquery-validator.js"></script>

  <!-- Site Scripts -->
  <script src="assets/js/app.js"></script>
</body>

</html>
