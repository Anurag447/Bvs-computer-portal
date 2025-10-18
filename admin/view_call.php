<?php
include '../includes/conn.php';
$sql = "SELECT * FROM mobile ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Call Requests - Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">
<?php include 'aside.php'; ?>
<div class="bg-gray-100 min-h-screen flex flex-col items-center py-10" style="width: 100%;">

  <h1 class="text-3xl font-bold mb-6 text-gray-800">📱 Call Requests</h1>

  <div class="bg-white shadow-xl rounded-2xl p-6 w-11/12 md:w-2/3">
    <table class="w-full border-collapse">
      <thead>
        <tr class="bg-blue-600 text-white text-left">
          <th class="p-3">#</th>
          <th class="p-3">Mobile Number</th>
          <th class="p-3 text-center">Actions</th>
        </tr>
      </thead>
      <tbody class="text-gray-700">
        <?php
        if (mysqli_num_rows($result) > 0) {
          $i = 1;
          while ($row = mysqli_fetch_assoc($result)) {
            $phone = htmlspecialchars($row['mobile']);
            echo "
            <tr class='border-b hover:bg-gray-50 transition'>
              <td class='p-3 font-semibold'>$i</td>
              <td class='p-3'>$phone</td>
              <td class='p-3 text-center flex justify-center gap-3'>
                <!-- Call Button -->
                <a href='tel:$phone' 
                   class='bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow-md transition'>
                   📞 Call
                </a>

                <!-- WhatsApp Button -->
                <a href='https://wa.me/91$phone?text=" . urlencode("Hello! Thank you for reaching out. We received your request I'm there for u please ask your query.") . "'
                   target='_blank'
                   class='bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded-lg shadow-md transition'>
                   💬 WhatsApp
                </a>
              </td>
            </tr>";
            $i++;
          }
        } else {
          echo "<tr><td colspan='3' class='text-center text-gray-500 p-4'>No call requests found!</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>
