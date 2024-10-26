<?php 
// include("../Utilities/connection.php");
include("./Common/Nav.php");
?>

<div class="app-body">

<!-- Row starts -->
<div class="row gx-3">
  <div class="col-sm-12">
    <div class="card mb-3">
      <div class="card-body">

        <div class="d-flex ">
          <!-- Stats starts -->
          <div class="d-flex align-items-center flex-wrap gap-4">
            <div class="d-flex align-items-center">
              <div class="icon-box lg bg-primary rounded-5 me-2">
                <i class="ri-account-circle-line fs-3"></i>
              </div>
              <div>
                <h4 class="mb-1">Carole</h4>
                <p class="m-0">Patient Name</p>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <div class="icon-box lg bg-primary rounded-5 me-2">
                <i class="ri-women-line fs-3"></i>
              </div>
              <div>
                <h4 class="mb-1">Female</h4>
                <p class="m-0">Gender</p>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <div class="icon-box lg bg-primary rounded-5 me-2">
                <i class="ri-arrow-right-up-line fs-3"></i>
              </div>
              <div>
                <h4 class="mb-1">68</h4>
                <p class="m-0">Patient Age</p>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <div class="icon-box lg bg-primary rounded-5 me-2">
                <i class="ri-contrast-drop-2-line fs-3"></i>
              </div>
              <div>
                <h4 class="mb-1">O+</h4>
                <p class="m-0">Blood Type</p>
              </div>
            </div>
         
          </div>
          <!-- Stats ends -->

          <img src="assets/images/patient4.png" class="img-7x rounded-circle ms-auto"
            alt="Patient Admin Template">
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Row ends -->



<!-- Row starts -->
<div class="row gx-3">

  
  <div class="col-xl-6 col-sm-12">
    <div class="card mb-3">
      <div class="card-header">
        <h5 class="card-title">Reports</h5>
      </div>
      <div class="card-body">
        <div class="table-outer">
          <div class="table-responsive">
            <table class="table align-middle truncate m-0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>File</th>
                  <th>Reports Link</th>
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>
                    <div class="icon-box md bg-primary rounded-2">
                      <i class="ri-file-excel-2-line"></i>
                    </div>
                  </td>
                  <td>
                    <a href="#!" class="link-primary text-truncate">Reports 1 clinical
                      documentation</a>
                  </td>
                  <td>May-28, 2024</td>
                  <td>
                    <div class="d-inline-flex gap-1">
                      <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delRow">
                        <i class="ri-delete-bin-line"></i>
                      </button>
                      <button class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-title="Download Report">
                        <i class="ri-file-download-line"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>
                    <div class="icon-box md bg-primary rounded-2">
                      <i class="ri-file-excel-2-line"></i>
                    </div>
                  </td>
                  <td>
                    <a href="#!" class="link-primary text-truncate">Reports 2 random files
                      documentation</a>
                  </td>
                  <td>Mar-20, 2024</td>
                  <td>
                    <div class="d-inline-flex gap-1">
                      <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delRow">
                        <i class="ri-delete-bin-line"></i>
                      </button>
                      <button class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-title="Download Report">
                        <i class="ri-file-download-line"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>
                    <div class="icon-box md bg-primary rounded-2">
                      <i class="ri-file-excel-2-line"></i>
                    </div>
                  </td>
                  <td>
                    <a href="#!" class="link-primary text-truncate">Reports 3 glucose level
                      complete report</a>
                  </td>
                  <td>Feb-18, 2024</td>
                  <td>
                    <div class="d-inline-flex gap-1">
                      <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delRow">
                        <i class="ri-delete-bin-line"></i>
                      </button>
                      <button class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-title="Download Report">
                        <i class="ri-file-download-line"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>



</div>
<!-- Row ends -->

<!-- Modal Delete Row -->
<div class="modal fade" id="delRow" tabindex="-1" aria-labelledby="delRowLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delRowLabel">
          Confirm
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this report?
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

