<?php
//membuat fungsi
function hitungUmur($thn_lahir, $thn_sekarang){
    $umur = $thn_sekarang - $thn_lahir;
    return $umur;
}

echo "Umur saya adalah ". hitungUmur(2006, 2023) ." tahun"; // isi sesuai dengan tahun lahir kalian
?>

<?php
echo"<br>";
//membuat fungsi
function hitungUmur1($thn_lahir, $thn_sekarang){
    $umur = $thn_sekarang - $thn_lahir;
    return $umur;
}

function perkenalan2 ($nama, $salam="Assalamualaikum") {
    echo $salam.",<br>";
    echo "Perkenalkan, nama saya ".$nama."<br/>";

    //memanggil fungsi lain
    echo "Saya berusia ". hitungUmur(1988, 2023) ." tahun<br/>";
    echo "Senang berkenalan dengan anda<br/>";
}

//memanggil fungsi perkenalan
perkenalan2("Elok");
?>
