<?php
include 'proccess/config.php';
session_start();
$id = $_POST['user_id'];
$email = $_POST['email'];
$username = $_POST['username'];
$no_telp = $_POST['no_telp'];
$password = $_POST['pass'];

// Upload Proses
$target_dir = "images/"; // path directory image akan di simpan
$target_file = $target_dir . basename($_FILES["game-image"]["name"]); // full path dari image yg akan di simpan
if (move_uploaded_file($_FILES["game-image"]["tmp_name"], $target_file)) { // fungsi ini utk memindahkan file dr tempat asal ke target_file
    echo "The file " . htmlspecialchars(basename($_FILES["game-image"]["name"])) . " has been uploaded.<br>";
    $result = mysqli_query($Connection, "UPDATE `user` set `user_name` = '$username', `gambar` = '$target_file', `email` = '$email', `no_telp` = '$no_telp', `password` = '$password' WHERE `user_id` = '$id'");
} else {
    echo "Sorry, there was an error uploading your file.<br>";
}

$result = mysqli_query($Connection, "UPDATE `user` set `user_name` = '$username', `email` = '$email', `no_telp` = '$no_telp', `password` = '$password' WHERE `user_id` = '$id'");

header('location:login/login.php');
?>