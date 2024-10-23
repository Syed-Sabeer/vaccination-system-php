<?php
session_start();
include("./Common/nav.php");
include("../Utilities/connection.php");


// Check if the hospital_id session is set, if not, redirect to signin page
if (!isset($_SESSION['hospital_id'])) {
    header("Location: signin.php");
    exit();
}

// Include database connection


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $availability = $_POST['availability'];
    $description = $_POST['description'];
    $hospital_id = $_SESSION['hospital_id'];
    
    // Handle image upload
    $image = $_FILES['image']['name'];
    $target_dir = "./uploads/";
    $target_file = $target_dir . basename($image);
    
    // Move uploaded file to target directory
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // Prepare the SQL insert statement
        $sql = "INSERT INTO vaccine (hospital_id, name, availability, image, description) VALUES (?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("issss", $hospital_id, $name, $availability, $target_file, $description);
        
        if ($stmt->execute()) {
            echo "Vaccine details added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Failed to upload image.";
    }
}

?>

<div class="app-body">
    <!-- Row starts -->
    <div class="row gx-3">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Add Vaccine Details</h5>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <!-- Row starts -->
                        <div class="row gx-3">
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Vaccine Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                                </div>
                            </div>

                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="selectAvailability1">Availability <span class="text-danger">*</span></label>
                                    <div class="m-0">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="availability" id="selectAvailability1" value="available" required>
                                            <label class="form-check-label" for="selectAvailability1">Available</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="availability" id="selectAvailability2" value="unavailable" required>
                                            <label class="form-check-label" for="selectAvailability2">Unavailable</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="image">Upload Vaccine Image <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="image" name="image" required>
                                </div>
                            </div>

                            <div class="col-xxl-12 col-lg-12 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="description">Vaccine Description <span class="text-danger">*</span></label>
                                    <textarea id="description" name="description" rows="4" class="form-control" placeholder="Enter Description" required></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="d-flex gap-2 justify-content-end">
                                    <a href="patients-list.html" type="button" class="btn btn-outline-secondary">
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        Add Vaccine
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Row ends -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row ends -->
</div>

<?php
include("./Common/footer.php");
?>
