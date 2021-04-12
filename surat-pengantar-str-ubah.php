<?php

include 'config.php';
include 'inc/head.php';
include 'function.php';

$table   = 'tb_pengantar';
$primary = 'no_surat';
$row     = select("select * from {$table} where {$primary} = '{$_GET['id']}'");

// $no_surat     = ['','',''];
$no_surat     = '';
$nip          = '';
$tgl_dibuat   = '';
$jenis        = '';

foreach ($row as $key) {
  // $no_surat   = explode('/',$key['no_surat']);
  $no_surat   = $key['no_surat'];
  $nip        = $key['nip'];
  $jenis      = $key['jenis'];
  $tgl_dibuat = $key['tgl_dibuat'];
}

$karyawan = select("SELECT * FROM tb_karyawan");


?>


<main>
  <div class="container-fluid">    
    <div class="card mt-4 mb-4">
      <div class="card-header">
        <div class="float-left">
          <i class="fas fa-table mr-1"></i>
          Form Tambah Pengantar STR
        </div>
      </div>
      <div class="card-body">

        <?php show_notif() ?>

        <form action="surat-pengantar-str-action.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="__method" value="put">
          <div class="row">
            <div class="col-lg-4 col-md-4">
              <div class="form-group">
                <div class="control-label">
                  No. Surat
                </div>
                <input type="text" name="no_surat" class="form-control" value="<?=$no_surat?>" required readonly>
              </div>
            </div>

            <div class="col-lg-2 col-md-2"></div>

            <div class="col-lg-3 col-md-3"></div>

            <div class="col-lg-3 col-md-3">
              <div class=" form-group">
                <div class="control-label">
                  Tanggal Dibuat
                </div>
                <input type="date" name="tgl_dibuat" class="form-control" value="<?=$tgl_dibuat?>" required readonly>
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <div class="control-label">
                Karyawan
              </div>
              <select class="form-control" name="nip" required>
                <option value="">Pilih Karyawan</option>
                <?php 
                  foreach ($karyawan as $key) {
                    echo "<option value='{$key['nip']}'".($nip == $key['nip'] ? ' selected' : '').">{$key['nip']} - {$key['nama']}</option>";
                  }
                ?>
              </select>
            </div>

            <div class="col-md-6 form-group">
              <div class="control-label">
                Jenis
              </div>
              <select class="form-control" name="jenis" required>
                <option value="pembuatan" <?=$jenis == 'pembuatan' ? 'selected' : ''?>>Pembuatan</option>
                <option value="perpanjang" <?=$jenis == 'perpanjang' ? 'selected' : ''?>>Perpanjang</option>
              </select>
            </div>

          </div>
          
          <div class="form-group">
            <input type="submit" name="save" id="save" class="btn btn-primary btn-small" value="Simpan">
            <a href="surat-pengantar-str-list.php" class="btn btn-dark btn-small">Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/datatables-demo.js"></script>

<?php include 'inc/footer.php' ?>