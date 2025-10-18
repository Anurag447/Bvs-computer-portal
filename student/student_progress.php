<?php include '../includes/header.php';
// echo $_SESSION['user']['name'];
// exit;
?>

<section class="min-h-screen mt-10 bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center p-6">
  <div class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-lg text-center">
    
    <!-- Heading -->
    <h1 class="text-4xl font-extrabold text-blue-700 mb-6" data-aos="fade-down">Hi,
     <?= $_SESSION['user']['name'];  ?> 
    </h1>
    <h6 class="text-xl font-extrabold text-blue-500 mb-6" data-aos="fade-down">
      your rank is
    </h6>
    
    <!-- Rank Card -->
    <div class="bg-gradient-to-r from-green-400 to-blue-500 text-white p-8 rounded-2xl shadow-lg transform hover:scale-105 transition duration-500" data-aos="zoom-in">
      <p class="text-6xl font-bold mb-2">5</p>
      <p class="text-xl">out of 50 students</p>
    </div>

    <!-- Motivational Text -->
    <p class="text-gray-700 mt-6 text-lg" data-aos="fade-up" data-aos-delay="200">
      Keep practicing to improve your rank! 💪
    </p>

    <!-- Buttons -->
    <div class="mt-8 flex justify-center gap-4" data-aos="fade-up" data-aos-delay="400">
      <a href="give_test.php" class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition">Attempt More Tests</a>
      <a href="student_books.php" class="bg-green-600 text-white px-6 py-3 rounded-xl hover:bg-green-700 transition">Read Books</a>
    </div>
    <div class="mt-10 text-center">
  <a href="student_dashboard.php" 
     class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition duration-300 inline-block shadow-lg" data-aos="fade-up">
    Back to Dashboard
  </a>
</div>
  </div>
 
</section>




<!-- AOS Animations -->
<link href="https://unpkg.com/aos@next/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init({ duration: 1000 });
</script>

<?php include '../includes/footer.php'; ?>
