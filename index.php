<?php
session_start();
error_reporting(0);
if(isset($_POST['login'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $open = file_get_contents('login.txt');
    $conten = explode("\n", $open);
    foreach($conten as $isi){
        $data = explode(",", $isi);
        $nik = $data[0];
        $name = $data[1];

        if($user == $_POST['user'] && $pass == $_POST['pass']){
            $_SESSION['login'] = true;
            $_SESSION['user'] = $user;
            header('Location: Homepage/');
            
        } else {
            $eror = "Username dan Password tidak ditemukan";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta pass="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="style/code.css">
    <title>LOGIN GAES</title>
</head>
<body>
    <div class="card">
        <h1 align="center">Silahkan Masuk</h1>
        <form action="" method="post">
            <p style="color: red;"><?php if(isset($eror)){ echo $eror; } ?></p>
            <label for="user">Username :</label>
            <input type="text" name="user" id="user" placeholder="Username">
            <label for="pass">Password :</label>
            <input type="password" name="pass" id="pass" placeholder="Password">
            <button type="submit" name="login">LOGIN</button>
            <p><a href="REGISTRASI.php">Akun Baru</a> | <a href="lupa-sandi.php">Lupa Sandi</a></p>
        </form>
    </div>
    <div class="sosmed">
        <ul>
            <a href="https://github.com/Putra-28"><li>
                <i class='bx bxl-github'></i>
            </li></a>
            <a href="https://www.instagram.com/rplsmkn1_/"><li>
                <i class='bx bxl-instagram-alt' ></i>
            </li></a>
            <a href="#"><li>
                <i class='bx bxl-whatsapp'></i>
            </li></a>
        </ul>
    </div>
</body>
</html>