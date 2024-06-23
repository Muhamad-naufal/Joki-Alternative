<?php
session_start();
include 'admin/config.php';
$sql = mysqli_query($Connection, "SELECT * FROM `product`");
$data = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Product - General Steel Indonesia</title>
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
  <style>
    .btn-get-ajukan {
      color: var(--contrast-color);
      font-family: var(--heading-font);
      font-weight: 500;
      font-size: 16px;
      letter-spacing: 1px;
      display: inline-block;
      padding: 12px 40px;
      border-radius: 50px;
      transition: 0.5s;
      margin: 10px;
      border: 2px solid var(--accent-color);
    }

    .btn-get-ajukan:hover {
      background: var(--accent-color);
      color: var(--contrast-color);
    }
  </style>
</head>

<body class="services-page">
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
            if (!isset($_SESSION['user_name'])) {
              echo '<li><a href="index.php">Home</a></li>';
              echo '<li><a href="about.php">About</a></li>';
              echo '<li><a href="services.php" class="active">Product</a></li>';
              echo '<li><a href="projects.php">Portfolio</a></li>';
              echo '<li><a href="contact.php">Contact</a></li>';
            }
            ?>
            <?php
            if (isset($_SESSION['user_name'])) {
              // Assuming you have the user's profile picture URL stored in the session or database
              $username = $_SESSION['user_name'];
              $sql2 = mysqli_query($Connection, "SELECT * FROM `user` WHERE `user_name` = '$username'");
              $data2 = mysqli_fetch_array($sql2);
              $profilePictureUrl = $data2['gambar'];
              echo '
              <li><a href="index.php">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="services.php" class="active">Product</a></li>
              <li><a href="projects.php">Portfolio</a></li>
              <li><a href="contact.php">Contact</a></li>
              <li><a href="services_login.php">Pengajuan</a></li>
              <li>' . $username . '</li>
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
        <h1>Product</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Product</li>
          </ol>
        </nav>
        <div class="mt-3">
          <a href="login/login.php" class="btn-get-ajukan">Ajukan Penawaran</a>
        </div>
      </div>
    </div>
    <!-- End Page Title -->

    <!-- Services Section -->
    <section id="services" class="services section">
      <div class="container">
        <div class="row gy-4">
          <?php
          function limit_words($string, $word_limit)
          {
            $words = explode(' ', $string);
            return implode(' ', array_slice($words, 0, $word_limit));
          }
          
          $limited_text = limit_words($data['ket_produk'], 10);
          while ($data1 = mysqli_fetch_array($sql)) {
          ?>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="service-item position-relative">
                <img src="admin/proccess/<?php echo $data1['gambar'] ?>" style="max-width: 200px;" class="img-fluid" />
                <h3><?php echo $data1['nama_produk'] ?></h3>
                <p>
                  <?php
                  echo $limited_text;
                  ?>
                </p>
                <a href="#" class="readmore stretched-link" data-bs-toggle="modal" data-bs-target="#exampleModal" data-name="<?php echo $data1['nama_produk'] ?>" data-image="admin/proccess/<?php echo $data1['gambar'] ?>" data-description="<?php echo $data1['ket_produk'] ?>">Read more <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </section>
    <!-- /Services Section -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Product Details</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <img src="" class="img-fluid" id="modalImage" />
            <h3 id="modalName"></h3>
            <p id="modalDescription"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </main>

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
              <strong>Phone:</strong> <span>+1 5589 55488 55</span>
            </p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
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
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="services.html">Product</a></li>
            <li><a href="projects.html">Portofolio</a></li>
            <li><a href="contact.html">Contact</a></li>
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
      <div class="credits">Designed by <a href="#">GSI</a></div>
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