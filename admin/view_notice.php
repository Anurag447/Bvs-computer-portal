<?php
include '../includes/conn.php';

// Handle deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $delete_id = intval($_POST['delete_id']);
    $sql_delete = "DELETE FROM notices WHERE id=$delete_id";
    if (mysqli_query($conn, $sql_delete)) {
        echo "<script>alert('Notice/Offer deleted successfully'); window.location='view_notice.php';</script>";
        exit;
    } else {
        echo "<script>alert('Error deleting: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin - Notices & Offers</title>
<link href="https://cdn.tailwindcss.com" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">

<?php include 'aside.php'; ?>

<div class="flex-1 p-6" style="margin-top: 100px;">
    <h2 class="text-3xl font-bold mb-6 text-center">All Notices & Offers</h2>

    <div class="max-w-5xl mx-auto space-y-4">

        <?php
        // Fetch all notices/offers
        $result = mysqli_query($conn, "SELECT * FROM notices ORDER BY id DESC");
        if (mysqli_num_rows($result) > 0):
            while($row = mysqli_fetch_assoc($result)):
        ?>
        <div class="bg-white p-4 rounded-lg shadow flex justify-between items-start space-x-4">
            <div>
                <h3 class="text-xl font-semibold text-gray-800"><?php echo htmlspecialchars($row['title']); ?> 
                    <span class="text-sm text-gray-500 capitalize">(<?php echo htmlspecialchars($row['type']); ?>)</span>
                </h3>
                <p class="text-gray-700 mt-1"><?php echo nl2br(htmlspecialchars($row['message'])); ?></p>
            </div>
            <div class="flex-shrink-0">
                <form method="POST" onsubmit="return confirm('Are you sure you want to delete this entry?');">
                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">
                        Delete
                    </button>
                </form>
            </div>
        </div>
        <?php
            endwhile;
        else:
        ?>
        <p class="text-center text-gray-500">No notices or offers posted yet.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
