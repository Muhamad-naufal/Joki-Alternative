<?php
session_start();
include 'proccess/config.php';

if (isset($_SESSION['user_id'])) {
  $sql1 = mysqli_query($Connection, "SELECT * FROM `user` WHERE `user_id` = $_SESSION[user_id]");
  $data1 = mysqli_fetch_array($sql1);
}

$sql = mysqli_query($Connection, "SELECT * FROM komentar");
$data = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>PT GENERAL STEEL INDONESIA</title>
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
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet" />
  <link href="assets/css/tambahan.css" rel="stylesheet" />
  <style>
    .star-rating {
      display: flex;
      flex-direction: row-reverse;
      justify-content: left;
      margin-left: 15px;
    }

    .star-rating input[type="radio"] {
      display: none;
    }

    /* Bintang penuh */
    .star-rating label {
      font-size: 20px;
      color: #ccc;
      cursor: pointer;
      margin-left: 2px
      /* Menambahkan shadow kuning */
    }

    .star-rating label:hover,
    .star-rating label:hover~label,
    .star-rating input[type="radio"]:checked~label {
      color: #f5c518;
      /* Warna saat hover atau dipilih */
    }

    .btn i {
      margin-right: 5px;
    }

    .form-group label {
      font-weight: bold;
    }

    #commentList {
      max-height: 250px;
      overflow-y: auto;
    }

    .section-title h2 {
      margin-bottom: 20px;
      font-size: 28px;
      font-weight: bold;
      position: relative;
      padding-bottom: 15px;
    }

    .about.section {
      padding: 60px 0;
    }
  </style>
</head>

