<?php
session_start();

$default = 'assets/profile/default.jpg';
$imgFile = isset($_SESSION['user']['img']) ? $_SESSION['user']['img'] : '';
$imgPath = $imgFile ? 'assets/profile/' . $imgFile : $default;

// echo $imgPath;
// exit;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bvs Computer Coaching | Behta Gokul Hardoi</title>
  <link rel="icon" href="assets/logo.jpg">
  <link href="https://cdn.tailwindcss.com" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="/includes/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-o8C1fRz1k7I2d8xv6i+JXc0V5v0FjD4k9hQ9c6/3D2o9sUeT5u1T3+5PZz1Q9vW2FzM6E0P9r+zOq9sF1C+4wg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />


<style>
  .btn1{
    background: rgba(39, 204, 210,0.8);
}
  .user-image{
border-radius: 50%;
position: relative;
bottom: 1px;
}
.profile{
  display: flex;
  gap: 10px;
  bottom: 2px;
}

header {
  /* background-color:#F5FEFD; */
  font-weight: 500; 
  letter-spacing: 1px;
  text-shadow: 0px 0px 3px rgba(238, 235, 235, 0.2);
  background: linear-gradient(90deg,rgb(39, 204, 210),rgb(5, 105, 108)); /* contrast background */
  box-shadow: 0 4px 10px rgba(0,0,0,0.4); /* deep shadow for depth */
  font-size: 20px;
}

.mobile{
  /* background-color:#F5FEFD; */
  font-weight: 500; 
  letter-spacing: 1px;
  text-shadow: 0px 0px 3px rgba(238, 235, 235, 0.2);
  background: linear-gradient(90deg,rgb(39, 204, 210),rgb(5, 105, 108)); /* contrast background */
  box-shadow: 0 4px 10px rgba(0,0,0,0.4); /* deep shadow for depth */
  font-size: 20px;
}

.logo{
  position: fixed;
  z-index: 100;
  top: -50px;
  left: 20px;
  /* left: 50px; */
}

.tittle {
  position: relative;
  top: 12px;
}
.tittle:hover{
  opacity: 0.9;
}

.dropdown {
  list-style: none;
  padding-left: 0;
}
@media only screen and (max-width: 768px) {
  
  .logo{
  position: fixed;
  z-index: 100;
  top: -45px;
  left: -30px;
  width:200px;
  /* left: 50px; */
}

}

</style>
</head>

