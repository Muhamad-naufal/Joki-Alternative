<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  header("location:../login.php");
} else {
  $username = $_SESSION['user_name'];
}

include 'config.php';
$syntax = mysqli_query($Connection, "SELECT * FROM `user` where `user_name` = '$username'");
$data = mysqli_fetch_array($syntax);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>GSI User - Tambah Pengajuan</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet" />
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

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img class="img-fluid" width="40px" height="40px" src="img/logo_bulet.png" alt="" />
        </div>
        <div class="sidebar-brand-text mx-3">GSI User Dashboard</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" />

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider" />

      <!-- Heading -->
      <div class="sidebar-heading">Interface</div>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="pengajuan.php">
          <i class="fa-solid fa-shop"></i>
          <span>Pengajuan</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block" />

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username ?></span>
                <img class="img-profile rounded-circle" src="proccess/<?php echo $data['gambar']?>" />
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-1 text-gray-800">Tambah Pengajuan</h1>
          <div class="card position-relative">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Form Tambah Pengajuan
              </h6>
            </div>
            <div class="card-body">
              <form action="proccess/add_pengajuan.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="product-name" class="form-label">Silahkan Pilih Barang</label>
                  <div class="mb-3" style="max-height: 200px; overflow-y: auto;">
                    <?php
                    include 'config.php';
                    $sql = "SELECT * FROM product";
                    $result = $Connection->query($sql);
                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                    ?>
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="container">
                            <div class="row">
                              <div class="col">
                                <img src="../admin/proccess/<?php echo $row['gambar']; ?>" alt="product-image" class="img-fluid" style="max-width:50px" />
                              </div>
                              <div class="col">
                                <span><?php echo $row['nama_produk']; ?></span>
                                <input type="hidden" value="<?php echo $row['product_id'] ?>" name="product_id[]">
                              </div>
                              <div class="col">
                                <div class="input-group">
                                  <button class="btn btn-outline-secondary minus-btn" type="button">-</button>
                                  <input type="number" class="form-control quantity-input" name="quantity[]" value="0" min="0">
                                  <button class="btn btn-outline-secondary plus-btn" type="button">+</button>
                                </div>
                              </div>
                              <div class="col">
                                <textarea class="form-control" name="ket[]" rows="2" placeholder="Deskripsi Tambahan (Optional)"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                    <?php
                      }
                    }
                    ?>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Masukkan</button>
              </form>

              <br />
              <p class="mb-0 small">
                Note: Masukkan jenis pengajuan yang diinginkan dan jumlah dari barang yang diinginkan.
              </p>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; General Steel Indonesia 2024</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          Select "Logout" below if you are ready to end your current session.
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">
            Cancel
          </button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="https://kit.fontawesome.com/6beb2a82fc.js" crossorigin="anonymous"></script>
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
        quantityInput.value = currentValue + 1;
      });
    });
  </script>
</body>

</html>