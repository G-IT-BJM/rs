<?php

include 'config.php';
include 'session.php';
include 'function.php';

$table   = "tb_bagian";
$primary = "id_bagian";

if (isset($_POST['save'])) {
  if ($_POST['__method'] == 'post') {
    unset($_POST['__method']);
    unset($_POST['save']);
    
    store($table, $_POST, 'Berhasil tambah data.');
    back();
  }
  if ($_POST['__method'] == 'put') {
    unset($_POST['__method']);
    unset($_POST['save']);
    
    update($table, $primary, $_POST, 'Berhasil ubah data.');
    back();
  }
}

if (isset($_GET['id'])) {
  destroy($table, $primary, $_GET['id']);
  back();
}

?>