<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $errors = [];

  if(empty($nama)) $errors[] = "Nama harus diisi.";
  if(empty($email)) $errors[] = "Email harus diisi.";
  elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Format email salah.";
  if(strlen($password) < 8) $errors[] = "Password minimal 8 karakter.";

  if(!empty($errors)){
    foreach($errors as $err){
      echo "<span style='color:red;'>$err</span><br>";
    }
  } else {
    echo "Data berhasil dikirim!<br>Nama: $nama<br>Email: $email";
  }
}
?>
