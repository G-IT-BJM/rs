<?php

include 'config.php';
include 'inc/head.php';
include 'function.php';

$table   = 'tb_resign';
$primary = 'no_surat_resign';
$row     = select("select * from {$table} where {$primary} = '{$_GET['id']}'");

$no_surat_resign = ['','',''];
$nip             = '';
$tanggal_resign  = '';
$tanggal_buat    = '';
$alasan          = '';

foreach ($row as $key) {
  $no_surat_resign = explode('/',$key['no_surat_resign']);
  $nip             = $key['nip'];
  $tanggal_resign  = $key['tanggal_resign'];
  $tanggal_buat    = $key['tanggal_buat'];
  $alasan          = $key['alasan'];
}

$karyawan = select("SELECT * FROM tb_karyawan");


?>

<main>
  <div class="container-fluid">    
    <div class="card mt-4 mb-4">
      <div class="card-header">
        <div class="float-left">
          <i class="fas fa-table mr-1"></i>
          Form Tambah Resign
        </div>
      </div>
      <div class="card-body">

        <?php show_notif() ?>

        <form action="resign-action.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="__method" value="put">
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <div class="control-label">
                  No. Surat
                </div>
                <input type="text" name="no_surat[]" class="form-control" required value="<?=$no_surat_resign[0]?>" readonly>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-group">
                <div class="control-label">
                  &nbsp;
                </div>
                <select class="form-control" name="no_surat[]" required readonly>
                  <option <?=$no_surat_resign[1] == 'SDM' ? 'selected' : ''?> value="SDM">SDM</option>
                  <option <?=$no_surat_resign[1] == 'ADM' ? 'selected' : ''?> value="ADM">ADM</option>
                </select>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-group">
                <div class="control-label">
                  &nbsp;
                </div>
                <input readonly type="text" name="no_surat[]" class="form-control" required" value="<?=$no_surat_resign[2]?>">
              </div>
            </div>

          </div>
          <div class="form-group">
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
          <div class="form-group">
            <div class="control-label">
              Tanggal Resign
            </div>
            <input type="date" name="tanggal_resign" id="tanggal_resign" value="<?=$tanggal_resign?>" class="form-control" required>
          </div>
          <div class="form-group">
            <div class="control-label">
              Tanggal Dibuat
            </div>
            <input type="date" name="tanggal_buat" class="form-control" value="<?=$tanggal_buat?>" required readonly>
          </div>
          <div class="form-group">
            <div class="control-label">
              Alasan
            </div>
            <textarea class="form-control" name="alasan" id="alasan" cols="30" rows="3" required><?=$alasan?></textarea>
          </div>
          <div class="form-group">
            <input type="submit" name="save" id="save" class="btn btn-primary btn-small" value="Simpan">
            <a href="resign-list.php" class="btn btn-dark btn-small">Kembali</a>
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