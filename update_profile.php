<?php
include 'proccess/config.php';
date_default_timezone_set('Asia/Jakarta');

$user_id = $_POST['user_id'];
$username = $_POST['username'];
$email = $_POST['email'];
$telp = $_POST['no_telp'];
$new_password = $_POST['new_password'];

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["game-image"]["name"]);

if ($_FILES["game-image"]["error"] == UPLOAD_ERR_OK) {
    if (move_uploaded_file($_FILES["game-image"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["game-image"]["name"])) . " has been uploaded.<br>";

        $sql = "UPDATE `user` SET `user_name` = '$username', `gambar` = '$target_file', `email` = '$email', `no_telp` = '$telp', `password` = '$new_password' WHERE `user_id` = '$user_id'";
    } else {
        echo "Sorry, there was an error uploading your file.<br>";
    }
} else {
    $sql = "UPDATE `user` SET `user_name` = '$username', `email` = '$email', `no_telp` = '$telp', `password` = '$new_password' WHERE `user_id` = '$user_id'";
}

if (mysqli_query($Connection, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($Connection);
}

header("Location: profile.php");
exit();
