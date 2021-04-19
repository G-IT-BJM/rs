<?php

include 'config.php';
include 'session.php';
include 'function.php';

if (empty($_GET['id'])) {
  die('Tidak ada data ditemukan');
}

$no_surat = $_GET['id'];
$query = "SELECT * FROM tb_pengalaman_kerja LEFT JOIN tb_karyawan ON tb_karyawan.nip = tb_pengalaman_kerja.nip LEFT JOIN tb_bagian ON tb_bagian.id_bagian = tb_karyawan.id_bagian LEFT JOIN tb_resign ON tb_resign.nip = tb_karyawan.nip WHERE no_surat_pengalaman = '{$no_surat}'";
$fetch = select($query);

$no_surat_pengalaman = '';
$nama                = '';
$tempat_lahir        = '';
$tgl_lahir           = '';
$bagian              = '';
$tanggal_buat        = '';
$pendidikan_akhir    = '';
$tgl_masuk           = '';
$tanggal_resign      = '';
$alamat_domisili     = '';

foreach ($fetch as $key => $value) {
  $no_surat_pengalaman = $value['no_surat_pengalaman'];
  $nama                = $value['nama'];
  $tempat_lahir        = $value['tempat_lahir'];
  $bagian              = $value['nama_bagian'];
  $tgl_lahir           = $value['tgl_lahir'];
  $tanggal_buat        = $value['tanggal_buat'];
  $tgl_masuk           = $value['tgl_masuk'];
  $pendidikan_akhir    = $value['pendidikan_akhir'];
  $tanggal_resign      = $value['tanggal_resign'];
  $alamat_domisili     = $value['alamat_domisili'];
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
        <?=$no_surat_pengalaman?>
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
            <td nowrap>Tempat/Tgl. Lahir</td>
            <td>:</td>
            <td><?=ucwords(strtolower($tempat_lahir))?>, <?=tanggalIndo($tgl_lahir)?></td>
          </tr>
          <tr>
            <td>Pendidikan</td>
            <td>:</td>
            <td><?=ucwords(strtolower($pendidikan_akhir))?></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?=ucwords(strtolower($alamat_domisili))?></td>
          </tr>
        </table>
      </div>
      <p>
        Adalah karyawan Rumah Sakit Suaka Insan yang bekerja tanggal <?=tanggalIndo($tgl_masuk)?> sampai <?=tanggalIndo($tanggal_resign)?> di bagian <?=$bagian?>. Terhitung mulai tanggal <?=tanggalIndo(date('Y-m-d',strtotime("+1 day", strtotime($tanggal_resign))))?> tidak terikat hubungan kerja dengan Rumah Sakit Suaka Insan, yang bersangkutan telah selesai masa kontrak.
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