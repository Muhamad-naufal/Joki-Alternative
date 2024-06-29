<?php
include 'config.php';

session_start();

// Get user ID
$id_user = $_SESSION['user_id'];

// Insert data into pengajuan table
if(isset($_POST['submit'])) {
    // Loop through each product submitted
    foreach($_POST['product_id'] as $key => $product_id) {
        // Ensure product_id is not empty and quantity is greater than 1
        $jumlah = $_POST['quantity'][$key]; // Quantity for each product
        if(!empty($product_id) && $jumlah > 0) {
            $ket = $_POST['ket'][$key]; // Description for each product
            $email = $_POST['email_pt']; // Email for each product
            $nama = $_POST['nama_pt']; // Email for each product

            // Insert the product into pengajuan table
            $sql = "INSERT INTO pengajuan (id_produk, id_user, deskripsi, created_at, jumlah, status, email_usaha, nama_pt) 
                    VALUES ('$product_id', '$id_user', '$ket', current_timestamp(), '$jumlah', 'pending', '$email', '$nama')";
            
            if (mysqli_query($Connection, $sql)) {
                echo "New record created successfully for product ID: $product_id<br>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($Connection);
            }
        }
    }
}

mysqli_close($Connection);

header("Location: ../histori.php");
exit();
?>