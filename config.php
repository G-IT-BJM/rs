<?php

$host = 'rnazarf.com';
$user = 'rnazarfc_guest';
$pass = 'qwerty123';
$dbase = 'rnazarfc_surat';

$koneksi = mysqli_connect($host,$user,$pass,$dbase);

if (!$koneksi) {
  die(mysqli_error($koneksi));
}

?>