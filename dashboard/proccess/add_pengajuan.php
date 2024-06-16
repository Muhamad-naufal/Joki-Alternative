<?php
include '../config.php';

session_start();

// Check if user is logged in
if (!isset($_SESSION['user_name'])) {
    header("location:../login.php");
    exit();
}

// Get user ID
$username = $_SESSION['user_name'];
$userQuery = mysqli_query($Connection, "SELECT user_id FROM `user` WHERE `user_name` = '$username'");
$userData = mysqli_fetch_assoc($userQuery);
$id_user = $userData['user_id'];

// Insert data into pengajuan table
if(isset($_POST['submit'])) {
    // Loop through each product submitted
    foreach($_POST['product_id'] as $key => $product_id) {
        // Ensure product_id is not empty and quantity is greater than 1
        $jumlah = $_POST['quantity'][$key]; // Quantity for each product
        if(!empty($product_id) && $jumlah > 0) {
            $ket = $_POST['ket'][$key]; // Description for each product

            // Insert the product into pengajuan table
            $sql = "INSERT INTO `pengajuan` (`id_produk`, `id_user`, `deskripsi`, `created_at`, `jumlah`, `status`) 
                    VALUES ('$product_id', '$id_user', '$ket', current_timestamp(), '$jumlah', 'pending')";
            
            if (mysqli_query($Connection, $sql)) {
                echo "New record created successfully for product ID: $product_id<br>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($Connection);
            }
        }
    }
}

mysqli_close($Connection);

header("Location: ../pengajuan.php");
exit();
?>