<?php
include "config.php";

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

// Cek apakah pengguna sudah login
if (isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

// Mencegah SQL Injection dengan menggunakan prepared statements
$stmt = $Connection->prepare("SELECT * FROM `user` WHERE `user_name` = ? AND `password` = ?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $_SESSION['user_id'] = $data['user_id'];
    header("Location: ../index.php");
    exit();
} else {
    echo "<script>alert('Email atau password salah!'); window.location.href='../login/login.php';</script>";
    exit();
}

$stmt->close();
$Connection->close();
?>
