<?php
include '../includes/header.php';
include '../includes/conn.php';

$student_id = 1; // अभी demo के लिए, बाद में session से ले सकते हैं

// Fetch all tests
$testsResult = mysqli_query($conn, "SELECT * FROM tests ORDER BY created_at DESC");

// Fetch completed tests by student
$completedTests = [];
$res = mysqli_query($conn, "SELECT test_id FROM student_tests WHERE student_id=$student_id AND status='completed'");
while($row = mysqli_fetch_assoc($res)){
    $completedTests[] = $row['test_id'];
}
?>

<section class="min-h-screen bg-white-900 p-6" style="margin-top: 80px;">
  <div class="max-w-5xl mx-auto">
    <div class="bg-white p-6 rounded-lg shadow mb-6 text-center">
      <h1 class="text-3xl font-bold">Available Tests</h1>
      <p class="text-gray-600 mt-2">Click on a test to attempt. Status will be updated automatically.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <?php while($test = mysqli_fetch_assoc($testsResult)): 
            $status = in_array($test['id'], $completedTests) ? "Completed" : "New"; ?>
        <a href="<?php echo $test['test_link']; ?>" target="_blank" rel="noopener"
           class="bg-white p-6 rounded-2xl shadow hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 text-center block relative">
           
           <!-- Status Label -->
           <div class="absolute top-3 right-3 px-2 py-1 rounded-full text-white text-xs font-semibold <?php echo $status=='Completed' ? 'bg-green-600' : 'bg-blue-600'; ?>">
                <?php echo $status; ?>
           </div>

           <div class="flex justify-center mb-4">
             <i data-lucide="file-text" class="w-10 h-10 text-blue-600"></i>
           </div>
           <h2 class="text-2xl font-bold mb-2"><?php echo $test['test_name']; ?></h2>
           <p class="text-gray-600">Click to attempt this test.</p>
        </a>
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



<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<script>lucide.createIcons();</script>

<?php include '../includes/footer.php'; ?>
