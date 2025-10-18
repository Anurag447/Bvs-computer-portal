<link href="https://cdn.tailwindcss.com" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>

<body class="bg-gray-100 min-h-screen flex ">
<?php include 'aside.php'; ?>

<div class="bg-white shadow-2xl rounded-2xl p-8 max-w-2xl mx-auto mb-12 mt-12" style="width:80%"; >
  <h2 class="text-3xl font-extrabold text-center mb-6 text-teal-600">
    ➕ Add Faculty
  </h2>

  <!-- Success / Error Message -->
  <?php if(isset($_SESSION['faculty_success'])): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
      <?php 
        echo $_SESSION['faculty_success']; 
        unset($_SESSION['faculty_success']);
      ?>
    </div>
  <?php endif; ?>

  <?php if(isset($_SESSION['faculty_error'])): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
      <?php 
        echo $_SESSION['faculty_error']; 
        unset($_SESSION['faculty_error']);
      ?>
    </div>
  <?php endif; ?>

  <form action="process_add_faculty.php" method="POST" enctype="multipart/form-data" class="space-y-4">

    <!-- Faculty Name -->
    <div>
      <label for="name" class="block text-gray-700 font-semibold mb-1">Full Name</label>
      <input type="text" name="name" id="name" required
             class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-400 shadow-sm hover:shadow-md">
    </div>

    <!-- Email -->
    <div>
      <label for="email" class="block text-gray-700 font-semibold mb-1">Email</label>
      <input type="email" name="email" id="email" required
             class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-400 shadow-sm hover:shadow-md">
    </div>

    <!-- Phone -->
    <div>
      <label for="phone" class="block text-gray-700 font-semibold mb-1">Experience</label>
      <input type="text" name="phone" id="phone"
             class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-400 shadow-sm hover:shadow-md">
    </div>

    <!-- Department -->
    <div>
      <label for="department" class="block text-gray-700 font-semibold mb-1">Description</label>
      <input type="text" name="department" id="department"
             class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-400 shadow-sm hover:shadow-md">
    </div>

    <!-- Faculty Image -->
    <div>
      <label for="image" class="block text-gray-700 font-semibold mb-1">Upload Photo</label>
      <input type="file" name="image" id="image" accept="image/*"
             class="w-full p-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-400 shadow-sm hover:shadow-md">
    </div>

    <!-- Submit Button -->
    <div class="text-center">
      <button type="submit" 
              class="bg-teal-500 text-white px-6 py-3 rounded-xl font-bold hover:bg-teal-600 shadow-md hover:shadow-lg transition transform hover:-translate-y-1">
        ➕ Add Faculty
      </button>
    </div>
  </form>
</div>


  </body>