<?php
$host = "localhost";
$dbname = "Belajar"; 
$user = "postgres";
$password = "12345678"; 

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Koneksi gagal: " . pg_last_error());
} else {
    echo "Koneksi berhasil!";
}
?>