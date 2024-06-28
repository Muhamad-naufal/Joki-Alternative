<?php
session_start();
include 'proccess/config.php';
$id = $_SESSION['user_id'];

$syntax = mysqli_query($Connection, "SELECT * FROM `user` where `user_id` = '$id'");
$data = mysqli_fetch_array($syntax);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Profile - General Steel Indonesia</title>
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
  <link href="assets/css/profile.css" rel="stylesheet" />
  <style>
    /* Tambahan */
    .file-input-container {
      position: relative;
      width: 200px;
      height: 200px;
      border: 2px dashed #ccc;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      border-radius: 10px;
    }

    .file-input-container:hover {
      border-color: #999;
    }

    .file-input-container i {
      font-size: 50px;
      color: #ccc;
    }

    .file-input-container input[type="file"] {
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      opacity: 0;
      cursor: pointer;
    }
  </style>
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
              echo '<li><a href="index.php">Home</a></li>';
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
              <li><a href="index.php">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="services.php">Product</a></li>
              <li><a href="projects.php">Portfolio</a></li>
              <li><a href="contact.php">Contact</a></li>
              <li><a href="services_login.php">Pengajuan</a></li>
              <li><a href="#">' . $data['nama_lengkap'] . '</a></li>
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
        <h1>Profile</h1>
        <nav class="breadcrumbs">
        </nav>
      </div>
    </div>
    <!-- End Page Title -->

    <!-- Profile Section -->
    <section style="background-color: #f4f5f7; padding:0px">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col col-lg-6 mb-4 mb-lg-0">
            <div class="card mb-3" style="border-radius: .5rem;">
              <div class="row g-0">
                <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                  <img src="<?php echo $data['gambar']; ?>" style="max-width: 80px;" class="img-fluid my-5" alt="Profile Picture" />

                  <h5><?php echo $data['nama_lengkap']; ?></h5>
                  <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="far fa-edit mb-5" style="color: white;"></i>
                  </a>
                </div>
                <div class="col-md-8">
                  <div class="card-body p-4">
                    <h6>Information</h6>
                    <hr class="mt-0 mb-4">
                    <div class="row pt-1">
                      <div class="col-12 mb-3">
                        <h6>USERNAME</h6>
                        <p class="text-muted"><?php echo $data['user_name']; ?></p>
                        <h6>PHONE</h6>
                        <p class="text-muted"><?php echo $data['no_telp']; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Your Data</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="update_profile.php" method="post" enctype="multipart/form-data">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <div class="file-input-container mb-2 text-center">
                      <input type="file" id="game-image" name="game-image">
                      <img class="img-fluid" id="game-image-preview" src="<?php echo $data['gambar'] ?>" alt="Preview Gambar">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="hidden" name="user_id" value="<?php echo $data['user_id']; ?>">
                      <input name="username" id="username" type="text" class="form-control rounded-left mb-2" placeholder="Username" value="<?php echo $data['user_name']; ?>">
                      <input name="email" id="email" type="text" class="form-control rounded-left mb-2" placeholder="Email" value="<?php echo $data['nama_lengkap']; ?>">
                      <input name="no_telp" id="no_telp" type="text" class="form-control rounded-left mb-2" placeholder="No Telp" value="<?php echo $data['no_telp']; ?>">
                      <input name="new_password" id="new_password" type="password" class="form-control rounded-left mb-2" value="<?php echo $data['password']; ?>" placeholder="New Password">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </form>
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
  <!-- jQuery dan Bootstrap Icons (untuk ikona) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <script>
    document.getElementById('game-image').addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          const preview = document.getElementById('game-image-preview');
          preview.src = e.target.result;
          preview.style.display = 'block';
          const icon = document.querySelector('.file-input-container i');
          icon.style.display = 'none';
        };
        reader.readAsDataURL(file);
      }
    });
  </script>

</body>

</html>