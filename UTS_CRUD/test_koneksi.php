<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

if ($conn) {
  echo "Koneksi PostgreSQL berhasil!";
} else {
  echo "Gagal koneksi: " . pg_last_error();
}
?>
