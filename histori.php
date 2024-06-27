<?php
session_start();
include 'proccess/config.php';
$id = $_SESSION['user_id'];
$sql = mysqli_query($Connection, "SELECT * FROM `user` WHERE `user_id` = '$id'");
$data = mysqli_fetch_array($sql);

$sql1 = "SELECT * FROM pengajuan WHERE id_user = '$id' ORDER BY CASE WHEN `status` = 'pending' THEN 1 WHEN `status` = 'proccess' THEN 2 ELSE 3 END, created_at DESC";
$result = mysqli_query($Connection, $sql1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Histori - General Steel Indonesia</title>
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

<body class="about-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img class="img-fluid" src="assets/img/logo_tulisan.png" alt="" />
        <div class="row">
          <p class="pt_name">
            General Steel <br />
            Indonesia
          </p>
        </div>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li>
            <?php
            if (!isset($_SESSION['user_id'])) {
              echo '<li><a href="index.php" class="active">Home</a></li>';
              echo '<li><a href="about.php">About</a></li>';
              echo '<li><a href="services.php">Product</a></li>';
              echo '<li><a href="projects.php">Portfolio</a></li>';
              echo '<li><a href="contact.php">Contact</a></li>';
            }
            ?>
            <?php
            if (isset($_SESSION['user_id'])) {
              $profilePictureUrl = $data['gambar'];
              echo '
              <li><a href="index.php" class="active">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="services.php">Product</a></li>
              <li><a href="projects.php">Portfolio</a></li>
              <li><a href="contact.php">Contact</a></li>
              <li><a href="services_login.php">Pengajuan</a></li>
              <li>' . $data['user_name'] . '</li>
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
        <h1>Histori</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Histori</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section">
      <div class="container">
        <div class="row position-relative">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Ket Penawaran</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Ket Penawaran</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                  $product_id = $row['id_produk'];
                  $productQuery = mysqli_query($Connection, "SELECT nama_produk FROM product WHERE product_id = '$product_id'");
                  $productData = mysqli_fetch_assoc($productQuery);
                  $product_name = $productData['nama_produk'];
                ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['created_at'] ?></td>
                    <td><?php echo $product_name ?></td>
                    <td><?php echo $row['jumlah'] ?></td>
                    <td><?php echo $row['deskripsi'] ?></td>
                  </tr>
                <?php
                }
                ?>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!-- /About Section -->
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
</body>

</html>