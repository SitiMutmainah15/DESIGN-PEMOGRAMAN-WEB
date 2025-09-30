<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h2>Array Terindeks</h2>
<?php
$Listdosen = ["Elok Nur Hamdana","Unggul Pamenang","Bagas Nugraha"];

// Menampilkan dengan indeks manual
echo $Listdosen[2] . "<br>";
echo $Listdosen[0] . "<br>";
echo $Listdosen[1] . "<br>";

echo "<hr>";

// Menampilkan dengan loop
foreach ($Listdosen as $dosen) {
    echo $dosen . "<br>";
}
?>
</body>
</html>
