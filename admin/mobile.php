<?php


include '../includes/conn.php'; // Database connection
    if(isset($_POST['phone']) && !empty($_POST['phone'])){
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);

        $sql = "INSERT INTO mobile (mobile) VALUES ('$phone')";
        if(mysqli_query($conn, $sql)){
            echo "true";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Phone number is required!";
    }

?>
