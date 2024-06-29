<?php
include '../config.php';
date_default_timezone_set('Asia/Jakarta');

$admin_id = $_POST['admin_id'];
$username = $_POST['username'];
$nama = $_POST['nama'];
$telp = $_POST['no_telp'];
$new_password = $_POST['new_password'];


$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["game-image"]["name"]);

if ($_FILES["game-image"]["error"] == UPLOAD_ERR_OK) {
  if (move_uploaded_file($_FILES["game-image"]["tmp_name"], $target_file)) {
    echo "The file " . htmlspecialchars(basename($_FILES["game-image"]["name"])) . " has been uploaded.<br>";

    $sql = "UPDATE `admin` SET `username` = '$username', `gambar` = '$target_file', `nama` = '$nama', `telp` = '$telp', `password` = '$new_password' WHERE `admin_id` = '$admin_id'";
  } else {
    echo "Sorry, there was an error uploading your file.<br>";
  }
} else {
  $sql = "UPDATE `admin` SET `username` = '$username', `nama` = '$nama', `telp` = '$telp', `password` = '$new_password' WHERE `admin_id` = '$admin_id'";
}

if (mysqli_query($Connection, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($Connection);
}

header("Location: ../profile.php");
exit();
