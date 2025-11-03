<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['admin'])) {
    // Arahkan ke login.php, BUKAN index.php
    header("Location: login.php");
    exit;
}
?>
