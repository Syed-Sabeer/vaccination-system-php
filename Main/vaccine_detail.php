<?php 
include("../Utilities/connection.php");
include("./Common/Nav.php");

// Assuming you have a logged-in user, replace $user_id with the actual user ID from session or authentication
$user_id = 1;  // Replace this with the logged-in user's ID

// Get the vaccine ID from the URL
$vaccine_id = isset($_GET['vaccine_id']) ? intval($_GET['vaccine_id']) : 0;

// Fetch vaccine and related hospital details using the vaccine ID
$query = "SELECT v.name AS vaccine_name, v.availability, v.image AS vaccine_image, v.description, 
                 h.name AS hospital_name, h.city, h.address 
          FROM vaccine v
          JOIN hospital h ON v.hospital_id = h.id
          WHERE v.id = $vaccine_id";

$result = mysqli_query($con, $query);

// Check if a valid record was found
if ($result && mysqli_num_rows($result) > 0) {
    $vaccine = mysqli_fetch_assoc($result);
} else {
    echo "<h2>Vaccine not found!</h2>";
    exit;
}

// Check if the user has already booked the same vaccine
$check_appointment_query = "SELECT * FROM appointment WHERE vaccine_id = $vaccine_id AND child_detail_id = $user_id";
$appointment_result = mysqli_query($con, $check_appointment_query);
$appointment_exists = mysqli_num_rows($appointment_result) > 0;

// Handle form submission for booking an appointment
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$appointment_exists) {
    $child_detail_id = $user_id; // Assuming $user_id is the logged-in user's ID

    // Insert into the appointment table
    $insert_query = "INSERT INTO appointment (vaccine_id, child_detail_id) VALUES ('$vaccine_id', '$child_detail_id')";
    if (mysqli_query($con, $insert_query)) {
        echo "<script>alert('Appointment booked successfully!');</script>";
    } else {
        echo "<script>alert('Failed to book appointment. Please try again later.');</script>";
    }
}
?>

<style>
    .temp:hover {
        background-color: #59A9FF;
        color: white;
        border: none;
    }
    .temp {
        background-color: #59A9FF;
        color: white;
        border: none;
    }
</style>

<!-- Title-Banner Start -->
<div class="title-banner">
    <div class="container">
        <div class="row">
            <h1 class="light-black">Vaccine Detail</h1>
        </div>
    </div>
</div>
<!-- Title-Banner End -->

<!-- Health Consultation Area Start -->
<section class="health-consult p-120">
    <div class="container">
        <div class="row mb-48">
            <div class="col-xl-6 col-lg-6">
                <div class="content-area">
                    <div class="title mb-16">
                        <div class="img-circle">
                        <img src="assets/media/services/service-4.png" alt="">
                        </div>
                        <h4 class="light-black"><?php echo $vaccine['vaccine_name']; ?></h4>
                    </div>
                    <p class="gray mb-24"><?php echo $vaccine['description']; ?> </p>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="video-image">
                    <img src="../Hospital/<?php echo $vaccine['vaccine_image']; ?>" alt="no image" class="service_detail_img br-30">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Health Consultation Area End -->

<div class="bg-wrapper service-detail">
    <!-- Appointment Form Start -->
    <section class="app-booking">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="appointment-form p-24 mt-xl-0 mt-24">
                        <h6 class="color-primary">Appointment</h6>
                        <h2 class="light-black">Book Your Appointment</h2>
                        <?php if ($appointment_exists): ?>
                            <!-- Show Appointment Pending if an appointment exists -->
                            <p class="alert alert-info">Appointment is already pending for this vaccine.</p>
                        <?php else: ?>
                            <!-- Show the form if no appointment exists -->
                            <form method="post" class="form-group mt-32">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="icon-block mb-24">
                                            <h5>Hospital: <?php echo $vaccine['hospital_name']; ?></h5>
                                            <h5 class="mt-3">Location: <?php echo $vaccine['city']; ?>, <?php echo $vaccine['address']; ?></h5>
                                            <h5 class="mt-3">Availability: <?php echo $vaccine['availability']; ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                if ($vaccine['availability'] == "available") {
                                    echo '<button type="submit" class="cus-btn small-pad">Book an Appointment</button>';
                                } else {
                                    echo '<button type="submit" class="cus-btn small-pad temp" disabled>Book an Appointment</button>';
                                }
                                ?>
                                <!-- Alert Message -->
                                <div id="message" class="alert-msg"></div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Appointment Form End -->
</div>

<?php 
include("./Common/Footer.php");
?>
