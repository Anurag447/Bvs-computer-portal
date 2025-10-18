<?php
include '../includes/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $instructor = mysqli_real_escape_string($conn, $_POST['instructor']);
    $fees = mysqli_real_escape_string($conn, $_POST['fees']);

    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $fileError = $file['error'];

        if ($fileError !== 0) {
            $errors = [
                1 => 'File exceeds upload_max_filesize in php.ini',
                2 => 'File exceeds MAX_FILE_SIZE in form',
                3 => 'File only partially uploaded',
                4 => 'No file uploaded',
                6 => 'Missing temporary folder',
                7 => 'Failed to write file to disk',
                8 => 'PHP extension stopped file upload'
            ];
            die("File Upload Error: " . ($errors[$fileError] ?? 'Unknown error'));
        }

        $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($fileExt, $allowedExt)) {
            die("Error: Only .jpg, .jpeg, .png, .gif allowed.");
        }

        // Max 5MB
        if ($file['size'] > 5 * 1024 * 1024) {
            die("Error: File exceeds 5MB limit.");
        }

        // Ensure uploads folder exists
        $uploadDir = '../uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

        $newFileName = time() . '_' . uniqid() . '.' . $fileExt;
        $destPath = $uploadDir . $newFileName;

        if (!move_uploaded_file($file['tmp_name'], $destPath)) {
            die("Error: Failed to move uploaded file.");
        }

        // Insert into DB
        $sql = "INSERT INTO courses (title, description, image, duration, instructor, fees)
                VALUES ('$title','$description','$newFileName','$duration','$instructor','$fees')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Course added successfully!'); window.location='admin_dashboard.php';</script>";
        } else {
            die("Database Error: " . mysqli_error($conn));
        }
    } else {
        die("Error: No file uploaded.");
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Course</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col md:flex-row">

  <!-- Sidebar -->
  <?php include 'aside.php'; ?>

  <!-- Main Section -->
  <div class="flex-1 flex items-center justify-center px-4 sm:px-6 lg:px-8 py-10">
    <div class="bg-white shadow-2xl rounded-2xl w-full max-w-3xl p-6 sm:p-10">
      
      <h2 class="text-2xl sm:text-3xl font-bold text-center text-blue-600 mb-8">Add New Course</h2>

      <form method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <!-- Course Title -->
        <div class="md:col-span-2">
          <label class="block text-gray-700 font-medium mb-2">Course Title</label>
          <input type="text" name="title" required
            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <!-- Description -->
        <div class="md:col-span-2">
          <label class="block text-gray-700 font-medium mb-2">Description</label>
          <textarea name="description" rows="4" required
            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none resize-none"></textarea>
        </div>

        <!-- Duration -->
        <div>
          <label class="block text-gray-700 font-medium mb-2">Duration</label>
          <input type="text" name="duration"
            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <!-- Instructor -->
        <div>
          <label class="block text-gray-700 font-medium mb-2">Instructor Name</label>
          <input type="text" name="instructor"
            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <!-- Fees -->
        <div>
          <label class="block text-gray-700 font-medium mb-2">Course Fees</label>
          <input type="number" name="fees"
            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <!-- Image -->
        <div>
          <label class="block text-gray-700 font-medium mb-2">Upload Image</label>
          <input type="file" name="image" required
            class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none bg-gray-50">
        </div>

        <!-- Submit Button -->
        <div class="md:col-span-2">
          <button type="submit"
            class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-200">
            ➕ Add Course
          </button>
        </div>

      </form>
    </div>
  </div>
  <script>
    // Mobile menu toggle
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    menuBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('-translate-x-full');
    });
  </script>
</body>
</html>
