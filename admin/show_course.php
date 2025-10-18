<link href="https://cdn.tailwindcss.com" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<?php 

include '../includes/conn.php';

// Check if a delete request is made
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    // First, fetch image name to delete from server
    $imgResult = mysqli_query($conn, "SELECT image FROM courses WHERE id=$id");
    $imgRow = mysqli_fetch_assoc($imgResult);
    if ($imgRow && file_exists("uploads/".$imgRow['image'])) {
        unlink("uploads/".$imgRow['image']); // delete image file
    }
    // Delete course from database
    mysqli_query($conn, "DELETE FROM courses WHERE id=$id");
    header("Location: admin_courses.php"); // redirect to refresh
    exit;
}

// Fetch all courses
$result = mysqli_query($conn, "SELECT * FROM courses ORDER BY created_at DESC");
?>
<body class="bg-gray-100 min-h-screen flex flex-col md:flex-row">

<?php include 'aside.php'; ?>

<section class="bg-gray-100 py-10 px-4">
  <h1 class="text-3xl font-bold text-center mb-6">Manage Courses</h1>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col">
        <img src="../uploads/<?php echo $row['image']; ?>" class="w-full h-48 object-cover" >

        <div class="p-4 flex-1">
          <h3 class="text-xl font-bold mb-2"><?php echo $row['title']; ?></h3>
          <p class="text-gray-600 line-clamp-3">
            <?php echo substr($row['description'], 0, 100); ?>...
          </p>
        </div>

        <div class="p-4 flex justify-between">
       
          <a href="delete_course.php?delete_id=<?php echo $row['id']; ?>" 
             onclick="return confirm('Are you sure you want to delete this course?');"
             class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
             Delete
          </a>
        </div>
      </div>
    <?php } ?>
  </div>
</section>

</body>
