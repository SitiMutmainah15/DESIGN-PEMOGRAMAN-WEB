<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali   = $a * $b;
$hasilBagi   = $a / $b;
$sisaBagi    = $a % $b;
$pangkat     = $a ** $b;

echo "Hasil Penjumlahan: {$hasilTambah} <br>";
echo "Hasil Pengurangan: {$hasilKurang} <br>";
echo "Hasil Perkalian: {$hasilKali} <br>";
echo "Hasil Pembagian: {$hasilBagi} <br>";
echo "Sisa Bagi: {$sisaBagi} <br>";
echo "Pangkat: {$pangkat} <br>";
?>

<?php
$a = 10;
$b = 5;

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "<h3>Hasil Perbandingan</h3>";
echo "Apakah a sama dengan b? " . ($hasilSama ? "Ya" : "Tidak") . "<br>";
echo "Apakah a tidak sama dengan b? " . ($hasilTidakSama ? "Ya" : "Tidak") . "<br>";
echo "Apakah a lebih kecil dari b? " . ($hasilLebihKecil ? "Ya" : "Tidak") . "<br>";
echo "Apakah a lebih besar dari b? " . ($hasilLebihBesar ? "Ya" : "Tidak") . "<br>";
echo "Apakah a lebih kecil atau sama dengan b? " . ($hasilLebihKecilSama ? "Ya" : "Tidak") . "<br>";
echo "Apakah a lebih besar atau sama dengan b? " . ($hasilLebihBesarSama ? "Ya" : "Tidak") . "<br>";
?>

<?php
$a = true;
$b = false;

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "<h3>Hasil Operasi Logika</h3>";
echo "Apakah a AND b? " . ($hasilAnd ? "True" : "False") . "<br>";
echo "Apakah a OR b? " . ($hasilOr ? "True" : "False") . "<br>";
echo "NOT a adalah " . ($hasilNotA ? "True" : "False") . "<br>";
echo "NOT b adalah " . ($hasilNotB ? "True" : "False") . "<br>";
?>

<?php
$a = 10;
$b = 5;

echo "<h3>Demo Operator</h3>";

echo "Nilai awal \$a: " . $a . "<br>";
echo "Nilai \$b: " . $b . "<br>";

$a += $b;
echo "Hasil dari \$a += \$b adalah: " . $a . "<br>";
$a = 10;
$a -= $b;
echo "Hasil dari \$a -= \$b adalah: " . $a . "<br>";
$a *= $b;
echo "Hasil dari \$a *= \$b adalah: " . $a . "<br>";
$a = 10;
$a /= $b;
echo "Hasil dari \$a /= \$b adalah: " . $a . "<br>";
$a = 10;
$a %= $b;
echo "Hasil dari \$a %= \$b adalah: " . $a . "<br>";
?>

<?php
$a = 10;
$b = "10";
echo "<h3>Perbandingan</h3>";

echo "Nilai \$a adalah: " . $a . "<br>";
echo "Nilai \$b adalah: " . $b . "<br><br>";

$hasilIdentik = ($a === $b);
echo "Hasil \$a === \$b (identik): ";
var_dump($hasilIdentik);
echo "<br>";

$hasilTidakIdentik = ($a !== $b);
echo "Hasil \$a !== \$b (tidak identik): ";
var_dump($hasilTidakIdentik);
?>

<?php
$totalKursi = 45;
$kursiTerisi = 28;

$kursiKosong = $totalKursi - $kursiTerisi;
$persenKosong = ($kursiKosong / $totalKursi) * 100;

echo "<h3>Hitung Persentase Kursi Kosong</h3>";
echo "Total kursi: " . $totalKursi . "<br>";
echo "Kursi terisi: " . $kursiTerisi . "<br>";
echo "Kursi kosong: " . $kursiKosong . "<br>";
echo "Persentase kursi kosong: " . round($persenKosong, 2) . "%";
?>
