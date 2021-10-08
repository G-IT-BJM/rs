<?php

include 'config.php';
include 'inc/head.php';
include 'function.php';

$table   = 'tb_tunjangan';
$primary = 'no_surat_tunjangan';
$row     = select("select * from {$table} where {$primary} = '{$_GET['id']}'");

$no_surat_tunjangan = ['','',''];
$nip                = '';
$tanggal_buat       = '';
$jenis_tunjangan    = '';
$kartu_nikah = '';
$kartu_keluarga = '';
$is_approve = 0;

foreach ($row as $key) {
  $no_surat_tunjangan = explode('/',$key['no_surat_tunjangan']);
  $nip                = $key['nip'];
  $tanggal_buat       = $key['tanggal_buat'];
  $jenis_tunjangan    = $key['jenis_tunjangan'];
  $kartu_nikah = $key['kartu_nikah'];
  $kartu_keluarga = $key['kartu_keluarga'];
  $is_approve = $key['is_approve'];
}

$karyawan = select("SELECT * FROM tb_karyawan");


?>

<main>
  <div class="container-fluid">    
    <div class="card mt-4 mb-4">
      <div class="card-header">
        <div class="float-left">
          <i class="fas fa-table mr-1"></i>
          Form Tambah Tunjangan
        </div>
      </div>
      <div class="card-body">

        <?php show_notif() ?>

        <form action="tunjangan-action.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="__method" value="put">
          <input type="hidden" name="is_approve" value="<?=$is_approve?>">
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <div class="control-label">
                  No. Surat
                </div>
                <input type="text" name="no_surat[]" class="form-control" required value="<?=$no_surat_tunjangan[0]?>" readonly>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-group">
                <div class="control-label">
                  &nbsp;
                </div>
                <select class="form-control" name="no_surat[]" required readonly>
                  <option <?=$no_surat_tunjangan[1] == 'SDM' ? 'selected' : ''?> value="SDM">SDM</option>
                  <option <?=$no_surat_tunjangan[1] == 'ADM' ? 'selected' : ''?> value="ADM">ADM</option>
                </select>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-group">
                <div class="control-label">
                  &nbsp;
                </div>
                <input readonly type="text" name="no_surat[]" class="form-control" required" value="<?=$no_surat_tunjangan[2]?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <img src="<?=$kartu_nikah?>" alt="" width="300px" height="300px">
                <div class="form-label">Kartu Nikah</div>
                <input type="hidden" name="kartu_nikah_value" value="<?=$kartu_nikah?>">
                <input type="file" name="kartu_nikah" id="kartu_nikah" class="form-control" accept="image/*">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <img src="<?=$kartu_keluarga?>" alt="" width="300px" height="300px">
                <div class="form-label">Kartu Keluarga</div>
                <input type="hidden" name="kartu_keluarga_value" value="<?=$kartu_keluarga?>">
                <input type="file" name="kartu_keluarga" id="kartu_keluarga" class="form-control" accept="image/*">
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
            <div class="control-label">
              Jenis Tunjangan
            </div>
            <textarea class="form-control" name="jenis_tunjangan" id="jenis_tunjangan" cols="30" rows="3" required><?=$jenis_tunjangan?></textarea>
          </div>
          <div class="form-group">
            <input type="submit" name="save" id="save" class="btn btn-primary btn-small" value="Simpan">
            <a href="tunjangan-list.php" class="btn btn-dark btn-small">Kembali</a>
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