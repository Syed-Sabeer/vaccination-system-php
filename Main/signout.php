<?php
session_start(); // Start the session

// Unset all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to the home page (or login page if you prefer)
header("Location: index.php");
exit();
?>
