<?php 
// include("../Utilities/connection.php");
include("./Common/Nav.php");
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
                <th>Consulting Doctor</th>
                <th>Department</th>
                <th>Date</th>
                <th>Time</th>
                <th>Disease</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>001</td>
                <td>
                  Deena Cooley
                </td>
                <td>65</td>
                <td>
                  <img src="assets/images/user.png" class="img-shadow img-2x rounded-5 me-1"
                    alt="Hospital Admin Template"> Vicki Walsh
                </td>
                <td>Surgeon</td>
                <td>05/23/2024</td>
                <td>9:30AM</td>
                <td>Diabeties</td>
                <td>
                  <div class="d-inline-flex gap-1">
                    <button class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                      data-bs-title="Accepted">
                      <i class="ri-checkbox-circle-line"></i>
                    </button>
                    <button class="btn btn-outline-danger btn-sm" data-bs-toggle="tooltip"
                      data-bs-placement="top" data-bs-title="Reject" disabled>
                      <i class="ri-close-circle-line"></i>
                    </button>
                    <a href="edit-appointment.html" class="btn btn-outline-success btn-sm"
                      data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Appointment">
                      <i class="ri-edit-box-line"></i>
                    </a>
                  </div>
                </td>
              </tr>
     
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

include("./Common/Footer.php");
?>
