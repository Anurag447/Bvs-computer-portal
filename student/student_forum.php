<?php include '../includes/header.php'; ?>

<section class="min-h-screen bg-gray-100 flex items-center justify-center p-6">
  <div class="bg-white p-12 rounded-3xl shadow-2xl w-full max-w-md text-center">
    
    <!-- Heading -->
    <h1 class="text-4xl font-extrabold text-blue-700 mb-6" data-aos="fade-down">
      We are working on it! 🔧
    </h1>
    
    <!-- Message -->
    <p class="text-gray-700 text-lg mb-8" data-aos="fade-up" data-aos-delay="200">
      We appreciate your passion for learning. This section will be live soon! 😊
    </p>
    
    <!-- Back Button -->
    <a href="student_dashboard.php" 
       class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition duration-300 inline-block" 
       data-aos="fade-up" data-aos-delay="400">
      Back to Dashboard
    </a>

  </div>
</section>

<!-- AOS Animations -->
<link href="https://unpkg.com/aos@next/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init({ duration: 1000 });
</script>

<?php include '../includes/footer.php'; ?>
