<?php

include 'config.php';
include 'session.php';
include 'function.php';

$table   = "tb_pengantar";
$primary = "no_surat";

if (isset($_POST['save'])) {
  if ($_POST['__method'] == 'post') {
    $data = [
      'no_surat'    => implode('/',$_POST['no_surat']),
      'nip'         => $_POST['nip'],
      'tgl_dibuat'  => $_POST['tgl_dibuat'],
      'jenis'       => $_POST['jenis'],
      'jenis_surat' => "SIP"
    ];
    
    store($table, $data, 'Berhasil tambah data.');
    back();
  }
  if ($_POST['__method'] == 'put') {
    $data = [
      'no_surat'    => $_POST['no_surat'],
      'nip'         => $_POST['nip'],
      'tgl_dibuat'  => $_POST['tgl_dibuat'],
      'jenis'       => $_POST['jenis'],
      'jenis_surat' => "SIP"
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