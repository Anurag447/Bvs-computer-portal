<?php
include '../includes/conn.php';


// Initialize message variables
$msg = '';
$type = '';

// Check if delete_id is set
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);

    // Fetch image name to delete
    $imgResult = mysqli_query($conn, "SELECT image FROM courses WHERE id=$id");
    $imgRow = mysqli_fetch_assoc($imgResult);

    if ($imgRow) {
        // Delete image from server
        if (file_exists("../uploads/".$imgRow['image'])) {
            unlink("../uploads/".$imgRow['image']);
        }

        // Delete course from database
        $delete = mysqli_query($conn, "DELETE FROM courses WHERE id=$id");

        if ($delete) {
            $msg = "Course deleted successfully! ✅";
            $type = "success";
        } else {
            $msg = "Failed to delete course. ❌";
            $type = "error";
        }
    } else {
        $msg = "Course not found. ❌";
        $type = "error";
    }
} else {
    $msg = "Invalid request. ❌";
    $type = "error";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Course</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg text-center max-w-md w-full">
        <?php if($type == "success"): ?>
            <h1 class="text-2xl font-bold text-green-600 mb-4"><?php echo $msg; ?></h1>
        <?php else: ?>
            <h1 class="text-2xl font-bold text-red-600 mb-4"><?php echo $msg; ?></h1>
        <?php endif; ?>

        <p class="mb-6">You can go back to manage your courses.</p>
        <a href="show_course.php" 
           class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
           Back to Courses
        </a>
    </div>

 
</body>
</html>
