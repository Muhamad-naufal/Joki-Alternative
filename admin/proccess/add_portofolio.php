<?php
include '../config.php';

$nama = $_POST['nama_porto'];
$ket = $_POST['ket_porto'];
$nama_pt = $_POST['nama_pt'];

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["game-image"]["name"]);

if (move_uploaded_file($_FILES["game-image"]["tmp_name"], $target_file)) {
    echo "The file " . htmlspecialchars(basename($_FILES["game-image"]["name"])) . " has been uploaded.<br>";

    $sql = "INSERT INTO `portofolio` (`porto_id`, `nama_porto`, `nama_pt`, `gambar`, `ket_porto`, `created_at`, `updated_at`) VALUES 
    (NULL, '$nama', '$nama_pt', '$target_file', '$ket', current_timestamp(), current_timestamp())";

    if (mysqli_query($Connection, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($Connection);
    }
} else {
    echo "Sorry, there was an error uploading your file.<br>";
}

mysqli_close($Connection);

header("Location: ../portofolio.php");
exit();
