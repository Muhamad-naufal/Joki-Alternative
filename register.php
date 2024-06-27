<!doctype html>
<html lang="en">

<head>
	<title>Register User</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">
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

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<form method="post" action="register_f.php" class="login-form" enctype="multipart/form-data">
							<div class="file-input-container mb-2 text-center">
								<input type="file" id="game-image" name="game-image">
								<img class="img-fluid" id="game-image-preview" src="<?php echo $data['img'] ?>" alt="Preview Gambar">
							</div>
							<div class="form-group">
								<input name="email" id="email" type="text" class="form-control rounded-left" placeholder="Username" required>
							</div>
							<div class="form-group">
								<input name="email_user" id="email_user" type="text" class="form-control rounded-left" placeholder="Email" required>
							</div>
							<div class="form-group">
								<input name="no_telp" id="no_telp" type="text" class="form-control rounded-left" placeholder="No Telpn" required>
							</div>
							<div class="form-group d-flex">
								<input name="password" id="password" type="password" class="form-control rounded-left" placeholder="Password" required>
							</div>
							<a href="login.php">
								<h3 class="text-center mb-4">sudah punya akun?</h3>
							</a>
							<div class="form-group">
								<button type="submit" class="btn btn-primary rounded submit p-3 px-5">Daftar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
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