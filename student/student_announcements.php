<?php
include '../includes/header.php';
include '../includes/conn.php';

// Fetch all announcements ordered by latest
$announcements = mysqli_query($conn, "SELECT * FROM notices ORDER BY id DESC");
?>

<section class="min-h-screen bg-white-900 p-6" style="margin-top:80px">
  <div class="max-w-6xl mx-auto">

    <!-- Header -->
    <div class="bg-white p-6 rounded-lg shadow mb-8 text-center">
      <h1 class="text-3xl font-bold">Announcements</h1>
      <p class="text-gray-600 mt-2">Check out the latest notices and offers.</p>
    </div>

    <!-- Announcements Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

      <?php while($row = mysqli_fetch_assoc($announcements)): 
        $bgColor = ($row['type'] == 'offer') ? 'bg-yellow-100 border-yellow-500' : 'bg-blue-100 border-blue-500';
      ?>
      <div class="p-6 border-l-4 rounded-lg shadow hover:shadow-lg transition duration-300 <?php echo $bgColor; ?>" data-aos="fade-up">
        <h2 class="text-xl font-bold mb-2">
          <?php echo ucfirst($row['type']); ?>: <?php echo htmlspecialchars($row['title']); ?>
        </h2>
        <p class="text-gray-700"><?php echo nl2br(htmlspecialchars($row['message'])); ?></p>
      </div>
      <?php endwhile; ?>

    </div>

  </div>
  <div class="mt-10 text-center">
  <a href="student_dashboard.php" 
     class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition duration-300 inline-block shadow-lg" data-aos="fade-up">
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
