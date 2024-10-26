<?php
session_start(); // Ensure session is started at the beginning of your script

// Assuming you have a utilities/connection.php file for database connection
include("../utilities/connection.php");

// Check if the user is logged in
if (isset($_SESSION['child_id'])) {
    // Prepare a query to get user information based on child_id
    $query = "SELECT firstname, middlename, lastname FROM child_detail WHERE child_id = ?";
    
    // Prepare the statement
    $stmt = mysqli_prepare($con, $query);
    
    // Bind the child_id parameter
    mysqli_stmt_bind_param($stmt, "i", $_SESSION['child_id']);
    mysqli_stmt_execute($stmt);
    
    // Get the result
    $result = mysqli_stmt_get_result($stmt);
    
    // Fetch user details
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        $user = null; // No user found
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Medicare HTML5 Template">

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

  <!-- Back To Top Start -->
  <a href="#main-wrapper" id="backto-top" class="back-to-top"><i class="fas fa-angle-up"></i></a>
  <!-- Main Wrapper Start -->
  <div id="main-wrapper" class="main-wrapper overflow-hidden">

    <!-- Header Area Start -->
    <header class="header">
      <div class="container">
        <nav class="navbar upper d-flex">
          <a class="navbar-brand d-lg-none" href="index.php">
            <img alt="" src="assets/media/brand-logo.png">
          </a>
          <a class="navbar-brand d-lg-block d-none" href="index.php"><img alt="" src="assets/media/brand-logo.png"></a>
          <nav class="navbar navbar-expand-lg">
            <div class="collapse navbar-collapse" id="mynavbar">
              <ul class="navbar-nav mainmenu m-0">
                <li class="menu-item">
                  <a href="index.php" class="active">Home</a>
                </li>
                <li class="menu-item">
                  <a href="about.php">About Us</a>
                </li>
                
                  <li class="menu-item">
                  <a href="shedule.php">Appointments</a>
                </li>
                  
              </ul>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
              <i class="fal fa-bars"></i>
            </button>
          </nav>
          
          <div class="right-content d-lg-flex d-none">
          
    <?php if (isset($user)): ?>
        <ul class="unstyled">
          <p>Hello, </p>
          <div class="d-block">
            <p><?php echo htmlspecialchars($user['firstname']); ?></p>
            <p><?php echo htmlspecialchars($user['middlename']); ?></p>
            <p><?php echo htmlspecialchars($user['lastname']); ?></p>
            </div>
        </ul>
        <ul class="unstyled">
            <li><a href="signout.php" class="cus-btn">
                <h6>Logout</h6>
            </a></li>
        </ul>
    <?php else: ?>
        <ul class="unstyled">
            <li><a href="signup.php" class="cus-btn">
                <h6>Register</h6>
            </a></li>
        </ul>
    <?php endif; ?>
</div>

        </nav>
      </div>
    </header>
    <!-- Header Area end -->