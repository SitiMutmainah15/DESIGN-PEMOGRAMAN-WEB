<<<<<<< HEAD
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
=======
<?php
session_start();
require_once __DIR__ . '/dir_/koneksi.php';

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
  background-color: #f8fafc;
  font-family: "Segoe UI", sans-serif;
}
.card {
  border: none;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  transition: all 0.3s ease;
}
.card:hover {
  transform: translateY(-3px);
}
</style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
<div class="card p-4" style="width: 400px;">
  <h4 class="text-center mb-3">Login Admin</h4>
  <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
  <form method="POST">
    <div class="mb-3">
      <label>Username</label>
      <input type="text" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <button name="login" class="btn btn-primary w-100">Masuk</button>
    <p class="text-center mt-3 small">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
  </form>
</div>
</body>
</html>
>>>>>>> e37a2ad (crud selesai)
