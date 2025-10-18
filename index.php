<?php include 'includes/header.php'; 
include 'includes/conn.php';

// latest 5 notices fetch
$sql = "SELECT * FROM notices ORDER BY created_at DESC LIMIT 5";
$result = mysqli_query($conn, $sql);


$result1 = mysqli_query($conn, "SELECT * FROM courses  limit 3");



?>

<style>
.hero-txt{
  color: #e0e0e0; 
}
.overlay{
  opacity: 0.1;
}

@media (max-width: 768px) {
  video {
  object-fit: contain;
  width: 100%;
  height: 100%;
}
}

</style>

<!-- Hero Section -->

<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>





<section id="hero" class="relative h-screen overflow-hidden flex items-center justify-center text-center text-white">

  <!-- Overlay for text visibility -->
  <div class="absolute overlay inset-0 bg-black  z-10"></div>

  <!-- ✅ Carousel Background -->
  <div id="heroCarousel" class="carousel slide carousel-fade absolute w-full h-full top-0 start-0 z-0 " 
       data-bs-ride="carousel" data-bs-interval="5000" data-bs-pause="false" style="margin-top:70px;">
    <div class="carousel-inner h-full">
      <div class="carousel-item active h-full">
        <img src="assets/1.jpg" class="d-block w-full h-full object-cover" alt="Slide 1">
      </div>
      <div class="carousel-item h-full">
        <img src="assets/benjamin-child-GWe0dlVD9e0-unsplash.jpg" class="d-block w-full h-full object-cover" alt="Slide 2">
      </div>
      <div class="carousel-item h-full">
        <img src="assets/boitumelo-rPE-Uj1b49g-unsplash.jpg" class="d-block w-full h-full object-cover" alt="Slide 3">
      </div>
      <div class="carousel-item h-full">
        <img src="assets/meet.jpg" class="d-block w-full h-full object-cover" alt="Slide 6">
      </div>
    </div>
  </div>

  <!-- ✅ Hero Text Content -->
  <div class="relative z-20 px-4 " style="margin-top: 130px;">
    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold welcome">
      <span id="typed" class="hero-text"></span>
    </h1>
    <p class="mt-4 text-white hero-txt text-lg sm:text-lg md:text-xl lg:text-2xl font-bold"  data-aos="fade-up">
    ✨ Empowering students for a brighter future ✨
    </p>
    <a href="course.php"
       class=" btn text-white btn1 mt-6 inline-block  px-4 sm:px-6 py-2 sm:py-3 rounded-lg hover:bg-teal-400 transition text-xs sm:text-base md:text-lg lg:text-xl" data-aos="fade-up">
      Explore Courses
    </a>
  </div>

</section>






<?php
include 'includes/conn.php';

// latest 5 notices fetch
$sql = "SELECT * FROM notices ORDER BY created_at DESC LIMIT 5";
$result = mysqli_query($conn, $sql);
?><section class="py-12 bg-gray-50">
<div class="container mx-auto px-4">
  <h2 class="text-2xl md:text-3xl font-bold mb-6 text-center " data-aos="fade-up">Latest Notices & Offers</h2>

  <div class="flex space-x-4 overflow-x-auto scrollbar-hide py-4 " data-aos="fade-up" >
    <?php if (mysqli_num_rows($result) > 0): ?>
      <?php while($row = mysqli_fetch_assoc($result)): ?>
        <div class="w-[350px] bg-white shadow-lg rounded-xl p-5 flex-shrink-0 border-l-8 
                    <?= $row['type']=='offer' ? 'border-green-500' : 'border-blue-500' ?> hover:scale-105 transform transition" >
          <h3 class="text-lg font-semibold flex justify-between items-center mb-2">
            <?= htmlspecialchars($row['title']) ?>
            <span class="text-xs px-2 py-1 rounded-full 
                         <?= $row['type']=='offer' ? 'bg-green-500 text-white' : 'bg-blue-500 text-white' ?>">
              <?= ucfirst($row['type']) ?>
            </span>
          </h3>
          <p class="text-gray-700 text-sm mb-2 line-clamp-3">
            <?= htmlspecialchars($row['message']) ?>
          </p>
          <p class="text-gray-400 text-xs">Posted on <?= date("d M Y", strtotime($row['created_at'])) ?></p>
        </div> &nbsp; &nbsp; &nbsp; &nbsp;
      <?php endwhile; ?>
    <?php else: ?>
      <p class="text-gray-500 text-center w-full">No notices or offers available.</p>
    <?php endif; ?>
  </div>
</div>
</section>




