<?php

function perkenalan(){
    echo "Assalamualaikum, <br>";
    echo "Perkenalkan, nama saya Siti Mutmainah<br>";
    echo "Senang berkenalan dengan Anda<br><br>";
}

// memanggil fungsi dua kali
perkenalan();
perkenalan();

?>

<?php
echo"<br>";
//membuat fungsi
function perkenalan1($nama, $salam){
    echo $salam.", ";
    echo "Perkenalkan, nama saya ".$nama."<br/>";
    echo "Senang berkenalan dengan Anda<br/>";
}

//memanggil fungsi yang sudah dibuat
perkenalan1("Hamdana","Hallo");

echo "<hr>";

$saya = "Elok";
$ucapanSalam = "Selamat pagi";

//memanggil lagi
perkenalan1($saya,$ucapanSalam);
?>

<?php
echo"<br>";
//membuat fungsi
function perkenalan2($nama, $salam="Assalamualaikum"){
    echo $salam.", ";
    echo "Perkenalkan, nama saya ".$nama."<br/>";
    echo "Senang berkenalan dengan Anda<br/>";
}

//memanggil fungsi yang sudah dibuat
perkenalan2("Hamdana","Hallo");

echo "<hr>";

$saya = "Elok";
$ucapanSalam = "Selamat pagi";

//memanggil lagi tanpa mengisi parameter salam
perkenalan2($saya);
?>