<body>
  <header class="header   fixed w-full z-50 top-0  ">

    <div class="container   mx-auto flex items-center justify-between p-1">

      <!-- Logo -->
      <div class="logo text-2xl font-bold p-4 d-flex gap-3 position-relative">
        <a href="index.php"><img src="assets/logo2.png"  width="230px" class="logo" alt=""></a>
        <h4  class="tittle" style="margin-left: 100px; margin-bottom:20px;"></h4>
      </div>

      <!-- Desktop Menu -->
      <nav class="hidden md:flex space-x-6 p-4 " style="color: white;">
        <a href="index.php" class="hover:text-gray-300">Home</a>
        <a href="about.php" class="hover:text-gray-300">About Us</a>
        <a href="course.php" class="hover:text-gray-300">Courses</a>
        <a href="contact.php" class="hover:text-gray-300">Contact</a>
        <?php if (isset($_SESSION['user']) and !empty($_SESSION['user'])) {
        ?>

        <li class="nav-item dropdown px-2">
         
  <a class="nav-link dropdown-toggle  d-flex align-items-center user-image" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
  <img src="<?php echo $imgPath; ?>" class="rounded-circle me-2" alt="User Image" width="30" height="30">

    <span><?= isset($_SESSION['user']) ? $_SESSION['user']['name'] : "user" ?></span>
  </a>
  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
    <!-- User header -->
    <li class="dropdown-header text-center">
      <img src="<?php echo $imgPath; ?>" class="rounded-circle mb-2 mx-auto" alt="User Image" width="80" height="80">
      <p class="mb-0"><?= $_SESSION['user']['name'] ?> - The Learner 👨‍💻</p>
      <small class="text-muted">Member since - <?= $_SESSION['user']['created_at'] ?></small>
    </li>
  

    <!-- Menu body >
    <li><hr class="dropdown-divider"></li>

    <!-- Footer -->
    <li class="d-flex justify-content-between gap-2 px-5 py-2 
    w-100" >
      <button type="button" onclick="profile(<?= $_SESSION['user']['id'] ?>)"  class="btn btn-outline-secondary btn-sm" style="width:150px;"> Update Profile</button>
      <?php if($_SESSION['email']=='admin@gmail.com'){ ?>
        <a href="admin/admin_dashboard.php" class="btn btn-outline-warning btn-sm text-center " style="width:150px;">Dashboard</a>
        <?php  } else{?>
          <a href="student/student_dashboard.php" class="btn btn-outline-warning btn-sm text-center" style="width:150px;">Dashboard</a>
          <?php }?>
      <a href="admin/logout.php" class="btn btn-outline-danger btn-sm" style="width:150px;" >Sign out</a>
    </li>
  </ul>
</li>
<?php } else { ?>
          <a href="login.php" class=" hover:text-gray-300 btn1 "><span class="btn" style=" padding:5px 10px; color:white;">Login</span></a>
        <?php } ?>
      </nav>
    

      <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <img src="../assets/profile/image.png" class="user-image" alt="User Image">
                <span class="hidden-xs">Anurag</span>
              </a> -->
      <!-- Mobile Menu Button -->
      <div class="md:hidden">
        <button id="menu-btn" class="focus:outline-none text-2xl">
          ☰
        </button>
      </div>

    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden bg-gray-700 md:hidden mobile ">
      <a href="index.php" class="block p-3 text-white border-b ">Home</a>
      <a href="about.php" class="block p-3 text-white border-b ">About Us</a>
      <a href="course.php" class="block p-3 text-white border-b ">Courses</a>
      <a href="contact.php" class="block p-3 text-white border-b ">Contact</a>
      <?php if (isset($_SESSION['user']) and !empty($_SESSION['user'])) {
        ?>

        <li class="nav-item dropdown">
      <li class="nav-item dropdown block p-3 text-white border-b border-gray-600 flex-end">
  <a class="nav-link dropdown-toggle d-flex align-items-center user-image" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
    <img src="<?php echo $imgPath; ?>"class="rounded-circle me-2 " alt="User Image" width="30" height="30" >
    <span><?= isset($_SESSION['user']) ? $_SESSION['user']['name'] : "Login" ?></span>
  </a>
  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
    <!-- User header -->
    <li class="dropdown-header text-center">
      <img src="<?php echo $imgPath; ?>" class="rounded-circle mb-2 mx-auto" alt="User Image" width="80" height="80">
      <p class="mb-0"><?= $_SESSION['user']['name'] ?> - The Learner 👨‍💻</p>
      <small class="text-muted">Member since - <?= $_SESSION['user']['created_at'] ?></small>
    </li>
  

    <!-- Menu body -->
    <li><hr class="dropdown-divider"></li>

    <!-- Footer -->
    <li class="d-flex justify-content-between px-3 pb-2 " style="width: 400px;">
      <button type="button"  class="btn btn-outline-secondary btn-sm" onclick="profile(<?= $_SESSION['user']['id'] ?>)" >Update Profile</button>
      <?php if($_SESSION['email']=='admin@gmail.com'){ ?>
        <a href="admin/admin_dashboard.php" class="btn btn-outline-warning btn-sm text-center " style="width:150px;">Dashboard</a>
        <?php  } else{?>
          <a href="student/student_dashboard.php" class="btn btn-outline-warning btn-sm text-center" style="width:150px;">Dashboard</a>
          <?php }?>
      <a href="admin/logout.php" class="btn btn-outline-danger btn-sm">Sign out</a>
    </li>
  </ul>
</li>
    
      <?php } else { ?>
          <a href="login.php" class="btn1 btn px-4 mx-2 p-2 m-1 text-white border-b  " style=" padding: 3px 5px; color:white;" class="btn1">Login</a>
        <?php } ?>



    </div>

<!-- Modal -->



   
    <script>
      const btn = document.getElementById('menu-btn');
      const menu = document.getElementById('mobile-menu');
      btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
      });
    </script>


  </header>


 





  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1200,
      easing: 'ease-out-cubic',
      once: true
    });





  </script>

