<?php
session_start();
include("../Utilities/connection.php");

// Ensure the vaccine ID is received from the POST request
if (isset($_POST['vaccine_id'])) {
    $vaccine_id = $_POST['vaccine_id'];

    // Prepare SQL query to delete the vaccine
    $sql = "DELETE FROM vaccine WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $vaccine_id);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect back to the vaccine list page with success message
        $_SESSION['message'] = "Vaccine deleted successfully.";
        header("Location: vaccine-list.php");
        exit();
    } else {
        // Redirect back with an error message
        $_SESSION['error'] = "Failed to delete vaccine.";
        header("Location: vaccine-list.php");
        exit();
    }
} else {
    // If no vaccine ID is passed, redirect with an error
    $_SESSION['error'] = "No vaccine selected for deletion.";
    header("Location: vaccine-list.php");
    exit();
}
?>
