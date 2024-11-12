<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete certificate from database
    $query = "DELETE FROM certificates WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    // Redirect to index.php after deletion
    header("Location: index.php");
    exit;
}
?>
