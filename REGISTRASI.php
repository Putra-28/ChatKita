<?php

if(isset($_POST['daftar'])){
    $nama = $_POST['nama'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $confir = $_POST['confir'];
    $hp = $_POST['hp'];

    if($pass != $confir){
        $msg = "Konfirmasi Password Salah";
    } else {
        $write = "Nama = $nama\nUsername = $user\nPassword = $pass\nKonfirmasi pw = $confir\nNO = $hp\n";
        $file = "verifikasi/$hp.txt";
        $dir = dirname($file);
        if(!is_dir($dir)){
            mkdir($dir, 0755, true);
        }
        $files = fopen($file, "a+");
        if(fwrite($files, $write)){
            null;
        }
        $open = fopen("login.txt", "a+");
        $wr = $user . "," . $pass . "\n";
        $add = fwrite($open, $wr);
        if($add > 0){
            echo "<script>alert('Akun Sudah Berhasil dibuat Silahkan Login')</script>";
        }
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/code.css">
    <title>Buat Akun</title>
</head>
<body>
    <div class="con-daftar">
        <h1>Buat Akun</h1>
        <form action="" method="post">
            <p style="color: red; font-size: 12px; text-align: center;"><?php if(isset($msg)){ echo $msg; } ?></p><br>
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama">
            <label for="user">Username (untuk login)</label>
            <input type="text" name="user" id="user">
            <label for="pass">Password</label>
            <input type="password" name="pass" id="pass">
            <label for="confir">Konfirmasi Password</label>
            <input type="password" name="confir" id="confir">
            <label for="nohp">NO. Handphone <p style="color: red;">(!! Jangan ada yang tau!!)</p></label>
            <input type="number" name="hp" id="hp">

            <button type="submit" name="daftar">Buat Akun</button>
            <p align="center">Sudah punya akun? <a href="./">Masuk</a></p>
        </form>
        
    </div>
</body>
</html>