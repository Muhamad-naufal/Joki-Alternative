<?php
include '../config.php';

$username = $_POST['email_user'];
$email = $_POST['email'];
$telp = $_POST['telp_user'];
$password = $_POST['password_user'];

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["game-image"]["name"]);

if (move_uploaded_file($_FILES["game-image"]["tmp_name"], $target_file)) {
    echo "The file " . htmlspecialchars(basename($_FILES["game-image"]["name"])) . " has been uploaded.<br>";

    $sql = "INSERT INTO `user` (`user_id`, `user_name`, `gambar`, `email`, `no_telp`, `password`, `created_at`) VALUES 
    (NULL, '$username', '$target_file', '$email', '$telp', '$password', current_timestamp())";

    if (mysqli_query($Connection, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($Connection);
    }
} else {
    echo "Sorry, there was an error uploading your file.<br>";
}

mysqli_close($Connection);

header("Location: ../../login.php");
exit();
