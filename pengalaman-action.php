<?php

include 'config.php';
include 'session.php';
include 'function.php';

$table   = "tb_pengalaman_kerja";
$primary = "no_surat_pengalaman";

if (isset($_POST['save'])) {
  if ($_POST['__method'] == 'post') {
    $data = [
      'no_surat_pengalaman' => implode('/',$_POST['no_surat']),
      'nip'             => $_POST['nip'],
      'tanggal_buat'    => $_POST['tanggal_buat'],
    ];
    
    store($table, $data, 'Berhasil tambah data.');
    back();
  }
  if ($_POST['__method'] == 'put') {
    $data = [
      'no_surat_pengalaman' => implode('/',$_POST['no_surat']),
      'nip'             => $_POST['nip'],
      'tanggal_buat'    => $_POST['tanggal_buat'],
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