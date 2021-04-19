<?php

include 'config.php';
include 'session.php';
include 'function.php';

$karyawan = select("select * from tb_karyawan where status_kerja = '{$_GET['status']}'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Laporan Karyawan</title>
  <style>
    .header {
      margin-top: 100px;
      text-align: center;
    }
    table {
      width: 100%;
    }
    table, td, th {
      border: 1px solid black;
      border-collapse: collapse;
    }
  </style>
</head>
<body>

  <div class="header">
    <h3>Data Karyawan <?=$_GET['status']?></h3>
  </div>

  <table>
    <tr>
      <th style='width:5%'>No.</th>
      <th style='width:10%'>NIP</th>
      <th style='width:15%'>NIK</th>
      <th style='width:20%'>Nama</th>
      <th>Tempat</th>
      <th style='width:15%'>Tanggal Lahir</th>
      <th>Alamat</th>
    </tr>
    <?php 
    $no = 1;
    foreach ($karyawan as $key) {
      echo "<tr>";
      echo "<td>{$no}</td>";
      echo "<td>".capitalWords($key['nip'])."</td>\n";
      echo "<td>".capitalWords($key['nik'])."</td>\n";
      echo "<td>".capitalWords($key['nama'])."</td>\n";      
      echo "<td>".capitalWords($key['tempat_lahir'])."</td>\n";            
      echo "<td>".date('d/m/Y',strtotime($key['tgl_lahir']))."</td>\n";            
      echo "<td>".capitalWords($key['alamat_domisili'])."</td>\n";            
      echo "</tr>";
      $no++;
    }
    ?>
  </table>
</body>
</html>