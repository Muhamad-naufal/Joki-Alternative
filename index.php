<?php
include 'dashboard/config.php';
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

<body class="index-page">
  <!-- ======= Header ======= -->
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
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="services.php">Product</a></li>
          <li><a href="projects.php">Portofolio</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li>
            <a href="https://wa.me/6281294443660"><img src="assets/img/product/logo-whatsapp-png-images-free-download-26 1.png" alt="" srcset="" /></a>
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
              <a href="contact.php" class="btn-get-started">Hubungi Kami </a>
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
                    <p>
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
                    <p>
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
                    <p>
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
                    <p>
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
            <h3>Kami sudah legal dan sudah mendapatkan banyak izin</h3>
            <p>
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

    <!-- Comments Section -->
    <section class="comments">
      <div class="container">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Komentar</h2>
          <p>
            Silahkan Berikan kami saran komentar dan kritik Anda
          </p>
        </div>

        <!-- End Section Title -->
        <form action="tambah_komen.php" method="post" enctype="multipart/form-data">
          <div class="container">
            <div class="row">
              <div class="col-md-3">
                <div class="file-input-container mb-2">
                  <input type="file" id="game-image" name="game-image" required>
                  <img class="img-fluid" id="game-image-preview" src="<?php echo $data['img'] ?>" alt="Preview Gambar">
                </div>
              </div>
              <div class="col-md-9">
                <div class="mb-3">
                  <label for="game-title" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                  <label for="input-group">Bintang</label>
                  <div class="input-group">
                    <button class="btn btn-outline-secondary minus-btn" type="button">-</button>
                    <input type="number" class="form-control quantity-input" name="quantity" value="0" min="0">
                    <button class="btn btn-outline-secondary plus-btn" type="button">+</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="product-description" class="form-label">Isi Komen</label>
              <textarea class="form-control" id="isi" name="isi" rows="3" required></textarea>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>
    </section>

    <!-- Comments Section -->
    <section class="comments">
      <div class="container">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>All Cpmments</h2>
          <p>
            Semua Komentar Anda adalah kata - kata pembangun bagi kami
          </p>
        </div>

        <!-- End Section Title -->

        <div class="mb-3" style="max-height: 200px; overflow-y: auto; border: 1px solid black;">
          <div class="container">
            <div class="row mt-3">
              <?php
              $kode = mysqli_query($Connection, "SELECT * FROM komentar ORDER BY created_at");
              while ($muncul = mysqli_fetch_array($kode)) {
              ?>
                <div class="col-md-2">
                  <img src="<?php echo $muncul['gambar'] ?>" alt="Gambar" class="img-fluid" style="max-width: 50px;">
                </div>
                <div class="col-md-4">
                  <div class="row">
                    <h4><?php echo $muncul['nama_user'] ?></h4>
                    <?php
                    $bintang = $muncul['bintang']; // Ambil jumlah bintang dari database
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
                  <div class="mb-3">
                    <?php echo $muncul['isi_komen'] ?>
                  </div>

                </div>
              <?php } ?>
            </div>
          </div>
        </div>
    </section>


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
    <script>
      document.querySelectorAll('.minus-btn').forEach(button => {
        button.addEventListener('click', function() {
          var quantityInput = this.nextElementSibling;
          var currentValue = parseInt(quantityInput.value);
          if (currentValue > 0) {
            quantityInput.value = currentValue - 1;
          }
        });
      });

      document.querySelectorAll('.plus-btn').forEach(button => {
        button.addEventListener('click', function() {
          var quantityInput = this.previousElementSibling;
          var currentValue = parseInt(quantityInput.value);
          if (currentValue >= 5) {
            quantityInput.value = 0;
          } else {
            quantityInput.value = currentValue + 1;
          }
        });
      });

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