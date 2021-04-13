<?php

include 'config.php';
include 'session.php';
include 'function.php';

$table   = "tb_str_sip";
$primary = "no_surat";

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
    
    update($table, "id", $_POST, 'Berhasil ubah data.');
    back();
  }
}

if (isset($_GET['id'])) {
  destroy($table, "id", $_GET['id']);
  back();
}

?>