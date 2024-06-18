<?php
// Include your database connection file
include('config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the ID and status from the POST request
    $id_pengajuan = $_POST['id_pengajuan'];
    $status = $_POST['status'];

    // Prepare and bind
    $stmt = $Connection->prepare("UPDATE pengajuan SET status = ? WHERE id_pengajuan = ?");
    $stmt->bind_param("si", $status, $id_pengajuan);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect back to the previous page or any other page
        header("Location: pengajuan.php");
        exit();
    } else {
        echo "Error updating record: " . $Connection->error;
    }

    // Close statement and connection
    $stmt->close();
    $Connection->close();
} else {
    echo "Invalid request.";
}
?>