<!-- Courses Section -->
<section class="py-12 bg-gray-50 text-center">
  <h2 class="text-4xl font-extrabold mb-10 text-gray-900" data-aos="fade-up">
    🚀 Latest Courses
  </h2>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-10 px-6 md:px-12">
    <?php while ($row = mysqli_fetch_assoc($result1)) { ?>
      <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:-translate-y-2 hover:scale-105 transition duration-500" data-aos="fade-up" data-aos-delay="100">

        <!-- Image -->
        <div class="overflow-hidden">
          <img src="uploads/<?php echo $row['image']; ?>" class="w-full h-52 object-cover hover:scale-110 transition duration-500">
        </div>

        <!-- Content -->
        <div class="p-6 flex flex-col justify-between h-56">
          <div>
            <h3 class="text-xl font-bold text-gray-800 mb-3 hover:text-red-500 transition">
              <?php echo $row['title']; ?>
            </h3>
            <p class="text-gray-600 text-sm md:text-base line-clamp-3">
              <?php echo substr($row['description'], 0, 120); ?>...
            </p>
          </div>

          <!-- Buttons -->
          <div class="mt-4 flex gap-3">
            <a href="course_detail.php?id=<?php echo $row['id']; ?>" 
               class="flex-1 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
               View More
            </a>
            <a href="contact.php?course=<?php echo urlencode($row['title']); ?>" 
               class="flex-1 bg-teal-400 text-white py-2 rounded-lg hover:bg-green-700 transition font-semibold">
               Enroll Now
            </a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</section>




<!-- Stats / Loader Section -->
<section class="py-10 bg-white text-center">
  <div class="container mx-auto px-4">
    <h3 class="text-3xl font-semibold text-gray-800 mb-3" data-aos="fade-down">
      Our Achievements
    </h3>
    <p class="text-gray-600 " data-aos="fade-down" data-aos-delay="100">
      See how we are making a difference with our students, faculty, and happy customers
    </p>
  </div>
</section>

<section class=" pb-20 bg-white text-center">
  <div class="container mx-auto px-4 mb-2 grid grid-cols-1 md:grid-cols-3 gap-8">

    <!-- Students -->
    <div class="p-6 bg-gray-100 rounded-lg shadow counter-box" data-aos="fade-up">
      <h2 class="text-4xl font-bold text-red-500">
        <span class="counter" data-target="500">0</span>+
      </h2>
      <p class="mt-2 text-gray-700 text-lg">Students</p>
    </div>

    <!-- Faculty -->
    <div class="p-6 bg-gray-100 rounded-lg shadow counter-box" data-aos="fade-up" data-aos-delay="100">
      <h2 class="text-4xl font-bold text-blue-500">
        <span class="counter" data-target="10">0</span>+
      </h2>
      <p class="mt-2 text-gray-700 text-lg">Faculty</p>
    </div>

    <!-- Happy Customers -->
    <div class="p-6 bg-gray-100 rounded-lg shadow counter-box" data-aos="fade-up" data-aos-delay="200">
      <h2 class="text-4xl font-bold text-green-500">
        <span class="counter" data-target="200">0</span>+
      </h2>
      <p class="mt-2 text-gray-700 text-lg">Happy Customers</p>
    </div>

  </div>
</section>


<section class="py-12 bg-gray-50">
  <div class="max-w-3xl mx-auto px-6 text-center">
    <h2 class="text-3xl font-bold text-gray-800 mb-12" data-aos="fade-up">💬 What Our Students Say</h2>

    <!-- Swiper -->
    <div class="swiper mySwiper">
      <div class="swiper-wrapper mb-12" data-aos="fade-up" >

        <!-- Testimonial 1 -->
        <div class="swiper-slide bg-gradient-to-r from-blue-100 to-blue-100 rounded-3xl p-6 shadow-md hover:shadow-xl transition transform hover:-translate-y-1"> <div class="flex items-center mt-4 space-x-3"  data-aos="fade-up">
            <img src="assets/profile/image.png" alt="Student 1" class="w-14 h-14 rounded-full ring-2 ring-blue-400">
            <div class="text-left">
              <h4 class="font-semibold text-gray-900 text-sm md:text-base">Priya Sharma</h4>
              <span class="text-gray-500 text-xs md:text-sm">Lucknow</span>
            </div>
          </div>
          <p class="text-gray-800 mb-4 text-base font-medium"  data-aos="fade-up">“Excellent teaching, very practical and easy to understand!”</p>
         
        </div>

        <!-- Testimonial 2 -->
        <div class="swiper-slide bg-gradient-to-r from-green-100 to-green-100 rounded-3xl p-6 shadow-md hover:shadow-xl transition transform hover:-translate-y-1 " data-aos="fade-up">
        <div class="flex items-center mt-4 space-x-3">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Student 2" class="w-14 h-14 rounded-full ring-2 ring-green-400">
            <div class="text-left">
              <h4 class="font-semibold text-gray-900 text-sm md:text-base">Raj Verma</h4>
              <span class="text-gray-500 text-xs md:text-sm">Delhi</span>
            </div>
          </div>
          <p class="text-gray-800 mb-4 text-base font-medium"  data-aos="fade-up">“Friendly staff and amazing course material!”</p>
        </div>

        <!-- Testimonial 3 -->
        <div class="swiper-slide bg-gradient-to-r from-purple-100 to-purple-100 rounded-3xl p-6 shadow-md hover:shadow-xl transition transform hover:-translate-y-1 " data-aos="fade-up">
        <div class="flex items-center mt-4 space-x-3">
            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Student 3" class="w-14 h-14 rounded-full ring-2 ring-purple-400">
            <div class="text-left">
              <h4 class="font-semibold text-gray-900 text-sm md:text-base">Sneha Patel</h4>
              <span class="text-gray-500 text-xs md:text-sm">Mumbai</span>
            </div>
          </div>
          <p class="text-gray-800 mb-4 text-base font-medium"  data-aos="fade-up">“Highly recommend for beginners and advanced learners alike.”</p>
       
        </div>

      </div>

   
    </div>
  </div>
</section>



<!-- Contact CTA Section -->
<section class="relative text-white text-center py-20 overflow-hidden" data-aos="fade-up">

  <!-- Background Video -->
  <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover">
    <source src="assets/labvedio2.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>

  <!-- Overlay to make text readable -->
  <div class="absolute inset-0 bg-black opacity-10"></div>

  <!-- Content -->
  <div class="relative z-10 px-6 py-10 md:py-8">
    <h2 class="text-3xl md:text-3xl font-bold mb-4 animate__animated animate__fadeInDown">
      🚀 Ready to Start Learning?
    </h2>
    <p class="mb-8 text-lg md:text-lg animate__animated animate__fadeInUp">
      Contact us today and enroll in your desired course to boost your skills!
    </p>
    <a href="contact.php" 
       class="inline-block  hover:bg-red-600 transform hover:scale-105 transition-all duration-300 text-white font-semibold px-6 py-3 rounded-lg shadow-lg" style="background-color:rgb(246, 112, 9);">
       📩 Contact Us
    </a>
  </div>

</section>

<div id="callModal" class="fixed inset-0 flex items-center justify-center bg-black/60 backdrop-blur-sm hidden z-50">
  <div class="bg-gradient-to-br from-white to-blue-50 shadow-2xl rounded-3xl p-8 relative w-[90%] max-w-md">
    
    <!-- Close Button -->
    <button id="closeModal" 
      class="absolute top-3 right-4 text-gray-500 hover:text-gray-800 text-3xl font-bold transition">
      &times;
    </button>

    <!-- Title -->
    <div class="text-center">
      <h2 class="text-2xl font-extrabold text-gray-800 mb-2">Request a Call 📞</h2>
      <p class="text-gray-600 mb-6 text-sm">Enter your number and we’ll reach out to you shortly!</p>
    </div>

    <!-- Form -->
    <form id="callForm" class="space-y-5">
      <div class="relative">
        <input type="tel" id="phone" name="phone" 
               placeholder="Enter your phone number"
               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 shadow-sm"
               required>
        <span class="absolute right-3 top-3.5 text-gray-400 text-lg">📱</span>
      </div>

      <button type="button" id="call"
              class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-3 rounded-xl font-semibold shadow-md hover:scale-105 hover:shadow-lg transition-transform">
        Request Call
      </button>
    </form>

    <!-- Footer text -->
    <div class="mt-6 text-center text-xs text-gray-500">
      We respect your privacy. Your details are safe with us.
    </div>
  </div>
</div>



<?php include 'includes/footer.php'; ?>

<script>
   document.addEventListener("DOMContentLoaded", function () {
    var typed = new Typed("#typed", {
      strings: ["BVS COMPUTER COACHING"],
      typeSpeed: 70,       // typing speed
      backSpeed: 50,       // erase speed
      backDelay: 2000,     // 2 sec rukne ke baad erase
      startDelay: 500,     // shuru me thoda delay
      showCursor: true,    // blinking cursor
      cursorChar: "|",     // cursor ka symbol
      loop: true           // infinite loop
    });
  })

  const counters = document.querySelectorAll('.counter');
  const options = { threshold: 0.5 }; // section ka 50% visible ho tab start

  const startCounter = (counter) => {
    const target = +counter.getAttribute('data-target');
    let count = 0;
    const increment = target / 200;

    const updateCount = () => {
      count += increment;
      if (count < target) {
        counter.innerText = Math.ceil(count);
        requestAnimationFrame(updateCount);
      } else {
        counter.innerText = target;
      }
    };
    updateCount();
  };

  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        startCounter(entry.target.querySelector('.counter'));
        obs.unobserve(entry.target); // ek baar run hone ke baad unobserve
      }
    });
  }, options);

  document.querySelectorAll('.counter-box').forEach(box => {
    observer.observe(box);
  });




      // Check if modal has already been shown
if (!localStorage.getItem('callModalShown')) {


setTimeout(() => {
    document.getElementById('callModal').classList.remove('hidden');
    localStorage.setItem('callModalShown', 'true'); // mark as shown
}, 6000);

}

// }
// Close modal
document.getElementById('closeModal').addEventListener('click', () => {
    document.getElementById('callModal').classList.add('hidden');
});


$('#call').click(function(){
    var phone = $('#phone').val();
    $.ajax({
      type: "post",
      url: "admin/mobile.php",
      data: {phone:phone},
      success: function (response) {
        if(response=="true"){
          Swal.fire({
      title: "We will contact you Shortly!",
      icon: "success",
      draggable: true
    });
        }
      }
    });
    
    document.getElementById('callModal').classList.add('hidden');
    this.reset();
    });
</script>




