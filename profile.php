<?php
session_start();
include 'proccess/config.php';
$username = $_SESSION['user_name'];
$userQuery = mysqli_query($Connection, "SELECT user_id FROM `user` WHERE `user_name` = '$username'");
$userData = mysqli_fetch_assoc($userQuery);
$id_user = $userData['user_id'];

$sql = "SELECT * FROM pengajuan WHERE id_user = '$id_user' ORDER BY CASE WHEN `status` = 'pending' THEN 1 WHEN `status` = 'proccess' THEN 2 ELSE 3 END, created_at DESC";
$result = mysqli_query($Connection, $sql);

$syntax = mysqli_query($Connection, "SELECT * FROM `user` where `user_name` = '$username'");
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
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        <ul>
          <li><a href="index.php">Home</a></li>
          <?php
          if (!isset($_SESSION['user_name'])) {
            echo '<li><a href="about.php">About</a></li>';
            echo '<li><a href="projects.php">Portfolio</a></li>';
            echo '<li><a href="services.php">Product</a></li>';
            echo '<li><a href="contact.php">Contact</a></li>';
          }
          ?>
          <li>
            <?php
            if (isset($_SESSION['user_name'])) {
              // Assuming you have the user's profile picture URL stored in the session or database
              $username = $_SESSION['user_name'];
              $sql4 = mysqli_query($Connection, "SELECT * FROM `user` WHERE `user_name` = '$username'");
              $data4 = mysqli_fetch_array($sql4);
              $profilePictureUrl = 'dashboard/proccess/' . $data4['gambar'];
              echo '
              <li><a href="services_login.php">Pengajuan</a></li>
              <div class="profile">
                  <img src="' . $profilePictureUrl . '" alt="Profile Picture">
                  <div class="dropdown-content">
                      <a href="profile.php">Profile</a>
                      <a href="histori.php">History</a>
                      <a href="proccess/logout.php">Logout</a>
                  </div>
              </div>';
            } else {
              echo '<a href="login.php">Login</a>';
            }
            ?>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <main class="main">
    <!-- Page Title -->
    <div class="page-title" data-aos="fade" style="background-image: url(assets/img/page-title-bg.jpg)">
      <div class="container position-relative">
        <h1>Profile</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Profile</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section">
      <div class="container">
        <div class="row position-relative">
          <div class="section-title" data-aos="fade-up">
            <h2>Profile</h2>
          </div>
          <div class="col-md-6">
            <img src="<?php echo $data['gambar']; ?>" class="img-fluid" alt="Profile Picture" />
          </div>
          <div class="col-md-6">
            <div class="about-text" data-aos="fade-up">
              <p>
                <strong>Username:</strong> <?php echo $data['user_name']; ?>
              </p>
              <p>
                <strong>Email:</strong> <?php echo $data['email']; ?>
              </p>
              <p>
                <strong>Phone:</strong> <?php echo $data['no_telp']; ?>
              </p>
            </div>
          </div>
        </div>

        <div class="section-title" data-aos="fade-up">
          <h2>Comments</h2>
        </div>
        <form action="proccess/tambah_komen.php" method="post">
          <div class="row">
            <div class="col-md-6">
              <!-- Form Komentar -->
              <form id="commentForm" action="proccess/tambah_komen.php" method="post">
                <input type="hidden" name="user_id" value="<?php echo $id_user; ?>">
                <div class="form-group">
                  <label for="quantity">Bintang</label>
                  <div class="input-group">
                    <button class="btn btn-outline-secondary minus-btn" type="button"><i class="bi bi-dash"></i></button>
                    <input type="number" class="form-control quantity-input" name="quantity" value="0" min="0">
                    <button class="btn btn-outline-secondary plus-btn" type="button"><i class="bi bi-plus"></i></button>
                  </div>
                </div>

                <!-- Tambahkan script jQuery untuk mengatur interaksi -->
                <script>
                  $(document).ready(function() {
                    // Fungsi untuk menambah nilai
                    $('.plus-btn').click(function() {
                      var input = $(this).siblings('.quantity-input');
                      var currentValue = parseInt(input.val());
                      input.val(currentValue + 1).trigger('change'); // Trigger event 'change' saat nilai berubah
                    });

                    // Fungsi untuk mengurangi nilai
                    $('.minus-btn').click(function() {
                      var input = $(this).siblings('.quantity-input');
                      var currentValue = parseInt(input.val());
                      if (currentValue > 0) {
                        input.val(currentValue - 1).trigger('change'); // Trigger event 'change' saat nilai berubah
                      }
                    });

                    // Animasi saat nilai input berubah
                    $('.quantity-input').on('change', function() {
                      $(this).animate({
                        opacity: '0.5'
                      }, 100, function() {
                        $(this).animate({
                          opacity: '1'
                        }, 100);
                      });
                    });
                  });
                </script>

                <!-- Tambahkan CSS untuk gaya tambahan -->
                <style>
                  .input-group {
                    position: relative;
                  }

                  .input-group .btn {
                    border-radius: 0;
                  }

                  .quantity-input {
                    text-align: center;
                  }

                  .input-group .btn i {
                    font-size: 1rem;
                  }
                </style>

                <div class="form-group mt-3">
                  <label for="comment"><i class="bi bi-chat-left-text"></i> Comment</label>
                  <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Write your comment here..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary"><i class="bi bi-check2"></i> Submit</button>
              </form>
            </div>
            <div class="col-md-6">
              <!-- Daftar Komentar -->
              <div class="mb-2" style="max-height: 250px; overflow-y: auto;">
                <div id="commentList" class="mt-4">
                  <!-- Komentar akan dimasukkan di sini menggunakan AJAX -->
                </div>
              </div>
            </div>
          </div>
        </form>

        <!-- Tambahkan CSS untuk desain tambahan -->
        <style>
          .form-group label {
            font-weight: bold;
          }

          .btn i {
            margin-right: 5px;
          }
        </style>

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
  <!-- jQuery dan Bootstrap Icons (untuk ikona) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <script>
    $(document).ready(function() {
      // Function untuk menampilkan semua komentar saat halaman dimuat
      fetchComments();

      // Event listener untuk form komentar
      $('#commentForm').submit(function(event) {
        event.preventDefault(); // Menghentikan pengiriman form secara default

        // Mengambil data form
        var formData = $(this).serialize();

        // Kirim data ke server menggunakan AJAX
        $.ajax({
          type: 'POST',
          url: $(this).attr('action'),
          data: formData,
          success: function(response) {
            // Tampilkan pesan sukses (opsional)
            alert('Comment submitted successfully');

            // Kosongkan textarea setelah submit
            $('#comment').val('');

            // Memanggil kembali fungsi untuk menampilkan semua komentar
            fetchComments();
          },
          error: function(xhr, status, error) {
            // Tampilkan pesan error (opsional)
            alert('Error submitting comment: ' + xhr.responseText);
          }
        });
      });

      // Function untuk mengambil dan menampilkan semua komentar dari server
      function fetchComments() {
        $.ajax({
          url: 'proccess/get_komen.php', // Ganti dengan file PHP yang mengambil komentar dari database
          type: 'GET',
          success: function(response) {
            $('#commentList').html(response); // Menampilkan komentar di dalam div #commentList
          },
          error: function(xhr, status, error) {
            // Tampilkan pesan error jika gagal mengambil komentar (opsional)
            console.error('Error fetching comments: ' + error);
          }
        });
      }
    });
  </script>

  <!-- Script JavaScript untuk menangani interaksi tombol + dan - -->
  <script>
    $(document).ready(function() {
      // Mengatur nilai awal quantity pada load halaman
      var quantity = 0;

      // Tombol plus
      $('.plus-btn').click(function() {
        quantity++;
        $('.quantity-input').val(quantity);
      });

      // Tombol minus
      $('.minus-btn').click(function() {
        if (quantity > 0) {
          quantity--;
          $('.quantity-input').val(quantity);
        }
      });

      // Submit form menggunakan AJAX
      $('#commentForm').submit(function(event) {
        event.preventDefault(); // Menghentikan pengiriman form secara default

        // Mengambil data form
        var formData = $(this).serialize();

        // Kirim data ke server menggunakan AJAX
        $.ajax({
          type: 'POST',
          url: $(this).attr('action'),
          data: formData,
          success: function(response) {
            // Tampilkan pesan sukses (opsional)
            alert('Comment submitted successfully');

            // Kosongkan textarea setelah submit
            $('#comment').val('');

            // Reset nilai quantity ke 0
            quantity = 0;
            $('.quantity-input').val(quantity);

            // Memanggil kembali fungsi untuk menampilkan semua komentar
            fetchComments();
          },
          error: function(xhr, status, error) {
            // Tampilkan pesan error (opsional)
            alert('Error submitting comment: ' + xhr.responseText);
          }
        });
      });

      // Function untuk mengambil dan menampilkan semua komentar dari server
      function fetchComments() {
        $.ajax({
          url: 'proccess/get_komen.php', // Ganti dengan file PHP yang mengambil komentar dari database
          type: 'GET',
          success: function(response) {
            $('#commentList').html(response); // Menampilkan komentar di dalam div #commentList
          },
          error: function(xhr, status, error) {
            // Tampilkan pesan error jika gagal mengambil komentar (opsional)
            console.error('Error fetching comments: ' + error);
          }
        });
      }
    });
  </script>

</body>

</html>