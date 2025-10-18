<link href="https://cdn.tailwindcss.com" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<?php

include '../includes/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title   = $_POST['title'];
    $message = $_POST['message'];
    $type    = $_POST['type'];

    $sql = "INSERT INTO notices (title, message, type) VALUES ('$title', '$message', '$type')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Notice posted successfully!'); </script>";
        header('location: admin_dashboard.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>


<body class="bg-gray-100 min-h-screen flex">

  

 <?php include 'aside.php'; ?>

<div class="container mx-auto px-4 py-8" style="margin-top: 100px;">
  <h2 class="text-3xl font-bold mb-6 text-center">Post New Notice / Offer</h2>

  <form method="POST" class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-lg space-y-4">
    <div>
      <label class="block text-gray-700 font-medium mb-2">Title</label>
      <input type="text" name="title" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
      <label class="block text-gray-700 font-medium mb-2">Message</label>
      <textarea name="message" rows="4" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500"></textarea>
    </div>

    <div>
      <label class="block text-gray-700 font-medium mb-2">Type</label>
      <select name="type" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        <option value="notice">Notice</option>
        <option value="offer">Offer</option>
      </select>
    </div>

    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700">
      Post
    </button>
  </form>
</div>
</body>


