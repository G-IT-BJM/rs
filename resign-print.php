<?php

include 'config.php';
include 'session.php';
include 'function.php';

if (empty($_GET['id'])) {
  die('Tidak ada data ditemukan');
}

$no_surat = $_GET['id'];
$query = "SELECT * FROM tb_resign LEFT JOIN tb_karyawan ON tb_karyawan.nik = tb_resign.nik LEFT JOIN tb_bagian ON tb_bagian.id_bagian = tb_karyawan.id_bagian WHERE no_surat_resign = '{$no_surat}'";
$fetch = select($query);

$no_surat_resign = '';
$nip             = '';
$nama            = '';
$tempat_lahir    = '';
$tgl_lahir       = '';
$tgl_buat        = '';
$bagian          = '';
$tgl_masuk       = '';
$tanggal_resign  = '';
$alamat_domisili = '';
$alasan          = '';

foreach ($fetch as $key => $value) {
  $no_surat_resign = $value['no_surat_resign'];
  $nip             = $value['nip'];
  $nama            = $value['nama'];
  $tempat_lahir    = $value['tempat_lahir'];
  $tgl_lahir       = $value['tgl_lahir'];
  $tanggal_buat    = $value['tanggal_buat'];
  $bagian          = $value['nama_bagian'];
  $tgl_masuk       = $value['tgl_masuk'];
  $tanggal_resign  = $value['tanggal_resign'];
  $alamat_domisili = $value['alamat_domisili'];
  $alasan          = $value['alasan'];
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
  </style>
</head>
<body>
  <div class="content">
    <div class="cop-surat"></div>
    <div class="nomor_surat">
      Nomor : <?=$no_surat?>
    </div>
    <div class="perihal">
      Perihal	: Surat Keterangan Berhenti Bekerja
    </div>
    <div class="content-surat">
      <p>
        Kepada Yth.</br>
        Kepala Dinas Sosial dan Tenaga Kerja</br>
        Banjarmasin
      </p>      
      <p>Dengan Hormat</p>
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
            <td>NIK</td>
            <td>:</td>
            <td><?=ucwords(strtolower($nip))?></td>
          </tr>
          <tr>
            <td>Bagian</td>
            <td>:</td>
            <td><?=ucwords(strtolower($bagian))?></td>
          </tr>
          <tr>
            <td>Masa Kerja</td>
            <td>:</td>
            <td><?=tanggalIndo($tgl_masuk)?> sampai <?=tanggalIndo($tanggal_resign)?></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?=ucwords(strtolower($alamat_domisili))?></td>
          </tr>
        </table>
      </div>
      <p>
        Terhitung sejak tanggal <?=tanggalIndo(date('Y-m-d',strtotime("+1 day", strtotime($tanggal_resign))))?> dinyatakan telah berhenti sebagai karyawan dari Rumah Sakit Suaka Insan Banjarmasin karena <?=$alasan?>.
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
        <div class="ttd-kanan">
          <p>
            </br>
            Mengetahui
            <p class="ttdby">
              <u> Sr. M. Thersia, SPC </u> <br>
              Kepala Bagian SDM
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