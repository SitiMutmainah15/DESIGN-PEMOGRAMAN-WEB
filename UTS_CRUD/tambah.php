<<<<<<< HEAD
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
=======
<?php
require_once 'auth_check.php';
require_once __DIR__ . '/dir_/koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = trim($_POST['nama']);
    $kategori = trim($_POST['kategori']);
    $deskripsi = trim($_POST['deskripsi']);
    $bahan = trim($_POST['bahan']);
    $langkah = trim($_POST['langkah']);

    $gambar = $_FILES['gambar']['name'] ?? '';
    $tmp = $_FILES['gambar']['tmp_name'] ?? '';
    $folder = "upload/";

    if ($gambar) move_uploaded_file($tmp, $folder . $gambar);

    $stmt = $pdo->prepare("INSERT INTO menu (nama, kategori, deskripsi, bahan, langkah, gambar)
                           VALUES (:n, :k, :d, :b, :l, :g)");
    $stmt->execute([
        'n' => $nama,
        'k' => $kategori,
        'd' => $deskripsi,
        'b' => $bahan,
        'l' => $langkah,
        'g' => $gambar
    ]);

    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Menu</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#f8fafc;font-family:'Segoe UI',sans-serif;">
<nav class="navbar navbar-light bg-white shadow-sm px-4">
  <a class="navbar-brand fw-bold">Tambah Menu</a>
  <a href="dashboard.php" class="btn btn-outline-secondary btn-sm">Kembali</a>
</nav>

<div class="container mt-4">
  <div class="card shadow-sm p-4">
    <h4 class="mb-3">Form Tambah Menu</h4>
    <form method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label>Nama Menu</label>
          <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
          <label>Kategori</label>
          <input type="text" name="kategori" class="form-control" required>
        </div>
      </div>

      <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3"></textarea>
      </div>
      <div class="mb-3">
        <label>Bahan</label>
        <textarea name="bahan" class="form-control" rows="3"></textarea>
      </div>
      <div class="mb-3">
        <label>Langkah</label>
        <textarea name="langkah" class="form-control" rows="3"></textarea>
      </div>
      <div class="mb-3">
        <label>Gambar</label>
        <input type="file" name="gambar" class="form-control">
      </div>
      <button name="simpan" class="btn btn-success">Simpan</button>
      <a href="dashboard.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</div>
</body>
</html>
>>>>>>> e37a2ad (crud selesai)
