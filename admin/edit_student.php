<?php
include '../includes/header.php';
include '../includes/conn.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('Invalid request'); window.location.href='view_student.php';</script>";
    exit;
}

$id = intval($_GET['id']); // sanitize input

// पहले student का data लाओ
$sql = "SELECT * FROM student WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "<script>alert('Student not found'); window.location.href='view_student.php';</script>";
    exit;
}

$student = mysqli_fetch_assoc($result);

// अगर form submit हुआ तो update कर दो
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name           = $_POST['name'];
    $email          = $_POST['email'];
    $address        = $_POST['address'];
    $course         = $_POST['course'];
    $admission_date = $_POST['admission_date'];
    $fees           = $_POST['fees'];
    $password       = $_POST['password'];

    $sql_update = "UPDATE student SET 
                   name='$name',
                   email='$email',
                   address='$address',
                   course='$course',
                   add_date='$admission_date',
                   fees='$fees',
                   password='$password'
                   WHERE id=$id";

    if (mysqli_query($conn, $sql_update)) {
        echo "<script>alert('Student updated successfully'); window.location.href='view_student.php';</script>";
    } else {
        echo "Error updating student: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Student</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-blue-50 to-blue-100">
  <div class="bg-white shadow-2xl rounded-2xl flex flex-col md:flex-row w-11/12 max-w-5xl overflow-hidden mx-auto m-5">

    <!-- Left Section -->
    <div class="bg-blue-600 text-white flex flex-col justify-center items-center p-10 md:w-1/2">
      <h2 class="text-4xl font-bold mb-4">Student Portal</h2>
      <p class="text-lg mb-6 text-center">Update student details easily here.</p>
      <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" 
           alt="Student Icon" class="w-40 h-40">
    </div>

    <!-- Right Section -->
    <div class="p-10 md:w-1/2">
      <h2 class="text-3xl font-bold text-gray-800 mb-3 text-center">EDIT STUDENT</h2>

      <form action="" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <div>
          <label class="block text-gray-700 font-medium mb-2">Name</label>
          <input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>" required
            class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
          <label class="block text-gray-700 font-medium mb-2">Email</label>
          <input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required
            class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
          <label class="block text-gray-700 font-medium mb-1">Address</label>
          <input type="text" name="address" value="<?= htmlspecialchars($student['address']) ?>" required
            class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
          <label class="block text-gray-700 font-medium mb-1">Course</label>
          <input type="text" name="course" value="<?= htmlspecialchars($student['course']) ?>" required
            class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
          <label class="block text-gray-700 font-medium mb-1">Admission Date</label>
          <input type="date" name="admission_date" value="<?= $student['add_date'] ?>" required
            class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
          <label class="block text-gray-700 font-medium mb-1">Fees</label>
          <input type="number" name="fees" value="<?= $student['fees'] ?>" required
            class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="md:col-span-2">
          <label class="block text-gray-700 font-medium mb-1">Password</label>
          <input type="password" name="password" value="<?= $student['password'] ?>" required
            class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="md:col-span-2">
          <button type="submit"
            class="w-full bg-yellow-500 text-white p-3 rounded-lg font-semibold hover:bg-yellow-600 transition">
            Update Student
          </button>
        </div>
      </form>
    </div>
  </div>
</body>

<?php include '../includes/footer.php'; ?>
</html>
