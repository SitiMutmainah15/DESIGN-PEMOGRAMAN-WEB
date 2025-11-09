<?php
require_once __DIR__ . '/dir_/koneksi.php';

if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:u, :p)");
    $stmt->execute(['u' => $username, 'p' => $password]);

    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Register Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
<div class="card p-4 shadow" style="width:400px;">
  <h4 class="text-center mb-3">Buat Akun Baru</h4>
  <form method="POST">
    <div class="mb-3">
      <label>Username</label>
      <input type="text" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <button name="register" class="btn btn-success w-100">Daftar</button>
    <p class="text-center mt-3 small">Sudah punya akun? <a href="login.php">Login di sini</a></p>
  </form>
</div>
</body>
</html>
