<?php

include 'config.php';
include 'inc/head.php';
include 'function.php';

$no_surat     = generateNoSurat();
$no_surat = (int) explode('/',@$no_surat[0]['no_surat'])[0] + 1;

$tgl_no_surat = date('d') . '-' . convertToRomawi(date('m')) . '-' . date('Y');
$tgl_buat     = date('Y-m-d');
$karyawan     = select("SELECT * FROM tb_karyawan");

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
          <input type="hidden" name="__method" value="post">
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <div class="control-label">
                  No. Surat
                </div>
                <input type="number" name="no_surat[]" class="form-control" value="<?=$no_surat?>" required readonly>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-group">
                <div class="control-label">
                  &nbsp;
                </div>
                <select class="form-control" name="no_surat[]" required>
                  <option value="SDM">SDM</option>
                  <option value="ADM">ADM</option>
                </select>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-group">
                <div class="control-label">
                  &nbsp;
                </div>
                <input readonly type="text" name="no_surat[]" class="form-control" required" value="<?=$tgl_no_surat?>">
              </div>
            </div>

          </div>
          <div class="form-group">
            <div class="control-label">
              Karyawan
            </div>
            <select class="form-control" name="nik" required>
              <option value="">Pilih Karyawan</option>
              <?php 
                foreach ($karyawan as $key) {
                  echo "<option value='{$key['nik']}'>{$key['nik']} - {$key['nama']}</option>";
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <div class="control-label">
              Tanggal Dibuat
            </div>
            <input type="date" name="tanggal_buat" class="form-control" value="<?=$tgl_buat?>" required readonly>
          </div>
          <div class="form-group">
            <div class="control-label">
              Jenis Tunjangan
            </div>
            <textarea class="form-control" name="jenis_tunjangan" id="jenis_tunjangan" cols="30" rows="3" required></textarea>
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