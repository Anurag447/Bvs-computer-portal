<?php
session_start();
include '../includes/conn.php';

$id       = $_POST['id'];
$name     = $_POST['name'];
$password = $_POST['password']; 

$sql = "UPDATE student SET name='$name', password='$password'";


$img = "";
if (isset($_FILES['pic']) && $_FILES['pic']['error'] == 0) {
    $target_dir = "../assets/profile/";
    $file_name  = basename($_FILES['pic']['name']);  
    $target_file = $target_dir . $file_name;

    if (move_uploaded_file($_FILES['pic']['tmp_name'], $target_file)) {
        $img = $file_name; 
        $_SESSION['user']['img'] = $img;
        $sql .= ", img='$img'";
    }
}

$sql .= " WHERE id={$id}"; 


$redirect = $_SERVER['HTTP_REFERER'];

if (mysqli_query($conn, $sql)) {
    $_SESSION['user']['name'] = $name;
    $_SESSION['user']['img'] = $img;
    echo "true";

    header("Location: $redirect");
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}
?>

