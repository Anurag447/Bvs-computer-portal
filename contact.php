<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<style>
  .mobile-bg {
    background-image: url('assets/contact3.jpg');
  }

  /* Desktop background for medium screens and above */
  @media (min-width: 768px) {
    .desktop-bg {
      background-image: linear-gradient(90deg, rgba(39, 204, 210, 0.1), rgba(5, 105, 108, 0.1)), url('assets/contact4.jpeg');
      background-position: 20% 30%;
      background-size: cover;
    }
  }
</style>
<!-- Hero Section -->

<section class="relative w-full h-[300px] md:h-[450px] bg-cover bg-center mt-[70px] mobile-bg desktop-bg" data-aos="fade-up">
  <div class="absolute inset-0 flex items-center justify-center">
    <h1 class="hidden md:block md:text-6xl font-bold text-white text-center" data-aos="fade-down">
      Contact Us
    </h1>
  </div>
</section>



<section class="py-16 bg-gray-50 font-sans">
  <div class="max-w-6xl mx-auto px-6 text-center">
    <h2 class="text-3xl font-bold text-gray-800 mb-12">📞 Contact Us</h2>

    <div class="grid gap-8 md:grid-cols-3">

      <!-- Mobile Numbers Card -->
      <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition">
        <div class="text-4xl mb-4 text-teal-600">📱</div>
        <h3 class="text-xl font-semibold mb-2 text-gray-800">Mobile Numbers</h3>
        <p class="text-gray-600">+91 91613 21374</p>
        <p class="text-gray-600">+91 91517 94698</p>
      </div>

      <!-- Emails Card -->
      <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition">
        <div class="text-4xl mb-4 text-teal-600">📧</div>
        <h3 class="text-xl font-semibold mb-2 text-gray-800">Email Us</h3>
        <p class="text-gray-600">info@example.com</p>
        <p class="text-gray-600">support@example.com</p>
      </div>

      <!-- Address Card -->
      <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition">
        <div class="text-4xl mb-4 text-teal-600">📍</div>
        <h3 class="text-xl font-semibold mb-2 text-gray-800">Our Address</h3>
        <p class="text-gray-600">123, Green Street, Lucknow</p>
        <p class="text-gray-600">Uttar Pradesh, India - 226001</p>
      </div>

    </div>
  </div>
</section>


<!-- Contact Form Section -->
<section class="bg-gray-100 flex items-center justify-center py-8 px-4">
  <div class="flex flex-col lg:flex-row w-full max-w-6xl border-4 border-gray-300 rounded-3xl overflow-hidden shadow-xl h-[100vh]">

    <!-- Left Side: Image (40%) -->
    <div class="lg:w-1/2 w-full h-70 lg:h-auto order-1">

      <img src="assets/contact.jpg" alt="" class="w-full h-full object-cover">
    </div>

    <!-- Right Side: Form (60%) -->
    <div class="lg:w-1/2 w-full bg-white px-2 py-2  flex flex-col justify-center order-2">

    <!-- <span  class="btn text-white  w-100 md:w-100 border border-rounded rounded-lg bg-gradient-to-r from-blue-500 to-teal-400 ">Education For Everyone</span> -->
      <?php if (isset($_SESSION['success'])): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-2 py-3 rounded relative mb-2" role="alert">
          <strong class="font-bold">Success!</strong>
          <span class="block sm:inline"><?php echo $_SESSION['success']; ?></span>
        </div>
        <?php unset($_SESSION['success']); ?>
      <?php endif; ?>

      <?php if (isset($_SESSION['error'])): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
          <strong class="font-bold">❌ Error!</strong>
          <span class="block sm:inline"><?php echo $_SESSION['error']; ?></span>
        </div>
        <?php unset($_SESSION['error']); ?>
      <?php endif; ?>
      <form action="process_contact.php" method="POST" class=" space-y-4 md:space-y-6 p-3 md:p-6 bg-white rounded-2xl shadow-lg border border-gray-100 flex flex-column justify-content-center" data-aos="fade-down" style="height: 100%; margin: 20px 10px; ">
      <h2 class="text-2xl md:text-4xl font-extrabold mb-2 text-center text-blue-500" data-aos="fade-down" style="color: rgb(39, 204, 210);">
      Ready to Get Started?
      </h2>

        <input type="text" name="name" placeholder="Full Name" required
          class="w-full border border-gray-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-400 shadow-sm hover:shadow-md transition duration-300">

        <input type="email" name="email" placeholder="Email" required
          class="w-full border border-gray-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-400 shadow-sm hover:shadow-md transition duration-300">

        <input type="text" name="phone" placeholder="Phone Number"
          class="w-full border border-gray-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-400 shadow-sm hover:shadow-md transition duration-300">

        <textarea name="message" rows="3" placeholder="Message" required
          class="w-full border border-gray-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-400 shadow-sm hover:shadow-md transition duration-300 resize-none"></textarea>

        <div class="text-center pt-2">
          <button type="submit"
            class="bg-gradient-to-r from-teal-400 to-blue-500 text-white px-12 py-3 rounded-xl font-semibold shadow-md hover:shadow-xl transform hover:-translate-y-1 hover:scale-105 transition duration-300 btn1">
            GET IT NOW
          </button>
        </div>
      </form>

    </div>

  </div>
</section>


<!-- Map Section -->
<section class="w-full mt-12">
  <div class="w-full h-[400px] md:h-[500px]">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3538.4514106290176!2d80.01535427533317!3d27.51743163384256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399e550057c31f01%3A0xe35488f004eaf7bc!2z4KSs4KWA4KS14KWA4KSP4KS4IOCkleCkguCkquCljeCkr-ClguCkn-CksOCljeCkuA!5e0!3m2!1shi!2sin!4v1760238515566!5m2!1shi!2sin" style="border:0; width:100%; height:100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</section>






<?php include 'includes/footer.php'; ?>