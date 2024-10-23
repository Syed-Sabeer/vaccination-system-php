<?php
// Start the session at the very beginning before any output
session_start();

// Check if the hospital_id session is set, if not, redirect to signin page
if (!isset($_SESSION['hospital_id'])) {
    header("Location: signin.php");
    exit();
}

// Include the navigation after the session check
include("./Common/Nav.php");
?>

<!-- Your page content -->

<?php
// Include the footer
include("./Common/footer.php");
?>
