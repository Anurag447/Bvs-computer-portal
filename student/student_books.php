<?php include '../includes/header.php'; ?>

<section class="min-h-screen bg-white-900 p-6" style="margin-top:80px">
  <div class="max-w-6xl mx-auto">

    <!-- Header -->
    <div class="bg-white p-6 rounded-lg shadow mb-8 text-center">
      <h1 class="text-3xl font-bold">Read Books & Study Materials</h1>
      <p class="text-gray-600 mt-2">Access CCC, ADCA, Tally books and other computer-related materials.</p>
    </div>

    <!-- Books Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

      <!-- CCC Book -->
      <a href="https://drive.google.com/file/d/1wCGnTe0kQZeT5UrKdZJ3xYmGoi3XyXeK/view" target="_blank" 
         class="bg-white p-6 rounded-2xl shadow hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 text-center block">
        <div class="flex justify-center mb-4">
          <i data-lucide="monitor" class="w-10 h-10 text-blue-600"></i>
        </div>
        <h2 class="text-2xl font-bold mb-2">CCC</h2>
        <p class="text-gray-600">Complete Computer Course study materials.</p>
        <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">View PDF</button>
      </a>

      <!-- ADCA / O Level Book -->
      <a href="https://drive.google.com/file/d/1zcOyJCE8OerZz3yWv9a8o-QOSBsiApOw/view" target="_blank" 
         class="bg-white p-6 rounded-2xl shadow hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 text-center block">
        <div class="flex justify-center mb-4">
          <i data-lucide="award" class="w-10 h-10 text-indigo-600"></i>
        </div>
        <h2 class="text-2xl font-bold mb-2">ADCA</h2>
        <p class="text-gray-600">Advanced Diploma in Computer Applications resources.</p>
        <button class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">View PDF</button>
      </a>

      <!-- Tally Book -->
      <a href="https://tallyprimebook.com/wp-content/uploads/2024/01/Read-Sample-TallyPrime-Book-Advanced-Usage-Rel-2-1-e-Book-PDF.pdf" target="_blank" 
         class="bg-white p-6 rounded-2xl shadow hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 text-center block">
        <div class="flex justify-center mb-4">
          <i data-lucide="trending-up" class="w-10 h-10 text-green-600"></i>
        </div>
        <h2 class="text-2xl font-bold mb-2">Tally</h2>
        <p class="text-gray-600">Tally ERP / Accounting practice and study materials.</p>
        <button class="mt-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">View PDF</button>
      </a>

      <!-- Computer Fundamentals -->
      <a href="https://www.infobooks.org/pdfview/beginning-excel-2019-noreen-brown-barbara-lave-hallie-puncochar-julie-romey-412/" target="_blank" 
         class="bg-white p-6 rounded-2xl shadow hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 text-center block">
        <div class="flex justify-center mb-4">
          <i data-lucide="monitor" class="w-10 h-10 text-blue-600"></i>
        </div>
        <h2 class="text-2xl font-bold mb-2">Excel Book</h2>
        <p class="text-gray-600">Basics of Excel.</p>
        <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">View PDF</button>
      </a>

      <!-- Programming in C -->
      <a href="https://www.cs.sfu.ca/~ashriram/Courses/CS295/assets/books/C_Book_2nd.pdf" target="_blank" 
         class="bg-white p-6 rounded-2xl shadow hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 text-center block">
        <div class="flex justify-center mb-4">
          <i data-lucide="code" class="w-10 h-10 text-green-600"></i>
        </div>
        <h2 class="text-2xl font-bold mb-2">Programming in C</h2>
        <p class="text-gray-600">Learn C programming with examples and exercises.</p>
        <button class="mt-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">View PDF</button>
      </a>

      <!-- Data Structures -->
      <a href="https://drive.google.com/file/d/1RqijsQ2JNMkYLdb_zUFY4W9E12CNBD3l/view" target="_blank" 
         class="bg-white p-6 rounded-2xl shadow hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 text-center block">
        <div class="flex justify-center mb-4">
          <i data-lucide="layers" class="w-10 h-10 text-purple-600"></i>
        </div>
        <h2 class="text-2xl font-bold mb-2">Basic of Python</h2>
        <p class="text-gray-600">Study Python concepts with examples.</p>
        <button class="mt-4 bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 transition">View PDF</button>
      </a>

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
