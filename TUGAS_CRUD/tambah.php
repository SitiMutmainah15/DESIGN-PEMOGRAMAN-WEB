<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];

    $query = "INSERT INTO mahasiswa (nim, nama, email, jurusan) VALUES ('$nim', '$nama', '$email', '$jurusan')";
    $result = pg_query($conn, $query);

    if ($result) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menambahkan data: " . pg_last_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>📘 Sistem Data Mahasiswa</header>

<div class="form-container">
    <h2>Tambah Data Mahasiswa</h2>

    <form action="tambah.php" method="POST">
        <label>NIM:</label>
        <input type="text" name="nim" required>

        <label>Nama:</label>
        <input type="text" name="nama" required>

        <label>Email:</label>
        <input type="email" name="email">

        <label>Jurusan:</label>
        <input type="text" name="jurusan">

        <input type="submit" value="Simpan">
    </form>

    <a class="back-link" href="index.php">&larr; Kembali ke daftar</a>
</div>

</body>
</html>
