<?php
include 'koneksi.php';
$query = "SELECT * FROM mahasiswa ORDER BY id ASC";
$result = pg_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>📘 Sistem Data Mahasiswa</header>

<div class="container">
    <h2>Daftar Mahasiswa</h2>

    <a class="add-btn" href="tambah.php">+ Tambah Mahasiswa</a>

    <table>
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Tanggal Dibuat</th>
            <th>Aksi</th>
        </tr>

        <?php
        if (pg_num_rows($result) == 0) {
            echo "<tr><td colspan='7' class='no-data'>Belum ada data mahasiswa.</td></tr>";
        } else {
            while ($row = pg_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['nim']}</td>";
                echo "<td>{$row['nama']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['jurusan']}</td>";
                echo "<td>{$row['created_at']}</td>";
                echo "<td>
                        <a class='aksi-btn edit-btn' href='edit.php?id={$row['id']}'>Edit</a>
                        <a class='aksi-btn delete-btn' href='hapus.php?id={$row['id']}' onclick=\"return confirm('Yakin ingin menghapus data ini?');\">Hapus</a>
                      </td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>

</body>
</html>
