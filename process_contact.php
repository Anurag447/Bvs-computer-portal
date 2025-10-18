<?php
include 'includes/conn.php';
session_start();
// Initialize message
$msg = '';
$type = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $insert = mysqli_query($conn, "INSERT INTO contact_queries (name, email, phone, message) 
                                   VALUES ('$name','$email','$phone','$message')");

    if ($insert) {
        $_SESSION['success'] = "Your message has been sent successfully! ✅ our team shortly contact you";
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again! ❌";
    }
}
?>
