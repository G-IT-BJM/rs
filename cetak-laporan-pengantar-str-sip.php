<?php

include 'config.php';
include 'session.php';
include 'function.php';

$jenis      = $_GET["jenis"];
$dari_tgl   = $_GET["dari_tgl"];
$sampai_tgl = $_GET["sampai_tgl"];

if($jenis == "STR") {
  $query = select("select a.*, b.nik, b.nama from tb_pengantar as a left join tb_karyawan as b on a.nip=b.nip where (a.tgl_dibuat >= '$dari_tgl' and a.tgl_dibuat <= '$sampai_tgl') and jenis_surat = '$jenis'");
} else {
  $query = select("select a.*, b.nik, b.nama from tb_pengantar as a left join tb_karyawan as b on a.nip=b.nip where (a.tgl_dibuat >= '$dari_tgl' and a.tgl_dibuat <= '$sampai_tgl') and jenis_surat = '$jenis'");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Laporan Pengantar <?php echo $jenis; ?></title>
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
      <h3>Data Laporan Pengantar <?php echo $jenis; ?></h3>
    </div>

    <div class="periode">
      <h5><b>Periode : <?php echo date('d/m/Y',strtotime($dari_tgl))." - ".date('d/m/Y',strtotime($sampai_tgl)); ?></b></h5>
    </div>

    <table>
      <?php
        if($jenis == "STR") {
          echo '
            <tr>
              <th>No.</th>
              <th>NIP</th>
              <th>NIK</th>
              <th>No. Surat</th>
              <th>Jenis</th>
              <th>Tanggal</th>
            </tr>
          ';

          $no = 1;
          foreach ($query as $key) {
            echo "<tr>";
            echo "<td>{$no}</td>";
            echo "<td>".capitalWords($key['nip'])."</td>\n";
            echo "<td>".capitalWords($key['nik'])." - ".capitalWords($key['nama'])."</td>\n";
            echo "<td>".($key['no_surat'])."</td>\n";
            echo "<td>".capitalWords($key['jenis'])."</td>\n";
            echo "<td>".date('d/m/Y',strtotime($key['tgl_dibuat']))."</td>\n";
            echo "</tr>";
            $no++;
          }
        } else {
          echo '
            <tr>
              <th>No.</th>
              <th>NIP</th>
              <th>NIK</th>
              <th>No. Surat</th>
              <th>Jenis</th>
              <th>Tanggal</th>
            </tr>
          ';

          $no = 1;
          foreach ($query as $key) {
            echo "<tr>";
            echo "<td>{$no}</td>";
            echo "<td>".capitalWords($key['nip'])."</td>\n";
            echo "<td>".capitalWords($key['nik'])." - ".capitalWords($key['nama'])."</td>\n";
            echo "<td>".($key['no_surat'])."</td>\n";
            echo "<td>".capitalWords($key['jenis'])."</td>\n";
            echo "<td>".date('d/m/Y',strtotime($key['tgl_dibuat']))."</td>\n";
            echo "</tr>";
            $no++;
          }
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