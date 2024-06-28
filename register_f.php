<?php
include 'proccess/config.php';

$username = $_POST['email'];
$email = $_POST['email_user'];
$telp = $_POST['no_telp'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm'];

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["game-image"]["name"]);

// Server-side validation for username
if (!preg_match('/^(?=.*[a-z])(?=.*\d)(?=.*[\W_])[^\s]+$/', $username)) {
    echo "Username must contain lowercase letters, numbers, a special character, and no spaces.<br>";
    exit();
}

// Server-side validation for password
if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[^\s]{8,}$/', $password)) {
    echo "Password must be at least 8 characters long, contain uppercase, lowercase, number, and special character.<br>";
    exit();
}

// Server-side validation for password confirmation
if ($password !== $confirm_password) {
    echo "Passwords do not match.<br>";
    exit();
}

// Check if username already exists
$sql_check = "SELECT * FROM `user` WHERE `user_name` = '$username'";
$result = mysqli_query($Connection, $sql_check);

if (mysqli_num_rows($result) > 0) {
    echo "Sorry, that username is already taken. Please choose a different username.<br>";
} else {
    if (move_uploaded_file($_FILES["game-image"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["game-image"]["name"])) . " has been uploaded.<br>";

        $sql = "INSERT INTO `user` (`user_id`, `user_name`, `gambar`, `nama_lengkap`, `no_telp`, `password`, `created_at`) VALUES 
        (NULL, '$username', '$target_file', '$email', '$telp', '$password', current_timestamp())";

        if (mysqli_query($Connection, $sql)) {
            echo "New record created successfully";
            header("Location: login/login.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($Connection);
        }
    } else {
        echo "Sorry, there was an error uploading your file.<br>";
    }
}

mysqli_close($Connection);
?>
