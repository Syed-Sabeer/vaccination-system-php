<?php
ob_start(); // Start output buffering
include("../Utilities/connection.php"); // Database connection
include("./Common/nav.php");

// Check if the report_id is provided in the URL
if (!isset($_GET['report_id']) || empty($_GET['report_id'])) {
    echo "<div class='alert alert-danger'>No report ID provided.</div>";
    exit();
}

// Retrieve the report ID from the URL
$reportId = intval($_GET['report_id']);

// Fetch existing report details from the database
$query = "SELECT * FROM report WHERE id = $reportId";
$result = mysqli_query($con, $query);

// Check if the query was successful and a report was found
if (!$result || mysqli_num_rows($result) === 0) {
    echo "<div class='alert alert-danger'>Report not found.</div>";
    exit();
}

// Fetch the report data
$report = mysqli_fetch_assoc($result);

// Initialize variables with current report data
$ph = $report['ph'];
$bloodType = $report['blood_type'];
$hemoglobin = $report['hemoglobin'];
$otherDetails = $report['other_details'];
$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize input values
    $ph = mysqli_real_escape_string($con, $_POST['ph']);
    $bloodType = mysqli_real_escape_string($con, $_POST['blood_type']);
    $hemoglobin = mysqli_real_escape_string($con, $_POST['hemoglobin']);
    $otherDetails = mysqli_real_escape_string($con, $_POST['other_details']);

    // Update report data in the database
    $updateQuery = "
        UPDATE report
        SET ph = '$ph', blood_type = '$bloodType', hemoglobin = '$hemoglobin', other_details = '$otherDetails', updated_at = NOW()
        WHERE id = $reportId
    ";
    
    if (mysqli_query($con, $updateQuery)) {
        // Redirect to appointments page after successful update
        header("Location: appointments.php?message=Report updated successfully");
        exit();
    } else {
        $error = "Failed to update report: " . mysqli_error($con);
    }
}
?>

<div class="container my-4">
    <h2>Edit Report</h2>
    <?php if ($error) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
    
    <form method="POST">
        <!-- Display Report ID, Approved Appointment ID, Child Detail ID, and Vaccine ID (from fetched data) -->
        <div class="mb-3">
            <label for="reportId" class="form-label">Report ID</label>
            <input type="text" class="form-control" id="reportId" value="<?php echo $reportId; ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="appointmentId" class="form-label">Approved Appointment ID</label>
            <input type="text" class="form-control" id="appointmentId" value="<?php echo $report['approved_appointments_id']; ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="childDetailId" class="form-label">Child Detail ID</label>
            <input type="text" class="form-control" id="childDetailId" value="<?php echo $report['child_detail_id']; ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="vaccineId" class="form-label">Vaccine ID</label>
            <input type="text" class="form-control" id="vaccineId" value="<?php echo $report['vaccine_id']; ?>" disabled>
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
        <button type="submit" class="btn btn-primary">Update Report</button>
    </form>
</div>

<?php 
include("./Common/footer.php"); 
ob_end_flush(); // End output buffering and flush the output
?>
