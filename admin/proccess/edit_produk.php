<?php
include '../config.php';
date_default_timezone_set('Asia/Jakarta');

$id = $_POST['product_id'];
$nama = $_POST['nama_prod'];
$ket = $_POST['ket'];

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["game-image"]["name"]);

if (move_uploaded_file($_FILES["game-image"]["tmp_name"], $target_file)) { 
    
    echo "The file " . htmlspecialchars(basename($_FILES["game-image"]["name"])) . " has been uploaded.<br>";

    $sql = mysqli_query($Connection, "UPDATE `product` set `nama_produk` = '$nama', `ket_produk` = '$ket', `gambar` = '$target_file', `update_at` = current_timestamp() where `product_id` = '$id'");
} else {
    echo "Sorry, there was an error uploading your file.<br>";
}

$sql = mysqli_query($Connection, "UPDATE `product` set `nama_produk` = '$nama', `ket_produk` = '$ket', `update_at` = current_timestamp() where `product_id` = '$id'");

header("Location: ../product.php");