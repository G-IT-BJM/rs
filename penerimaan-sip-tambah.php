<?php

include 'config.php';
include 'inc/head.php';
include 'function.php';

$tgl_buat     = date('Y-m-d');
$karyawan     = select("SELECT a.*,b.* FROM tb_karyawan as a LEFT JOIN tb_str_sip as b ON a.nip=b.nip WHERE no_sip = ''");

?>

<main>
  <div class="container-fluid">    
    <div class="card mt-4 mb-4">
      <div class="card-header">
        <div class="float-left">
          <i class="fas fa-table mr-1"></i>
          Form Tambah Penerimaan SIP
        </div>
      </div>
      <div class="card-body">

        <?php show_notif() ?>

        <form action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="__method" value="post">
          <div class="row">
            <div class="col-lg-3 col-md-3">
              <div class=" form-group">
                <div class="control-label">
                  Tanggal
                </div>
                <input type="date" name="tgl_dibuat_sip" class="form-control" value="<?=$tgl_buat?>" required readonly>
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
                    echo "<option value='{$key['nip']}'>{$key['nip']} - {$key['nama']}</option>";
                  }
                ?>
              </select>
            </div>

            <div class="col-lg-3 col-md-3">
              <div class=" form-group">
                <div class="control-label">
                  No.SIP
                </div>
                <input type="text" name="no_sip" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- <div class="col-lg-3 col-md-3">
              <div class=" form-group">
                <div class="control-label">
                  No.STR
                </div>
                <input type="text" name="no_str" class="form-control" required readonly>
              </div>
            </div> -->

            <!-- <div class="col-lg-6 col-md-6">
              <div class=" form-group">
                <div class="control-label">
                  Keterangan
                </div>
                <input type="text" name="keterangan" class="form-control" required>
              </div>
            </div> -->

            <!-- <div class="col-lg-3 col-md-3">
              <div class=" form-group">
                <div class="control-label">
                  Kelulusan
                </div>
                <input type="date" name="kelulusan" class="form-control" required>
              </div>
            </div> -->
          </div>
          
          <div class="form-group">
            <input type="submit" name="save" id="save" class="btn btn-primary btn-small" value="Simpan">
            <a href="penerimaan-sip-list.php" class="btn btn-dark btn-small">Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>

<?php
  if(isset($_POST["save"])) {
    $tgl_dibuat_sip = $_POST["tgl_dibuat_sip"];
    $no_sip         = $_POST["no_sip"];
    $nip            = $_POST["nip"];

    $query = mysqli_query($koneksi, "UPDATE tb_str_sip SET tgl_dibuat_sip = '$tgl_dibuat_sip', no_sip = '$no_sip' WHERE nip = '$nip' AND no_sip = ''");
    if($query == true) {
      echo '
        <script>alert("Berhasil di Simpan."); window.location = "penerimaan-sip-list.php"</script>
      ';
    } else {
      echo '
        <script>alert("Gagal di Simpan."); window.location = "penerimaan-sip-tambah.php"</script>
      ';
    }
  }
?>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/datatables-demo.js"></script>

<?php include 'inc/footer.php' ?>