<?php
$nilaiNumerik = 92;

if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
    echo "Nilai huruf: A";
} elseif ($nilaiNumerik >= 80 && $nilaiNumerik < 90) {
    echo "Nilai huruf: B";
} elseif ($nilaiNumerik >= 70 && $nilaiNumerik < 80) {
    echo "Nilai huruf: C";
} elseif ($nilaiNumerik < 70) {
    echo "Nilai huruf: D";
}
?>

<?php
$jarakSaatIni = 0;
$jarakTarget = 500;
$peningkatanHarian = 30;
$hari = 0;

while ($jarakSaatIni < $jarakTarget) {
    $jarakSaatIni += $peningkatanHarian;
    $hari++;
}

echo "<h3>Perhitungan Jarak Atlet</h3>";
echo "Target jarak: " . $jarakTarget . " km<br>";
echo "Peningkatan harian: " . $peningkatanHarian . " km<br>";
echo "Total hari yang dibutuhkan: " . $hari . " hari<br><br>";
echo "Atlet tersebut memerlukan <b>$hari hari</b> untuk mencapai jarak $jarakTarget kilometer.";
?>

<?php
$jumlahLahan = 10;
$tanamanPerLahan = 5;
$buahPerTanaman = 10;
$jumlahBuah = 0;

for ($i = 1; $i <= $jumlahLahan; $i++) {
    $jumlahBuah += ($tanamanPerLahan * $buahPerTanaman);
}

echo "<h3>Perhitungan Panen Buah</h3>";
echo "Jumlah lahan: " . $jumlahLahan . "<br>";
echo "Tanaman per lahan: " . $tanamanPerLahan . "<br>";
echo "Buah per tanaman: " . $buahPerTanaman . "<br><br>";
echo "Total buah yang akan dipanen adalah: <b>$jumlahBuah</b>";
?>

<?php
$skorUjian = [85, 92, 78, 96, 88];
$totalSkor = 0;

foreach ($skorUjian as $skor) {
    $totalSkor += $skor;
}

echo "<h3>Perhitungan Skor Ujian</h3>";
echo "Daftar skor: " . implode(", ", $skorUjian) . "<br>";
echo "Total skor ujian adalah: <b>$totalSkor</b><br>";

$rataRata = $totalSkor / count($skorUjian);
echo "Rata-rata skor ujian adalah: <b>" . round($rataRata, 2) . "</b>";
?>

<?php
$nilaiSiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70, 96];

echo "<h3>Hasil Kelulusan Siswa</h3>";

foreach ($nilaiSiswa as $nilai) {
    if ($nilai < 60) {
        echo "Nilai: $nilai <b>(Tidak lulus)</b> <br>";
        continue;
    }
    echo "Nilai: $nilai <b>(Lulus)</b> <br>";
}
?>

<?php
$nilaiSiswa = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];

echo "<h3>Perhitungan Total Nilai (Soal 4.6)</h3>";
echo "Daftar nilai siswa: " . implode(", ", $nilaiSiswa) . "<br><br>";

sort($nilaiSiswa);

array_shift($nilaiSiswa); // hapus nilai terendah pertama
array_shift($nilaiSiswa); // hapus nilai terendah kedua
array_pop($nilaiSiswa);   // hapus nilai tertinggi pertama
array_pop($nilaiSiswa);   // hapus nilai tertinggi kedua

$totalNilai = array_sum($nilaiSiswa);
$rataRata = $totalNilai / count($nilaiSiswa);

echo "Total nilai setelah mengabaikan 2 tertinggi & 2 terendah: <b>$totalNilai</b><br>";
echo "Rata-rata nilai: <b>" . round($rataRata, 2) . "</b>";
?>

<?php
$hargaProduk = 120000;
$diskon = 0;

if ($hargaProduk > 100000) {
    $diskon = 0.20 * $hargaProduk;
}

$hargaAkhir = $hargaProduk - $diskon;

echo "<h3>Hitung Harga Setelah Diskon</h3>";
echo "Harga produk: Rp " . number_format($hargaProduk, 0, ',', '.') . "<br>";
echo "Diskon: Rp " . number_format($diskon, 0, ',', '.') . "<br>";
echo "Harga yang harus dibayar: <b>Rp " . number_format($hargaAkhir, 0, ',', '.') . "</b><br><br>";
?>

<?php
$totalPoin = 520;

echo "<h3>Total Skor Pemain</h3>";
echo "Total skor pemain adalah: $totalPoin<br>";

if ($totalPoin > 500) {
    echo "Apakah pemain mendapatkan hadiah tambahan? YA";
} else {
    echo "Apakah pemain mendapatkan hadiah tambahan? TIDAK";
}
?>
