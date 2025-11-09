<<<<<<< HEAD
<?php
include 'auth_check.php';
include 'koneksi.php';

$id = $_GET['id'];
pg_query($conn, "DELETE FROM menu WHERE id=$id");
header("Location: index.php");
?>
=======
<?php
include 'auth_check.php';
include 'koneksi.php';

//ambil id menu 
$id = $_GET['id'];

//perintah sql hapus tabel menu
pg_query($conn, "DELETE FROM menu WHERE id=$id");
header("Location: index.php");
//setelah selesai dialihkan ke index.php
?>
>>>>>>> e37a2ad (crud selesai)