<body class="index-page">
  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
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
              echo '<li><a href="index.php" class="active">Home</a></li>';
              echo '<li><a href="about.php">About</a></li>';
              echo '<li><a href="services.php">Product</a></li>';
              echo '<li><a href="projects.php">Portfolio</a></li>';
              echo '<li><a href="contact.php">Contact</a></li>';
            }
            ?>
            <?php
            if (isset($_SESSION['user_id'])) {
              // Assuming you have the user's profile picture URL stored in the session or database
              $profilePictureUrl = $data1['gambar'];
              echo '
              <li><a href="index.php" class="active">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="services.php">Product</a></li>
              <li><a href="projects.php">Portfolio</a></li>
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
  <!-- End Header -->

  <!-- ======= Main Section ======= -->
  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="info d-flex align-items-center">
        <div class="container">
          <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6 text-center">
              <h2>Welcome to General Steel Indonesia</h2>
              <p>
                "Di General Steel Indonesia, kami mewujudkan mimpi dan
                aspirasi melalui setiap proyek dengan fokus pada kualitas,
                inovasi, dan keberlanjutan. Tim ahli kami bekerja dengan
                integritas dan ketelitian untuk memastikan standar tertinggi
                dari perencanaan hingga penyelesaian."
              </p>
              <a href="https://wa.me/6281294443660" class="btn-get-started"><img src="assets/img/download.png" alt="" style="max-width: 150px;" class="img-fluid" /></a>
            </div>
          </div>
        </div>
      </div>

      <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-item">
          <img src="assets/img/hero-carousel/hero-carousel-1.jpg" alt="" />
        </div>

        <div class="carousel-item active">
          <img src="assets/img/hero-carousel/hero-carousel-2.jpg" alt="" />
        </div>

        <div class="carousel-item">
          <img src="assets/img/hero-carousel/hero-carousel-3.jpg" alt="" />
        </div>

        <div class="carousel-item">
          <img src="assets/img/hero-carousel/hero-carousel-4.jpg" alt="" />
        </div>

        <div class="carousel-item">
          <img src="assets/img/hero-carousel/hero-carousel-5.jpg" alt="" />
        </div>

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>
      </div>
    </section>
    <!-- /Hero Section -->

    <!-- Constructions Section -->
    <section id="constructions" class="constructions section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Constructions</h2>
        <p>
          Perusahaan kami dikenal karena perhatiannya yang cermat terhadap
          detail dan pelaksanaan proyek yang cermat. Kami tidak meninggalkan
          kebutuhan bisnis yang terlewat dan memastikan bahwa setiap aspek
          proyek ditangani dengan sangat hati-hati.
        </p>
      </div>
      <!-- End Section Title -->

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card-item">
              <div class="row">
                <div class="col-xl-5">
                  <div class="card-bg">
                    <img src="assets/img/constructions-1.jpg" alt="" />
                  </div>
                </div>
                <div class="col-xl-7 d-flex align-items-center">
                  <div class="card-body">
                    <h4 class="card-title">Perencanaan dan Desain</h4>
                    <p style="text-align: justify;">
                      Tahap perencanaan dan desain melibatkan studi kelayakan
                      untuk menilai aspek finansial, teknis, dan hukum proyek,
                      serta pengembangan konsep dan desain detail yang
                      mencakup gambar teknik dan spesifikasi material.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Card Item -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card-item">
              <div class="row">
                <div class="col-xl-5">
                  <div class="card-bg">
                    <img src="assets/img/constructions-2.jpg" alt="" />
                  </div>
                </div>
                <div class="col-xl-7 d-flex align-items-center">
                  <div class="card-body">
                    <h4 class="card-title">Pengadaan</h4>
                    <p style="text-align: justify;">
                      Proses pengadaan dalam proyek konstruksi melibatkan
                      beberapa langkah penting untuk memastikan semua bahan
                      dan jasa yang diperlukan tersedia tepat waktu dan sesuai
                      anggaran.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Card Item -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="card-item">
              <div class="row">
                <div class="col-xl-5">
                  <div class="card-bg">
                    <img src="assets/img/constructions-3.jpg" alt="" />
                  </div>
                </div>
                <div class="col-xl-7 d-flex align-items-center">
                  <div class="card-body">
                    <h4 class="card-title">Konstruksi</h4>
                    <p style="text-align: justify;">
                      Proses konstruksi melibatkan beberapa tahapan utama yang
                      bertujuan untuk mewujudkan rencana desain menjadi
                      bangunan fisik
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Card Item -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="card-item">
              <div class="row">
                <div class="col-xl-5">
                  <div class="card-bg">
                    <img src="assets/img/constructions-4.jpg" alt="" />
                  </div>
                </div>
                <div class="col-xl-7 d-flex align-items-center">
                  <div class="card-body">
                    <h4 class="card-title">
                      Penyelesaian dan Pengiriman Proyek
                    </h4>
                    <p style="text-align: justify;">
                      Tahap penyelesaian dan pengiriman proyek melibatkan
                      penyelesaian pekerjaan konstruksi, pengujian dan
                      pemeriksaan, serta penyerahan proyek kepada pemilik.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Card Item -->
        </div>
      </div>
    </section>
    <!-- /Constructions Section -->

    <!-- Alt Services Section -->
    <section id="alt-services" class="alt-services section">
      <div class="container">
        <div class="row justify-content-around gy-4">
          <div class="features-image col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/alt-services.jpg" alt="" />
          </div>

          <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <h3>Perizinan</h3>
            <p style="text-align: justify;">
              Kami sudah mendapatkan banyak izin dan legalitas dari pemerintah
              untuk menjalankan bisnis ini. Kami juga sudah mendapatkan
              sertifikat dari beberapa lembaga yang berwenang.
            </p>

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-book flex-shrink-0"></i>
              <div>
                <h4>
                  <a href="" class="stretched-link">Akta Pendirian Perseroan Terbatas: No. 117 oleh Notaris
                    IMRON, SH. Tanggal 29 Juli 2020
                  </a>
                </h4>
              </div>
            </div>
            <!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-book flex-shrink-0"></i>
              <div>
                <h4>
                  <a href="" class="stretched-link">Nomor Induk Berusaha (NIB): 0220303830751
                  </a>
                </h4>
              </div>
            </div>
            <!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-book flex-shrink-0"></i>
              <div>
                <h4>
                  <a href="" class="stretched-link">Nomor Pokok Wajib Pajak (NPWP): 95.553.930.9-001.000
                  </a>
                </h4>
              </div>
            </div>
            <!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="600">
              <i class="bi bi-book flex-shrink-0"></i>
              <div>
                <h4>
                  <a href="" class="stretched-link">Surat Pengukuhan Pengusaha Kena Pajak:
                    S-146PKP/WPJ.20/KP.0103/2020
                  </a>
                </h4>
              </div>
            </div>
            <!-- End Icon Box -->
            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="600">
              <i class="bi bi-book flex-shrink-0"></i>
              <div>
                <h4>
                  <a href="" class="stretched-link">Perizinan Usaha: Surat Izin Usaha Perdagangan dan Surat
                    Izin Lokasi Usaha
                  </a>
                </h4>
              </div>
            </div>
            <!-- End Icon Box -->
          </div>
        </div>
      </div>
    </section>
    <!-- /Alt Services Section -->

    <!-- Comments Section -->
    <?php
    if (isset($_SESSION['user_id'])) {
    ?>
      <!-- Comments Section -->
      <section id="about" class="about section">
        <div class="container">
          <div class="section-title" data-aos="fade-up">
            <h2>Comments</h2>
          </div>
          <form action="proccess/tambah_komen.php" method="post">
            <div class="row">
              <div class="col-md-6">
                <!-- Form Komentar -->
                <form id="commentForm" action="proccess/tambah_komen.php" method="post">
                  <input type="hidden" name="user_id" value="<?php echo $id; ?>">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-2">
                        <img src="<?php echo $data1['gambar']; ?>" alt="Profile Picture" style="height: 80px; width:80px; border-radius:50%; " srcset="">
                      </div>
                      <div class="col-md-6">
                        <label for="comment"><i class="bi bi-chat-left-text"></i> Add Comment</label>
                        <div class="star-rating">
                          <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 stars">&#9733;</label>
                          <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 stars">&#9733;</label>
                          <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 stars">&#9733;</label>
                          <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 stars">&#9733;</label>
                          <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star">&#9733;</label>
                        </div>

                        <!-- Tambahkan script jQuery untuk mengatur interaksi -->
                        <script>
                          $(document).ready(function() {
                            // Logika untuk menangani klik pada label bintang
                            $('.star-rating label').click(function() {
                              var rating = $(this).prev('input').val();
                              $(this).parent().find('input').prop('checked', false);
                              $(this).prev('input').prop('checked', true);
                            });
                          });
                        </script>
                        <div class="form-group mt-3">
                          <input type="hidden" name="user" id="user" value="<?php echo $data1['user_name'] ?>">
                          <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Write your comment here..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-check2"></i> Submit</button>
                      </div>
                    </div>
                  </div>
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
      <!-- Comments Section -->
    <?php
    }
    ?>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>
          Ini adalah beberapa testimoni dari pelanggan kami yang puas
        </p>
      </div>
      <!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 2,
                  "spaceBetween": 20
                }
              }
            }
          </script>

          <div class="swiper-wrapper">
            <?php
            $sql = mysqli_query($Connection, "SELECT * FROM komentar ORDER BY created_at DESC LIMIT 5");
            while ($data = mysqli_fetch_array($sql)) {
            ?>
              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <img src="<?php echo $data['gambar'] ?>" class="testimonial-img" alt="" />
                    <h3><?php echo $data['nama_user'] ?></h3>
                    <h4><?php
                        // Asumsikan $data['created_at'] adalah timestamp yang valid
                        $timestamp = strtotime($data['created_at']);
                        $formatted_date = date('d F Y, H:i', $timestamp);

                        // Mengubah nama bulan ke bahasa Indonesia
                        $bulan = array(
                          'January' => 'Januari',
                          'February' => 'Februari',
                          'March' => 'Maret',
                          'April' => 'April',
                          'May' => 'Mei',
                          'June' => 'Juni',
                          'July' => 'Juli',
                          'August' => 'Agustus',
                          'September' => 'September',
                          'October' => 'Oktober',
                          'November' => 'November',
                          'December' => 'Desember'
                        );

                        foreach ($bulan as $en => $id) {
                          $formatted_date = str_replace($en, $id, $formatted_date);
                        }

                        echo $formatted_date;
                        ?>
                    </h4>
                    <div class="stars">
                      <?php
                      $bintang = $data['bintang']; // Ambil jumlah bintang dari database
                      ?>

                      <!-- Menampilkan bintang -->
                      <div class="bintang-container">
                        <?php
                        for ($i = 0; $i < $bintang; $i++) {
                          echo '<i class="fa-solid fa-star" style="color: #FFD43B;"></i>'; // Unicode karakter untuk bintang penuh
                        }
                        for ($i = $bintang; $i < 5; $i++) {
                          echo "<i class='fa-regular fa-star' style='color: #FFD43B;'></i>"; // Unicode karakter untuk bintang kosong
                        }
                        ?>
                      </div>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <span><?php echo $data['isi_komen'] ?></span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div>
              </div>
            <?php } ?>
            <!-- End testimonial item -->
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>
    <!-- /Testimonials Section -->

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
    <script src="https://kit.fontawesome.com/25db4f44a1.js" crossorigin="anonymous"></script>
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