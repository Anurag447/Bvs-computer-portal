<?php

// include "../includes/header.php";
include '../includes/conn.php';

$student_count = 0;
$sql = "SELECT COUNT(*) as total FROM student";
$result = $conn->query($sql);
if ($result && $row = $result->fetch_assoc()) {
    $student_count = $row['total'];
}


$course_count = 0;
$sql = "SELECT COUNT(*) as total FROM courses";
$result1 = $conn->query($sql);
if ($result1 && $row = $result1->fetch_assoc()) {
    $course_count = $row['total'];
}

$query_count = 0;
$sql = "SELECT COUNT(*) as total FROM contact_queries";
$result2 = $conn->query($sql);
if ($result2 && $row = $result2->fetch_assoc()) {
    $query_count = $row['total'];
}


$sql1 = "SELECT * FROM notices ORDER BY created_at DESC LIMIT 3";
$result = mysqli_query($conn, $sql1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  
</head>
<body class="bg-gray-100 min-h-screen flex">

  

 <?php include 'aside.php'; ?>

  <!-- Main Content -->
  <main class="flex-1 p-6">
    
    <h1 class="text-3xl font-bold mb-6">Welcome, Admin 👋</h1>

    <!-- Dashboard Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold">Total Students</h2>
        <a href="view_student.php"><p class="mt-2 text-gray-600 text-lg"><?= $student_count ?></p></a>
      </div>
      <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold">Active Courses</h2>
        <a href="show_course.php"><p class="mt-2 text-primary-600 text-lg"><?= $course_count ?></p></a>
      </div>
      <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold">Pending Queries</h2>
        <a href="view_query.php"><p class="mt-2 text-gray-600 text-lg"><?= $query_count ?></p></a>
      </div>
      
    </div>

    <!-- Example Section -->
  
<div class="mt-8 bg-white shadow rounded-lg p-6">
  <h2 class="text-2xl font-bold mb-4">Recent Notices</h2>

  <?php if (mysqli_num_rows($result) > 0): ?>
    <ul class="space-y-4">
      <?php while($row = mysqli_fetch_assoc($result)): ?>
        <li class="flex justify-between items-start border-b pb-2">
          <div>
            <h3 class="font-semibold text-lg"><?= htmlspecialchars($row['title']) ?></h3>
            <p class="text-gray-700 text-sm"><?= htmlspecialchars($row['message']) ?></p>
            <p class="text-xs text-gray-500">Posted on <?= date("d M Y", strtotime($row['created_at'])) ?></p>
          </div>
          
          <!-- Delete Button (Admin Only) -->
          <form method="POST" action="delete_notice.php?id=<?= $row['id'] ?>" onsubmit="return confirm('Are you sure you want to delete this notice?');">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
              Delete
            </button>
          </form>
        </li>
      <?php endwhile; ?>
    </ul>
  <?php else: ?>
    <p class="text-gray-500">No notices or offers available.</p>
  <?php endif; ?>
</div>




<script src="https://cdn.tailwindcss.com"></script>

  <script>
    // Mobile menu toggle
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    menuBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('-translate-x-full');
    });
  </script>

  </body></html>

