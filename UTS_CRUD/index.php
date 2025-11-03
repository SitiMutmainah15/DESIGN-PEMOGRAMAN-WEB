<?php
// Aktifkan error report agar mudah debug
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'auth_check.php';
include 'koneksi.php';

// Cek koneksi
if (!$conn) {
  die("Koneksi ke database gagal: " . pg_last_error());
}

// Ambil parameter pencarian
$search = isset($_GET['q']) ? $_GET['q'] : '';

// Query menu
$query = "SELECT * FROM menu WHERE nama ILIKE '%$search%' ORDER BY id ASC";
$result = pg_query($conn, $query);

if (!$result) {
  die("Query gagal: " . pg_last_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Menu Makanan — Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-primary shadow">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">Menu Makanan — Admin</a>
      <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
    </div>
  </nav>

  <!-- Konten -->
  <div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="fw-semibold">Daftar Menu</h2>
      <a href="tambah.php" class="btn btn-success shadow-sm">+ Tambah Menu</a>
    </div>

    <!-- Pencarian -->
    <form class="mb-3" method="GET">
      <input type="text" name="q" class="form-control shadow-sm"
             placeholder="Cari menu berdasarkan nama..."
             value="<?= htmlspecialchars($search) ?>">
    </form>

    <!-- Tabel Menu -->
    <div class="table-responsive">
      <table class="table table-bordered table-hover bg-white shadow-sm align-middle">
        <thead class="table-primary text-center align-middle">
          <tr>
            <th style="width:50px;">ID</th>
            <th style="width:100px;">Gambar</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>Bahan-Bahan</th>
            <th>Langkah Memasak</th>
            <th style="width:130px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (pg_num_rows($result) > 0): ?>
            <?php while ($row = pg_fetch_assoc($result)): ?>
              <tr>
                <td class="text-center"><?= htmlspecialchars($row['id']) ?></td>
                <td class="text-center">
                  <img src="upload/<?= !empty($row['gambar']) ? htmlspecialchars($row['gambar']) : 'default.jpg' ?>"
                       width="80" class="rounded border">
                </td>
                <td><strong><?= htmlspecialchars($row['nama']) ?></strong></td>
                <td><?= htmlspecialchars($row['kategori']) ?></td>
                <td><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></td>
                <td><?= nl2br(htmlspecialchars($row['bahan'])) ?></td>
                <td><?= nl2br(htmlspecialchars($row['langkah'])) ?></td>
                <td class="text-center">
                  <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm mb-1">Edit</a><br>
                  <a href="hapus.php?id=<?= $row['id'] ?>"
                     class="btn btn-danger btn-sm"
                     onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="8" class="text-center text-muted py-3">Belum ada data menu yang tersedia.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
