
<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body >
  
<div class="min-h-screen flex items-center justify-center bg-gray-100 mt-20 pb-10">

  <!-- Bordered Container -->
  <div class="flex flex-col lg:flex-row w-full max-w-[80%] border-4 border-gray-300 rounded-3xl overflow-hidden shadow-lg mt-16">

    <!-- Left Image Section -->
    <div class="w-full lg:w-1/2 h-[40vh] lg:h-[80vh]">
      <img src="assets/login.jpeg"
           alt="Login Image"
           class="w-full h-full object-cover">
    </div>

    <!-- Right Form Section -->
    <div class="w-full lg:w-1/2 flex items-center justify-center bg-gray-50 p-4 sm:p-2 lg:p-8 h-[60vh] lg:h-[80vh]">
      <div class="bg-white shadow-2xl rounded-2xl p-6 sm:p-4 w-full max-w-md">

        <!-- Title -->
        <h2 class="text-2xl sm:text-3xl font-extrabold text-center mb-6 text-transparent bg-clip-text bg-gradient-to-r from-teal-500 to-blue-600">
          Welcome Back 👋
        </h2>

        <!-- Error Message -->
        <?php if (!empty($error)): ?>
          <p class="text-red-500 text-center mb-4 font-medium bg-red-50 border border-red-200 py-2 rounded-xl"><?= $error ?></p>
        <?php endif; ?>

        <!-- Login Form -->
        <form action="loginConfirm.php" method="POST" class="space-y-4 sm:space-y-5">

          <!-- Role -->
          <div>
            <label for="role" class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">Login as</label>
            <select id="role" name="role"
              class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:border-teal-400 focus:ring-2 focus:ring-teal-300 transition">
              <option value="student">Student</option>
              <option value="admin">Admin</option>
            </select>
          </div>

          <!-- Email -->
          <div>
            <label for="email" class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">Email</label>
            <input type="email" id="email" name="email" required
              class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:border-teal-400 focus:ring-2 focus:ring-teal-300 transition placeholder-gray-400">
          </div>

          <!-- Password -->
          <div>
            <label for="password" class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">Password</label>
            <input type="password" id="password" name="password" required
              class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:border-teal-400 focus:ring-2 focus:ring-teal-300 transition placeholder-gray-400">
          </div>

          <!-- Login Button -->
          <button type="submit"
            class="w-full bg-gradient-to-r from-teal-400 to-blue-500 text-white p-3 rounded-xl font-bold shadow-md hover:shadow-xl transform hover:-translate-y-1 transition duration-300">
            🚀 Login
          </button>
        </form>

  

      </div>
    </div>

  </div>
</div>







</body>
</html>


<?php include 'includes/footer.php' ?>