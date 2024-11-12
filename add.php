<?php
include 'db.php';

// Initialize variables to hold form data and error messages
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form inputs
    $patient_name = $_POST['patient_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $diagnosis = $_POST['diagnosis'];
    $issue_date = $_POST['issue_date'];
    $doctor_name = $_POST['doctor_name'];

    // Validate that all required fields are filled
    if (empty($patient_name) || empty($age) || empty($gender) || empty($diagnosis) || empty($issue_date) || empty($doctor_name)) {
        $message = "All fields are required.";
    } else {
        // Generate a unique certificate ID
        $certificate_id = 'cert_' . uniqid();
        $pdf_path = '';

        // Insert data into the database
        $query = "INSERT INTO certificates (patient_name, age, gender, diagnosis, issue_date, doctor_name, certificate_id, pdf_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sissssss", $patient_name, $age, $gender, $diagnosis, $issue_date, $doctor_name, $certificate_id, $pdf_path);

        if ($stmt->execute()) {
            // Redirect to index.php on success
            header("Location: index.php");
            exit;
        } else {
            $message = "Error: Unable to save certificate.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Certificate</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Add New Medical Certificate</h2>
    <hr>

    <?php if (!empty($message)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <form method="POST" class="p-4 bg-light shadow rounded">
        <div class="mb-3">
            <label for="patient_name" class="form-label">Patient Name</label>
            <input type="text" class="form-control" id="patient_name" name="patient_name" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="diagnosis" class="form-label">Diagnosis</label>
            <textarea class="form-control" id="diagnosis" name="diagnosis" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="issue_date" class="form-label">Issue Date</label>
            <input type="date" class="form-control" id="issue_date" name="issue_date" required>
        </div>
        <div class="mb-3">
            <label for="doctor_name" class="form-label">Doctor's Name</label>
            <input type="text" class="form-control" id="doctor_name" name="doctor_name" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Certificate</button>
        <a href="index.php" class="btn btn-secondary">Back to Dashboard</a>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
