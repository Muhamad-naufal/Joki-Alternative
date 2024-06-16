<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pengajuan = $_POST['id_pengajuan'];
    $status = $_POST['status'];
    $reason = $_POST['reason'];

    $sql = "UPDATE pengajuan SET status = '$status', ket = '$reason' WHERE id_pengajuan = '$id_pengajuan'";

    if (mysqli_query($Connection, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($Connection);
    }

    mysqli_close($Connection);

    header("Location: pengajuan.php");
    exit();
}
?>
