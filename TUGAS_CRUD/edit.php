<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    die("Error: ID tidak ditemukan.");
}

$id = $_GET['id'];
$query = "SELECT * FROM mahasiswa WHERE id = $id";
$result = pg_query($conn, $query);

if (!$result || pg_num_rows($result) == 0) {
    die("Data tidak ditemukan.");
}

$data = pg_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];

    $update = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', email = '$email', jurusan = '$jurusan' WHERE id = $id";
    $result_update = pg_query($conn, $update);

    if ($result_update) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal mengupdate data: " . pg_last_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>📘 Sistem Data Mahasiswa</header>

<div class="form-container">
    <h2>Edit Data Mahasiswa</h2>

    <form action="" method="POST">
        <label>NIM:</label>
        <input type="text" name="nim" value="<?= $data['nim'] ?>" required>

        <label>Nama:</label>
        <input type="text" name="nama" value="<?= $data['nama'] ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?= $data['email'] ?>">

        <label>Jurusan:</label>
        <input type="text" name="jurusan" value="<?= $data['jurusan'] ?>">

        <input type="submit" value="Simpan Perubahan">
    </form>

    <a class="back-link" href="index.php">&larr; Kembali ke daftar</a>
</div>


</body>
</html>
