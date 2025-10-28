<?php
if (isset($_FILES['images'])) {
    $totalFiles = count($_FILES['images']['name']);
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    $uploadDir = "images/";

    // Buat folder jika belum ada
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['images']['name'][$i];
        $fileTmp = $_FILES['images']['tmp_name'][$i];
        $fileSize = $_FILES['images']['size'][$i];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Validasi ekstensi file
        if (in_array($fileExt, $allowedExtensions)) {

            // Batasi ukuran file maksimal 3MB
            if ($fileSize <= 3 * 1024 * 1024) {
                $targetPath = $uploadDir . $fileName;

                if (move_uploaded_file($fileTmp, $targetPath)) {
                    echo "Gambar <b>$fileName</b> berhasil diunggah.<br>";
                } else {
                    echo "Gagal mengunggah gambar <b>$fileName</b>.<br>";
                }
            } else {
                echo "Ukuran file <b>$fileName</b> terlalu besar (maksimal 3MB).<br>";
            }
        } else {
            echo "File <b>$fileName</b> bukan gambar yang valid.<br>";
        }
    }
} else {
    echo "Tidak ada gambar yang diunggah.";
}
?>
