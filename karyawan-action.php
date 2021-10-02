<?php

include 'config.php';
include 'session.php';
include 'function.php';

$table   = "tb_karyawan";
$primary = "nip";

if (isset($_POST['save'])) {
  if ($_POST['__method'] == 'post') {
    unset($_POST['__method']);
    unset($_POST['save']);

    $unique = [
      'nik', 'nip'
    ];
    
    if (validate($table, $unique, $_POST)) {
      if (cek_umur($_POST['tgl_lahir']) > 19) {        
        store($table, $_POST, 'Berhasil tambah data.');
      } else {
        fail('Umur tidak boleh dibawah 20 tahun');
      }
    } else {
      fail('NIK/NIP sudah digunakan!');
    }
    back();
  }
  if ($_POST['__method'] == 'put') {
    unset($_POST['__method']);
    unset($_POST['save']);

    $unique = [
      'nik'
    ];

    $id = [
      'nip'
    ];

    if (validate($table, $unique, $_POST, $id)) {
      if (cek_umur($_POST['tgl_lahir']) > 19) {        
        update($table, $primary, $_POST, 'Berhasil ubah data.');
      } else {
        fail('Umur tidak boleh dibawah 20 tahun');
      }
    } else {
      fail('NIK/NIP sudah digunakan!');
    }
    
    back();
  }
}

if (isset($_GET['id'])) {
  destroy($table, "nip", $_GET['id']);
  back();
}

?>