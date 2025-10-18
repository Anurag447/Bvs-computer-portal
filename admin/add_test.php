<link href="https://cdn.tailwindcss.com" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<?php
include '../includes/conn.php';

$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $test_name = $_POST['test_name'];
    $test_link = $_POST['test_link'];

    $sql = "INSERT INTO tests (test_name, test_link) VALUES ('$test_name', '$test_link')";
    if ($conn->query($sql) === TRUE) {
        $msg = "✅ Test added successfully!";
    } else {
        $msg = "❌ Error: " . $conn->error;
    }
}
?>

<body class="bg-gray-100 min-h-screen flex flex-col md:flex-row">

<?php include 'aside.php'; ?>

<section class="min-h-screen bg-gray-100 flex items-center justify-center p-4" style="margin-left: 200px; width:50%;">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-8 animate-fadeUp">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Add New Test</h2>

        <?php if($msg != ""): ?>
            <div class="text-center mb-4 text-green-600 font-semibold">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="space-y-4">
            <div>
                <label class="block text-gray-700 font-medium mb-2">Test Name</label>
                <input type="text" name="test_name" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2">Test Link (URL)</label>
                <input type="text" name="test_link" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
                Add Test
            </button>
        </form>
    </div>
</section>
</body>

<!-- Tailwind Animate (fade-up) -->
<style>
@keyframes fadeUp {
  0% { opacity: 0; transform: translateY(20px); }
  100% { opacity: 1; transform: translateY(0); }
}
.animate-fadeUp {
  animation: fadeUp 0.8s ease forwards;
}
</style>

