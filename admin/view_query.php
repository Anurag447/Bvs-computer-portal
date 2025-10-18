<link href="https://cdn.tailwindcss.com" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<?php

include '../includes/conn.php';

// Handle delete request
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    mysqli_query($conn, "DELETE FROM contact_queries WHERE id=$id");

}

// Fetch all queries
$result = mysqli_query($conn, "SELECT * FROM contact_queries ORDER BY created_at DESC");


?>

<body class="bg-gray-100 min-h-screen flex flex-col md:flex-row">

<?php include 'aside.php'; ?>

<section class="bg-gray-100 py-10 px-4 min-h-screen" style="width: 80%;">
    <h1 class="text-4xl font-bold text-center mb-6">User Queries</h1>

    

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-left">#</th>
                    <th class="py-3 px-4 text-left">Name</th>
                    <th class="py-3 px-4 text-left">Email</th>
                    <th class="py-3 px-4 text-left">Phone</th>
                    <th class="py-3 px-4 text-left">Message</th>
                    <th class="py-3 px-4 text-left">Submitted On</th>
                    <th class="py-3 px-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; while($row = mysqli_fetch_assoc($result)) { ?>
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-2 px-4"><?php echo $i++; ?></td>
                    <td class="py-2 px-4"><?php echo $row['name']; ?></td>
                    <td class="py-2 px-4"><?php echo $row['email']; ?></td>
                    <td class="py-2 px-4"><?php echo $row['phone']; ?></td>
                    <td class="py-2 px-4"><?php echo $row['message']; ?></td>
                    <td class="py-2 px-4"><?php echo $row['created_at']; ?></td>
                    <td class="py-2 px-4 flex gap-2">
                        <!-- Reply Button -->
                        <a href="reply_query.php?id=<?php echo $row['id']; ?>" 
                           class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition">
                           Reply
                        </a>
                        <!-- Delete Button -->
                        <a href="view_query.php?delete_id=<?php echo $row['id']; ?>" 
                           onclick="return confirm('Are you sure you want to delete this query?');"
                           class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                           Delete
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>
<script>
    // Fade out message after 3 seconds (3000ms)
    setTimeout(() => {
        const msgBox = document.getElementById('msgBox');
        if(msgBox) {
            msgBox.style.transition = "opacity 0.5s";
            msgBox.style.opacity = 0;
            setTimeout(() => msgBox.remove(), 500); // remove element after fade
        }
    }, 3000);
</script>
</body>


