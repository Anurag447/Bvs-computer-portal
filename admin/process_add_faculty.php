<?php
session_start();
include '../includes/conn.php'; // database connection

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);

    // Handle image upload
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $img_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        // Generate unique filename
        $new_name = uniqid('faculty_', true) . '_' . $img_name;

        // Upload folder
        $upload_dir = '../uploads/faculty/';

        // Create folder if not exists
        if(!is_dir($upload_dir)){
            mkdir($upload_dir, 0777, true);
        }

        // Move uploaded file
        if(move_uploaded_file($tmp_name, $upload_dir . $new_name)){
            $image_name = $new_name; // store only filename in DB
        } else {
            $_SESSION['faculty_error'] = "Failed to upload image!";
            header("Location: admin_dashboard.php");
            exit();
        }
    } else {
        $image_name = null; // optional
    }

    // Insert into database (store only filename)
    $sql = "INSERT INTO faculty (name, email, phone, department, image) VALUES ('$name','$email','$phone','$department','$image_name')";
    if(mysqli_query($conn, $sql)){
        $_SESSION['faculty_success'] = "Faculty added successfully!";
    } else {
        $_SESSION['faculty_error'] = "Error adding faculty: " . mysqli_error($conn);
    }

    header("Location: admin_dashboard.php");
    exit();
}
?>