<!-- Modal View All Reports -->
<div class="modal fade" id="viewReportsModal1" tabindex="-1" aria-labelledby="viewReportsModalLabel1"
  aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewReportsModalLabel1">
          View Reports
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <!-- Row starts -->
        <div class="row g-3">
          <div class="col-sm-2">
            <a href="#" class="d-flex flex-column bg-light p-2 rounded-2 text-center"
              data-bs-target="#viewReportsModal2" data-bs-toggle="modal">
              <img src="assets/images/report.svg" class="img-fluid rounded-2" alt="Medical Dashboards">
              <h6 class="mt-3 mb-1 text-truncate">Clinical Report</h6>
              <p class="m-0 small">10/05/2024</p>
            </a>
          </div>
          <div class="col-sm-2">
            <a href="#" class="d-flex flex-column bg-light p-2 rounded-2 text-center"
              data-bs-target="#viewReportsModal2" data-bs-toggle="modal">
              <img src="assets/images/report.svg" class="img-fluid rounded-2" alt="Medical Dashboards">
              <h6 class="mt-3 mb-1 text-truncate">Dentist Report</h6>
              <p class="m-0 small">20/06/2024</p>
            </a>
          </div>
          <div class="col-sm-2">
            <a href="#" class="d-flex flex-column bg-light p-2 rounded-2 text-center"
              data-bs-target="#viewReportsModal2" data-bs-toggle="modal">
              <img src="assets/images/report.svg" class="img-fluid rounded-2" alt="Medical Dashboards">
              <h6 class="mt-3 mb-1 text-truncate">Glucose Report</h6>
              <p class="m-0 small">30/06/2024</p>
            </a>
          </div>
          <div class="col-sm-2">
            <a href="#" class="d-flex flex-column bg-light p-2 rounded-2 text-center"
              data-bs-target="#viewReportsModal2" data-bs-toggle="modal">
              <img src="assets/images/report.svg" class="img-fluid rounded-2" alt="Medical Dashboards">
              <h6 class="mt-3 mb-1 text-truncate">X-ray Report</h6>
              <p class="m-0 small">26/08/2024</p>
            </a>
          </div>
          <div class="col-sm-2">
            <a href="#" class="d-flex flex-column bg-light p-2 rounded-2 text-center"
              data-bs-target="#viewReportsModal2" data-bs-toggle="modal">
              <img src="assets/images/report.svg" class="img-fluid rounded-2" alt="Medical Dashboards">
              <h6 class="mt-3 mb-1 text-truncate">Ultrasound Report</h6>
              <p class="m-0 small">21/08/2024</p>
            </a>
          </div>
          <div class="col-sm-2">
            <a href="#" class="d-flex flex-column bg-light p-2 rounded-2 text-center"
              data-bs-target="#viewReportsModal2" data-bs-toggle="modal">
              <img src="assets/images/report.svg" class="img-fluid rounded-2" alt="Medical Dashboards">
              <h6 class="mt-3 mb-1 text-truncate">Hypothermia Report</h6>
              <p class="m-0 small">15/04/2024</p>
            </a>
          </div>
          <div class="col-sm-2">
            <a href="#" class="d-flex flex-column bg-light p-2 rounded-2 text-center"
              data-bs-target="#viewReportsModal2" data-bs-toggle="modal">
              <img src="assets/images/report.svg" class="img-fluid rounded-2" alt="Medical Dashboards">
              <h6 class="mt-3 mb-1 text-truncate">Discharge Report</h6>
              <p class="m-0 small">22/07/2024</p>
            </a>
          </div>
          <div class="col-sm-2">
            <a href="#" class="d-flex flex-column bg-light p-2 rounded-2 text-center"
              data-bs-target="#viewReportsModal2" data-bs-toggle="modal">
              <img src="assets/images/report.svg" class="img-fluid rounded-2" alt="Medical Dashboards">
              <h6 class="mt-3 mb-1 text-truncate">Diabetes Report</h6>
              <p class="m-0 small">17/05/2024</p>
            </a>
          </div>
        </div>
        <!-- Row ends -->

      </div>
    </div>
  </div>
</div>

<!-- Modal View Single Report -->
<div class="modal fade" id="viewReportsModal2" tabindex="-1" aria-labelledby="viewReportsModalLabel2"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewReportsModalLabel2">
          <div class="d-flex align-items-center">
            <a href="#!" class="btn btn-sm btn-outline-primary me-2" data-bs-target="#viewReportsModal1"
              data-bs-toggle="modal">
              <i class="ri-arrow-left-wide-fill"></i>
            </a>
            Clinical Report
          </div>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <!-- Row starts -->
        <div class="row g-3">
          <div class="col-sm-12">
            <a href="#" class="d-flex flex-column bg-light p-2 rounded-2 text-center">
              <img src="assets/images/report.svg" class="img-fluid rounded-2" alt="Medical Dashboards">
              <h6 class="mt-3 mb-1 text-truncate">Clinical Report</h6>
              <p class="m-0 small">10/05/2024</p>
            </a>
          </div>
        </div>
        <!-- Row ends -->

      </div>
    </div>
  </div>
</div>

</div>


<?php 

include("./Common/Footer.php");
?>
