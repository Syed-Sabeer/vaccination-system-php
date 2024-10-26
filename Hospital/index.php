<?php
// Start the session at the very beginning before any output
session_start();

// Check if the hospital_id session is set, if not, redirect to signin page
if (!isset($_SESSION['hospital_id'])) {
    header("Location: signin.php");
    exit();
}

?>

<?php 
include("../Utilities/connection.php"); // Database connection
include("./Common/nav.php");

// Fetch all approved appointments along with vaccine and child details
$query = "
    SELECT aa.id AS appointment_id,
           aa.vaccine_id,
           aa.child_detail_id,
           aa.schedule_date,
           aa.schedule_time,
           aa.date_created,
           c.firstname AS child_name,
           c.middlename,
           c.lastname,
           v.name AS vaccine_name,
           h.name AS hospital_name,
           r.id AS report_id
    FROM approved_appointments aa
    JOIN child_detail c ON aa.child_detail_id = c.id
    JOIN vaccine v ON aa.vaccine_id = v.id
    JOIN hospital h ON v.hospital_id = h.id
    LEFT JOIN report r ON r.approved_appointments_id = aa.id
    ORDER BY aa.date_created DESC
";

$result = mysqli_query($con, $query);
?>

<div class="app-body">
    <div class="container">
        <h2 class="my-4">Appointments</h2>
        
        <!-- Cards for each appointment -->
        <?php 
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $reportExists = isset($row['report_id']);
        ?>
            <div class="card mb-3 border">
                <div class="card-body">
                    <div class="d-flex align-items-center flex-wrap gap-4">
                        
                        <!-- Appointment ID and Patient Name -->
                        <div class="d-flex flex-column mw-90">
                            <div class="text-primary">
                                #APT<?php echo $row['appointment_id']; ?>
                            </div>
                            <div class="fw-semibold"><?php echo $row['child_name'] . " " . $row['middlename'] . " " . $row['lastname']; ?></div>
                        </div>
                        
                        <!-- Vaccine and Hospital Information -->
                        <div class="d-flex flex-column mw-180">
                            <div class="text-primary">Vaccine</div>
                            <div><?php echo $row['vaccine_name']; ?></div>
                        </div>
                        <div class="d-flex flex-column mw-180">
                            <div class="text-primary">Hospital</div>
                            <div><?php echo $row['hospital_name']; ?></div>
                        </div>

                        <!-- Schedule Date and Time -->
                        <div class="d-flex flex-column mw-120">
                            <div class="text-primary">Scheduled Date</div>
                            <div><?php echo date('d M Y', strtotime($row['schedule_date'])); ?></div>
                        </div>
                        <div class="d-flex flex-column mw-120">
                            <div class="text-primary">Scheduled Time</div>
                            <div><?php echo date('h:i A', strtotime($row['schedule_time'])); ?></div>
                        </div>

                        <!-- Appointment Creation Date -->
                        <div class="d-flex flex-column mw-120">
                            <div class="text-primary">Created At</div>
                            <div><?php echo date('d M Y', strtotime($row['date_created'])); ?></div>
                        </div>

                        <!-- Actions -->
                        <div class="ms-auto d-flex align-items-center gap-3">
                        <div class="fw-semibold text-primary">
    <a href="appointment-details.php?appointment_id=<?php echo $row['appointment_id']; ?>" 
       class="bg-primary-subtle text-primary py-2 px-3 rounded-5">
        Details
    </a>
</div>

                            <div class="fw-semibold text-primary">
    <?php 
        // Determine the link and text based on whether the report exists
        $link = $reportExists 
            ? 'edit-report.php?report_id=' . $row['report_id'] 
            : 'create-report.php?approved_appointment_id=' . $row['appointment_id'] 
              . '&child_detail_id=' . $row['child_detail_id'] 
              . '&vaccine_id=' . $row['vaccine_id'];

        $buttonText = $reportExists ? 'Edit Report' : 'Create Report';
    ?>
    <a href="<?php echo $link; ?>" class="bg-primary-subtle text-primary py-2 px-3 rounded-5">
        <?php echo $buttonText; ?>
    </a>
</div>

                        </div>
                    </div>
                </div>
            </div>
        <?php 
            }
        } else {
            echo "<p>No approved appointments found.</p>";
        }
        ?>
    </div>
</div>

<?php 
include("./Common/footer.php");
?>
