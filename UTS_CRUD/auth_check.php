<<<<<<< HEAD
<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['admin'])) {
    // Arahkan ke login.php, BUKAN index.php
    header("Location: login.php");
    exit;
}
?>
=======
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>
>>>>>>> e37a2ad (crud selesai)
