<?php
ob_start(); // Start output buffering
include("../Utilities/connection.php"); // Database connection
include("./Common/nav.php");

// Get the necessary IDs from URL parameters
$approvedAppointmentId = $_GET['approved_appointment_id'];
$childDetailId = $_GET['child_detail_id'];
$vaccineId = $_GET['vaccine_id'];

// Initialize variables for additional report details
$ph = '';
$bloodType = '';
$hemoglobin = '';
$otherDetails = '';
$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize input values
    $ph = mysqli_real_escape_string($con, $_POST['ph']);
    $bloodType = mysqli_real_escape_string($con, $_POST['blood_type']);
    $hemoglobin = mysqli_real_escape_string($con, $_POST['hemoglobin']);
    $otherDetails = mysqli_real_escape_string($con, $_POST['other_details']);

    // Check if the report already exists
    $checkQuery = "SELECT id FROM report WHERE approved_appointments_id = $approvedAppointmentId";
    $checkResult = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $error = "Report already exists for this appointment.";
    } else {
        // Insert report data into the database
        $insertQuery = "
            INSERT INTO report (approved_appointments_id, child_detail_id, vaccine_id, ph, blood_type, hemoglobin, other_details, created_at)
            VALUES ($approvedAppointmentId, $childDetailId, $vaccineId, '$ph', '$bloodType', '$hemoglobin', '$otherDetails', NOW())
        ";
        
        if (mysqli_query($con, $insertQuery)) {
            // Redirect to appointments page after successful report creation
            header("Location: appointments.php?message=Report created successfully");
            exit();
        } else {
            $error = "Failed to create report: " . mysqli_error($con);
        }
    }
}
?>

<div class="container my-4">
    <h2>Create Report</h2>
    <?php if ($error) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
    
    <form method="POST">
        <!-- Display Approved Appointment ID, Child Detail ID, and Vaccine ID -->
        <div class="mb-3">
            <label for="appointmentId" class="form-label">Approved Appointment ID</label>
            <input type="text" class="form-control" id="appointmentId" value="<?php echo $approvedAppointmentId; ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="childDetailId" class="form-label">Child Detail ID</label>
            <input type="text" class="form-control" id="childDetailId" value="<?php echo $childDetailId; ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="vaccineId" class="form-label">Vaccine ID</label>
            <input type="text" class="form-control" id="vaccineId" value="<?php echo $vaccineId; ?>" disabled>
        </div>

        <!-- Additional report details input fields -->
        <div class="mb-3">
            <label for="ph" class="form-label">pH Level</label>
            <input type="text" class="form-control" id="ph" name="ph" value="<?php echo $ph; ?>" required>
        </div>
        <div class="mb-3">
            <label for="blood_type" class="form-label">Blood Type</label>
            <input type="text" class="form-control" id="blood_type" name="blood_type" value="<?php echo $bloodType; ?>" required>
        </div>
        <div class="mb-3">
            <label for="hemoglobin" class="form-label">Hemoglobin Level</label>
            <input type="text" class="form-control" id="hemoglobin" name="hemoglobin" value="<?php echo $hemoglobin; ?>" required>
        </div>
        <div class="mb-3">
            <label for="other_details" class="form-label">Other Details</label>
            <textarea class="form-control" id="other_details" name="other_details" rows="4"><?php echo $otherDetails; ?></textarea>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary">Create Report</button>
    </form>
</div>

<?php 
include("./Common/footer.php"); 
ob_end_flush(); // End output buffering and flush the output
?>
