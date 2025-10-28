<?php
$targetDirectory = "images/";

if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

$allowedExtensions = array("jpg", "jpeg", "png", "gif");

if ($_FILES['images']['name'][0]) {
    $totalFiles = count($_FILES['images']['name']);

    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['images']['name'][$i];
        $fileTmp = $_FILES['images']['tmp_name'][$i];
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $targetFile = $targetDirectory . $fileName;

        if (in_array($fileType, $allowedExtensions)) {
            if (move_uploaded_file($fileTmp, $targetFile)) {
                echo "Gambar <b>$fileName</b> berhasil diunggah.<br>";
            } else {
                echo "Gagal mengunggah gambar <b>$fileName</b>.<br>";
            }
        } else {
            echo "File <b>$fileName</b> bukan gambar yang valid.<br>";
        }
    }
} else {
    echo "Tidak ada gambar yang diunggah.";
}
?>
