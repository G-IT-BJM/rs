<?php

include 'config.php';
include 'session.php';
include 'function.php';

$table   = "tb_jabatan";
$primary = "id_jabatan";

if (isset($_POST['save'])) {
  if ($_POST['__method'] == 'post') {
    unset($_POST['__method']);
    unset($_POST['save']);

    $unique = [
      'nama_jabatan'
    ];

    if (validate($table, $unique, $_POST)) {
      store($table, $_POST, 'Berhasil tambah data.');
    } else {
      fail('Nama jabatan sudah ada!');
    }

    back();
  }
  if ($_POST['__method'] == 'put') {
    unset($_POST['__method']);
    unset($_POST['save']);

    $unique = [
      'nama_jabatan'
    ];

    $id = [
      'id_jabatan'
    ];
    
    if (validate($table, $unique, $_POST, $id)) {
      update($table, $primary, $_POST, 'Berhasil ubah data.');
    } else {
      fail('Nama jabatan sudah ada!');
    }

    back();
  }
}

if (isset($_GET['id'])) {
  destroy($table, $primary, $_GET['id']);
  back();
}

?>