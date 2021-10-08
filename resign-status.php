<?php

include 'config.php';
include 'session.php';
include 'function.php';

$id = $_GET['id'];
$status = $_GET['status'];

$table   = "tb_resign";
$primary = "no_surat_resign";

$data = [
  'no_surat_resign' => $id,
  'is_approve' => $status,
];    

$message = $status == 1 ? 'Menyetujui' : 'Menolak';

update($table, $primary, $data, 'Berhasil '.$message.' data.');
back();