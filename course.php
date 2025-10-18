<?php include 'includes/header.php';
include 'includes/conn.php';
$result = mysqli_query($conn, "SELECT * FROM courses ORDER BY created_at DESC");

?>

<style>
/* Mobile default background */

.mobile-bg {
    background-image: url('assets/courseformobile.jpg');
}

/* Desktop background for medium screens and above */
@media (min-width: 768px) {
    .desktop-bg {
      background-image: linear-gradient(90deg, rgba(39,204,210,0.1), rgba(5,105,108,0.1)), url('assets/coursefordesktop.jpg'); 
      background-size: cover; 
    }
}
</style>
<!-- Hero Section -->
<section class="relative w-full h-[300px] md:h-[450px] bg-cover bg-center mt-[70px] mobile-bg desktop-bg" data-aos="fade-up">
<div class="absolute inset-0 flex items-center justify-center">
    <h1 class="hidden md:block md:text-6xl font-bold text-white text-center" data-aos="fade-down">
      Our Courses
    </h1>
  </div>
</section>




<!-- Main / Core Courses Section -->
<h2 class="text-3xl font-bold text-center mt-16 mb-8 text-gray-800" data-aos="fade-up"> 🎓 Main Courses / Core Courses</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 px-10" >
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col hover:shadow-2xl transition-all duration-300" data-aos="fade-up">
        <div class="overflow-hidden" >
          <img src="uploads/<?php echo $row['image']; ?>" 
               class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
        </div>
        
        <div class="p-4 flex-1">
            <h3 class="text-xl font-bold mb-2 text-gray-800"><?php echo $row['title']; ?></h3>
            <p class="text-gray-600 line-clamp-3">
                <?php echo substr($row['description'], 0, 100); ?>...
            </p>
        </div>

        <div class="p-4 flex justify-between items-center">
            <a href="course_detail.php?id=<?php echo $row['id']; ?>" 
               class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
               View More
            </a>
            <a href="contact.php?course=<?php echo urlencode($row['title']); ?>" 
               class=" text-white px-4 py-2 rounded hover:bg-red-700 transition btn1">
               Enroll Now
            </a>
        </div>
    </div>
  <?php } ?>
</div>


<!-- Other Courses Section -->
<h2 class="text-3xl font-bold text-center mt-20 mb-8 text-gray-800" data-aos="fade-up"> 🌈 Some Other Courses</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 px-10 mb-20" >
  
  <!-- Static Course 1 -->
  <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition-all duration-300" data-aos="fade-up">
    <div class="overflow-hidden">
      <img src="assets/softskill.jpg" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
    </div>
    <div class="p-4">
      <h3 class="text-xl font-bold mb-2 text-gray-800">Personality Development & Soft Skills</h3>
      <p class="text-gray-600 mb-3">Boost your confidence and communication with our expert trainers.</p>
      <p class="text-blue-600 font-semibold mb-3">₹1500</p>
      <div class="flex justify-between">
        <a href="contact.php" class="text-white px-4 py-2 rounded hover:bg-green-700 transition btn1">Enroll Now</a>
      </div>
    </div>
  </div>

  <!-- Static Course 2 -->
  <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition-all duration-300" data-aos="fade-up">
    <div class="overflow-hidden">
      <img src="assets/c.jpg" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
    </div>
    <div class="p-4">
      <h3 class="text-xl font-bold mb-2 text-gray-800">C Programming</h3>
      <p class="text-gray-600 mb-3">Learn the basics of programming and logic building in C.</p>
      <p class="text-blue-600 font-semibold mb-3">₹1500</p>
      <div class="flex justify-between">
        <a href="contact.php" class=" text-white px-4 py-2 rounded hover:bg-green-700 transition btn1">Enroll Now</a>
      </div>
    </div>
  </div>

  <!-- Static Course 3 -->
  <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition-all duration-300" data-aos="fade-up">
    <div class="overflow-hidden">
      <img src="assets/python.jpg" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
    </div>
    <div class="p-4">
      <h3 class="text-xl font-bold mb-2 text-gray-800">Python Programming</h3>
      <p class="text-gray-600 mb-3">Master Python fundamentals and kickstart your coding journey.</p>
      <p class="text-blue-600 font-semibold mb-3">₹1500</p>
      <div class="flex justify-between">
        <a href="contact.php" class=" text-white px-4 py-2 rounded hover:bg-green-700 transition btn1">Enroll Now</a>
      </div>
    </div>
  </div>


  <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition-all duration-300" data-aos="fade-up">
    <div class="overflow-hidden">
      <img src="assets/php.jpg" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
    </div>
    <div class="p-4">
      <h3 class="text-xl font-bold mb-2 text-gray-800">Web Development using PHP</h3>
      <p class="text-gray-600 mb-3">Boost your confidence and communication with our expert trainers.</p>
      <p class="text-blue-600 font-semibold mb-3">₹5000</p>
      <div class="flex justify-between">
        <a href="contact.php" class=" text-white px-4 py-2 rounded hover:bg-green-700 transition btn1">Enroll Now</a>
      </div>
    </div>
  </div>

  <!-- Static Course 2 -->
  <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition-all duration-300" data-aos="fade-up">
    <div class="overflow-hidden">
      <img src="assets/android.jpg" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
    </div>
    <div class="p-4">
      <h3 class="text-xl font-bold mb-2 text-gray-800">App Development</h3>
      <p class="text-gray-600 mb-3">Learn the basics of App Development and logic building in java/kotlin.</p>
      <p class="text-blue-600 font-semibold mb-3">₹5000</p>
      <div class="flex justify-between">
        <a href="contact.php" class=" text-white px-4 py-2 rounded hover:bg-green-700 transition btn1">Enroll Now</a>
      </div>
    </div>
  </div>

  <!-- Static Course 3 -->
  <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition-all duration-300" data-aos="fade-up">
    <div class="overflow-hidden">
      <img src="assets/apptitude.jpg" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
    </div>
    <div class="p-4">
      <h3 class="text-xl font-bold mb-2 text-gray-800">Apptitude Learning</h3>
      <p class="text-gray-600 mb-3">Master Apptitude to crack big companies with our exeperts.</p>
      <p class="text-blue-600 font-semibold mb-3">₹1500</p>
      <div class="flex justify-between">
        <a href="contact.php" class=" text-white px-4 py-2 rounded hover:bg-green-700 transition btn1">Enroll Now</a>
      </div>
    </div>
  </div>

</div>


<?php include 'includes/footer.php'; ?>
