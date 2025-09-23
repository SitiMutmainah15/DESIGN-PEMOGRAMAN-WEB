<?php
$nilaiSiswa = [85, 92, 78, 64, 90, 55, 88, 79, 70, 96];

$nilaiLulus = [];

foreach ($nilaiSiswa as $nilai) {
    if ($nilai >= 70) {
        $nilaiLulus[] = $nilai;
    }
}

echo "Daftar nilai siswa yang lulus: " . implode(', ', $nilaiLulus);
?>

<?php
echo "<h2>Daftar Karyawan dengan Pengalaman > 5 Tahun</h2>";

$daftarKaryawan = [
    ['Alice', 7],
    ['Bob', 3],
    ['Charlie', 9],
    ['David', 5],
    ['Eva', 6],
];

$karyawanPengalamanLimaTahun = [];

foreach ($daftarKaryawan as $karyawan) {
    if ($karyawan[1] > 5) {
        $karyawanPengalamanLimaTahun[] = $karyawan[0];
    }
}

echo "Karyawan yang memenuhi syarat:<br>";
echo implode(', ', $karyawanPengalamanLimaTahun);
?>

<?php
echo "<h2>Daftar Nilai Mahasiswa</h2>";

$daftarNilai = [
    'Matematika' => [
        ['Alice', 85],
        ['Bob', 92],
        ['Charlie', 78],
    ],
    'Fisika' => [
        ['Alice', 90],
        ['Bob', 88],
        ['Charlie', 75],
    ],
    'Kimia' => [
        ['Alice', 92],
        ['Bob', 80],
        ['Charlie', 85],
    ],
];

$mataKuliah = 'Fisika';

echo "<h3>Mata Kuliah: $mataKuliah</h3>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Nama</th><th>Nilai</th></tr>";

foreach ($daftarNilai[$mataKuliah] as $nilai) {
    echo "<tr><td>{$nilai[0]}</td><td>{$nilai[1]}</td></tr>";
}

echo "</table>";
?>

<?php
$daftarNilai = [
    ['Alice', 85],
    ['Bob', 92],
    ['Charlie', 78],
    ['David', 64],
    ['Eva', 90],
];

$totalNilai = 0;
foreach ($daftarNilai as $siswa) {
    $totalNilai += $siswa[1];
}
$rataRata = $totalNilai / count($daftarNilai);

echo "<h2>Daftar Nilai Siswa</h2>";
echo "Rata-rata kelas: <b>$rataRata</b><br><br>";

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Nama</th><th>Nilai</th></tr>";

foreach ($daftarNilai as $siswa) {
    if ($siswa[1] > $rataRata) {
        echo "<tr><td>{$siswa[0]}</td><td>{$siswa[1]}</td></tr>";
    }
}

echo "</table>";
?>
