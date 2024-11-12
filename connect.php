<?php
$conn = new mysqli('localhost', 'root', '', 'medical_certificates');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
