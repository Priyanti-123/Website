<?php
// Direktori tujuan penyimpanan file yang diupload
$target_dir = "uploads/"; // Folder 'uploads' di server
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Cek apakah file yang diupload adalah file gambar atau bukan
if (isset($_POST["submit"])) {
    // Validasi jika file benar-benar diupload
    if ($_FILES["fileToUpload"]["error"] == 0) {
        echo "File: " . $_FILES["fileToUpload"]["name"] . " berhasil diupload.<br>";
    } else {
        echo "Terjadi kesalahan dalam penguploadan file.<br>";
        $uploadOk = 0;
    }
}

// Cek apakah file sudah ada
if (file_exists($target_file)) {
    echo "Maaf, file sudah ada.<br>";
    $uploadOk = 0;
}

// Cek ukuran file (maksimal 5MB)
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Maaf, file terlalu besar.<br>";
    $uploadOk = 0;
}

// Hanya izinkan format file tertentu (contoh: JPG, PNG, PDF)
if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif" && $fileType != "pdf") {
    echo "Maaf, hanya file JPG, PNG, JPEG, GIF, dan PDF yang diperbolehkan.<br>";
    $uploadOk = 0;
}

// Jika semua kondisi di atas terpenuhi, upload file
if ($uploadOk == 0) {
    echo "Maaf, file Anda tidak dapat diupload.<br>";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "File " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " telah berhasil diupload.";
    } else {
        echo "Terjadi kesalahan saat mengupload file.<br>";
    }
}
?>



