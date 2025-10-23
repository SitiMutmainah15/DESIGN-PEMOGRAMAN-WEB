<?php
$host = 'localhost';
$port = '5432';
$dbname = 'db_laptop'; 
$user = 'postgres';
$pass = '12345678';

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
if (!$conn) {
    die('Koneksi gagal: ' . pg_last_error());
}

pg_set_client_encoding($conn, 'UTF8');

$sql = 'SELECT 
            "id" AS "id",
            "merk" AS "merk",
            "tipe" AS "tipe",
            "prosesor" AS "prosesor",
            "ram" AS "ram",
            "harga" AS "harga"
        FROM "TB_laptop"
        ORDER BY "id" ASC';

$result = pg_query($conn, $sql);
if (!$result) {
    die('Query gagal: ' . pg_last_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Laptop</title>
</head>
<body>
    <h1>Daftar Laptop</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Merk</th>
            <th>Tipe</th>
            <th>Prosesor</th>
            <th>RAM</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php
        $i = 1;
        while ($row = pg_fetch_assoc($result)):
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo htmlspecialchars($row['merk'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($row['tipe'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($row['prosesor'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($row['ram'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
            <td>
                <a href="#">Edit</a> |
                <a href="#">Hapus</a>
            </td>
        </tr>
        <?php
        $i++;
        endwhile;
        ?>
    </table>
</body>
</html>

<?php

pg_free_result($result);
pg_close($conn);
?>
