<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<div class="modal mt-5" id="profile-modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header d-flex justify-content-between">
                <h4 class="modal-title text-2xl">Update Profile</h4>
                <button  type="button" onclick="closeModal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              </div>
              <div class="modal-body">
                <form action="admin/update-profile.php" enctype="multipart/form-data" method="post">
                  <input type="text" name="id" id="up_id" hidden>
                  <label for="">Name</label>
                  <input type="text" name="name" id="up_name" class="form-control"><br>
                  <label for="">Password</label>
                  <input type="password" name="password" id="up_pass" class="form-control" ><br>
                  <label for="">Profile Picture</label>
                  <input type="file" name="pic" id="up_pic" class="form-control"><br>
                  <button type="submit"   class="btn btn-primary"> Update</button>
                </form>
              </div>
              <div class="modal-footer">
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        
<!-- =====================  FOOTER SECTION  ===================== -->
<footer class="relative text-white font-sans overflow-hidden pt-12 pb-4 min-h-[auto]" 
style="background: linear-gradient(90deg,rgb(39, 204, 210),rgb(5, 105, 108))">

  <!-- Footer Content -->
  <div class="container mx-auto px-4 relative z-10">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-12 lg:gap-20">

      <!-- Branding Section -->
      <div class="md:col-span-2">
        <h3 class="text-3xl font-extrabold mb-4 border-b-2 border-white/30 pb-2 inline-block tracking-wide">
          BVS COMPUTER COACHING
        </h3>
        <p class="text-white/90 mb-4 leading-relaxed">
          Empowering students with essential tech skills for a brighter, future-proof career. 
          <span class="text-amber-400 font-medium">Join us and excel!</span>
        </p>

        <div class="flex space-x-6 text-2xl">
          <a href="#" class="hover:text-amber-400 transition transform hover:scale-110"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="hover:text-pink-400 transition transform hover:scale-110"><i class="fab fa-instagram"></i></a>
          <a href="#" class="hover:text-blue-400 transition transform hover:scale-110"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" class="hover:text-sky-400 transition transform hover:scale-110"><i class="fab fa-twitter"></i></a>
        </div>
      </div>

      <!-- Quick Links -->
      <div>
        <h4 class="text-xl font-bold mb-4 tracking-wider border-b border-white/40 pb-2">Quick Links</h4>
        <ul class="space-y-2 text-white/90">
          <li><a href="index.php" class="hover:text-amber-400 transition">🏠 Home</a></li>
          <li><a href="about.php" class="hover:text-amber-400 transition">ℹ️ About Us</a></li>
          <li><a href="courses.php" class="hover:text-amber-400 transition">📚 Courses</a></li>
          <li><a href="contact.php" class="hover:text-amber-400 transition">📞 Contact</a></li>
          
        </ul>
      </div>

      <!-- Contact Info -->
      <div>
        <h4 class="text-xl font-bold mb-4 tracking-wider border-b border-white/40 pb-2">Get In Touch</h4>
        <address class="space-y-2 not-italic text-white/90">
          <p class="flex items-start gap-3">
            <i class="fas fa-map-marker-alt mt-1 text-amber-400"></i>
            <span>BVS Coaching Behta Gokul Hardoi</span>
          </p>
          <p class="flex items-center gap-3">
            <i class="fas fa-phone-alt text-amber-400"></i>
            <a href="tel:+919876543210" class="hover:text-amber-400 transition">+91 91613 21374</a>
          </p>
          <p class="flex items-center gap-3">
            <i class="fas fa-envelope text-amber-400"></i>
            <a href="mailto:info@bvscoaching.com" class="hover:text-amber-400 transition">bvscomputer058@gmail.com</a>
          </p>
        </address>
      </div>
    </div>

    <hr class="mt-8 mb-4 border-white/40">

    <div class="text-center space-y-1">
      <p class="text-white/80 text-sm">
        &copy; <span id="currentYear">2025</span> <strong>BVS Computer Coaching</strong>. All rights reserved.
      </p>
      <p class="text-white/60 text-xs">
        💻 Designed & Coded with ❤️ by <span class="text-amber-400">Anurag</span>.
      </p>
    </div>
  </div>

</footer>







<!-- Initialize Lucide icons -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script src="/coaching/script2.js"></script>




<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
  const swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
</script>
