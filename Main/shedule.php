<?php 
include("../Utilities/connection.php"); // Database connection
include("./Common/Nav.php");

// Fetch all appointments including pending, approved, and rejected
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
           NULL AS schedule_time
    FROM appointment a
    JOIN child_detail c ON a.child_detail_id = c.id
    JOIN vaccine v ON a.vaccine_id = v.id
    JOIN hospital h ON v.hospital_id = h.id
    
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
           ap.schedule_time
    FROM approved_appointments ap
    JOIN child_detail c ON ap.child_detail_id = c.id
    JOIN vaccine v ON ap.vaccine_id = v.id
    JOIN hospital h ON v.hospital_id = h.id
    
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
           NULL AS schedule_time
    FROM rejected_appointments ar
    JOIN child_detail c ON ar.child_detail_id = c.id
    JOIN vaccine v ON ar.vaccine_id = v.id
    JOIN hospital h ON v.hospital_id = h.id
    ORDER BY date_created DESC
";

$result = mysqli_query($con, $query);
?>

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
                            </tr>";
                            $counter++;
                        }
                    } else {
                        echo "<tr><td colspan='7'>No appointments found</td></tr>";
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
