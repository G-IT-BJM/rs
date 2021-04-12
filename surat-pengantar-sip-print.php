<?php

include 'config.php';
include 'session.php';
include 'function.php';

if (empty($_GET['id'])) {
  die('Tidak ada data ditemukan');
}

$no_surat = $_GET['id'];
$query = "SELECT * FROM tb_pengantar LEFT JOIN tb_karyawan ON tb_karyawan.nip = tb_pengantar.nip LEFT JOIN tb_bagian ON tb_bagian.id_bagian = tb_karyawan.id_bagian WHERE no_surat = '{$no_surat}'";
$fetch = select($query);

$no_surat        = '';
$nip             = '';
$nama            = '';
$tempat_lahir    = '';
$tgl_lahir       = '';
$tgl_masuk       = '';
$alamat_domisili = '';
$pendidikan      = '';
$nama_bagian     = '';

foreach ($fetch as $key => $value) {
  $no_surat        = $value['no_surat'];
  $nip             = $value['nip'];
  $nama            = $value['nama'];
  $tempat_lahir    = $value['tempat_lahir'];
  $tgl_lahir       = $value['tgl_lahir'];
  $tgl_masuk       = $value['tgl_masuk'];
  $alamat_domisili = $value['alamat_domisili'];
  $pendidikan      = $value['pendidikan_akhir'];
  $nama_bagian     = $value['nama_bagian'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat Pengantar SIP</title>
  <style>
    .content {
      margin: 10px;      
    }
    .cop-surat {
      padding: 40px;
    }
    .nomor_surat {
      text-align: center;
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
  </style>
</head>
<body>
  <div class="content">
    <div class="cop-surat"></div>
    <div class="nomor_surat">
      <b><u>SURAT KETERANGAN</u></b><br>
      Nomor : <?=$no_surat?>
    </div>
    <div class="perihal"></div>
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
            <td nowrap>Tempat/Tgl. Lahir</td>
            <td>:</td>
            <td><?=ucwords(strtolower($tempat_lahir))?>, <?=tanggalIndo($tgl_lahir)?></td>
          </tr>
          <tr>
            <td>Pendidikan</td>
            <td>:</td>
            <td><?=ucwords(strtolower($pendidikan))?></td>
          </tr>
          <tr>
            <td>Bagian</td>
            <td>:</td>
            <td><?=ucwords(strtoupper($nama_bagian))?></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?=ucwords(strtolower($alamat_domisili))?></td>
          </tr>
        </table>
      </div>
      <p>
        Adalah Karyawan Rumah Sakit Suaka Insan yang bekerja sejak tanggal <?=tanggalIndo(date('Y-m-d',strtotime($tgl_masuk)))?> Sampai sekarang.
      </p>
      <p>
        Surat Keteranga ini dibuat untuk keperluan pembuatan <b>SIP</b>.
      </p>
      <p>
        Demikian surat keterangan ini diberikan kepada yang bersangkutan agar dapat diketahui dan dapat dipergunakan sebagaimana mestinya.
      </p>
      <div class="ttd">
        <div class="ttd-kiri">
          <p>
            Banjarmasin, <?=date("d-m-Y")?> </br>
            RUMAH SAKIT SUAKA INSAN
            <p class="ttdby">              
              <u> Sr. Anastasia Maratning, SPC </u> <br>
              Administrator              
            </p>
          </p>
        </div>
        <!-- <div class="ttd-kanan">
          <p>
            </br>
            Mengetahui
            <p class="ttdby">
              <u> Sr. M. Thersia, SPC </u> <br>
              Kepala Bagian SDM
            </p>
          </p>
        </div> -->
      </div>
    </div>
  </div>
  <script>
    window.print();
  </script>
</body>
</html>