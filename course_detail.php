<?php
 include 'includes/header.php';
include 'includes/conn.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = mysqli_query($conn, "SELECT * FROM courses WHERE id=$id");
    if (!$result || mysqli_num_rows($result) === 0) {
        echo "<script>alert('Invalid Course'); window.location='courses.php';</script>";
        exit;
    }
    $course = mysqli_fetch_assoc($result);
} else {
    echo "<script>alert('Invalid Course'); window.location='courses.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($course['title']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 mb-12 font-sans" style="margin-top: 100px;">

<div class="flex justify-center p-6">
    <div class="w-full max-w-3xl bg-white rounded-2xl overflow-hidden shadow-md border border-gray-200 transition-transform duration-300 hover:scale-102">
        
        <!-- Hero Image -->
        <div class="relative h-64 sm:h-72">
            <img src="uploads/<?php echo htmlspecialchars($course['image']); ?>" 
                 alt="Course Image" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 flex items-center justify-center px-4" >
                <h1 class="text-3xl sm:text-4xl font-semibold text-white text-center drop-shadow-md">
                    <?php echo htmlspecialchars($course['title']); ?>
                </h1>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6 sm:p-8">
            <!-- Description -->
            <p class="text-gray-700 text-base sm:text-lg leading-relaxed mb-6 text-justify">
                <?php echo nl2br(htmlspecialchars($course['description'])); ?>
            </p>

            <!-- Details Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg shadow-sm">
                    <span class="text-2xl text-blue-500">📅</span>
                    <div>
                        <p class="font-medium text-gray-800">Duration</p>
                        <p class="text-gray-600"><?php echo htmlspecialchars($course['duration']); ?></p>
                    </div>
                </div>
                <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg shadow-sm">
                    <span class="text-2xl text-indigo-500">👨‍🏫</span>
                    <div>
                        <p class="font-medium text-gray-800">Instructor</p>
                        <p class="text-gray-600"><?php echo htmlspecialchars($course['instructor']); ?></p>
                    </div>
                </div>
                <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg shadow-sm">
                    <span class="text-2xl text-green-500">💰</span>
                    <div>
                        <p class="font-medium text-gray-800">Fees</p>
                        <p class="text-gray-600">₹<?php echo htmlspecialchars($course['fees']); ?></p>
                    </div>
                </div>
            </div>

            <hr class="border-gray-200 mb-6">

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row justify-center space-y-3 sm:space-y-0 sm:space-x-4">
                <a href="course.php" 
                   class="flex-1 bg-gray-200 text-gray-800 py-2.5 rounded-full text-center font-medium hover:bg-gray-300 transition duration-200">
                    ← Back to Courses
                </a>
                <a href="contact.php?course=<?php echo urlencode($course['title']); ?>" 
                   class="flex-1 bg-teal-400 text-white py-2.5 rounded-full text-center font-semibold shadow hover:bg-green-700 transition duration-200">
                    Enroll Now
                </a>
            </div>
        </div>

    </div>
</div>
<?php include 'includes/footer.php' ?>
</body>
</html>
