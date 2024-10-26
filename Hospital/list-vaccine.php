<?php
// Start the session at the very beginning before any output
session_start();
include("./Common/nav.php");
include("../Utilities/connection.php");

// Check if the hospital_id session is set, if not, redirect to signin page
if (!isset($_SESSION['hospital_id'])) {
    header("Location: signin.php");
    exit();
}

$hospital_id = $_SESSION['hospital_id'];

// Fetch vaccine list from the database
$sql = "SELECT id, name, availability, description, image FROM vaccine WHERE hospital_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $hospital_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="app-body">

<!-- Row starts -->
<div class="row gx-3">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title">Vaccine List</h5>
        <a href="add-vaccine.php" class="btn btn-primary ms-auto">Add Vaccine</a>
      </div>
      <div class="card-body pt-0">

        <!-- Table starts -->
        <div class="table-responsive">
          <table id="scrollVertical" class="table truncate m-0 align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>Vaccine Name</th>
                <th>Availability</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Check if any vaccines were found
              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      // Truncate the description to 50 characters and add "..." if longer
                      $truncatedDescription = strlen($row['description']) > 50 
                          ? substr($row['description'], 0, 50) . "..." 
                          : $row['description'];

                      echo "<tr>";
                      echo "<td>" . $row['id'] . "</td>";
                      echo "<td>" . $row['name'] . "</td>";
                      echo "<td>" . ucfirst($row['availability']) . "</td>";
                      echo "<td>" . $truncatedDescription . "</td>";
                      echo "<td><img src='" . $row['image'] . "' class='img-2x rounded-5' alt='Vaccine Image' style='width: 50px;'></td>";
                      echo "<td>
                                <div class='d-inline-flex gap-1'>
                                  <button type='button' class='btn btn-outline-danger btn-sm' data-bs-toggle='modal' data-bs-target='#delRow".$row['id']."'>
                                    <i class='ri-delete-bin-line'></i>
                                  </button>
                                  <a href='edit-vaccine.php?id=" . $row['id'] . "' class='btn btn-outline-success btn-sm' data-bs-toggle='tooltip' data-bs-title='Edit Vaccine Details'>
                                    <i class='ri-edit-box-line'></i>
                                  </a>
                                
                                </div>

                              <!-- Modal Delete Row -->
<div class='modal fade' id='delRow" . $row['id'] . "' tabindex='-1' aria-labelledby='delRowLabel' aria-hidden='true'>
    <div class='modal-dialog modal-sm'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='delRowLabel'>Confirm Delete</h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body'>
                Are you sure you want to delete the vaccine <strong>" . $row['name'] . "</strong>?
            </div>
            <div class='modal-footer'>
                <form method='POST' action='delete-vaccine.php'>
                    <input type='hidden' name='vaccine_id' value='" . $row['id'] . "'>
                    <div class='d-flex justify-content-end gap-2'>
                        <button type='button' class='btn btn-outline-secondary' data-bs-dismiss='modal'>No</button>
                        <button type='submit' class='btn btn-danger'>Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

                            </td>";
                      echo "</tr>";
                  }
              } else {
                  echo "<tr><td colspan='6' class='text-center'>No vaccines found</td></tr>";
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

<?php
// Include the footer
include("./Common/footer.php");
?>
