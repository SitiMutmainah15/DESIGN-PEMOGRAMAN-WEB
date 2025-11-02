<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    die("Error: ID tidak ditemukan.");
}

$id = $_GET['id'];
$query = "DELETE FROM mahasiswa WHERE id = $id";
$result = pg_query($conn, $query);

if ($result) {
    header("Location: index.php");
    exit;
} else {
    echo "Gagal menghapus data: " . pg_last_error($conn);
}
?>
