<?php
session_start();
include '../includes/conn.php'; // database connection

// Delete functionality
if(isset($_GET['delete_id'])){
    $delete_id = intval($_GET['delete_id']);

    // Fetch image name first
    $res = mysqli_query($conn, "SELECT image FROM faculty WHERE id = $delete_id");
    $row = mysqli_fetch_assoc($res);
    if($row && $row['image']){
        $img_path = '../uploads/faculty/' . $row['image'];
        if(file_exists($img_path)){
            unlink($img_path); // delete image file
        }
    }

    // Delete record
    mysqli_query($conn, "DELETE FROM faculty WHERE id = $delete_id");
    $_SESSION['faculty_success'] = "Faculty deleted successfully!";
    header("Location: show_faculty.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show Faculty - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">
<?php include 'aside.php'; ?>
<div class="bg-gray-100 p-6">

<div class="max-w-6xl mx-auto">

    <h1 class="text-3xl font-bold mb-6">Faculty List</h1>

    <!-- Display Messages -->
    <?php
    if(isset($_SESSION['faculty_success'])){
        echo '<div class="bg-green-200 text-green-800 p-2 rounded mb-4">'.$_SESSION['faculty_success'].'</div>';
        unset($_SESSION['faculty_success']);
    }
    if(isset($_SESSION['faculty_error'])){
        echo '<div class="bg-red-200 text-red-800 p-2 rounded mb-4">'.$_SESSION['faculty_error'].'</div>';
        unset($_SESSION['faculty_error']);
    }
    ?>

    <!-- Faculty Table -->
    <table class="min-w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="py-2 px-4 border">ID</th>
                <th class="py-2 px-4 border">Name</th>
                <th class="py-2 px-4 border">Email</th>
                <th class="py-2 px-4 border">Experience</th>
                <th class="py-2 px-4 border">Description</th>
                <th class="py-2 px-4 border">Image</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($conn, "SELECT * FROM faculty ORDER BY id DESC");
            if(mysqli_num_rows($query) > 0){
                while($faculty = mysqli_fetch_assoc($query)){
                    echo '<tr class="text-center border-b">';
                    echo '<td class="py-2 px-4 border">'.$faculty['id'].'</td>';
                    echo '<td class="py-2 px-4 border">'.$faculty['name'].'</td>';
                    echo '<td class="py-2 px-4 border">'.$faculty['email'].'</td>';
                    echo '<td class="py-2 px-4 border">'.$faculty['phone'].'</td>';
                    echo '<td class="py-2 px-4 border">'.$faculty['department'].'</td>';
                    echo '<td class="py-2 px-4 border">';
                    if($faculty['image']){
                        echo '<img src="../uploads/faculty/'.$faculty['image'].'" class="w-16 h-16 object-cover mx-auto rounded">';
                    } else {
                        echo 'No Image';
                    }
                    echo '</td>';
                    echo '<td class="py-2 px-4 border">';
                    echo '<a href="show_faculty.php?delete_id='.$faculty['id'].'" onclick="return confirm(\'Are you sure?\')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="7" class="text-center py-4">No faculty found</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>
