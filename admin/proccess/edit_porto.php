<?php
include '../config.php';
date_default_timezone_set('Asia/Jakarta');

$id = $_POST['porto_id'];
$nama = $_POST['nama_porto'];
$ket = $_POST['ket_porto'];
$nama_pt = $_POST['nama_pt'];

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["game-image"]["name"]);

if (move_uploaded_file($_FILES["game-image"]["tmp_name"], $target_file)) { 
    
    echo "The file " . htmlspecialchars(basename($_FILES["game-image"]["name"])) . " has been uploaded.<br>";

    $sql = mysqli_query($Connection, "UPDATE `portofolio` set `nama_porto` = '$nama', `ket_porto` = '$ket', `gambar` = '$target_file', `nama_pt` = '$nama_pt', `updated_at` = current_timestamp() where `porto_id` = '$id'");
} else {
    echo "Sorry, there was an error uploading your file.<br>";
}

$sql = mysqli_query($Connection, "UPDATE `portofolio` set `nama_porto` = '$nama', `ket_porto` = '$ket', `nama_pt` = '$nama_pt', `updated_at` = current_timestamp() where `porto_id` = '$id'");

header("Location: ../portofolio.php");