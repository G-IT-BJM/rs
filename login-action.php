<?php

include 'config.php';
include 'session.php';
include 'function.php';

$table   = "tb_user";
$primary = "user";

if (isset($_POST['login'])) {
  if (checkLogin($_POST['user'],$_POST['pass'])) {
    success("Selamat datang kembali {$_SESSION['user']}");
    header('Location: index.php');
  } else {
    fail('User atau password yang anda masukan salah!');
    back();
  }
}

?>