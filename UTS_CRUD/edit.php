<<<<<<< HEAD
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
=======
<?php
require_once 'auth_check.php';
require_once __DIR__ . '/dir_/koneksi.php';

$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM menu WHERE id = :id");
$stmt->execute(['id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$data) die("Data tidak ditemukan!");

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $bahan = $_POST['bahan'];
    $langkah = $_POST['langkah'];

    $gambar = $_FILES['gambar']['name'] ?? '';
    $tmp = $_FILES['gambar']['tmp_name'] ?? '';
    $folder = "upload/";

    if ($gambar) {
        move_uploaded_file($tmp, $folder . $gambar);
    } else {
        $gambar = $data['gambar'];
    }

    $stmt = $pdo->prepare("UPDATE menu SET nama=:n, kategori=:k, deskripsi=:d, bahan=:b, langkah=:l, gambar=:g WHERE id=:id");
    $stmt->execute([
        'n' => $nama,
        'k' => $kategori,
        'd' => $deskripsi,
        'b' => $bahan,
        'l' => $langkah,
        'g' => $gambar,
        'id' => $id
    ]);

    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Menu</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#f8fafc;font-family:'Segoe UI',sans-serif;">
<nav class="navbar navbar-light bg-white shadow-sm px-4">
  <a class="navbar-brand fw-bold">Edit Menu</a>
  <a href="dashboard.php" class="btn btn-outline-secondary btn-sm">Kembali</a>
</nav>

<div class="container mt-4">
  <div class="card shadow-sm p-4">
    <h4 class="mb-3">Form Edit Menu</h4>
    <form method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label>Nama</label>
          <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
          <label>Kategori</label>
          <input type="text" name="kategori" value="<?= htmlspecialchars($data['kategori']); ?>" class="form-control" required>
        </div>
      </div>
      <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3"><?= htmlspecialchars($data['deskripsi']); ?></textarea>
      </div>
      <div class="mb-3">
        <label>Bahan</label>
        <textarea name="bahan" class="form-control" rows="3"><?= htmlspecialchars($data['bahan']); ?></textarea>
      </div>
      <div class="mb-3">
        <label>Langkah</label>
        <textarea name="langkah" class="form-control" rows="3"><?= htmlspecialchars($data['langkah']); ?></textarea>
      </div>
      <div class="mb-3">
        <label>Gambar</label>
        <input type="file" name="gambar" class="form-control">
        <p class="small mt-2">Gambar saat ini:</p>
        <img src="upload/<?= htmlspecialchars($data['gambar']); ?>" width="100" class="rounded shadow-sm">
      </div>
      <button name="update" class="btn btn-primary">Update</button>
      <a href="dashboard.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</div>
</body>
</html>
>>>>>>> e37a2ad (crud selesai)
