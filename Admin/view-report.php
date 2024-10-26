<?php
// Start the session at the very beginning before any output
session_start();

// Check if the hospital_id session is set, if not, redirect to signin page
if (!isset($_SESSION['hospital_id'])) {
    header("Location: signin.php");
    exit();
}

include("../Utilities/connection.php"); // Database connection

// Check if report_id is set in the query parameters
if (isset($_GET['report_id'])) {
    $report_id = $_GET['report_id'];

    // Fetch the report details from the database
    $query = "
        SELECT r.id AS report_id,
               r.approved_appointments_id,
               r.ph,
               r.blood_type,
               r.hemoglobin,
               r.other_details,
               r.created_at,
               r.updated_at,
               c.firstname AS child_name,
               c.middlename,
               c.lastname,
               v.name AS vaccine_name,
               h.name AS hospital_name
        FROM report r
        JOIN approved_appointments aa ON r.approved_appointments_id = aa.id
        JOIN child_detail c ON aa.child_detail_id = c.id
        JOIN vaccine v ON aa.vaccine_id = v.id
        JOIN hospital h ON v.hospital_id = h.id
        WHERE r.id = '$report_id'
    ";

    $result = mysqli_query($con, $query);

    // Check if the report exists
    if (mysqli_num_rows($result) > 0) {
        $report = mysqli_fetch_assoc($result);
    } else {
        echo "<p>No report found.</p>";
        exit();
    }
} else {
    echo "<p>Report ID is missing.</p>";
    exit();
}
?>

<?php include("./Common/nav.php"); ?>

<div class="app-body">
    <div class="container">
        <h2 class="my-4">Report Details</h2>
        
        <div class="card mb-3 border">
            <div class="card-body">
                <h5 class="fw-semibold">Child Information</h5>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($report['child_name'] . " " . $report['middlename'] . " " . $report['lastname']); ?></p>
                <p><strong>Vaccine:</strong> <?php echo htmlspecialchars($report['vaccine_name']); ?></p>
                <p><strong>Hospital:</strong> <?php echo htmlspecialchars($report['hospital_name']); ?></p>
                <p><strong>Report Created At:</strong> <?php echo date('d M Y H:i A', strtotime($report['created_at'])); ?></p>
                <hr>
                <h5 class="fw-semibold">Report Details</h5>
                <p><strong>PH:</strong> <?php echo htmlspecialchars($report['ph']); ?></p>
                <p><strong>Blood Type:</strong> <?php echo htmlspecialchars($report['blood_type']); ?></p>
                <p><strong>Hemoglobin:</strong> <?php echo htmlspecialchars($report['hemoglobin']); ?></p>
                <p><strong>Other Details:</strong> <?php echo nl2br(htmlspecialchars($report['other_details'])); ?></p>
                <p><strong>Last Updated:</strong> <?php echo date('d M Y H:i A', strtotime($report['updated_at'])); ?></p>
            </div>
        </div>
        
        <a href="appointment.php" class="btn btn-primary">Back to Appointments</a>
    </div>
</div>

<?php include("./Common/footer.php"); ?>
