<?php

include 'config.php';
include 'session.php';
include 'function.php';

$id = $_GET['id'];
$status = $_GET['status'];

$table = 'tb_tunjangan';
$primary = 'no_surat_tunjangan';

$data = [
  'no_surat_tunjangan' => $id,
  'is_approve' => $status,
];    

$message = $status == 1 ? 'Menyetujui' : 'Menolak';

update($table, $primary, $data, 'Berhasil '.$message.' data.');
back();