<?php

session_start();
$_SESSION['masuk'];

session_unset();
session_destroy();

header('Location: ../');
exit;


?>