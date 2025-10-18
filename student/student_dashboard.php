<?php include '../includes/header.php';
// session_start();
// echo $_SESSION['user']['name'];
// exit;

if(!isset($_SESSION['user']))
{
  echo "You need To Login First !";
  exit;
// print_r($_SESSION['user']);
} ?>

<section class="min-h-screen bg-white-900 p-6" style="margin-top: 80px;">
  <div class="max-w-7xl mx-auto">
    
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-teal-400 to-blue-500 text-white p-8 rounded-3xl shadow-2xl mb-8 flex flex-col items-center text-center relative overflow-hidden">
  
  <!-- Decorative background shapes -->
  <div class="absolute -top-10 -left-10 w-32 h-32 bg-white/10 rounded-full animate-pulse"></div>
  <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-white/10 rounded-full animate-pulse"></div>

  <!-- User Image -->
  <img src="<?php echo $imgPath; ?>" 
       alt="User Image" 
       class="w-24 h-24 rounded-full border-4 border-white shadow-lg mb-4 object-cover">

  <!-- Greeting -->
  <h1 class="text-3xl sm:text-4xl font-extrabold mb-2">
    Hello, <?php echo $_SESSION['user']['name'] ?> 👋
  </h1>

  <!-- Welcome Text -->
  <p class="mt-2 text-lg sm:text-xl max-w-xl">
    Welcome to your learning dashboard! Explore all the resources and start your journey.
  </p>



</div>


    <!-- Dashboard Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      
      <!-- Give Test -->
      <a href="give_test.php" 
         class="bg-white p-6 rounded-2xl shadow hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 text-center block">
        <div class="flex justify-center mb-4">
          <i data-lucide="file-text" class="w-10 h-10 text-blue-600"></i>
        </div>
        <h2 class="text-2xl font-bold mb-2">Give Test</h2>
        <p class="text-gray-600">Attempt online tests and practice papers.</p>
      </a>

      <!-- Read Books -->
      <a href="student_books.php" 
         class="bg-white p-6 rounded-2xl shadow hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 text-center block">
        <div class="flex justify-center mb-4">
          <i data-lucide="book-open" class="w-10 h-10 text-green-600"></i>
        </div>
        <h2 class="text-2xl font-bold mb-2">Read Books</h2>
        <p class="text-gray-600">Download and read study materials anytime.</p>
      </a>

      <!-- Progress -->
      <a href="student_progress.php" 
         class="bg-white p-6 rounded-2xl shadow hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 text-center block">
        <div class="flex justify-center mb-4">
          <i data-lucide="bar-chart-3" class="w-10 h-10 text-purple-600"></i>
        </div>
        <h2 class="text-2xl font-bold mb-2">Progress</h2>
        <p class="text-gray-600">Check your scores and track performance.</p>
      </a>

      <!-- Video Lectures -->
      <a href="https://www.youtube.com/watch?v=tj9wRjW57qg&list=PLVbRFL6i5RVL1rBzlnOkszz376UrleJ-B" target="_blank" 
         class="bg-white p-6 rounded-2xl shadow hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 text-center block">
        <div class="flex justify-center mb-4">
          <i data-lucide="video" class="w-10 h-10 text-red-500"></i>
        </div>
        <h2 class="text-2xl font-bold mb-2">Video Lectures</h2>
        <p class="text-gray-600">Watch recorded video lectures by experts.</p>
      </a>

      <!-- Announcements -->
      <a href="student_announcements.php" 
         class="bg-white p-6 rounded-2xl shadow hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 text-center block">
        <div class="flex justify-center mb-4">
          <i data-lucide="megaphone" class="w-10 h-10 text-yellow-500"></i>
        </div>
        <h2 class="text-2xl font-bold mb-2">Announcements</h2>
        <p class="text-gray-600">Get latest notices and updates.</p>
      </a>

      <!-- Ask Doubts -->
      <a href="student_forum.php" 
         class="bg-white p-6 rounded-2xl shadow hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 text-center block">
        <div class="flex justify-center mb-4">
          <i data-lucide="message-circle" class="w-10 h-10 text-pink-500"></i>
        </div>
        <h2 class="text-2xl font-bold mb-2">Ask Doubts</h2>
        <p class="text-gray-600">Post your questions and get help from teachers.</p>
      </a>

    </div>
  </div>
</section>

<!-- Lucide Icons Script -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<script>
  lucide.createIcons();
</script>

<?php include '../includes/footer.php'; ?>
