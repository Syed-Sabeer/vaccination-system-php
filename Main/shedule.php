<?php 
include("../Utilities/connection.php"); // Database connection
include("./Common/Nav.php");

// session_start(); // Start the session

// Check if registration steps are completed
if (!isset($_SESSION['registration_step']) || $_SESSION['registration_step'] < 1) {
    header("Location: signup.php"); // Redirect to the signup page if step 1 is not completed
    exit;
}

// Check if the user has completed step 2
if ($_SESSION['registration_step'] < 2) {
    header("Location: child_detail.php"); // Redirect to child_detail.php if step 2 is not completed
    exit;
}

// Fetch all appointments including pending, approved, and rejected, with report status
$query = "
    SELECT a.id, 
           c.firstname AS child_name, 
           c.middlename, 
           c.lastname, 
           v.name AS vaccine_name, 
           h.name AS hospital_name, 
           a.date_created, 
           'Pending' AS appointment_status,
           NULL AS schedule_date,
           NULL AS schedule_time,
           r.id AS report_id  -- Fetch report ID if exists
    FROM appointment a
    JOIN child_detail c ON a.child_detail_id = c.id
    JOIN vaccine v ON a.vaccine_id = v.id
    JOIN hospital h ON v.hospital_id = h.id
    LEFT JOIN report r ON a.id = r.approved_appointments_id  -- Join report table
    
    UNION ALL
    
    SELECT ap.id, 
           c.firstname AS child_name, 
           c.middlename, 
           c.lastname, 
           v.name AS vaccine_name, 
           h.name AS hospital_name, 
           ap.date_created, 
           'Approved' AS appointment_status,
           ap.schedule_date,
           ap.schedule_time,
           r.id AS report_id  -- Fetch report ID if exists
    FROM approved_appointments ap
    JOIN child_detail c ON ap.child_detail_id = c.id
    JOIN vaccine v ON ap.vaccine_id = v.id
    JOIN hospital h ON v.hospital_id = h.id
    LEFT JOIN report r ON ap.id = r.approved_appointments_id  -- Join report table
    
    UNION ALL
    
    SELECT ar.id, 
           c.firstname AS child_name, 
           c.middlename, 
           c.lastname, 
           v.name AS vaccine_name, 
           h.name AS hospital_name, 
           ar.date_created, 
           'Rejected' AS appointment_status,
           NULL AS schedule_date,
           NULL AS schedule_time,
           r.id AS report_id  -- Fetch report ID if exists
    FROM rejected_appointments ar
    JOIN child_detail c ON ar.child_detail_id = c.id
    JOIN vaccine v ON ar.vaccine_id = v.id
    JOIN hospital h ON v.hospital_id = h.id
    LEFT JOIN report r ON ar.id = r.approved_appointments_id  -- Join report table
    ORDER BY date_created DESC
";

$result = mysqli_query($con, $query);
?>

<style>
    /* Modal Styles */
    .modal-content {
        background-color: #ffffff; /* White background */
        border: none; /* Remove border */
        border-radius: 8px; /* Rounded corners */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    }
    .modal-header {
        border-bottom: 1px solid #dee2e6; /* Light border at the bottom */
    }
    .modal-title {
        font-size: 1.5rem; /* Larger font for title */
        font-weight: 600; /* Bold title */
        color: #fff; /* Darker text color */
    }
    .modal-footer {
        border-top: 1px solid #dee2e6; /* Light border at the top */
    }
    .modal-body p {
        font-size: 1rem; /* Normal font size for paragraphs */
        color: #fff; /* Darker text color for body */
        margin-bottom: 1rem; /* Spacing between paragraphs */
    }
    .btn-secondary {
        background-color: #6c757d; /* Darker button color */
        border-color: #6c757d; /* Border color */
    }
    .btn-secondary:hover {
        background-color: #5a6268; /* Darker on hover */
        border-color: #545b62; /* Darker border on hover */
    }
</style>

<div class="app-body">
    <div class="container">
        <h2 class="my-4">Appointment Status</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Patient Name</th>
                        <th>Vaccine</th>
                        <th>Hospital</th>
                        <th>Status</th>
                        <th>Scheduled Date</th>
                        <th>Scheduled Time</th>
                        <th>Reports</th> <!-- New Reports Column -->
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (mysqli_num_rows($result) > 0) {
                        $counter = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                <td>{$counter}</td>
                                <td>{$row['child_name']} {$row['middlename']} {$row['lastname']}</td>
                                <td>{$row['vaccine_name']}</td>
                                <td>{$row['hospital_name']}</td>
                                <td>{$row['appointment_status']}</td>
                                <td>" . ($row['appointment_status'] === 'Approved' ? $row['schedule_date'] : 'N/A') . "</td>
                                <td>" . ($row['appointment_status'] === 'Approved' ? $row['schedule_time'] : 'N/A') . "</td>
                                <td>" . ($row['report_id'] ? "<a href='#' data-bs-toggle='modal' data-bs-target='#reportModal{$row['report_id']}'>View Report</a>" : 'No Report') . "</td> <!-- View Report Link -->
                            </tr>";
                            $counter++;
                            
                            // Modal for displaying report details
                            if ($row['report_id']) {
                                // Fetch report details for this report ID
                                $reportQuery = "SELECT * FROM report WHERE id = {$row['report_id']}";
                                $reportResult = mysqli_query($con, $reportQuery);
                                
                                echo "
                                <div class='modal fade' id='reportModal{$row['report_id']}' tabindex='-1' aria-labelledby='reportModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='reportModalLabel'>Report Details</h5>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'>
                                            <br>
                                            
                                            ";

                                if ($reportRow = mysqli_fetch_assoc($reportResult)) {
                                    echo "<p><strong>PH:</strong> {$reportRow['ph']}</p>
                                          <p><strong>Blood Type:</strong> {$reportRow['blood_type']}</p>
                                          <p><strong>Hemoglobin:</strong> {$reportRow['hemoglobin']}</p>
                                          <p><strong>Other Details:</strong> {$reportRow['other_details']}</p>";
                                } else {
                                    echo "<p>No report details found.</p>";
                                }
                                
                                echo "      </div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                            }
                        }
                    } else {
                        echo "<tr><td colspan='8'>No appointments found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
include("./Common/Footer.php");
?>
