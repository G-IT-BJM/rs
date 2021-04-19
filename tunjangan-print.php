<?php

include 'config.php';
include 'session.php';
include 'function.php';

if (empty($_GET['id'])) {
  die('Tidak ada data ditemukan');
}

$no_surat = $_GET['id'];
$query = "SELECT * FROM tb_tunjangan LEFT JOIN tb_karyawan ON tb_karyawan.nip = tb_tunjangan.nip LEFT JOIN tb_bagian ON tb_bagian.id_bagian = tb_karyawan.id_bagian LEFT JOIN tb_jabatan ON tb_jabatan.id_jabatan = tb_karyawan.id_jabatan WHERE no_surat_tunjangan = '{$no_surat}'";
$fetch = select($query);

$no_surat_tunjangan = '';
$nama               = '';
$jabatan            = '';
$bagian             = '';
$tanggal_buat       = '';
$jenis_tunjangan    = '';

foreach ($fetch as $key => $value) {
  $no_surat_tunjangan = $value['no_surat_tunjangan'];
  $nama               = $value['nama'];  
  $bagian             = $value['nama_bagian'];
  $jabatan            = $value['nama_jabatan'];
  $tanggal_buat       = $value['tanggal_buat'];
  $jenis_tunjangan    = $value['jenis_tunjangan'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat Keterangan Resign</title>
  <style>
    .content {
      margin: 10px;      
    }
    .cop-surat {
      padding: 40px;
    }
    .nomor_surat {
      padding-bottom: 10px;
    }
    .perihal {
      padding-left: 50px;
    }
    .to {
      padding-bottom: 10px;
    }
    .content-surat {
      margin-left: 80px;
      margin-right: 80px;
      padding-top: 10px;
      text-align: justify;
    }
    .profil {
      padding-left: 30px;
    }
    table td, table td * {
      vertical-align: top;
    }
    .ttd {
      padding-top: 20px;      
      width: 100%;
    }
    .ttdp {
      padding-right: 20px;
    }
    .ttd-kiri {
      width: 45%;
      float: left;
      text-align: center;
    }
    .ttd-kanan {
      width: 30%;
      text-align: center;
      float: right;
    }
    .ttdby {
      padding-top: 50px;
    }
    .header-surat {
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="content">
    <div class="cop-surat"></div>
    <div class="header-surat">
      <p>
        <u><span style="font-size:18px;font-weight:bold;"> SURAT KETERANGAN </span></u> <br>
        <?=$no_surat_tunjangan?>
      </p>
    </div>
    <div class="content-surat">      
      <p>Yang bertanda tangan dibawah ini, Administrator Rumah Sakit Suaka Insan Banjarmasin menerangkan  bahwa :</p>
      <div class="profil">
        <table>
          <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?=ucwords(strtolower($nama))?></td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td><?=ucwords(strtolower($jabatan))?></td>
          </tr>
          <tr>
            <td>Bagian</td>
            <td>:</td>
            <td><?=ucwords(strtolower($bagian))?></td>
          </tr>
        </table>
      </div>
      <p>
        Terhitung mulai bulan <?=tanggalIndo($tanggal_buat)?> diberikan <b><?=$jenis_tunjangan?></b>.
      </p>
      <p>
        Demikian surat keterangan ini diberikan kepada yang bersangkutan agar dapat diketahui dan dapat dipergunakan sebagaimana mestinya.
      </p>
      <div class="ttd">
        <div class="ttd-kiri">
          <p>
            Banjarmasin, <?=tanggalIndo($tanggal_buat)?> </br>
            RUMAH SAKIT SUAKA INSAN
            <p class="ttdby">              
              <u> Sr. Anastasia Maratning, SPC </u> <br>
              Administrator              
            </p>
          </p>
        </div>
      </div>
    </div>
  </div>
  <script>
    window.print();
  </script>
</body>
</html>