<?php
include '../config.php';
date_default_timezone_set('Asia/Jakarta');

session_start();
$admin = $_SESSION['username'];
$username = $_POST['username'];
$password = $_POST['password'];

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["game-image"]["name"]);

if (move_uploaded_file($_FILES["game-image"]["tmp_name"], $target_file)) { 
    
    echo "The file " . htmlspecialchars(basename($_FILES["game-image"]["name"])) . " has been uploaded.<br>";

    $sql = mysqli_query($Connection, "UPDATE `admin` set `username` = '$username', `password` = '$password', `gambar` = '$target_file' WHERE `username` = '$admin'");
} else {
    echo "Sorry, there was an error uploading your file.<br>";
}

$sql = mysqli_query($Connection, "UPDATE `admin` set `username` = '$username', `password` = '$password' WHERE `username` = '$admin'");

header("Location: ../profile.php");