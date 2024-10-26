<?php
include("../Utilities/connection.php"); // Database connection
include("./Common/nav.php");

// Retrieve appointment_id from the URL parameter
$appointmentId = $_GET['appointment_id'];

// Updated query to fetch appointment, child, vaccine, and hospital details
$query = "
    SELECT aa.id AS appointment_id,
           aa.schedule_date,
           aa.schedule_time,
           aa.date_created AS appointment_date,
           c.firstname AS child_firstname,
           c.middlename AS child_middlename,
           c.lastname AS child_lastname,
           c.gender AS child_gender,
           c.bloodgroup AS child_bloodgroup,
           c.age AS child_age,
           c.city AS child_city,
           c.address AS child_address,
           v.name AS vaccine_name,
           v.availability AS vaccine_availability,
           v.image AS vaccine_image,
           v.description AS vaccine_description,
           h.name AS hospital_name,
           h.city AS hospital_city,
           h.address AS hospital_address
    FROM approved_appointments aa
    JOIN child_detail c ON aa.child_detail_id = c.id
    JOIN vaccine v ON aa.vaccine_id = v.id
    JOIN hospital h ON v.hospital_id = h.id
    WHERE aa.id = $appointmentId
";

$result = mysqli_query($con, $query);
$appointment = mysqli_fetch_assoc($result);
?>

<div class="container my-4">
    <h2>Appointment Details</h2>
    
    <?php if ($appointment) { ?>
        <!-- Appointment Information -->
        <div class="card mb-4 border">
            <div class="card-header">Appointment Information</div>
            <div class="card-body">
                <p><strong>Appointment ID:</strong> #APT<?php echo $appointment['appointment_id']; ?></p>
                <p><strong>Scheduled Date:</strong> <?php echo date('d M Y', strtotime($appointment['schedule_date'])); ?></p>
                <p><strong>Scheduled Time:</strong> <?php echo date('h:i A', strtotime($appointment['schedule_time'])); ?></p>
                <p><strong>Created At:</strong> <?php echo date('d M Y', strtotime($appointment['appointment_date'])); ?></p>
            </div>
        </div>

        <!-- Child Information -->
        <div class="card mb-4 border">
            <div class="card-header">Child Information</div>
            <div class="card-body">
                <p><strong>Name:</strong> <?php echo $appointment['child_firstname'] . " " . $appointment['child_middlename'] . " " . $appointment['child_lastname']; ?></p>
                <p><strong>Gender:</strong> <?php echo ucfirst($appointment['child_gender']); ?></p>
                <p><strong>Blood Group:</strong> <?php echo $appointment['child_bloodgroup']; ?></p>
                <p><strong>Age:</strong> <?php echo $appointment['child_age']; ?> years</p>
                <p><strong>City:</strong> <?php echo $appointment['child_city']; ?></p>
                <p><strong>Address:</strong> <?php echo $appointment['child_address']; ?></p>
            </div>
        </div>

        <!-- Vaccine Information -->
        <div class="card mb-4 border">
            <div class="card-header">Vaccine Information</div>
            <div class="card-body">
                <p><strong>Vaccine Name:</strong> <?php echo $appointment['vaccine_name']; ?></p>
                <p><strong>Availability:</strong> <?php echo $appointment['vaccine_availability']; ?></p>
                <p><strong>Description:</strong> <?php echo $appointment['vaccine_description']; ?></p>
                <p><strong>Image:</strong><br><img src="<?php echo $appointment['vaccine_image']; ?>" alt="Vaccine Image" style="width:150px; height:auto;"></p>
            </div>
        </div>
  <!-- Hospital Information -->
  <div class="card mb-4 border">
            <div class="card-header">Hospital Information</div>
            <div class="card-body">
                <p><strong>Hospital Name:</strong> <?php echo $appointment['hospital_name']; ?></p>
                <p><strong>City:</strong> <?php echo $appointment['hospital_city']; ?></p>
                <p><strong>Address:</strong> <?php echo $appointment['hospital_address']; ?></p>
            
            </div>
        </div>

         
   
    <?php } else { ?>
        <p class="alert alert-warning">No details found for this appointment.</p>
    <?php } ?>
</div>

<?php include("./Common/footer.php"); ?>
