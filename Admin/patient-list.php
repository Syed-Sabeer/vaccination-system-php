<?php 
include("./Common/Nav.php");
include("../Utilities/connection.php"); // Ensure your database connection is included here

// Fetch data from the child_detail and children tables
$query = "
    SELECT cd.child_id, cd.firstname, cd.lastname,cd.middlename, cd.gender, cd.age, cd.bloodgroup, cd.address, c.email 
    FROM child_detail cd 
    JOIN children c ON cd.child_id = c.id
";
$result = mysqli_query($con, $query);

?>

<!-- App body starts -->
<div class="app-body">

  <!-- Row starts -->
  <div class="row gx-3">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">

          <!-- Table starts -->
          <div class="table-responsive">
            <table id="basicExample" class="table truncate m-0 align-middle">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Patient Name</th>
                  <th>Gender</th>
                  <th>Age</th>
                  <th>Blood Group</th>
                  <th>Address</th>
                  <th>Email</th>
                
                </tr>
              </thead>
              <tbody>
                <?php 
                if (mysqli_num_rows($result) > 0) {
                    $counter = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $counter . "</td>";
                        echo "<td>
                                <img src='assets/images/patient.png' class='img-shadow img-2x rounded-5 me-1' alt='Medical Admin Template'>
                                " . $row['firstname'] . "   " . $row['middlename'] . " " . $row['lastname'] . "
                              </td>";
                        echo "<td><span class='badge bg-info-subtle text-info'>" . ucfirst($row['gender']) . "</span></td>";
                        echo "<td>" . $row['age'] . "</td>";
                        echo "<td>" . $row['bloodgroup'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                     
                        echo "</tr>";
                        $counter++;
                    }
                } else {
                    echo "<tr><td colspan='8'>No data found</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
          <!-- Table ends -->

          <!-- Modal Delete Row -->
          <div class="modal fade" id="delRow" tabindex="-1" aria-labelledby="delRowLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="delRowLabel">Confirm</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Are you sure you want to delete the patient?
                </div>
                <div class="modal-footer">
                  <div class="d-flex justify-content-end gap-2">
                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">No</button>
                    <button class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Yes</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- Row ends -->

</div>
<!-- App body ends -->

<?php 
include("./Common/Footer.php");
?>
