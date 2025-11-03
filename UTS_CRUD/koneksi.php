<?php
$host = "localhost";
$dbname = "UTS";
$user = "postgres";
$password = "12345678"; 

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
  die("Koneksi ke database gagal: " . pg_last_error());
}
?>
