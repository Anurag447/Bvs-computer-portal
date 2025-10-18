<?php
include '../includes/header.php';
include '../includes/conn.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    // Delete query
    $sql = "DELETE FROM student WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to view_student page with success message
        echo "<script>alert('Student deleted successfully'); window.location.href='view_student.php';</script>";
    } else {
        echo "Error deleting student: " . $conn->error;
    }
} else {
    // If no ID provided
    echo "<script>alert('Invalid request'); window.location.href='view_student.php';</script>";
}

$conn->close();
?>
