<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("location:login.php");
} else {
  $username = $_SESSION['username'];
}

include "config.php";
$sql = "SELECT p.id_pengajuan, p.created_at, u.user_name, p.nama_pt, p.email_usaha, p.status,
               GROUP_CONCAT(pd.nama_produk SEPARATOR ', ') as nama_produk,
               GROUP_CONCAT(p.jumlah SEPARATOR ', ') as jumlah,
               GROUP_CONCAT(p.ket SEPARATOR ', ') as deskripsi
        FROM pengajuan p
        JOIN user u ON p.id_user = u.user_id
        join product as pd on p.id_produk = pd.product_id        
        GROUP BY p.id_pengajuan";
$result = $Connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>GSI Admin - Pengajuan</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet" />

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />

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
        <div class="sidebar-brand-text mx-3">GSI Admin</div>
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
        <a class="nav-link" href="product.php">
          <i class="fa-solid fa-shop"></i>
          <span>Product</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="portofolio.php">
          <i class="fa-solid fa-bars-progress"></i>
          <span>Portofolio</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="pengajuan.php">
          <i class="fa-solid fa-dollar-sign"></i>
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
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg" />
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
          <h1 class="h3 mb-2 text-gray-800">Pengajuan</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col">
                  <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan</h6>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Nama User</th>
                      <th>Nama PT</th>
                      <th>Email PT</th>
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                      <th>Keterangan</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Nama User</th>
                      <th>Nama PT</th>
                      <th>Email PT</th>
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                      <th>Keterangan</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_array($result)) {
                      $nama_produk = explode(", ", $row['nama_produk']);
                      $jumlah = explode(", ", $row['jumlah']);
                      $deskripsi = explode(", ", $row['deskripsi']);
                    ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['created_at'] ?></td>
                        <td><?php echo $row['user_name'] ?></td>
                        <td><?php echo $row['nama_pt'] ?></td>
                        <td><?php echo $row['email_usaha'] ?></td>
                        <td>
                          <ul class="list-unstyled">
                            <?php foreach ($nama_produk as $index => $nama) { ?>
                              <li><?php echo $nama; ?></li>
                            <?php } ?>
                          </ul>
                        </td>
                        <td>
                          <ul class="list-unstyled">
                            <?php foreach ($jumlah as $index => $jml) { ?>
                              <li><?php echo $jml; ?></li>
                            <?php } ?>
                          </ul>
                        </td>
                        <td>
                          <ul class="list-unstyled">
                            <?php foreach ($deskripsi as $index => $desc) { ?>
                              <li><?php echo $desc; ?></li>
                            <?php } ?>
                          </ul>
                        </td>
                        <td>
                          <form action="update_status.php" method="post" class="status-form">
                            <input type="hidden" name="id_pengajuan" value="<?php echo htmlspecialchars($row['id_pengajuan']); ?>">
                            <div class="btn-group">
                              <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo ucfirst($row['status']); ?>
                              </button>
                              <div class="dropdown-menu">
                                <button class="dropdown-item" type="submit" name="status" value="pending" <?php if ($row['status'] == 'pending') echo 'selected'; ?>>Pending</button>
                                <button class="dropdown-item" type="submit" name="status" value="accept" <?php if ($row['status'] == 'accept') echo 'selected'; ?>>Accept</button>
                                <button class="dropdown-item" type="submit" name="status" value="process" <?php if ($row['status'] == 'process') echo 'selected'; ?>>Process</button>
                              </div>
                            </div>
                          </form>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>

            <script>
              document.querySelectorAll('.status-dropdown').forEach(function(element) {
                element.addEventListener('change', function() {
                  this.closest('form').submit();
                });
              });
            </script>

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
          <a class="btn btn-primary" href="logout.php">Logout</a>
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

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="https://kit.fontawesome.com/6beb2a82fc.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>