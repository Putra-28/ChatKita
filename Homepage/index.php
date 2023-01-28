<?php
session_start();

if(!isset($_SESSION['login'])){
    header('Location: ../');
    exit;
}


if(isset($_POST['send'])){
    $chat = $_POST['chat'];

    $open = fopen('isi.txt', 'a+');
    $data =  $_SESSION['user'] . ": <br>" . $chat . "\n";
    $cek = fwrite($open, $data);
    if($cek > 0){
        $scroll = 1000 . "px";
    } 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="chat1.css">
    <style>
        .info{
            position: fixed;
            top: 5px;
            left: 10px;
            color: white;
            display: flex;
        }
        .info button{
            width: 20px;
            height: 20px;
            border-radius: 50%;
        }
    </style>
    <title>Chat Kita</title>
</head>
<body>
    <div class="container">
        <div class="info">
            <button style="background: red;"></button><p>Untuk keluar</p>
            <button style="background: yellow;"></button><p>Refresh jika ingin melihat pesan terbaru</p>
        </div>
        <div class="card" id="card">
            <div class="keluar">
                <a href=""><button type="submit"></button></a>
                <a href="keluar.php"><button style="background: red;" type="submit" name="keluar"></button></a>
            </div>
            <div class="msg">
                <div class="con-msg" id="msg">
                    <?php
                    $open = fopen('isi.txt', 'r');
                    // $name = $_SESSION['user'];
                    while($rows = fgets($open)){
                        $col = explode("-",$rows);
                        foreach($col as $data){
                            // echo "<label for=''>name</label>";
                            echo "<div class='isi-msg'><p>" . trim($data) . "</p></div>";
                        }
                    }    
                    ?>
                </div>
            </div>
            <div class="inputan">
                <form action="" method="post">
                    <input type="text" name="chat" id="chat" placeholder="Tulis Pesan Anda" value=" " required>
                    <button type="submit" name="send" ><i class='bx bxs-send' ></i></button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>