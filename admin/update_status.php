<?php
// Include the database configuration file
include 'config.php';

// Check if POST data is received
if (isset($_POST['date']) && isset($_POST['status'])) {
    // Sanitize and assign received data
    $date = mysqli_real_escape_string($Connection, $_POST['date']);
    $status = mysqli_real_escape_string($Connection, $_POST['status']);

    // Update query
    $updateQuery = "UPDATE pengajuan SET status = '$status' WHERE created_at = '$date'";

    // Execute the update query
    if (mysqli_query($Connection, $updateQuery)) {
        echo 'success'; // Mengembalikan 'success' jika berhasil
    } else {
        echo 'Error updating status: ' . mysqli_error($Connection);
    }
} else {
    echo 'Invalid request'; // Mengembalikan pesan 'Invalid request' jika data tidak lengkap
}

// Close database connection
mysqli_close($Connection);
?>
