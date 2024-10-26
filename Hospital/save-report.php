<?php
include("../Utilities/connection.php");

$appointment_id = $_POST['appointment_id'];
$child_detail_id = $_POST['child_detail_id'];
$vaccine_id = $_POST['vaccine_id'];
$ph = $_POST['ph'];
$notes = $_POST['notes'];

// Check if a report already exists
$query = "SELECT * FROM reports WHERE appointment_id = '$appointment_id'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    // Update existing report
    $update_query = "
        UPDATE reports 
        SET ph = '$ph', notes = '$notes'
        WHERE appointment_id = '$appointment_id'
    ";
    mysqli_query($con, $update_query);
} else {
    // Insert new report
    $insert_query = "
        INSERT INTO reports (appointment_id, child_detail_id, vaccine_id, ph, notes) 
        VALUES ('$appointment_id', '$child_detail_id', '$vaccine_id', '$ph', '$notes')
    ";
    mysqli_query($con, $insert_query);
}

header("Location: appointment-details.php?id=$appointment_id");
exit();
?>
