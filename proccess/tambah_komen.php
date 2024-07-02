<?php
// Correct the path and filename of the configuration file
include 'config.php'; 

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

// Check connection
if ($Connection->connect_error) {
    die("Connection failed: " . $Connection->connect_error);
}

$id = $_SESSION['user_id'];
$userQuery = $Connection->query("SELECT gambar, created_at FROM `user` WHERE `user_id` = '$id'");

if (!$userQuery) {
    die("Query failed: " . $Connection->error);
}

$userData = $userQuery->fetch_assoc();

$gambar = $userData['gambar'];
$tanggal = $userData['created_at'];

// Retrieve data from form
$username = $_POST['user'];
$komentar = $_POST['comment'];
$bintang = $_POST['rating'];

// Add comment to database
$sql = "INSERT INTO `komentar`(`id_komen`, `nama_user`, `gambar`, `bintang`, `isi_komen`, `created_at`) VALUES (NULL, '$username', '$gambar', '$bintang', '$komentar', current_timestamp())";

if (!$Connection->query($sql)) {
    die("Insert failed: " . $Connection->error);
}

// Close the database connection
$Connection->close();

// Redirect the user back to the main page
header("Location: ../index.php");
exit();
?>
