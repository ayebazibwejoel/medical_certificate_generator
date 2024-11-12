<?php
// Include database connection file
include 'db.php';

// Fetch all certificates from the database
$query = "SELECT * FROM certificates ORDER BY id DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Certificate Generator App</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Medical Certificate Generator App</h2>
    <hr>
    
    <!-- Button to Add New Certificate -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Certificates List</h4>
        <a href="add.php" class="btn btn-primary">Add New Certificate</a>
    </div>

    <!-- Table to display certificates -->
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Age</th>
                <th>Issue Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['patient_name']) ?></td>
                        <td><?= htmlspecialchars($row['age']) ?></td>
                        <td><?= htmlspecialchars($row['issue_date']) ?></td>
                        <td>
                            <!-- Generate PDF and Delete options -->
                            <a href="generate-pdf.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">Download PDF</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No certificates found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Footer -->
<div class="footer">
    <p>&copy; 2024 Medical Certificate Generator App | Developed by Ayebazibwe Joel</p>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
