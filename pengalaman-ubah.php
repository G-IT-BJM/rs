<?php

include 'config.php';
include 'inc/head.php';
include 'function.php';

$table   = 'tb_pengalaman_kerja';
$primary = 'no_surat_pengalaman';
$row     = select("select * from {$table} where {$primary} = '{$_GET['id']}'");

$no_surat_pengalaman = ['','',''];
$nip             = '';
$tanggal_pengalaman  = '';
$tanggal_buat    = '';
$alasan          = '';

foreach ($row as $key) {
  $no_surat_pengalaman = explode('/',$key['no_surat_pengalaman']);
  $nip             = $key['nip'];
  $tanggal_buat    = $key['tanggal_buat'];
}

$karyawan = select("SELECT * FROM tb_karyawan");

?>

<main>
  <div class="container-fluid">    
    <div class="card mt-4 mb-4">
      <div class="card-header">
        <div class="float-left">
          <i class="fas fa-table mr-1"></i>
          Form Tambah Pengalaman Kerja
        </div>
      </div>
      <div class="card-body">

        <?php show_notif() ?>

        <form action="pengalaman-action.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="__method" value="put">
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <div class="control-label">
                  No. Surat
                </div>
                <input type="text" name="no_surat[]" class="form-control" required value="<?=$no_surat_pengalaman[0]?>" readonly>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-group">
                <div class="control-label">
                  &nbsp;
                </div>
                <select class="form-control" name="no_surat[]" required readonly>
                  <option <?=$no_surat_pengalaman[1] == 'SDM' ? 'selected' : ''?> value="SDM">SDM</option>
                  <option <?=$no_surat_pengalaman[1] == 'ADM' ? 'selected' : ''?> value="ADM">ADM</option>
                </select>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-group">
                <div class="control-label">
                  &nbsp;
                </div>
                <input readonly type="text" name="no_surat[]" class="form-control" required" value="<?=$no_surat_pengalaman[2]?>">
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
              Tanggal Dibuat
            </div>
            <input type="date" name="tanggal_buat" class="form-control" value="<?=$tanggal_buat?>" required readonly>
          </div>
          <div class="form-group">
            <input type="submit" name="save" id="save" class="btn btn-primary btn-small" value="Simpan">
            <a href="pengalaman-list.php" class="btn btn-dark btn-small">Kembali</a>
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