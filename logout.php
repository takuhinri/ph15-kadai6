<?php

session_start();

// セッションに保存してあるIDを消除
unset($_SESSION['id']);

// cookie を削除
setcookie('id', '', time() - 1, '/');

header('Location: ./login.php');

?>
