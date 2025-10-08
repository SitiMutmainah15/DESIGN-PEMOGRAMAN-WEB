<?php
$input = "";
$email_aman = "";
$pesan = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = isset($_POST['input']) ? htmlspecialchars(trim($_POST['input']), ENT_QUOTES, 'UTF-8') : "";
    $email_raw = isset($_POST['email']) ? trim($_POST['email']) : "";
    if ($email_raw !== "" && filter_var($email_raw, FILTER_VALIDATE_EMAIL)) {
        $email_aman = htmlspecialchars($email_raw, ENT_QUOTES, 'UTF-8');
        $pesan = "Data berhasil diproses!";
    } else {
        $pesan = "Alamat email tidak valid!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Input Aman</title>
</head>
<body>
    <h2>Contoh Input Aman dengan Validasi Email</h2>

    <form method="post" action="">
        Masukkan teks: <br>
        <input type="text" name="input" value="<?php echo $input; ?>" required><br><br>

        Masukkan email: <br>
        <input type="email" name="email" value="<?php echo $email_aman; ?>" required><br><br>

        <input type="submit" value="Kirim">
    </form>

    <hr>

    <?php
    if ($pesan !== "") {
        echo "<p><b>$pesan</b></p>";

        if ($pesan === "Data berhasil diproses!") {
            echo "<p>Hasil input yang aman:</p>";
            echo "Teks: <b>$input</b><br>";
            echo "Email: <b>$email_aman</b>";
        }
    }
    ?>
</body>
</html>
