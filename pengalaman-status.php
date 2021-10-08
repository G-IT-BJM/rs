<?php

include 'config.php';
include 'session.php';
include 'function.php';

$id = $_GET['id'];
$status = $_GET['status'];

$table   = "tb_pengalaman_kerja";
$primary = "no_surat_pengalaman";

$data = [
  'no_surat_pengalaman' => $id,
  'is_approve' => $status,
];    

$message = $status == 1 ? 'Menyetujui' : 'Menolak';

update($table, $primary, $data, 'Berhasil '.$message.' data.');
back();