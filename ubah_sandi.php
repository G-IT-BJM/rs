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
          Ubah Sandi
        </div>
      </div>
      <div class="card-body">
        <?php show_notif() ?>
        <form method="post" action="ubah-sandi-action.php">
          <div class="row">
            <div class="col-lg-3">
              <div class="form-group">
                <div class="control-label">
                  Sandi Baru :
                </div>
                <input type="password" class="form-control" name="sandi_baru" id="sandi_baru">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <div class="control-label">
                  Konfirmasi Sandi :
                </div>
                <input type="password" class="form-control" name="konfirmasi_sandi" id="konfirmasi_sandi">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <div class="control-label">
                  Sandi Lama :
                </div>
                <input type="password" class="form-control" name="sandi_lama" id="sandi_lama">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <div class="control-label">
                  &nbsp;
                </div>
                <input class="btn btn-primary" type="submit" value="Ubah" name="ubah">
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