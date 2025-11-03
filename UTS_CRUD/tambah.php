<?php
include 'auth_check.php';
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST['nama'];
  $kategori = $_POST['kategori'];
  $deskripsi = $_POST['deskripsi'];
  $gambar = $_FILES['gambar']['name'];

  if ($gambar) {
    $target = "upload/" . basename($gambar);
    move_uploaded_file($_FILES['gambar']['tmp_name'], $target);
  }

  $query = "INSERT INTO menu (nama, kategori, deskripsi, gambar) VALUES ('$nama', '$kategori', '$deskripsi', '$gambar')";
  pg_query($conn, $query);
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Menu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5">
  <h3>Tambah Menu Baru</h3>
  <form method="POST" enctype="multipart/form-data">
    <label>Nama Menu</label>
    <input type="text" name="nama" class="form-control" required>

    <label>Kategori</label>
    <input type="text" name="kategori" class="form-control" required>

    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control" required></textarea>

    <label>Langkah Memasak</label>
    <textarea name="langkah" class="form-control" rows="5" required></textarea>

    <label>Gambar</label>
    <input type="file" name="gambar" class="form-control mb-3">

    <button class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
