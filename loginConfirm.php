<?php

// include 'includes/header.php';
include 'includes/conn.php';
session_start();

// Agar form submit hua hai
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role     = $_POST['role'];      
    $email    = $_POST['email'];
    $password = $_POST['password'];

    if ($role == "admin") {
        $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    } else {
        $sql = "SELECT * FROM student WHERE email='$email' AND password='$password'";
    }

    $result = mysqli_query($conn,$sql);

    if ($result->num_rows > 0) {
        $row=mysqli_fetch_assoc($result);
        $_SESSION['user']=$row; 

        $_SESSION['role']  = $role;
        $_SESSION['email'] = $email;
        header('Location: index.php');
        exit;



        if ($role == "admin") {
            header('Location: admin/admin_dashboard.php');

        } else {
            header('Location: student/student_dashboard.php');
        }
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>