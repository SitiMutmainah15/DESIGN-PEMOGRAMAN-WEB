<?php
include 'auth_check.php';
include 'koneksi.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  die("ID tidak valid!");
}

$id = (int)$_GET['id'];
$res = pg_query($conn, "SELECT * FROM menu WHERE id = $id");

if (!$res || pg_num_rows($res) === 0) {
  die("Data tidak ditemukan.");
}

$data = pg_fetch_assoc($res);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST['nama'];
  $kategori = $_POST['kategori'];
  $deskripsi = $_POST['deskripsi'];
  $bahan = $_POST['bahan'];
  $langkah = $_POST['langkah'];
  $gambarBaru = $_FILES['gambar']['name'];

  if ($gambarBaru) {
    $target = "upload/" . basename($gambarBaru);
    move_uploaded_file($_FILES['gambar']['tmp_name'], $target);
    $query = "UPDATE menu 
              SET nama='$nama', kategori='$kategori', deskripsi='$deskripsi',
                  bahan='$bahan', langkah='$langkah', gambar='$gambarBaru'
              WHERE id=$id";
  } else {
    $query = "UPDATE menu 
              SET nama='$nama', kategori='$kategori', deskripsi='$deskripsi',
                  bahan='$bahan', langkah='$langkah'
              WHERE id=$id";
  }

  $result = pg_query($conn, $query);

  if ($result) {
    header("Location: index.php");
    exit;
  } else {
    echo "<div class='alert alert-danger'>Gagal mengupdate data: " . pg_last_error($conn) . "</div>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Menu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container my-5">
    <h3 class="mb-3">Edit Menu</h3>

    <form method="POST" enctype="multipart/form-data">
      <label>Nama Menu</label>
      <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama'] ?? '') ?>" required>

      <label class="mt-3">Kategori</label>
      <input type="text" name="kategori" class="form-control" value="<?= htmlspecialchars($data['kategori'] ?? '') ?>" required>

      <label class="mt-3">Deskripsi</label>
      <textarea name="deskripsi" class="form-control" rows="3"><?= htmlspecialchars($data['deskripsi'] ?? '') ?></textarea>

      <label class="mt-3">Bahan-Bahan</label>
      <textarea name="bahan" class="form-control" rows="5"><?= htmlspecialchars($data['bahan'] ?? '') ?></textarea>

      <label class="mt-3">Langkah Memasak</label>
      <textarea name="langkah" class="form-control" rows="5"><?= htmlspecialchars($data['langkah'] ?? '') ?></textarea>

      <label class="mt-3">Gambar</label>
      <input type="file" name="gambar" class="form-control mb-3">
      <?php if (!empty($data['gambar'])): ?>
        <img src="upload/<?= htmlspecialchars($data['gambar']) ?>" width="100" class="rounded mb-3 border">
      <?php endif; ?>

      <div>
        <button class="btn btn-success mt-2">Simpan Perubahan</button>
        <a href="index.php" class="btn btn-secondary mt-2">Kembali</a>
      </div>
    </form>
  </div>
</body>
</html>
