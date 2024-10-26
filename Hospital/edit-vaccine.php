<?php
session_start();
include("./Common/nav.php");
include("../Utilities/connection.php");

// Check if the hospital_id session is set, if not, redirect to signin page
if (!isset($_SESSION['hospital_id'])) {
    header("Location: signin.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the update operation
    if (isset($_POST['vaccine_id'])) {
        $vaccine_id = $_POST['vaccine_id'];
        $name = $_POST['name'];
        $availability = $_POST['availability'];
        $description = $_POST['description'];

        // Handle image upload
        if ($_FILES['image']['name']) {
            $image = "./uploads/" . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $image);
        } else {
            $image = $_POST['existing_image'];
        }

        // Update the vaccine details in the database
        $sql = "UPDATE vaccine SET name = ?, availability = ?, description = ?, image = ? WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssi", $name, $availability, $description, $image, $vaccine_id);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Vaccine updated successfully.";
            header("Location: vaccine-list.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    // Fetch the vaccine details for editing
    $vaccine_id = $_GET['id'];

    $sql = "SELECT id, name, availability, description, image FROM vaccine WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $vaccine_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $vaccine = $result->fetch_assoc();
    } else {
        echo "Vaccine not found.";
        exit();
    }
}
?>

<div class="app-body">
    <!-- Row starts -->
    <div class="row gx-3">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Edit Vaccine Details</h5>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="vaccine_id" value="<?php echo $vaccine['id']; ?>">
                        <input type="hidden" name="existing_image" value="<?php echo $vaccine['image']; ?>">
                        
                        <!-- Row starts -->
                        <div class="row gx-3">
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Vaccine Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($vaccine['name']); ?>" required>
                                </div>
                            </div>

                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="selectAvailability1">Availability <span class="text-danger">*</span></label>
                                    <div class="m-0">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="availability" id="selectAvailability1" value="available" <?php echo ($vaccine['availability'] == 'available') ? 'checked' : ''; ?> required>
                                            <label class="form-check-label" for="selectAvailability1">Available</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="availability" id="selectAvailability2" value="unavailable" <?php echo ($vaccine['availability'] == 'unavailable') ? 'checked' : ''; ?> required>
                                            <label class="form-check-label" for="selectAvailability2">Unavailable</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="image">Upload Vaccine Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    <?php if ($vaccine['image']) : ?>
                                        <img src="<?php echo $vaccine['image']; ?>" alt="Current Image" style="width:100px;" class="mt-2">
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-xxl-12 col-lg-12 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="description">Vaccine Description <span class="text-danger">*</span></label>
                                    <textarea id="description" name="description" rows="4" class="form-control" required><?php echo htmlspecialchars($vaccine['description']); ?></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="d-flex gap-2 justify-content-end">
                                    <a href="vaccine-list.php" class="btn btn-outline-secondary">
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        Update Vaccine
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
