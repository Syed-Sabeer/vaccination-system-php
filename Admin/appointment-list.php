<?php 
include("../Utilities/connection.php"); // Include the database connection
include("./Common/Nav.php");

// Fetch appointment list
$query = "SELECT c.middlename, c.lastname, a.id, c.firstname AS child_name, c.age, c.gender, c.bloodgroup, 
                 v.name AS vaccine_name, h.name AS hospital_name, a.date_created 
          FROM appointment a
          JOIN child_detail c ON a.child_detail_id = c.id
          JOIN vaccine v ON a.vaccine_id = v.id
          JOIN hospital h ON v.hospital_id = h.id
          ORDER BY a.date_created DESC";

$result = mysqli_query($con, $query);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle Approve with Scheduling
    if (isset($_POST['approve_with_schedule'])) {
        $appointment_id = intval($_POST['appointment_id']);
        $schedule_date = $_POST['schedule_date'];
        $schedule_time = $_POST['schedule_time'];

        // Fetch appointment details
        $approve_query = "SELECT * FROM appointment WHERE id = $appointment_id";
        $approve_result = mysqli_query($con, $approve_query);

        if (mysqli_num_rows($approve_result) > 0) {
            $appointment = mysqli_fetch_assoc($approve_result);

            // Insert into approved_appointments table with the scheduled date and time
            $insert_approved = "INSERT INTO approved_appointments (vaccine_id, child_detail_id, schedule_date, schedule_time, date_created)
                                VALUES ('{$appointment['vaccine_id']}', '{$appointment['child_detail_id']}', '$schedule_date', '$schedule_time', NOW())";

            if (mysqli_query($con, $insert_approved)) {
                // Delete from appointment table
                $delete_appointment = "DELETE FROM appointment WHERE id = $appointment_id";
                mysqli_query($con, $delete_appointment);
                echo "<script>alert('Appointment approved successfully!');window.location.reload();</script>";
            } else {
                echo "<script>alert('Failed to approve the appointment.');</script>";
            }
        }
    }

    // Handle Rejection
    if (isset($_POST['reject'])) {
        $appointment_id = intval($_POST['reject']);

        // Fetch appointment details
        $reject_query = "SELECT * FROM appointment WHERE id = $appointment_id";
        $reject_result = mysqli_query($con, $reject_query);

        if (mysqli_num_rows($reject_result) > 0) {
            $appointment = mysqli_fetch_assoc($reject_result);

            // Insert into rejected_appointments table
            $insert_rejected = "INSERT INTO rejected_appointments (vaccine_id, child_detail_id, date_created)
                                VALUES ('{$appointment['vaccine_id']}', '{$appointment['child_detail_id']}', NOW())";

            if (mysqli_query($con, $insert_rejected)) {
                // Delete from appointment table
                $delete_appointment = "DELETE FROM appointment WHERE id = $appointment_id";
                mysqli_query($con, $delete_appointment);
                echo "<script>alert('Appointment rejected successfully!');window.location.reload();</script>";
            } else {
                echo "<script>alert('Failed to reject the appointment.');</script>";
            }
        }
    }
}
?>

<div class="app-body">

<!-- Row starts -->
<div class="row gx-3">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <!-- Table starts -->
        <div class="table-responsive">
          <table id="appointmentsGrid" class="table m-0 align-middle">
            <thead>
              <tr>
                <th>#</th>
                <th>Patient Name</th>
                <th>Age</th>
                <th>Vaccine</th>
                <th>Hospital</th>
                <th>Booked At</th>
                <th>Gender</th>
                <th>Blood Grp</th>
                <th>Actions</th>
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
                            <td>{$row['age']}</td>
                            <td>{$row['vaccine_name']}</td>
                            <td>{$row['hospital_name']}</td>
                            <td>{$row['date_created']}</td>
                            <td>{$row['gender']}</td>
                            <td>{$row['bloodgroup']}</td>
                            <td>
                              <div class='d-inline-flex gap-1'>
                                <button type='button' class='btn btn-success btn-sm' onclick='openModal({$row['id']})' data-bs-toggle='tooltip' data-bs-placement='top' title='Approve'>
                                  <i class='ri-checkbox-circle-line'></i>
                                </button>
                                <form method='post' action=''>
                                  <button type='submit' name='reject' value='{$row['id']}' class='btn btn-danger btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' title='Reject'>
                                    <i class='ri-close-circle-line'></i>
                                  </button>
                                </form>
                              </div>
                            </td>
                          </tr>";
                      $counter++;
                  }
              } else {
                  echo "<tr><td colspan='9'>No appointments found</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
        <!-- Table ends -->
      </div>
    </div>
  </div>
</div>
<!-- Row ends -->

</div>

<!-- Modal for Scheduling -->
<div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" id="approveForm">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Schedule Appointment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="appointment_id" id="appointment_id">
          <div class="mb-3">
            <label for="schedule_date" class="form-label">Date</label>
            <input type="date" class="form-control" id="schedule_date" name="schedule_date" required>
          </div>
          <div class="mb-3">
            <label for="schedule_time" class="form-label">Time</label>
            <input type="time" class="form-control" id="schedule_time" name="schedule_time" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="approve_with_schedule" class="btn btn-primary">Approve</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function openModal(appointmentId) {
    document.getElementById('appointment_id').value = appointmentId;
    var modal = new bootstrap.Modal(document.getElementById('scheduleModal'));
    modal.show();
  }
</script>

<?php 
include("./Common/Footer.php");
?>
