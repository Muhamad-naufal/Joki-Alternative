<?php
include "../config.php";

// Get the posted data
$email = $_POST['email_user'];
$password = $_POST['password_user'];

// Execute the query
$login = mysqli_query($Connection, "SELECT * FROM admin WHERE username='$email' AND password='$password'");

// Check the number of rows returned
$cek = mysqli_num_rows($login);

if ($cek > 0) {
    // Start the session
    session_start();

    // Fetch the row as an associative array
    $row = mysqli_fetch_assoc($login);

    // Set the session variables
    $_SESSION['username'] = $email;
    $_SESSION['admin_id'] = $row['admin_id']; // Make sure 'admin_id' is a valid column in your 'admin' table

    // Redirect to index.php
    header("location:../index.php");
} else {
    // Redirect back to login page with an error message
    echo "<script>alert('Invalid email or password. Please try again.'); window.location.href='../login.php';</script>";
}
