<?php

include 'config.php';
include 'session.php';
include 'function.php';

$table   = "tb_karyawan";
$primary = "nik";

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
  destroy($table, "nip", $_GET['id']);
  back();
}

?>