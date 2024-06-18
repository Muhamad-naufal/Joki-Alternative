<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>GSI User - Register</title>

  <!-- Custom fonts for this template-->
  <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link href="admin/css/sb-admin-2.min.css" rel="stylesheet" />
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

<body class="bg-gradient-primary">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <form class="user" method="post" action="proccess/register.php" enctype="multipart/form-data">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-login-image">
                  <img src="admin/img/logo_bulet.png" alt="login" class="img-fluid" />
                </div>
                <div class="col-lg-6">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Created Account Now!</h1>
                    </div>
                    <div class="file-input-container mb-2">
                      <input type="file" id="game-image" name="game-image">
                      <img class="img-fluid" id="game-image-preview" src="<?php echo $data['img'] ?>" alt="Preview Gambar">
                    </div>
                    <div class="form-group">
                      <input name="email_user" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username" />
                    </div>
                    <div class="form-group">
                      <input name="email" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address" />
                    </div>
                    <div class="form-group">
                      <input name="telp_user" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Telephone Number" />
                    </div>
                    <div class="form-group">
                      <input name="password_user" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="admin/vendor/jquery/jquery.min.js"></script>
  <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="admin/js/sb-admin-2.min.js"></script>
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