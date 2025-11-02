<?php
$host = "localhost";
$dbname = "Belajar";  // sesuaikan dengan nama database kamu
$user = "postgres";
$password = "12345678"; // ganti dengan password PostgreSQL kamu

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Koneksi gagal: " . pg_last_error());
} else {
    echo "Koneksi berhasil!";
}
?>
