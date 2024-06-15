<?php
include '../config.php';

$nama = $_POST['nama_prod'];
$ket = $_POST['ket'];
$ket = $mysqli->real_escape_string($ket);

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["game-image"]["name"]);

if (move_uploaded_file($_FILES["game-image"]["tmp_name"], $target_file)) {
    echo "The file " . htmlspecialchars(basename($_FILES["game-image"]["name"])) . " has been uploaded.<br>";

    $sql = "INSERT INTO `product` (`product_id`, `nama_produk`, `gambar`, `ket_produk`, `created_at`, `update_at`) VALUES 
    (NULL, '$nama', '$target_file', '$ket', current_timestamp(), current_timestamp())";

    if (mysqli_query($Connection, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($Connection);
    }
} else {
    echo "Sorry, there was an error uploading your file.<br>";
}

mysqli_close($Connection);

header("Location: ../product.php");
exit();
?>
