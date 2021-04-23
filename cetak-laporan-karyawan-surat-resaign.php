<?php

include 'config.php';
include 'session.php';
include 'function.php';

$dari_tgl   = $_GET["dari_tgl"];
$sampai_tgl = $_GET["sampai_tgl"];

$query = select("select a.*, b.nik, b.nama from tb_resign as a left join tb_karyawan as b on a.nip=b.nip where (a.tanggal_resign >= '$dari_tgl' and a.tanggal_resign <= '$sampai_tgl')");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Laporan Karyawan Resaign</title>
  <style>
    .header {
      margin-top: 50px;
      text-align: center;
    }
    table {
      width: 100%;
    }
    table, td, th {
      border: 1px solid black;
      border-collapse: collapse;
      text-align: center;
    }
    .periode {
      text-align: left;
      display: inline-block;
    }
  </style>
</head>
<body>
  <input type="button" value="CETAK" onclick="printDiv()" style="background-color: green; color: white;"> 

  <div id="printDiv">
    <div class="header">
      <h3>Data Laporan Karyawan Resaign</h3>
    </div>

    <div class="periode">
      <h5><b>Periode : <?php echo date('d/m/Y',strtotime($dari_tgl))." - ".date('d/m/Y',strtotime($sampai_tgl)); ?></b></h5>
    </div>

    <table>
      <tr>
        <th>No.</th>
        <th>NIP</th>
        <th>NIK</th>
        <th>No. Surat</th>
        <th>Tangal Resaign</th>
        <th style="width: 30%;">Alasan</th>
      </tr>

      <?php
        $no = 1;
        foreach ($query as $key) {
          echo "<tr>";
          echo "<td>{$no}</td>";
          echo "<td>".capitalWords($key['nip'])."</td>\n";
          echo "<td>".capitalWords($key['nik'])." - ".capitalWords($key['nama'])."</td>\n";
          echo "<td>".($key['no_surat_resign'])."</td>\n";
          echo "<td>".date('d/m/Y',strtotime($key['tanggal_resign']))."</td>\n";
          echo "<td style='text-align: left !important;'>".capitalWords($key['alasan'])."</td>\n";
          echo "</tr>";
          $no++;
        }
      ?>
    </table>
  </div>
</body>
</html>

<script type="text/javascript">
  function printDiv() {
      var printContents = document.getElementById('printDiv').innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
  }
</script>