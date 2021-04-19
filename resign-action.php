<?php

include 'config.php';
include 'session.php';
include 'function.php';

$table   = "tb_resign";
$primary = "no_surat_resign";

if (isset($_POST['save'])) {
  if ($_POST['__method'] == 'post') {
    $data = [
      'no_surat_resign' => implode('/',$_POST['no_surat']),
      'nip'             => $_POST['nip'],
      'tanggal_resign'  => $_POST['tanggal_resign'],
      'tanggal_buat'    => $_POST['tanggal_buat'],
      'alasan'          => $_POST['alasan']
    ];
    
    store($table, $data, 'Berhasil tambah data.');
    back();
  }
  if ($_POST['__method'] == 'put') {
    $data = [
      'no_surat_resign' => implode('/',$_POST['no_surat']),
      'nip'             => $_POST['nip'],
      'tanggal_resign'  => $_POST['tanggal_resign'],
      'tanggal_buat'    => $_POST['tanggal_buat'],
      'alasan'          => $_POST['alasan']
    ];
    
    update($table, $primary, $data, 'Berhasil ubah data.');
    back();
  }
}

if (isset($_GET['id'])) {
  destroy($table, $primary, $_GET['id']);
  back();
}

?>