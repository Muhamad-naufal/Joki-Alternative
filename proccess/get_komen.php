<?php
include 'config.php';

// Query untuk mengambil semua komentar dari database
$sql = "SELECT * FROM komentar ORDER BY created_at DESC";
$result = mysqli_query($Connection, $sql);

if (mysqli_num_rows($result) > 0) {
    // Loop untuk menampilkan setiap komentar
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="card mb-2">';
        echo '<div class="card-body d-flex align-items-start">';
        echo '<img src="' . $row['gambar'] . '" class="rounded-circle" style="margin-right:20px" width="50" height="50" alt="Profile Image">'; // Foto profil
        echo '<div>';
        echo '<h5 class="card-title mb-1">' . htmlspecialchars($row['nama_user']) . '</h5>'; // Nama pengguna
        echo '<small class="text-muted">' . date('d M Y H:i', strtotime($row['created_at'])) . '</small>'; // Tanggal dan waktu
        echo '<div class="mt-1 mb-2">'; // Bintang (contoh untuk bintang 5)

        $bintang = intval($row['bintang']); // Mengonversi nilai bintang ke integer

        // Menampilkan bintang penuh dan kosong sesuai dengan nilai bintang
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $bintang) {
                echo '<i class="fa-solid fa-star" style="color: #FFD43B;"></i>'; // Bintang penuh
            } else {
                echo '<i class="fa-regular fa-star" style="color: #FFD43B;"></i>'; // Bintang kosong
            }
        }

        echo '</div>';
        echo '<p class="card-text mb-1">' . htmlspecialchars($row['isi_komen']) . '</p>'; // Isi komentar
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p class="text-muted">No comments yet.</p>';
}

mysqli_close($Connection);
