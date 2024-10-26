<?php
// Start the session at the very beginning before any output
session_start();

// Check if the hospital_id session is set, if not, redirect to signin page
if (!isset($_SESSION['hospital_id'])) {
    header("Location: signin.php");
    exit();
}

include("../Utilities/connection.php"); // Database connection

// Fetch all vaccines from the database
$query = "SELECT v.id AS vaccine_id, 
                 v.name AS vaccine_name, 
                 v.availability, 
                 v.image, 
                 v.description, 
                 h.name AS hospital_name
                --  v.created_at,
                --  v.updated_at
          FROM vaccine v
          JOIN hospital h ON v.hospital_id = h.id
          ORDER BY v.name";

$result = mysqli_query($con, $query);
?>

<?php include("./Common/nav.php"); ?>

<div class="app-body">
    <div class="container">
        <h2 class="my-4">Vaccine List</h2>

        <div class="card mb-3 border">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Vaccine Name</th>
                            <th>Availability</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Hospital</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            $index = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <td><?php echo $index++; ?></td>
                                    <td><?php echo htmlspecialchars($row['vaccine_name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['availability']); ?></td>
                                    <td>
                                        <?php if (!empty($row['image'])): ?>
                                            <img src="../Hospital/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['vaccine_name']); ?>" style="width: 50px; height: 50px;">
                                        <?php else: ?>
                                            No Image
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo nl2br(htmlspecialchars($row['description'])); ?></td>
                                    <td><?php echo htmlspecialchars($row['hospital_name']); ?></td>
                                  
                                   
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='9'>No vaccines found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

   
    </div>
</div>

<?php include("./Common/footer.php"); ?>
