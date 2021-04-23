<?php

include 'config.php';
include 'inc/head.php';
include 'function.php';

?>

<main>
  <div class="container-fluid">    
    <div class="card mt-4 mb-4">
      <div class="card-header">
        <div class="float-left">
          <i class="fas fa-table mr-1"></i>
          Cetak Pengantar STR & SIP
        </div>
      </div>
      <div class="card-body">
        <form method="get" target="_blank" action="cetak-laporan-pengantar-str-sip.php">
          <div class="row">
            <div class="col-lg-3">
              <div class="form-group">
                <div class="control-label">
                  Jenis
                </div>
                <select class="form-control" name="jenis" required>
                  <option value="">Pilih Jenis</option>
                  <option value="STR">STR</option>
                  <option value="SIP">SIP</option>
                </select>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <div class="control-label">
                  Dari Tanggal
                </div>
                <input type="date" id="dari_tgl" name="dari_tgl" class="form-control" value="" required="">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <div class="control-label">
                  Sampai Tanggal
                </div>
                <input type="date" id="sampai_tgl" name="sampai_tgl" class="form-control" value="" required="">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <div class="control-label">
                  &nbsp;
                </div>
                <input class="btn btn-primary" type="submit" value="Preview" name="preview">
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