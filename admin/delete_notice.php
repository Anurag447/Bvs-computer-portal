    <?php
    include '../includes/conn.php';

    $id=$_GET['id'];
        echo $id;

    $sql = "DELETE FROM notices WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Notice deleted successfully'); </script>";
        header('Location:admin_dashboard.php');
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

