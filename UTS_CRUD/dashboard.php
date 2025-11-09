<?php
session_start();

// Cek apakah sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum login, alihkan ke halaman utama (publik)
    header("Location: index.php");
    exit;
}

require_once __DIR__ . '/dir_/koneksi.php';

// Ambil data menu dari database
$stmt = $pdo->query("SELECT * FROM menu ORDER BY id DESC");
$menu = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#f8fafc; font-family:'Segoe UI',sans-serif;">

<nav class="navbar navbar-light bg-white shadow-sm sticky-top px-4">
  <a class="navbar-brand fw-bold">Dashboard CRUD Menu</a>
  <div>
    <span class="text-muted small me-3">Selamat datang, <?= htmlspecialchars($_SESSION['username']); ?></span>
    <a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
  </div>
</nav>

<div class="container mt-4">
  <h3 class="mb-3">Daftar Menu</h3>
  <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Menu</a>

  <table class="table table-hover table-bordered align-middle bg-white shadow-sm">
    <thead class="table-dark">
      <tr>
        <th>No</th><th>Nama</th><th>Kategori</th><th>Deskripsi</th><th>Gambar</th><th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach($menu as $row): ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= htmlspecialchars($row['nama']); ?></td>
        <td><?= htmlspecialchars($row['kategori']); ?></td>
        <td><?= htmlspecialchars($row['deskripsi']); ?></td>
        <td><img src="upload/<?= htmlspecialchars($row['gambar']); ?>" width="60" class="rounded"></td>
        <td>
          <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus data ini?')">Hapus</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
</body>
</html>
