<?php include 'includes/header.php'; ?>

<!-- ===================== ABOUT US HEADER WITH BACKGROUND IMAGE ===================== -->
<!-- ================= HERO SECTION ================= -->
<section class="relative w-full h-[300px] md:h-[450px] bg-cover bg-center mt-[70px] mobile-bg desktop-bg" data-aos="fade-up">
<div class="absolute inset-0 flex items-center justify-center">
    <h1 class="hidden md:block md:text-6xl font-bold text-white text-center" data-aos="fade-down">
      About Us
    </h1>
  </div>
</section>

<style>
/* Mobile default background */
.mobile-bg {
    background-image: url('assets/about6.jpg');
}

/* Desktop background for medium screens and above */
@media (min-width: 768px) {
    .desktop-bg {
      background-image: linear-gradient(90deg, rgba(39,204,210,0.1), rgba(5,105,108,0.1)), url('assets/aboutd.jpg'); 
      background-size: cover; 
    }
}
</style>



<!-- ================= ABOUT US SECTION ================= -->
<section class="py-20 bg-white">
  <div class="container mx-auto px-6 lg:px-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
      
      <!-- Left Image -->
      <div data-aos="fade-right">
        <img src="assets/mission.jpg" alt="About Coaching" class="w-full rounded-xl shadow-2xl object-cover min-h-[500px]">
      </div>
      
      <!-- Right Content -->
      <div data-aos="fade-left">
        <h2 class="text-4xl font-extrabold mb-4 text-[#05696c]">Our Mission</h2>
        <p class="text-gray-700 mb-6 leading-relaxed text-lg">
          Our core mission is to provide superior, industry-relevant computer education. We empower every student to achieve their career goals by focusing on interactive learning, hands-on real-world projects, and personalized guidance that ensures deep, practical understanding.
        </p>
        <h2 class="text-3xl font-bold mb-4 text-[#05696c]">Why Choose Us?</h2>
        <ul class="space-y-3 text-gray-800 text-lg">
          <li class="flex items-start">
            <i class="fas fa-check-circle text-[#27ccd2] mr-3 mt-1"></i> Expert Faculty: Learn from experienced professionals dedicated to your success.
          </li>
          <li class="flex items-start">
            <i class="fas fa-check-circle text-[#27ccd2] mr-3 mt-1"></i> Interactive Learning: Dynamic classroom sessions and robust online support.
          </li>
          <li class="flex items-start">
            <i class="fas fa-check-circle text-[#27ccd2] mr-3 mt-1"></i> Practical Knowledge: Strong focus on project-based learning and portfolio development.
          </li>
          <li class="flex items-start">
            <i class="fas fa-check-circle text-[#27ccd2] mr-3 mt-1"></i> Affordable & Certified: High-quality, cost-effective courses with recognized certification.
          </li>
        </ul>
      </div>
      
    </div>
  </div>
</section>

<!-- ================= FACILITIES SECTION ================= -->
<section class="py-20 bg-gray-100">
  <div class="container mx-auto px-6 lg:px-12">
    <h2 class="text-4xl font-extrabold mb-12 text-center text-[#05696c]" data-aos="fade-up">Our Facilities</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
      
      <!-- Facility Card -->
      <div class="bg-white rounded-xl p-6 shadow-md transition-transform duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
        <i class="fas fa-laptop-code text-4xl text-[#27ccd2] mb-4"></i>
        <h3 class="text-2xl font-bold mb-2">Computer Labs</h3>
        <p class="text-gray-600">Fully equipped labs with latest hardware and software for practical learning.</p>
      </div>
      
      <div class="bg-white rounded-xl p-6 shadow-md transition-transform duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="200">
        <i class="fas fa-chalkboard-teacher text-4xl text-[#27ccd2] mb-4"></i><br>
        <a class="text-2xl font-bold mb-2" href="#faculty">Expert Faculty</a>
        <p class="text-gray-600">Learn from highly experienced instructors with real-world experience.</p>
      </div>
      
      <div class="bg-white rounded-xl p-6 shadow-md transition-transform duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="300">
        <i class="fas fa-project-diagram text-4xl text-[#27ccd2] mb-4"></i>
        <h3 class="text-2xl font-bold mb-2">Project Labs</h3>
        <p class="text-gray-600">Hands-on project labs to build practical knowledge and skills.</p>
      </div>

    </div>
  </div>
</section>

<?php
include 'includes/conn.php'; 
$sql = "SELECT * FROM faculty";
$result = mysqli_query($conn, $sql);
?>

<section class="py-8 bg-gray-100">
  <div class="max-w-7xl mx-auto px-4 " id=faculty>
    <h2 class="text-3xl font-extrabold text-center text-teal-600 mb-8">Our Faculty</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php while($faculty = mysqli_fetch_assoc($result)): ?>
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden transform hover:scale-105 transition duration-300 ease-in-out"
             data-aos="fade-up">

          <!-- Faculty Image -->
          <div class=" overflow-hidden w-full" style=" height:350px;">
            <?php 
            $imgPath = 'uploads/faculty/' . $faculty['image'];
            if($faculty['image'] && file_exists($imgPath)): ?>
            <img src="<?= $imgPath ?>" alt="<?= $faculty['name'] ?>" 
       class="w-full h-full object-cover transform transition duration-500 hover:scale-105" 
       style="object-position: top center;">

            <?php else: ?>
              <img src="https://via.placeholder.com/400x300?text=No+Image" class="w-full h-full object-cover rounded-2xl" alt="No Image">
            <?php endif; ?>
          </div>

          <!-- Faculty Details -->
          <div class="p-6 text-left">
            <h2 class="text-2xl font-bold text-teal-600 mb-2"><?= $faculty['name'] ?></h2>
            <p class="text-gray-700 mb-1"><strong>Email:</strong> <?= $faculty['email'] ?></p>
            <p class="text-gray-700 mb-1"><strong>Experience:</strong> <?= $faculty['phone'] ?> </p>
            <p class="text-gray-700"><strong>Description:</strong> <?= $faculty['department'] ?></p>
          </div>

        </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>





<?php include 'includes/footer.php'; ?>
