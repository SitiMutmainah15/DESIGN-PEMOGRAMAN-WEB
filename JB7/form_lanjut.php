<!DOCTYPE html>
<html>
<head>
    <title>Contoh Form Dengan PHP</title>
</head>
<body>
    <h2>Form Contoh</h2>
    <form method="POST" action="proses_lanjut.php">
        <label for="buah">Pilih Buah:</label><br>
        <select name="buah" id="buah">
            <option value="Apel">Apel</option>
            <option value="Pisang">Pisang</option>
            <option value="Mangga">Mangga</option>
            <option value="Jeruk">Jeruk</option>
        </select>
        <br><br>

        <label>Pilih Warna Favorit:</label><br>
        <input type="checkbox" name="warna[]" value="merah"> Merah<br>
        <input type="checkbox" name="warna[]" value="biru"> Biru<br>
        <input type="checkbox" name="warna[]" value="hijau"> Hijau<br>
        <br>

        <label>Pilih Jenis Kelamin:</label><br>
        <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki<br>
        <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan<br>
        <br>

        <input type="submit" value="Submit">
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedBuah = $_POST['buah'];
    if (isset($_POST['warna'])) {
        $selectedWarna = $_POST['warna'];
    } else {
        $selectedWarna = []; 
    }
    $selectedJenisKelamin = $_POST['jenis_kelamin'];
    echo "Anda memilih buah: " . $selectedBuah . "<br>";
    if (!empty($selectedWarna)) {
        echo "Warna favorit Anda: " . implode(", ", $selectedWarna) . "<br>";
    } else {
        echo "Anda tidak memilih warna favorit.<br>";
    }
    
    echo "Jenis kelamin Anda: " . $selectedJenisKelamin;
}
?>
</body>
</html>