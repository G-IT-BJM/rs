<?php

include 'config.php';
include 'inc/head.php';
include 'function.php';

$tgl_buat     = date('Y-m-d');
$karyawan     = select("SELECT a.*,b.* FROM tb_karyawan as a LEFT JOIN tb_str_sip as b ON a.nip=b.nip WHERE no_sip = ''");

?>

