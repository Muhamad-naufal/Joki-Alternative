<?php
session_start();
include 'admin/config.php';

if (isset($_SESSION['user_id'])) {
  $id = $_SESSION['user_id'];
  $sql1 = mysqli_query($Connection, "SELECT * FROM `user` WHERE `user_id` = '$id'");
  $data1 = mysqli_fetch_array($sql1);
}

$sql = mysqli_query($Connection, "SELECT * FROM `portofolio`");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Portofolio - General Steel Indonesia</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet" />
  <link href="assets/css/tambahan.css" rel="stylesheet" />
</head>

<body class="projects-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img class="img-fluid " src="assets/img/logo_tulisan.png" alt="" />
        <div class="row">
          <p class="pt_name">General Steel <br /> Indonesia</p>
        </div>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li>
            <?php
            if (!isset($_SESSION['user_id'])) {
              echo '<li><a href="index.php" >Home</a></li>';
              echo '<li><a href="about.php">About</a></li>';
              echo '<li><a href="services.php">Product</a></li>';
              echo '<li><a href="projects.php" class="active">Portfolio</a></li>';
              echo '<li><a href="contact.php">Contact</a></li>';
            }
            ?>
            <?php
            if (isset($_SESSION['user_id'])) {
              // Assuming you have the user's profile picture URL stored in the session or database
              $profilePictureUrl = $data1['gambar'];
              echo '
              <li><a href="index.php">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="services.php">Product</a></li>
              <li><a href="projects.php" class="active">Portfolio</a></li>
              <li><a href="contact.php">Contact</a></li>
              <li><a href="services_login.php">Pengajuan</a></li>
              <li><a href="#">' . $data1['nama_lengkap'] . '</a></li>
              <div class="profile">
                  <img src="' . $profilePictureUrl . '" alt="Profile Picture">
                  <div class="dropdown-content">
                      <a href="profile.php">Profile</a>
                      <a href="histori.php">History</a>
                      <a href="proccess/logout.php">Logout</a>
                  </div>
              </div>';
            } else {
              echo '<a href="login/login.php">Login</a>';
            }
            ?>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">
    <!-- Page Title -->
    <div class="page-title" data-aos="fade" style="background-image: url(assets/img/page-title-bg.jpg)">
      <div class="container position-relative">
        <h1>Portofolio</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Portofolio</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- End Page Title -->

    <!-- Projects Section -->
    <section id="projects" class="projects section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Portofolio</h2>
        <p>
          Dibawah adalah beberapa projek yang sudah kami kerjakan dengan
          sangat baik dan rapih. Kami selalu memberikan yang terbaik untuk
          setiap projek yang kami kerjakan.
        </p>
      </div>
      <!-- End Section Title -->

      <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
            <!-- Portfolio Container -->
            <?php
            while ($data = mysqli_fetch_array($sql)) {
            ?>
              <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-remodeling">
                <div class="portfolio-content h-100">
                  <img src="admin/proccess/<?php echo $data['gambar'] ?>" class="img-fluid" alt="" />
                  <div class="portfolio-info">
                    <h4><?php echo $data['nama_pt'] ?></h4>
                    <p><?php echo $data['nama_porto'] ?></p>
                    <a href="admin/proccess/<?php echo $data['gambar'] ?>" title="<?php echo $data['nama_porto'] ?>" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    <a href="project-details.html" title="More Details" class="details-link" data-bs-toggle="modal" data-bs-target="#exampleModal" data-name="<?php echo $data['nama_porto'] ?>" data-image="admin/proccess/<?php echo $data['gambar'] ?>" data-description="<?php echo $data['ket_porto'] ?>"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
          <!-- End Portfolio Container -->
        </div>
      </div>
    </section>
    <!-- /Projects Section -->
  </main>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modalName"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4 col-12">
              <img src="" class="img-fluid" id="modalImage" style="max-width: 150px;" />
            </div>
            <div class="col-md-8 col-12">
              <p id="modalDescription" style="text-align: justify;"> This is the description text. If this text exceeds the height of the image, it will wrap to the next line and continue below the image, spanning the full width of the modal.</p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <footer id="footer" class="footer">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">General Steel Indonesia</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Jl. Utan Kayu Raya No.87</p>
            <p>indonesia, 13120</p>
            <p class="mt-3">
              <strong>Phone &nbsp;:</strong> <span><a href="https://wa.me/6281294443660">+62 812-9444-3660</a></span>
            </p>
            <p><strong>Email &nbsp;&nbsp; :</strong> <span><a href="mailto:general.stellindonesia@gmail.com">general.stellindonesia@gmail.com</a></span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-md-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="services.php">Product</a></li>
            <li><a href="projects.php">Portofolio</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>
        © <span>Copyright</span>
        <strong class="px-1 sitename">General Steel Indonesia</strong>
        <span>All Rights Reserved</span>
      </p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="#">GSI</a>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var exampleModal = document.getElementById('exampleModal');
      exampleModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var name = button.getAttribute('data-name');
        var image = button.getAttribute('data-image');
        var description = button.getAttribute('data-description');

        var modalName = document.getElementById('modalName');
        var modalImage = document.getElementById('modalImage');
        var modalDescription = document.getElementById('modalDescription');

        modalName.textContent = name;
        modalImage.src = image;
        modalDescription.textContent = description;
      });
    });
  </script>
  
</body>

</html>