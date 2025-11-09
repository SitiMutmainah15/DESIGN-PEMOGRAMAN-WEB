<?php
include 'koneksi.php';
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$nama = $data['nama'];
$kategori = $data['kategori'];
$deskripsi = $data['deskripsi'];

$query = "UPDATE menu SET 
            nama='$nama', 
            kategori='$kategori', 
            deskripsi='$deskripsi', 
            gambar='$gambar', 
            langkah='$langkah' 
          WHERE id=$id";

$result = pg_query($conn, $query);

if ($result) {
  echo json_encode(["success" => true, "message" => "Data berhasil diupdate"]);
} else {
  echo json_encode(["success" => false, "message" => pg_last_error($conn)]);
}
?>
