<?php

include 'config.php';
include 'inc/head.php';
include 'function.php';

$table   = 'tb_str_sip';
$primary = 'id';
$row     = select("select * from {$table} where {$primary} = '{$_GET['id']}'");

$id             = '';
$no_str         = '';
$nip            = '';
$tgl_dibuat_str = '';
$berlaku_str    = '';
$keterangan     = '';
$kelulusan      = '';

foreach ($row as $key) {
  $id             = $key['id'];
  $no_str         = $key['no_str'];
  $nip            = $key['nip'];
  $tgl_dibuat_str = $key['tgl_dibuat_str'];
  $berlaku_str    = $key['berlaku_str'];
  $keterangan     = $key['keterangan'];
  $kelulusan      = $key['kelulusan'];
}

$karyawan     = select("SELECT * FROM tb_karyawan");

?>

<main>
  <div class="container-fluid">    
    <div class="card mt-4 mb-4">
      <div class="card-header">
        <div class="float-left">
          <i class="fas fa-table mr-1"></i>
          Form Ubah Penerimaan STR
        </div>
      </div>
      <div class="card-body">

        <?php show_notif() ?>

        <form action="penerimaan-str-action.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="__method" value="put">
          <input type="hidden" name="id" class="form-control" value="<?=$id?>" required readonly>
          <div class="row">
            <div class="col-lg-3 col-md-3">
              <div class=" form-group">
                <div class="control-label">
                  Tanggal
                </div>
                <input type="date" name="tgl_dibuat_str" class="form-control" value="<?=$tgl_dibuat_str?>" required readonly>
              </div>
            </div>

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

            <div class="col-lg-3 col-md-3">
              <div class=" form-group">
                <div class="control-label">
                  No.STR
                </div>
                <input type="text" name="no_str" class="form-control" value="<?=$no_str?>" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-3">
              <div class=" form-group">
                <div class="control-label">
                  Masa Berlaku
                </div>
                <input type="date" name="berlaku_str" class="form-control" value="<?=$berlaku_str?>" required>
              </div>
            </div>

            <div class="col-lg-6 col-md-6">
              <div class=" form-group">
                <div class="control-label">
                  Keterangan
                </div>
                <input type="text" name="keterangan" class="form-control" value="<?=$keterangan?>" required>
              </div>
            </div>

            <div class="col-lg-3 col-md-3">
              <div class=" form-group">
                <div class="control-label">
                  Kelulusan
                </div>
                <input type="date" name="kelulusan" class="form-control" value="<?=$kelulusan?>" required>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <input type="submit" name="save" id="save" class="btn btn-primary btn-small" value="Simpan">
            <a href="penerimaan-str-list.php" class="btn btn-dark btn-small">Kembali</a>
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