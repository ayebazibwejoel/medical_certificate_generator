<?php
include 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM certificates WHERE id=$id");
$cert = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Certificate</title>
</head>
<body>
    <h2>Certificate Details</h2>
    <p><strong>Patient Name:</strong> <?php echo $cert['patient_name']; ?></p>
    <p><strong>Age:</strong> <?php echo $cert['age']; ?></p>
    <p><strong>Gender:</strong> <?php echo $cert['gender']; ?></p>
    <p><strong>Diagnosis:</strong> <?php echo $cert['diagnosis']; ?></p>
    <p><strong>Doctor:</strong> <?php echo $cert['doctor_name']; ?></p>
    <p><strong>Date Issued:</strong> <?php echo $cert['issue_date']; ?></p>
</body>
</html>
