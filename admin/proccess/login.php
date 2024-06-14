<?php
include "../config.php";
$email = $_POST['email_user'];
$password = $_POST['password_user'];
$login = mysqli_query($Connection, "SELECT * FROM `admin` WHERE username='$email' AND `password`='$password'");
$cek = mysqli_num_rows($login);
if($cek > 0){
    session_start();
    $_SESSION['username'] = $email;
    header("location:../index.php");
}else{
    echo "<script>alert('Invalid email or password. Please try again.'); window.location.href='../login.php';</script>";
}

?>