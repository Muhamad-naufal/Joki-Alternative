<?php
session_start();
include('proccess/config.php');
if (isset($_SESSION['user_id'])) {
  $id = $_SESSION['user_id'];
  $sql = mysqli_query($Connection, "SELECT * FROM `user` WHERE `user_id` = '$id'");
  $data = mysqli_fetch_array($sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>About - General Steel Indonesia</title>
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
              echo '<li><a href="index.php">Home</a></li>';
              echo '<li><a href="about.php" class="active">About</a></li>';
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
              <li><a href="about.php" class="active">About</a></li>
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
        <h1>About</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">About</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section">
      <div class="container">
        <div class="row position-relative">
          <div class="col-lg-7 about-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/about.jpg" />
          </div>

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
            <h2 class="inner-title">PT General Steel Indonesia</h2>
            <div class="our-story">
              <h4>Est 2020</h4>
              <h3>Our Story</h3>
              <p class="about-text">
                PT. GENERAL STEEL INDONESIA adalah perusahaan yang bergerak di
                bidang pengepasaran usaha yang pada penyedia layanan swasta
                nasional yang khusus difokuskan kebutuhan penyediaan material
                konstruksi dan Material Untuk Konstruksi (Steel Trading &
                Contructions), Jasa Konsultansi, dan Bisnis distribusi
                Pengadaan Barang terlah melakukan usaha bisnisnya di jakarta
                sejak tahun 2020. Bergerak dalam bidang Kontruksi Baja kami
                telah dipercaya oleh pelanggan. GENERAL STEEL INDONESIA
                Notaris yang dibuat oleh notaris IRMA S.H., Notaris. Komitmen
                PT. GENERAL STEEL INDONESIA untuk melayani seluruh customer
                tentunya adalah akan memberi nilai lebih dengan kualitas dan
                komitmen bersama adalah anak konglomerat, bagunan, yoh
                menunjang seluruh kebutuhan bahan material dalam bidang
                konstruksi kualitas produk untuk
              </p>
              <div class="watch-video d-flex align-items-center position-relative">
                <i class="bi bi-play-circle"></i>
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox stretched-link">Watch Video</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /About Section -->

    <!-- Stats Counter Section -->
    <section id="stats-counter" class="stats-counter section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Stats</h2>
        <p>
          Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
          consectetur velit
        </p>
      </div>
      <!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                <p>Happy Clients</p>
              </div>
            </div>
          </div>
          <!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-journal-richtext color-orange flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                <p>Projects</p>
              </div>
            </div>
          </div>
          <!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-headset color-green flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                <p>Hours Of Support</p>
              </div>
            </div>
          </div>
          <!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-people color-pink flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                <p>Hard Workers</p>
              </div>
            </div>
          </div>
          <!-- End Stats Item -->
        </div>
      </div>
    </section>
    <!-- /Stats Counter Section -->

    <!-- Alt Services 2 Section -->
    <section id="alt-services-2" class="alt-services-2 section">
      <div class="container">
        <div class="row justify-content-around gy-4">
          <div class="col-lg-6 d-flex flex-column justify-content-center order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
            <h3>Visi & Misi GSI</h3>
            <div class="row">
              <div class="col-lg-6 icon-box d-flex">
                <i class="bi bi-easel flex-shrink-0"></i>
                <div>
                  <h4>VISI</h4>
                  <p style="text-align: justify;">
                    Menjadi Perusahaan Distributor Yang Handal dan dapat
                    diandalkan oleh seluruh Konsumen dalam memenuhi kebutuhan
                    Material Kontruksi
                  </p>
                </div>
              </div>
              <!-- End Icon Box -->

              <div class="col-lg-6 icon-box d-flex">
                <i class="bi bi-patch-check flex-shrink-0"></i>
                <div>
                  <h4>MISI</h4>
                  <ul style="text-align: justify;">
                    <li><i></i>Menjaga Kualitas Produk yang kami Jual</li>
                    <li>
                      <i></i>Meningkatkan SDM yang bermutu dalam proses
                      penjualan
                    </li>
                    <li>
                      <i></i>Meningkatkan daya saing perusahaan dalam industri
                      Jasa kontruksi
                    </li>
                    <li>
                      <i></i>Jika ada bagian lain dari gambar yang ingin Anda
                      tuliskan ulang atau jika Anda memerlukan bantuan lebih
                      lanjut, silakan beritahu saya!
                    </li>
                  </ul>
                </div>
              </div>
              <!-- End Icon Box -->
            </div>
          </div>

          <div class="features-image col-lg-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
            <img src="assets/img/constructions-1.jpg" alt="" />
          </div>
        </div>
      </div>
    </section>
    <!-- /Alt Services 2 Section -->

    <!-- Alt Services 2 Section -->
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
    <!-- /Alt Services 2 Section -->

    <!-- Team Section -->
    <section id="team" class="team section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Team</h2>
        <p>
          Kami Memiliki Team yang sudah berpengalaman dalam bidangnya masing -
          masing
        </p>
      </div>
      <!-- End Section Title -->

      <div class="container">
        <div class="row gy-5">
          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
            <div class="member-img">
              <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="" />
              <div class="social">
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Roy Jal</h4>
              <span>Komisaris Utama</span>
              <p>
                Aliquam iure quaerat voluptatem praesentium possimus unde
                laudantium vel dolorum distinctio dire flow
              </p>
            </div>
          </div>
          <!-- End Team Member -->

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="200">
            <div class="member-img">
              <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="" />
              <div class="social">
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Lukman Fahlevi S</h4>
              <span>Direktur Utama</span>
              <p>
                Labore ipsam sit consequatur exercitationem rerum laboriosam
                laudantium aut quod dolores exercitationem ut
              </p>
            </div>
          </div>
          <!-- End Team Member -->

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="300">
            <div class="member-img">
              <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="" />
              <div class="social">
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Aproyani Windarsih</h4>
              <span>Direktur Operasional</span>
              <p>
                Illum minima ea autem doloremque ipsum quidem quas aspernatur
                modi ut praesentium vel tque sed facilis at qui
              </p>
            </div>
          </div>
          <!-- End Team Member -->
        </div>
      </div>
    </section>
    <!-- /Team Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>
          Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
          consectetur velit
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
                          echo "&#9733;"; // Unicode karakter untuk bintang penuh
                        }
                        for ($i = $bintang; $i < 5; $i++) {
                          echo "&#9734;"; // Unicode karakter untuk bintang kosong
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