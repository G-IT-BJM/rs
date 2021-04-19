<?php

include 'config.php';
include 'inc/head.php';
include 'function.php';

$bagian = select("select * from tb_agama");

?>

<main>
  <div class="container-fluid">    
    <div class="card mt-4 mb-4">
      <div class="card-header">
        <div class="float-left">
          <i class="fas fa-table mr-1"></i>
          Ubah Sandi
        </div>
      </div>
      <div class="card-body">
        <form method="get" target="_blank" action="cetak-laporan-karyawan-peragama.php">
          <div class="row">
            <div class="col-lg-3">
              <div class="form-group">
                <div class="control-label">
                  Sandi Baru :
                </div>
                <input type="password" class="form-control" name="" id="">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <div class="control-label">
                  Konfirmasi Sandi :
                </div>
                <input type="password" class="form-control" name="" id="">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <div class="control-label">
                  Sandi Lama :
                </div>
                <input type="password" class="form-control" name="" id="">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <div class="control-label">
                  &nbsp;
                </div>
                <input class="btn btn-primary" type="submit" value="Cetak" name="cetak">
              </div>
            </div>
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