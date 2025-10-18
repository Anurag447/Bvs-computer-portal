
<link href="https://cdn.tailwindcss.com" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<?php
// include '../includes/header.php';
include '../includes/conn.php';

// session_start();

// Fetch all students
$sql = "SELECT * FROM student ORDER BY id DESC";
$result = mysqli_query($conn,$sql);


?>
<body class="bg-gray-100 min-h-screen flex">
<?php include 'aside.php'; ?>

<div class="container mx-auto px-4 py-8">
    <h2 class="text-4xl font-bold mb-8 text-center text-gray-800" style="margin-top: 30px;">All Students</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-3 px-5 text-left">ID</th>
                    <th class="py-3 px-5 text-left">Name</th>
                    <th class="py-3 px-5 text-left">Email</th>
                    <th class="py-3 px-5 text-left">Address</th>
                    <th class="py-3 px-5 text-left">Course</th>
                    <th class="py-3 px-5 text-left">Admission Date</th>
                    <th class="py-3 px-5 text-left">Fees</th>
                    <th class="py-3 px-5 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()){
                        // echo ($_SESSION['student']['name']);
                        // exit;
                        ?>
                        <tr class="hover:bg-gray-100 transition">
                            <td class="py-3 px-5"><?= $row['id'] ?></td>
                            <td class="py-3 px-5 font-medium text-blue-600"><?= ($row['name']) ?></td>
                            <td class="py-3 px-5"><?= ($row['email']) ?></td>
                            <td class="py-3 px-5"><?= ($row['address']) ?></td>
                            <td class="py-3 px-5"><?= ($row['course']) ?></td>
                            <td class="py-3 px-5"><?= ($row['add_date']) ?></td>
                            <td class="py-3 px-5">₹<?= ($row['fees']) ?></td>
                            <td class="py-3 px-5 flex space-x-2">
                                <a href="edit_student.php?id=<?= $row['id'] ?>" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded transition">Edit</a>
                                <a href="delete_student.php?id=<?= $row['id'] ?>" 
   onclick="return confirm('Are you sure you want to delete this student?');" 
   class="bg-red-500 px-3 py-1 rounded text-white hover:bg-red-600">
   Delete
</a>

                            </td>
                        </tr>
                    <?php } ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="py-4 text-center text-gray-500">No students found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>


