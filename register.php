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

		.file-input-container img {
			max-width: 100%;
			max-height: 100%;
			border-radius: 10px;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<form method="post" action="register_f.php" class="login-form" enctype="multipart/form-data">
							<div class="d-flex justify-content-center mb-2">
								<div class="file-input-container">
									<input type="file" id="game-image" name="game-image" required>
									<img class="img-fluid" id="game-image-preview" src="<?php echo $data['img'] ?>" alt="Preview Gambar">
								</div>
							</div>
							<div class="form-group">
								<input name="email" id="username" type="text" class="form-control rounded-left" placeholder="Username" required>
								<div id="username-error" style="color: red; font-size: 10px;"></div>
								<div id="username-success" style="color: green; font-size: 10px;"></div>
							</div>
							<div class="form-group">
								<input name="email_user" id="email_user" type="text" class="form-control rounded-left" placeholder="Nama Lengkap" required>
							</div>
							<div class="form-group">
								<input name="no_telp" id="no_telp" type="text" class="form-control rounded-left" placeholder="No Telpn" required>
							</div>
							<div class="form-group d-flex">
								<input name="password" id="password" type="password" class="form-control rounded-left" placeholder="Password" required>
							</div>
							<div id="password-error" style="color: red; font-size: 10px; margin-top:-10px; margin-bottom:25px"></div>
							<div id="password-success" style="color: green; font-size: 10px; font-size: 10px; margin-top:-10px; margin-bottom:25px"></div>
							<div class="form-group d-flex">
								<input name="confirm" id="confirm_password" type="password" class="form-control rounded-left" placeholder="Confirm Password" required>
							</div>
							<div id="confirm-password-error" style="color: red; font-size: 10px; margin-top:-10px; margin-bottom:25px"></div>
							<div id="confirm-password-success" style="color: green; font-size: 10px; margin-top:-10px; margin-bottom:25px"></div>
							<a href="login/login.php">
								<h3 class="text-center mb-4">Already have account?</h3>
							</a>
							<div class="form-group">
								<button type="submit" id="register-btn" class="btn btn-primary rounded submit p-3 px-5">Register</button>
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
	<script>
		$(document).ready(function() {
			function validateUsername(username) {
				var usernameRegex = /^(?=.*[a-z])(?=.*\d)(?=.*[\W_])[^\s]+$/;
				return usernameRegex.test(username);
			}

			function validatePassword(password) {
				var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[^\s]{8,}$/;
				return passwordRegex.test(password);
			}

			function validatePasswordsMatch(password, confirmPassword) {
				return password === confirmPassword;
			}

			function updateSubmitButtonState() {
				var username = $('#username').val();
				var password = $('#password').val();
				var confirmPassword = $('#confirm_password').val();
				var usernameValid = validateUsername(username);
				var passwordValid = validatePassword(password);
				var passwordsMatch = validatePasswordsMatch(password, confirmPassword);
				var allFieldsFilled = username && $('#email_user').val() && $('#no_telp').val() && password && confirmPassword;
				var noErrors = !$('#username-error').text() && !$('#password-error').text() && !$('#confirm-password-error').text();

				if (usernameValid && $('#username-success').text() === 'Username is available.') {
					$('#username-success').text('Username is available.');
					$('#username-error').text('');
				} else {
					$('#username-success').text('');
				}

				if (passwordValid) {
					$('#password-success').text('Password is valid.');
					$('#password-error').text('');
				} else {
					$('#password-success').text('');
					if (password.length > 0) {
						$('#password-error').text('Password must be at least 8 characters long, contain uppercase, lowercase, number, and special character.');
					} else {
						$('#password-error').text('');
					}
				}

				if (confirmPassword.length > 0) {
					if (passwordsMatch) {
						$('#confirm-password-success').text('Passwords match.');
						$('#confirm-password-error').text('');
					} else {
						$('#confirm-password-success').text('');
						$('#confirm-password-error').text('Passwords do not match.');
					}
				} else {
					$('#confirm-password-error').text('');
					$('#confirm-password-success').text('');
				}

				if (usernameValid && passwordValid && passwordsMatch && allFieldsFilled && noErrors) {
					$('#register-btn').prop('disabled', false);
				} else {
					$('#register-btn').prop('disabled', true);
				}
			}

			$('#username').on('input', function() {
				var username = $(this).val();

				if (username.length > 0) {
					$.ajax({
						url: 'check_username.php',
						type: 'POST',
						data: {
							username: username
						},
						success: function(response) {
							if (response == 'taken') {
								$('#username-error').text('Username is already taken. Please choose another one.');
								$('#username-success').text('');
							} else if (response == 'invalid') {
								$('#username-error').text('Username must contain lowercase letters, numbers, a special character, and no spaces.');
								$('#username-success').text('');
							} else if (response == 'available') {
								$('#username-success').text('Username is available.');
								$('#username-error').text('');
							}
							updateSubmitButtonState();
						}
					});
				} else {
					$('#username-error').text('');
					$('#username-success').text('');
				}

				updateSubmitButtonState();
			});

			$('#password').on('input', function() {
				var password = $(this).val();

				if (password.length > 0) {
					if (!validatePassword(password)) {
						$('#password-error').text('Password must be at least 8 characters long, contain uppercase, lowercase, number, and special character.');
					} else {
						$('#password-success').text('Password is valid.');
						$('#password-error').text('');
					}
				} else {
					$('#password-error').text('');
					$('#password-success').text('');
				}

				updateSubmitButtonState();
			});

			$('#confirm_password').on('input', function() {
				var password = $('#password').val();
				var confirmPassword = $(this).val();

				if (confirmPassword.length > 0) {
					if (!validatePasswordsMatch(password, confirmPassword)) {
						$('#confirm-password-error').text('Passwords do not match.');
					} else {
						$('#confirm-password-success').text('Passwords match.');
						$('#confirm-password-error').text('');
					}
				} else {
					$('#confirm-password-error').text('');
					$('#confirm-password-success').text('');
				}

				updateSubmitButtonState();
			});

			$('#email_user, #no_telp').on('input', function() {
				updateSubmitButtonState();
			});
		});
	</script>

</body>

</html>