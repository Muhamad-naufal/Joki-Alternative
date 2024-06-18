<?php
include 'dashboard/config.php';

$nama = $_POST['nama'];
$jumlah = $_POST['quantity'];
$isi = $_POST['isi'];

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["game-image"]["name"]);

if (move_uploaded_file($_FILES["game-image"]["tmp_name"], $target_file)) {
    echo "The file " . htmlspecialchars(basename($_FILES["game-image"]["name"])) . " has been uploaded.<br>";

    $sql = "INSERT INTO `komentar` (`id_komen`, `nama_user`, `gambar`, `bintang`, `isi_komen`, `created_at`) VALUES 
    (NULL, '$nama', '$target_file', '$jumlah', '$isi', current_timestamp())";

    if (mysqli_query($Connection, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($Connection);
    }
} else {
    echo "Sorry, there was an error uploading your file.<br>";
}

mysqli_close($Connection);

header("Location: index.php");
exit();