<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'koneksi.php';

if (!$conn) {
    die("Koneksi database gagal: " . pg_last_error());
}

$search = isset($_GET['q']) ? $_GET['q'] : '';
$query = "SELECT * FROM menu WHERE nama ILIKE '%$search%' ORDER BY id ASC";
$result = pg_query($conn, $query);

if (!$result) {
    die("Query gagal: " . pg_last_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Menu Makanan</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8fafc;
      font-family: "Segoe UI", sans-serif;
    }

    .navbar {
      background-color: #fff;
      border-bottom: 1px solid #e0e0e0;
    }

    .navbar-brand {
      font-weight: 600;
      color: #222 !important;
    }

    h1.page-title {
      font-weight: 700;
      text-align: center;
      color: #333;
      margin-top: 40px;
      margin-bottom: 30px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .search-bar {
      max-width: 400px;
    }

    .card {
      border: none;
      transition: all 0.3s ease;
    }

    .card:hover {
      transform: translateY(-4px);
      box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    }

    .card-img {
      object-fit: cover;
      height: 180px;
      border-radius: 6px 6px 0 0;
    }

    .collapse-box {
      background: #f9fafb;
      border-radius: 6px;
      padding: 10px;
      border: 1px solid #ddd;
      font-size: 14px;
    }

    footer {
      border-top: 1px solid #e0e0e0;
      background: #fff;
      padding: 15px;
      font-size: 14px;
      color: #777;
      text-align: center;
      margin-top: 50px;
    }
  </style>
</head>

<body>

<nav class="navbar navbar-light shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#"><span class="fw-bold">Daftar Menu</span></a>
    <a href="login.php" class="btn btn-outline-primary btn-sm">Admin Login</a>
  </div>
</nav>

<div class="container">
  <h1 class="page-title">Menu Makanan</h1>

  <div class="d-flex justify-content-center mb-4">
    <form method="GET" class="d-flex search-bar">
      <input type="text" name="q" class="form-control me-2" placeholder="Cari menu..." value="<?= htmlspecialchars($search) ?>">
      <button class="btn btn-primary">Cari</button>
    </form>
  </div>

  <div class="row g-4">
    <?php if (pg_num_rows($result) > 0): ?>
      <?php while ($row = pg_fetch_assoc($result)): ?>
        <?php
        $img = !empty($row['gambar']) ? htmlspecialchars($row['gambar']) : 'default.jpg';
        $img_path = "upload/" . $img;
        if (!file_exists($img_path)) $img_path = "assets/images/default.jpg";
        ?>
        <div class="col-sm-6 col-md-4">
          <div class="card h-100 shadow-sm">
            <img src="<?= $img_path ?>" class="card-img" alt="<?= htmlspecialchars($row['nama']) ?>">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title fw-semibold"><?= htmlspecialchars($row['nama']) ?></h5>
              <p class="text-muted small mb-1"><?= htmlspecialchars($row['kategori']) ?></p>
              <p class="card-text small"><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></p>

              <?php if (!empty($row['bahan'])): ?>
                <button class="btn btn-outline-success btn-sm mt-2" type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#bahan<?= $row['id'] ?>">
                  Lihat Bahan-Bahan
                </button>
                <div class="collapse mt-2" id="bahan<?= $row['id'] ?>">
                  <div class="collapse-box"><?= nl2br(htmlspecialchars($row['bahan'])) ?></div>
                </div>
              <?php endif; ?>

              <?php if (!empty($row['langkah'])): ?>
                <button class="btn btn-outline-secondary btn-sm mt-2" type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#langkah<?= $row['id'] ?>">
                  Lihat Langkah Memasak
                </button>
                <div class="collapse mt-2" id="langkah<?= $row['id'] ?>">
                  <div class="collapse-box"><?= nl2br(htmlspecialchars($row['langkah'])) ?></div>
                </div>
              <?php endif; ?>

              <div class="mt-auto pt-3">
                <span class="badge bg-secondary">ID <?= $row['id'] ?></span>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <div class="col-12 text-center">
        <div class="alert alert-info">Belum ada menu tersedia.</div>
      </div>
    <?php endif; ?>
  </div>
</div>

<footer>
  &copy; <?= date('Y') ?> Daftar Menu Makanan — Semua Hak Dilindungi
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
