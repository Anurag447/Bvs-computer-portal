

<?php
// Database connection
// Database connection


include '../includes/conn.php';

// Connection check
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Jab form submit ho
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name           = $_POST['name'];
    $email          = $_POST['email'];
    $address        = $_POST['address'];
    $course         = $_POST['course'];
    $admission_date = $_POST['admission_date'];
    $fees           = $_POST['fees'];
    $password       = $_POST['password'];

    // Insert Query
    $sql = "INSERT INTO student (name, email, address, course, add_date, fees, password) 
            VALUES ('$name', '$email', '$address', '$course', '$admission_date', '$fees', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Student Added Successfully!'); window.location.href='admin_dashboard.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Student</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* .box
    {
        height: 600px;
    } */
  </style>
</head>




<body class="bg-gray-100 min-h-screen flex">

  

 <?php include 'aside.php'; ?>

  <!-- Main Content -->
  <main class="flex-1 p-6">
    
  
    <div class="bg-white shadow-2xl rounded-2xl flex flex-col md:flex-row w-11/12 max-w-5xl overflow-hidden mx-auto mt-20 box  ">

<!-- Left Section -->
<div class="bg-blue-600 text-white flex flex-col justify-center items-center p-10 md:w-1/2 ">
  <h2 class="text-4xl font-bold mb-4">Student Portal</h2>
  <p class="text-lg mb-6 text-center">Manage admissions, courses, and student details in one place.</p>
  <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" 
       alt="Student Icon" class="w-40 h-40">
</div>

<!-- Right Section -->
<div class="p-10 md:w-1/2">
  <h2 class="text-3xl font-bold text-gray-800 mb-3 text-center">ADD NEW STUDENT</h2>

  <form action="" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">

    <div>
      <label class="block text-gray-700 font-medium mb-2">Name</label>
      <input type="text" name="name" required
        class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
      <label class="block text-gray-700 font-medium mb-2">Email</label>
      <input type="email" name="email" required
        class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
      <label class="block text-gray-700 font-medium mb-1">Address</label>
      <input type="text" name="address" required
        class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
      <label class="block text-gray-700 font-medium mb-1">Course</label>
      <input type="text" name="course" required
        class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
      <label class="block text-gray-700 font-medium mb-1">Admission Date</label>
      <input type="date" name="admission_date" required
        class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
      <label class="block text-gray-700 font-medium mb-1">Fees</label>
      <input type="number" name="fees" required
        class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="md:col-span-2">
      <label class="block text-gray-700 font-medium mb-1">Password</label>
      <input type="password" name="password" required
        class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="md:col-span-2">
      <button type="submit"
        class="w-full bg-blue-600 text-white p-3 rounded-lg font-semibold hover:bg-blue-700 transition">
        Add Student
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



