<?php
include 'koneksi.php';
//header("Content-Type: application/json");

$result = pg_query($conn, "SELECT * FROM menu ORDER BY id ASC");
$data = pg_fetch_all($result);

echo json_encode($data ?: []);
?>
