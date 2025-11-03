<?php
session_start();
$err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Ganti sesuai kebutuhan login kamu
    if ($user === "admin" && $pass === "12345") {
        $_SESSION['admin'] = true;
        header("Location: index.php");
        exit;
    } else {
        $err = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
  <div class="card shadow p-4" style="width: 360px;">
    <h3 class="text-center mb-3">Login Admin</h3>

    <?php if ($err): ?>
      <div class="alert alert-danger"><?= $err ?></div>
    <?php endif; ?>

    <form method="POST">
      <input type="text" class="form-control mb-3" name="username" placeholder="Username" required>
      <input type="password" class="form-control mb-3" name="password" placeholder="Password" required>
      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
  </div>
</body>
</html>
