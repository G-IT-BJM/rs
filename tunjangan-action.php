<?php

include 'config.php';
include 'session.php';
include 'function.php';

$table   = "tb_tunjangan";
$primary = "no_surat_tunjangan";

if (isset($_POST['save'])) {
  if ($_POST['__method'] == 'post') {
    $data = [
      'no_surat_tunjangan' => implode('/',$_POST['no_surat']),
      'nip'                => $_POST['nip'],
      'tanggal_buat'       => $_POST['tanggal_buat'],
      'jenis_tunjangan'    => $_POST['jenis_tunjangan']
    ];
    
    store($table, $data, 'Berhasil tambah data.');
    back();
  }
  if ($_POST['__method'] == 'put') {
    $data = [
      'no_surat_tunjangan' => implode('/',$_POST['no_surat']),
      'nip'                => $_POST['nip'],
      'tanggal_buat'       => $_POST['tanggal_buat'],
      'jenis_tunjangan'    => $_POST['jenis_tunjangan']
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