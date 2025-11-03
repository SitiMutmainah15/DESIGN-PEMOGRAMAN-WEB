<?php
include 'auth_check.php';
include 'koneksi.php';

$id = $_GET['id'];
pg_query($conn, "DELETE FROM menu WHERE id=$id");
header("Location: index.php");
?>
