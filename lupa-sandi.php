<?php
error_reporting(1);

if(isset($_POST['lupasandi'])){
    $sandi = $_POST['sandi'];

    
    $file = fopen("verifikasi/$sandi.txt", "r");
    if(!$file){
        echo "<script>alert('File tidak ditemukan')</script>";
    }else{
        while(!feof($file)) {
            echo fgets($file) . "<br>";
        }
        fclose($file);
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
    <title>Lupa Sandi Ngab</title>
</head>
<body>
    <div class="lupa">
        <form action="" method="post">
            <input type="number" name="sandi" id="sandi" placeholder="Masukkan Nomor yg terdaftar">
            <button type="submit" name="lupasandi">Temukan</button>
            <p align="center">Akun Sudah ditemukan? <a href="./">Masuk</a></p>
        </form>
    </div>
    <?php
    

    ?>
</body>
</html>